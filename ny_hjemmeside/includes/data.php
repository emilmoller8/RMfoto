<?php
// Henter byer og billeder fra data/data.json (laves ud fra den gamle database
// med værktøjer/sql_til_json.py) og giver et par hjælpefunktioner til siderne.

declare(strict_types=1);

header('Content-Type: text/html; charset=utf-8');

$data = json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true, flags: JSON_THROW_ON_ERROR);

$billeder_pr_raekke = (int) $data['billeder_pr_raekke'];

/** @var array<int, array> $byer  by-id => by */
$byer = array_column($data['byer'], null, 'id');

/** @var array<int, array> $billeder  billed-id => billede */
$billeder = array_column($data['billeder'], null, 'id');

/** Mailadressen på siden. Den står ikke direkte i HTML'en, så spam-robotter ikke kan samle den op. */
const KONTAKT_MAIL = 'kontakt@rmfoto.dk';

/** Escaper tekst til HTML. */
function h(?string $tekst): string
{
    return htmlspecialchars($tekst ?? '', ENT_QUOTES, 'UTF-8');
}

/** Billederne fra én by, nyeste først (som på den gamle side). */
function billeder_i_by(int $by_id): array
{
    global $billeder;
    $ud = array_filter($billeder, fn($b) => $b['by_id'] === $by_id);
    krsort($ud);
    return array_values($ud);
}

/** Billeder hvor søgeordet indgår i nøgleordene (ingen forskel på store og små bogstaver). */
function sog_billeder(string $sog): array
{
    global $billeder;
    if (trim($sog) === '') {
        return [];
    }
    return array_values(array_filter($billeder, fn($b) => mb_stripos($b['noegleord'], $sog) !== false));
}

/** Link til et billede, så det åbner stort i galleriet ved klik. */
function billede_link(array $b): string
{
    $str = @getimagesize(__DIR__ . '/../' . $b['stor']);
    [$bredde, $hoejde] = $str ?: [1600, 1200];
    return '<a href="' . h($b['stor']) . '" data-pswp-width="' . $bredde . '" data-pswp-height="' . $hoejde . '">'
        . '<img src="' . h($b['lille']) . '" class="miniature" alt="' . h($b['tekst']) . '" loading="lazy"></a>';
}

/** En miniature med den gamle skygge nederst og til højre. */
function miniature(array $b): string
{
    return '<table class="skygge" cellpadding="0" cellspacing="0">
  <tr>
    <td>' . billede_link($b) . '</td>
    <td class="skygge_l"><img src="billeder/skygge_h/hh.png" alt="" width="6" height="12"></td>
  </tr>
  <tr>
    <td class="skygge_v"><img src="billeder/skygge_h/vh.png" alt="" width="9" height="6"></td>
    <td><img src="billeder/skygge_h/nh.png" alt="" width="6" height="6"></td>
  </tr>
</table>';
}

/** Miniaturer i rækker med $billeder_pr_raekke billeder i hver. */
function billed_tabel(array $liste): string
{
    global $billeder_pr_raekke;
    $html = '<table class="billedtabel" cellpadding="0" cellspacing="0">';
    foreach (array_chunk($liste, $billeder_pr_raekke) as $raekke) {
        $html .= '<tr>';
        foreach ($raekke as $b) {
            $html .= '<td>' . miniature($b) . '<br></td><td width="15">&nbsp;</td>';
        }
        $html .= '</tr>';
    }
    return $html . '</table>';
}

/** Link til mailadressen. Adressen står baglæns i HTML'en og vendes af js/mail.js. */
function mail_link(): string
{
    return '<a class="mail" href="#" data-mail="' . h(strrev(KONTAKT_MAIL)) . '">Send en mail</a>';
}
