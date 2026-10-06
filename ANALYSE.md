# Analyse af den gamle rmfoto.dk

## Sådan virker siden i dag

| Side | Fil | Funktion |
|---|---|---|
| Forside | `index.php` | Kontaktlinje, søgefelt, forsidebillede, klikbart Grønlandskort (`billeder/map2.jpg` + image map fra tabellen `byer`), link til Grønlandskalenderen 2022 |
| By-galleri | `vis_billeder.php?byid=N` | Miniaturer fra `billeder`, `skift` (=5) pr. række, 20 pr. side (JS-sideskift), lightbox, kort over byen (`billeder/map<By>.jpg`) til højre |
| Stort billede | `vis_stor.php?id=N` | Ét billede i fuld størrelse med tekst (bruges fra søgning og sitemap) |
| Søgning | `sog.php?sog=…` | Søger i `keyword` |
| Sitemap | `sitemap.php` | Liste over byer og billeder |
| Kalendere | `kalender2013/` … `kalender2022/` | Statiske HTML-sider med lightbox – kan genbruges som de er |
| Admin | `admin/` | Upload/rediger/slet billeder, opret by, upload kalender. Navigation via Flash |

Ubrugte/gamle filer: `forside.php`, `index`, `dk`, `en`, `index_old*.php`, `vis_billeder2/3.php`, `vis_billeder_old.php`, `vis_stor2.php`, `xml.php`, `flash/`, `kalender/` (2012, Flash).

## Problemer

1. **Virker ikke på moderne PHP.** Bruger `mysql_*` og `$HTTP_GET_VARS`, som er fjernet i PHP 7. Siden kan ikke køre på Gigahost uden omskrivning.
2. **SQL-injektion.** `byid`, `id` og `sog` sættes direkte ind i SQL.
3. **Admin er ikke beskyttet i koden.** Ingen login; `admin/passwd` bruges ikke af nogen `.htaccess`. Admin-forsiden kræver Flash, som ingen browser understøtter længere.
4. **Tegnsæt.** Siderne er `iso-8859-1` og tabellerne `latin1`, men kalendersiderne er `utf-8`.
5. **Databasen mangler primærnøgler/indeks** i eksporten.
6. **Manglende billeder i repoet:** mapperne `uploadede_billeder/1` (Ilulissat), `15` (Tasiilaq) og `20` (Nuuk) – 240 af 543 filer.

## Plan for ny version

- Samme udseende 1:1 (samme farver, billeder, kort, layout og lightbox).
- Samme adresser (`vis_billeder.php?byid=…`, `vis_stor.php?id=…`, `sog.php`, `sitemap.php`, `kalenderÅÅÅÅ/`), så links fra Google og andre sider stadig virker.
- PHP 8 med PDO og forberedte forespørgsler; databaseoplysninger i `config.php` uden for git.
- UTF-8 overalt; database konverteret til `utf8mb4` med primærnøgler.
- Ny simpel admin uden Flash, beskyttet med login.
