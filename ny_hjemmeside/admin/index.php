<?php
// Forsiden af admin: kortet med byerne, som i den gamle Flash-admin. Klik på en by for at se dens billeder.
require __DIR__ . '/includes/admin.php';
kraev_login();

$data = hent_data();
$antal = array_count_values(array_column($data['billeder'], 'by_id'));
$byer = $data['byer'];
usort($byer, fn($a, $b) => strcmp($a['navn'], $b['navn']));

admin_top('Byer');
?>
<h1>Byer</h1>
<div class="oversigt">
  <div class="bykort">
    <img src="../billeder/map2.jpg?<?= filemtime(ROD . '/billeder/map2.jpg') ?>" alt="Kort over Grønland" width="400" height="535">
<?php foreach ($byer as $by): ?>
    <a href="billeder.php?byid=<?= $by['id'] ?>" title="<?= h($by['navn']) ?>" style="top: <?= $by['y'] - 4 ?>px; left: <?= $by['side'] === 'v' ? $by['x'] - 60 : $by['x'] ?>px"></a>
<?php endforeach; ?>
  </div>
  <div>
    <table class="byliste">
<?php foreach ($byer as $by): ?>
      <tr>
        <td><a href="billeder.php?byid=<?= $by['id'] ?>"><?= h($by['navn']) ?></a></td>
        <td><?= $antal[$by['id']] ?? 0 ?> billeder</td>
      </tr>
<?php endforeach; ?>
    </table>
    <p><a href="kort.php">Indsæt, flyt eller slet byer på kortet</a></p>
  </div>
</div>
<?php admin_bund();
