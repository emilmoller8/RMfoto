// Kort-editor: samme værktøjer som den gamle admin_kort.swf (vælg, flyt, stempel, slet, spejl, gem det hele).
const kort = document.getElementById('kort');
const status = document.getElementById('status');
const boks = document.getElementById('byboks');
const boksNavn = document.getElementById('boks_navn');
const boksX = document.getElementById('boks_x');
const boksY = document.getElementById('boks_y');
const boksInfo = document.getElementById('boks_info');

let byer = JSON.parse(document.getElementById('byer_data').textContent);
let slettede = [];
let valgt = null;
let vaerktoej = 'pil';
let aendret = false;

function markerAendret() {
  aendret = true;
  status.textContent = 'Ændringerne er ikke gemt endnu.';
  status.className = 'ikke_gemt';
}

// Prikken er 8×8 og sidder i (x, y-4); navnet står til højre (h) eller venstre (v) for den
function tegn() {
  kort.replaceChildren();
  for (const by of byer) {
    const el = document.createElement('div');
    el.className = 'by' + (by.side === 'v' ? ' venstre' : '') + (by === valgt ? ' valgt' : '');
    el.style.top = (by.y - 6) + 'px';
    el.style.left = by.side === 'v' ? (by.x + 8) + 'px' : by.x + 'px';
    if (by.side === 'v') el.style.transform = 'translateX(-100%)';
    el.innerHTML = '<span class="prik"></span><span class="navn"></span>';
    el.querySelector('.navn').textContent = by.navn;
    el.addEventListener('pointerdown', (e) => trykPaaBy(e, by));
    kort.append(el);
  }
  visBoks();
}

function visBoks() {
  boks.hidden = !valgt;
  if (!valgt) return;
  if (document.activeElement !== boksNavn) boksNavn.value = valgt.navn;
  boksX.value = valgt.x;
  boksY.value = valgt.y;
  boksInfo.textContent = valgt.id ? `Id ${valgt.id} · ${valgt.billeder} billeder` : 'Ny by (ikke gemt)';
}

function vaelg(by) {
  valgt = by;
  tegn();
}

function trykPaaBy(e, by) {
  e.stopPropagation();
  if (vaerktoej === 'slet') {
    if (by.billeder > 0) {
      alert(`${by.navn} har ${by.billeder} billeder. Slet eller flyt billederne først.`);
      return;
    }
    if (!confirm(`Slet ${by.navn}?`)) return;
    byer = byer.filter((b) => b !== by);
    if (by.id) slettede.push(by.id);
    if (valgt === by) valgt = null;
    markerAendret();
    tegn();
    return;
  }
  vaelg(by);
  if (vaerktoej === 'flyt') startTraek(e, by);
}

function startTraek(e, by) {
  const start = { x: e.clientX, y: e.clientY, bx: by.x, by: by.y };
  const flyt = (ev) => {
    by.x = Math.max(0, Math.min(400, Math.round(start.bx + ev.clientX - start.x)));
    by.y = Math.max(4, Math.min(531, Math.round(start.by + ev.clientY - start.y)));
    markerAendret();
    tegn();
  };
  const slip = () => {
    window.removeEventListener('pointermove', flyt);
    window.removeEventListener('pointerup', slip);
  };
  window.addEventListener('pointermove', flyt);
  window.addEventListener('pointerup', slip);
}

// Stempel: klik på kortet for at indsætte en ny by
kort.addEventListener('pointerdown', (e) => {
  if (vaerktoej !== 'stempel') {
    vaelg(null);
    return;
  }
  const r = kort.getBoundingClientRect();
  const by = { id: null, navn: 'ny by', x: Math.round(e.clientX - r.left - 4), y: Math.round(e.clientY - r.top), side: 'h', billeder: 0 };
  byer.push(by);
  markerAendret();
  vaelg(by);
  boksNavn.focus();
  boksNavn.select();
});

document.querySelectorAll('[data-vaerktoej]').forEach((knap) => {
  knap.addEventListener('click', () => {
    vaerktoej = knap.dataset.vaerktoej;
    document.querySelectorAll('[data-vaerktoej]').forEach((k) => k.setAttribute('aria-pressed', k === knap));
    kort.className = 'redigeringskort vaerktoej-' + vaerktoej;
  });
});

document.getElementById('spejl').addEventListener('click', () => {
  if (!valgt) return alert('Vælg først en by.');
  valgt.side = valgt.side === 'v' ? 'h' : 'v';
  markerAendret();
  tegn();
});

boksNavn.addEventListener('input', () => {
  valgt.navn = boksNavn.value;
  markerAendret();
  tegn();
});
for (const [felt, akse] of [[boksX, 'x'], [boksY, 'y']]) {
  felt.addEventListener('input', () => {
    const v = parseInt(felt.value, 10);
    if (Number.isNaN(v)) return;
    valgt[akse] = v;
    markerAendret();
    tegn();
  });
}

// Piletasterne flytter den valgte by
document.addEventListener('keydown', (e) => {
  if (!valgt || e.target.matches('input, textarea')) return;
  const d = { ArrowLeft: [-1, 0], ArrowRight: [1, 0], ArrowUp: [0, -1], ArrowDown: [0, 1] }[e.key];
  if (!d) return;
  e.preventDefault();
  valgt.x += d[0];
  valgt.y += d[1];
  markerAendret();
  tegn();
});

document.getElementById('gem_alt').addEventListener('click', async () => {
  status.textContent = 'Gemmer …';
  status.className = '';
  try {
    const svar = await fetch('kort.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF': window.CSRF },
      body: JSON.stringify({ byer: byer.map(({ id, navn, x, y, side }) => ({ id, navn, x, y, side })), slet: slettede }),
    });
    const resultat = await svar.json();
    if (!resultat.ok) throw new Error(resultat.fejl);
    const valgtNavn = valgt?.navn;
    const antal = Object.fromEntries(byer.filter((b) => b.id).map((b) => [b.id, b.billeder]));
    byer = resultat.byer.map((b) => ({ ...b, billeder: antal[b.id] ?? 0 }));
    valgt = byer.find((b) => b.navn === valgtNavn) ?? null;
    slettede = [];
    aendret = false;
    status.textContent = 'Gemt. Kortene på hjemmesiden er opdateret.';
    tegn();
  } catch (fejl) {
    status.textContent = 'Kunne ikke gemme: ' + fejl.message;
    status.className = 'ikke_gemt';
  }
});

window.addEventListener('beforeunload', (e) => {
  if (aendret) e.preventDefault();
});

tegn();
