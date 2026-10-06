<?php
require __DIR__ . '/includes/data.php';
require __DIR__ . '/includes/kort.php';

$antal = array_count_values(array_column($billeder, 'by_id'));
?>
<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RMfoto – Fotograf Rolf Müller</title>
<meta name="description" content="Fotograf Rolf Müller – fotos fra Grønland og Grønlandskalenderen.">
<link rel="icon" href="favicon.ico">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="css/forside.css" rel="stylesheet">
</head>

<body>
<header class="top">
  <a class="navn" href="./">
    <img src="billeder/top_logo/rm.png" alt="RM" width="36" height="30">
    <span>Fotograf <strong>Rolf Müller</strong></span>
  </a>
  <ul class="kontakt">
    <li>Stationsvej 81</li>
    <li>DK 3650 Ølstykke</li>
    <li><?= mail_link() ?></li>
  </ul>
  <form class="sog" method="get" action="sog.php" role="search">
    <input name="sog" type="search" placeholder="Søg i billeder" aria-label="Søg i billeder">
    <button type="submit" aria-label="Søg">
      <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5" fill="none" stroke="currentColor" stroke-width="2.2"/><path d="M15.5 15.5 21 21" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
    </button>
  </form>
</header>

<main class="forside">
  <figure class="signatur">
    <img src="billeder/forside.jpg" alt="Isbjerg i Grønland – foto: Rolf Müller" width="450" height="419">
  </figure>

  <nav class="kort" aria-label="Byer i Grønland">
    <?= gronlandskort($byer, $antal) ?>
  </nav>

  <section class="kalender">
    <h1><a href="kalender2022/">Grønlandskalenderen 2022</a></h1>
    <a class="plakat" href="kalender2022/"><img src="kalender2022/50plakat.jpg" alt="Grønlandskalenderen 2022" width="300" height="425"></a>
    <p><a href="kalender2022/">Klik for at se kalenderen</a></p>
  </section>
</main>

<footer class="bund">
  <p class="lande">Danmark <span>&#9632;</span> Island <span>&#9632;</span> Færøerne</p>
  <p class="links"><a href="sitemap.php">Sitemap</a> <span>·</span> © RMfoto</p>
</footer>
<script src="js/mail.js"></script>
</body>
</html>
