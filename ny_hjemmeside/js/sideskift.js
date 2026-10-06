// Bladrer mellem siderne i et by-galleri (20 billeder pr. side).
document.addEventListener('click', (e) => {
  const link = e.target.closest('a[data-side]');
  if (!link) return;
  e.preventDefault();
  const side = link.dataset.side;
  document.querySelectorAll('.billedside').forEach((div) => {
    div.hidden = div.dataset.side !== side;
  });
  window.scrollTo(0, 0);
});
