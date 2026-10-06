<?php
require __DIR__ . '/includes/data.php';
require __DIR__ . '/includes/kort.php';

$by = $byer[(int) ($_GET['byid'] ?? 0)] ?? null;
if ($by === null) {
    header('Location: index.php');
    exit;
}

$billeder_pr_side = 20;
$sider = array_chunk(billeder_i_by($by['id']), $billeder_pr_side);
$antal_sider = count($sider);

/** Forrige / 1 2 3 / Næste under hver side. */
function sidenavigation(int $side, int $antal_sider): string
{
    if ($antal_sider < 2) {
        return '';
    }
    $html = '<div class="sidenavigation">';
    if ($side > 1) {
        $html .= '<a href="#" data-side="' . ($side - 1) . '">&lt;&lt;Forrige</a> ';
    }
    for ($i = 1; $i <= $antal_sider; $i++) {
        $html .= $i === $side ? "<strong>$i</strong> " : "<a href=\"#\" data-side=\"$i\">$i</a> ";
    }
    if ($side < $antal_sider) {
        $html .= '<a href="#" data-side="' . ($side + 1) . '">Næste&gt;&gt;</a>';
    }
    return $html . '</div>';
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>RMfoto - <?= h($by['navn']) ?></title>
<link rel="icon" href="favicon.ico">
<link href="js/photoswipe/photoswipe.css" rel="stylesheet">
<link href="css/visfuld.css" rel="stylesheet">
<script type="module" src="js/galleri.js"></script>
<script src="js/sideskift.js" defer></script>
</head>

<body>
<table class="ramme" cellpadding="0" cellspacing="0">
  <tr>
    <td width="60" class="venstre_kandt">&nbsp;</td>
    <td width="140" valign="top" class="venstre_bg">
      <div class="mellemrum_top"></div>
      <div class="mellemrum_under_top"></div>
      <img src="billeder/fir.gif" alt="" width="15" height="15"> <?= h($by['navn']) ?><br>
      <br>
      <a href="index.php"><img src="billeder/fir.gif" alt="" width="15" height="15"> Til forsiden</a>
    </td>
    <td width="20" class="mellem_vk_billed">&nbsp;</td>
    <td width="750" valign="top">
      <div class="mellemrum_top"></div>
      <div class="galleri">
<?php foreach ($sider as $i => $side): ?>
        <div class="billedside" data-side="<?= $i + 1 ?>"<?= $i > 0 ? ' hidden' : '' ?>>
          <?= billed_tabel($side) ?>
          <?= sidenavigation($i + 1, $antal_sider) ?>
        </div>
<?php endforeach; ?>
      </div>
    </td>
    <td valign="top"><div class="mellemrum_top"></div><?= gronlandskort($byer, array_count_values(array_column($billeder, 'by_id')), $by['id']) ?></td>
  </tr>
</table>
</body>
</html>
