<?php
// Fælles kode for admin: login, læsning/skrivning af data.json, billedbehandling og kort.

declare(strict_types=1);

const ROD = __DIR__ . '/../..';
const DATA_FIL = ROD . '/data/data.json';
const KODEORD_FIL = ROD . '/data/admin_kodeord.php';
const UPLOAD_MAPPE = 'billeder/uploadede_billeder/';

header('Content-Type: text/html; charset=utf-8');

session_name('rmfoto_admin');
session_set_cookie_params([
    'httponly' => true,
    'samesite' => 'Strict',
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
]);
session_start();

function h(?string $tekst): string
{
    return htmlspecialchars($tekst ?? '', ENT_QUOTES, 'UTF-8');
}

/* ---------- Login ---------- */

function csrf_token(): string
{
    return $_SESSION['csrf'] ??= bin2hex(random_bytes(16));
}

function csrf_felt(): string
{
    return '<input type="hidden" name="csrf" value="' . csrf_token() . '">';
}

/** Stopper, hvis en POST ikke kommer fra en af admin-siderne. */
function tjek_csrf(): void
{
    $token = $_POST['csrf'] ?? $_SERVER['HTTP_X_CSRF'] ?? '';
    if (!hash_equals(csrf_token(), (string) $token)) {
        http_response_code(400);
        exit('Ugyldig forespørgsel. Gå tilbage og prøv igen.');
    }
}

/** Kræver login. Viser login-siden (eller "opret kodeord" første gang) og stopper, hvis man ikke er logget ind. */
function kraev_login(): void
{
    if (!empty($_SESSION['logget_ind'])) {
        return;
    }

    $fejl = '';
    $har_kodeord = is_file(KODEORD_FIL);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kodeord'])) {
        tjek_csrf();
        $kodeord = (string) $_POST['kodeord'];
        if (!$har_kodeord) {
            if (mb_strlen($kodeord) < 8) {
                $fejl = 'Kodeordet skal være mindst 8 tegn.';
            } elseif ($kodeord !== ($_POST['gentag'] ?? '')) {
                $fejl = 'De to kodeord er ikke ens.';
            } else {
                $hash = password_hash($kodeord, PASSWORD_DEFAULT);
                file_put_contents(KODEORD_FIL, "<?php\nreturn " . var_export($hash, true) . ";\n", LOCK_EX);
                $_SESSION['logget_ind'] = true;
            }
        } elseif (password_verify($kodeord, require KODEORD_FIL)) {
            $_SESSION['logget_ind'] = true;
        } else {
            sleep(2);
            $fejl = 'Forkert kodeord.';
        }
        if (!empty($_SESSION['logget_ind'])) {
            session_regenerate_id(true);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    admin_top('Log ind');
    echo '<form method="post" class="login">' . csrf_felt();
    if ($har_kodeord) {
        echo '<h1>RMfoto admin</h1>
<label>Kodeord<br><input type="password" name="kodeord" autofocus required></label>';
    } else {
        echo '<h1>Opret kodeord til admin</h1>
<p>Der er ikke oprettet et kodeord endnu. Vælg et kodeord på mindst 8 tegn.</p>
<label>Kodeord<br><input type="password" name="kodeord" autofocus required minlength="8"></label>
<label>Gentag kodeord<br><input type="password" name="gentag" required minlength="8"></label>';
    }
    if ($fejl) {
        echo '<p class="fejl">' . h($fejl) . '</p>';
    }
    echo '<button type="submit">' . ($har_kodeord ? 'Log ind' : 'Opret og log ind') . '</button></form>';
    admin_bund();
    exit;
}

/* ---------- Layout ---------- */

function admin_top(string $titel, string $ekstra_head = ''): void
{
    echo '<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>RM admin - ' . h($titel) . '</title>
<link rel="icon" href="../favicon.ico">
<link rel="stylesheet" href="admin.css">
' . $ekstra_head . '
</head>
<body>
';
    if (!empty($_SESSION['logget_ind'])) {
        echo '<nav class="topmenu">
  <a href="index.php">Byer</a>
  <a href="kort.php">Rediger byer på kortet</a>
  <a href="../" target="_blank">Se hjemmesiden</a>
  <form method="post" action="logud.php">' . csrf_felt() . '<button type="submit" class="link">Log ud</button></form>
</nav>
';
    }
    if (!empty($_SESSION['besked'])) {
        echo '<p class="besked">' . h($_SESSION['besked']) . '</p>';
        unset($_SESSION['besked']);
    }
    echo '<main>';
}

function admin_bund(): void
{
    echo "</main>\n</body>\n</html>\n";
}

/** Gemmer en besked til næste side og sender brugeren videre. */
function videre(string $url, string $besked = ''): never
{
    if ($besked !== '') {
        $_SESSION['besked'] = $besked;
    }
    header('Location: ' . $url);
    exit;
}

/* ---------- Data ---------- */

function hent_data(): array
{
    return json_decode(file_get_contents(DATA_FIL), true, flags: JSON_THROW_ON_ERROR);
}

/**
 * Læser data.json, lader $aendring rette i det og gemmer igen – med lås, så to
 * samtidige ændringer ikke overskriver hinanden. Den gamle fil gemmes i data/backup/.
 */
function opdater_data(callable $aendring): mixed
{
    $laas = fopen(ROD . '/data/.laas', 'c');
    flock($laas, LOCK_EX);
    try {
        $data = hent_data();
        $resultat = $aendring($data);

        $backup = ROD . '/data/backup';
        if (!is_dir($backup)) {
            mkdir($backup, 0755, true);
        }
        copy(DATA_FIL, $backup . '/data-' . date('Y-m-d-His') . '-' . bin2hex(random_bytes(2)) . '.json');
        $gamle = glob($backup . '/data-*.json');
        sort($gamle);
        foreach (array_slice($gamle, 0, -30) as $fil) {
            unlink($fil);
        }

        usort($data['byer'], fn($a, $b) => $a['id'] <=> $b['id']);
        usort($data['billeder'], fn($a, $b) => $a['id'] <=> $b['id']);
        $tmp = DATA_FIL . '.tmp';
        file_put_contents($tmp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n");
        rename($tmp, DATA_FIL);
        return $resultat;
    } finally {
        flock($laas, LOCK_UN);
        fclose($laas);
    }
}

function find_by(array $data, int $id): ?array
{
    foreach ($data['byer'] as $by) {
        if ($by['id'] === $id) {
            return $by;
        }
    }
    return null;
}

function find_billede(array $data, int $id): ?array
{
    foreach ($data['billeder'] as $b) {
        if ($b['id'] === $id) {
            return $b;
        }
    }
    return null;
}

function naeste_id(array $liste): int
{
    return $liste ? max(array_column($liste, 'id')) + 1 : 1;
}

/* ---------- Billeder ---------- */

/** Laver et filnavn uden mellemrum og æøå, som den gamle admin gjorde. */
function rent_filnavn(string $navn): string
{
    $navn = pathinfo($navn, PATHINFO_FILENAME);
    $navn = str_replace(['æ', 'ø', 'å', 'Æ', 'Ø', 'Å', ' '], ['ae', 'oe', 'aa', 'Ae', 'Oe', 'Aa', '_'], $navn);
    $navn = preg_replace('/[^A-Za-z0-9._-]/', '_', $navn);
    return trim($navn, '._') ?: 'billede';
}

function aabn_billede(string $fil): GdImage
{
    $info = @getimagesize($fil);
    $billede = match ($info[2] ?? null) {
        IMAGETYPE_JPEG => imagecreatefromjpeg($fil),
        IMAGETYPE_PNG => imagecreatefrompng($fil),
        IMAGETYPE_GIF => imagecreatefromgif($fil),
        IMAGETYPE_WEBP => imagecreatefromwebp($fil),
        default => throw new RuntimeException('Filen er ikke et JPG-, PNG-, GIF- eller WebP-billede.'),
    };
    // Drej billeder fra mobiltelefoner rigtigt
    if (($info[2] ?? null) === IMAGETYPE_JPEG && function_exists('exif_read_data')) {
        $vinkel = match (@exif_read_data($fil)['Orientation'] ?? 1) {
            3 => 180, 6 => -90, 8 => 90, default => 0,
        };
        if ($vinkel) {
            $billede = imagerotate($billede, $vinkel, 0);
        }
    }
    return $billede;
}

/**
 * Skalerer et billede. $beskaer = true fylder hele $maks_b × $maks_h og skærer
 * kanterne fra (miniaturer); ellers passes billedet ind i rammen uden at blive forstørret.
 */
function skaler(GdImage $kilde, int $maks_b, int $maks_h, bool $beskaer): GdImage
{
    $b = imagesx($kilde);
    $h = imagesy($kilde);
    if ($beskaer) {
        $skala = max($maks_b / $b, $maks_h / $h);
        $ny_b = $maks_b;
        $ny_h = $maks_h;
    } else {
        $skala = min($maks_b / $b, $maks_h / $h, 1);
        $ny_b = (int) round($b * $skala);
        $ny_h = (int) round($h * $skala);
    }
    $ud = imagecreatetruecolor($ny_b, $ny_h);
    imagefill($ud, 0, 0, imagecolorallocate($ud, 255, 255, 255));
    $x = (int) round(($ny_b - $b * $skala) / 2);
    $y = (int) round(($ny_h - $h * $skala) / 2);
    imagecopyresampled($ud, $kilde, $x, $y, 0, 0, (int) round($b * $skala), (int) round($h * $skala), $b, $h);
    return $ud;
}

/** Sætter vandmærke 1 (vand.png) eller 2 (vand2.png) i øverste højre hjørne. */
function vandmaerke(GdImage $billede, int $vand): void
{
    if ($vand !== 1 && $vand !== 2) {
        return;
    }
    $maerke = imagecreatefrompng(ROD . '/billeder/' . ($vand === 1 ? 'vand.png' : 'vand2.png'));
    imagecopy($billede, $maerke, imagesx($billede) - imagesx($maerke), 0, 0, 0, imagesx($maerke), imagesy($maerke));
}

/**
 * Gemmer et uploadet billede i tre størrelser som den gamle admin:
 * stor (højst 2000×2000), medium_ (højst 1000×700) og trump_ (miniature 120×120).
 * Returnerer stierne relativt til hjemmesidens rod.
 */
function gem_uploadet_billede(string $tmp, string $original_navn, int $by_id, int $vand): array
{
    ini_set('memory_limit', '512M');
    $kilde = aabn_billede($tmp);

    $mappe = UPLOAD_MAPPE . $by_id . '/';
    if (!is_dir(ROD . '/' . $mappe)) {
        mkdir(ROD . '/' . $mappe, 0755, true);
    }
    $navn = time() . '_' . rent_filnavn($original_navn);
    $i = 1;
    $basis = $navn;
    while (is_file(ROD . '/' . $mappe . $navn . '.jpg')) {
        $navn = $basis . '-' . ++$i;
    }
    $stier = [
        'stor' => $mappe . $navn . '.jpg',
        'medium' => $mappe . 'medium_' . $navn . '.jpg',
        'lille' => $mappe . 'trump_' . $navn . '.jpg',
    ];

    $stor = skaler($kilde, 2000, 2000, false);
    vandmaerke($stor, $vand);
    imagejpeg($stor, ROD . '/' . $stier['stor'], 90);

    $medium = skaler($kilde, 1000, 700, false);
    vandmaerke($medium, $vand);
    imagejpeg($medium, ROD . '/' . $stier['medium'], 90);

    imagejpeg(skaler($kilde, 120, 120, true), ROD . '/' . $stier['lille'], 90);
    return $stier;
}

/** Sletter billedfilerne for et billede (stor, medium og miniature). */
function slet_billedfiler(array $b): void
{
    $stier = [$b['stor'], $b['lille'], $b['medium'] ?? ''];
    // Ældre billeder har medium_-filen liggende, uden at den står i data
    $stier[] = dirname($b['stor']) . '/medium_' . basename($b['stor']);
    foreach (array_unique(array_filter($stier)) as $sti) {
        $fil = realpath(ROD . '/' . $sti);
        $tilladt = realpath(ROD . '/' . UPLOAD_MAPPE);
        if ($fil && $tilladt && str_starts_with($fil, $tilladt . DIRECTORY_SEPARATOR) && is_file($fil)) {
            unlink($fil);
        }
    }
}

/** Gemmer alle uploadede filer fra et <input type="file" multiple>-felt. */
function uploadede_filer(string $felt): array
{
    $f = $_FILES[$felt] ?? null;
    if (!$f || !is_array($f['name'])) {
        return [];
    }
    $ud = [];
    foreach ($f['name'] as $i => $navn) {
        if ($f['error'][$i] === UPLOAD_ERR_NO_FILE) {
            continue;
        }
        if ($f['error'][$i] !== UPLOAD_ERR_OK) {
            throw new RuntimeException("$navn kunne ikke uploades (fejlkode {$f['error'][$i]}). Er filen for stor?");
        }
        $ud[] = ['navn' => $navn, 'tmp' => $f['tmp_name'][$i]];
    }
    return $ud;
}

/* ---------- Kort ---------- */

/**
 * Tegner kortene, som den gamle kortploter.php gjorde: map2.jpg (forsiden) med
 * alle byer på gronland.jpg, og map<By>.jpg (by-siderne) med én by på menu.jpg.
 */
function tegn_kort(array $byer): void
{
    $prik = imagecreatefrompng(ROD . '/billeder/dot.png');
    $skrift = __DIR__ . '/ARIALNB.TTF';

    $tegn_by = function (GdImage $kort, array $by) use ($prik, $skrift): void {
        $x = $by['x'];
        $y = $by['y'] - 4;
        imagecopy($kort, $prik, $x, $y, 0, 0, imagesx($prik), imagesy($prik));
        $sort = imagecolorallocate($kort, 0, 0, 0);
        $boks = imagettfbbox(9, 0, $skrift, $by['navn']);
        $bredde = abs($boks[4] - $boks[0]);
        $tekst_x = $by['side'] === 'v' ? $x - $bredde - 2 : $x + 9;
        imagefttext($kort, 9, 0, $tekst_x, $y + 8, $sort, $skrift, $by['navn']);
    };

    $alle = imagecreatefromjpeg(ROD . '/billeder/gronland.jpg');
    foreach ($byer as $by) {
        $tegn_by($alle, $by);
        $en = imagecreatefromjpeg(ROD . '/billeder/menu.jpg');
        $tegn_by($en, $by);
        imagejpeg($en, ROD . '/billeder/map' . $by['navn'] . '.jpg', 95);
    }
    imagejpeg($alle, ROD . '/billeder/map2.jpg', 95);
}
