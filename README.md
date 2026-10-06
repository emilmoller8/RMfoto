# RMfoto

Kildekode til rmfoto.dk – billedgalleri med fotos fra byer i Grønland.

Siden flyttes fra Wannafind til Gigahost og genopbygges, så den ser ud som i dag (1:1), men kører på moderne PHP.

## Indhold

- `database/rmfoto_dk_db.sql` – eksport af den nuværende database fra Wannafind (MySQL):
  - `billeder` – billeder med tekst, stier til stor/medium/lille version og nøgleord
  - `byer` – byer med placering (x/y) på Grønlandskortet
  - `opsatning` – indstillinger (fx `skift`)
