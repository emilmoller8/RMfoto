# Ny rmfoto.dk

Samme udseende som den gamle side, men kører på PHP 8 uden database og uden Flash.

- `data/data.json` – byer og billeder (laves ud fra `database/rmfoto_dk_db.sql` med `python3 værktøjer/sql_til_json.py`)
- `index.php` – forside med Grønlandskort
- `vis_billeder.php?byid=…` – billeder fra en by
- `vis_stor.php?id=…` – ét billede stort (bruges af sitemap og gamle links)
- `sog.php`, `sitemap.php`
- `kalender2013/` … `kalender2022/` – kalenderne
- `admin/` – admin med login: upload, rediger og slet billeder, og indsæt/flyt/slet byer på kortet
- `js/galleri.js` – klik på et billede for at se det stort ([PhotoSwipe 5](https://photoswipe.com), MIT-licens)

## Upload til Gigahost

1. Upload hele indholdet af denne mappe (undtagen `README.md`) til webhotellets rodmappe.
2. Kopiér mappen `billeder/uploadede_billeder/` fra den gamle side på Wannafind til `billeder/uploadede_billeder/`.

Der skal ikke oprettes nogen database.

## Admin

Gå til `/admin/`. Første gang bliver du bedt om at vælge et kodeord – gør det med det samme, når siden er lagt op.

- **Byer:** klik på en by på kortet eller i listen for at se dens billeder.
- **Billeder:** upload ét eller flere billeder (med eller uden vandmærke), ret tekst og søgeord, flyt til en anden by, udskift eller slet. Hvert billede gemmes i tre størrelser som før: stor (højst 2000 px), `medium_` (1000×700) og `trump_` (120×120).
- **Rediger byer på kortet:** som den gamle Flash-editor – vælg, flyt, indsæt ny by, slet by og spejl navnet. *Gem det hele* gemmer byerne og tegner `map2.jpg` og `map<By>.jpg` igen.

Alt gemmes i `data/data.json`. Før hver ændring gemmes en kopi i `data/backup/` (de seneste 30).

Serveren skal kunne skrive i `data/`, `billeder/` og `billeder/uploadede_billeder/`. Store billeder kræver, at PHP's `upload_max_filesize` og `post_max_size` er store nok (fx 32M).
