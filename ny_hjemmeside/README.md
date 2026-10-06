# Ny rmfoto.dk

Samme udseende som den gamle side, men kører på PHP 8 uden database og uden Flash.

- `data/data.json` – byer og billeder (laves ud fra `database/rmfoto_dk_db.sql` med `python3 værktøjer/sql_til_json.py`)
- `index.php` – forside med Grønlandskort
- `vis_billeder.php?byid=…` – billeder fra en by
- `vis_stor.php?id=…` – ét billede stort (bruges af sitemap og gamle links)
- `sog.php`, `sitemap.php`
- `kalender2013/` … `kalender2022/` – kalenderne
- `js/galleri.js` – klik på et billede for at se det stort ([PhotoSwipe 5](https://photoswipe.com), MIT-licens)

## Upload til Gigahost

1. Upload hele indholdet af denne mappe (undtagen `README.md`) til webhotellets rodmappe.
2. Kopiér mappen `billeder/uploadede_billeder/` fra den gamle side på Wannafind til `billeder/uploadede_billeder/`.

Der skal ikke oprettes nogen database.
