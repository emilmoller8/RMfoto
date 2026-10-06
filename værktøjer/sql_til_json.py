"""Laver ny_hjemmeside/data/data.json ud fra database/rmfoto_dk_db.sql.

Kør fra repoets rod:  python3 værktøjer/sql_til_json.py
"""
import json
import re
from pathlib import Path

ROD = Path(__file__).resolve().parent.parent
SQL = ROD / "database" / "rmfoto_dk_db.sql"
UD = ROD / "ny_hjemmeside" / "data" / "data.json"

VAERDI = re.compile(r"'((?:[^'\\]|\\.|'')*)'|(-?\d+(?:\.\d+)?)|NULL")


def raekker(sql, tabel):
    """Returnerer rækkerne fra alle INSERT INTO `tabel` som lister af dicts."""
    ud = []
    for m in re.finditer(
        rf"INSERT INTO `{tabel}` \(([^)]*)\) VALUES\s*(.*?);\s*$", sql, re.S | re.M
    ):
        kolonner = [k.strip(" `") for k in m.group(1).split(",")]
        for linje in re.findall(r"^\((.*)\)[,;]?\s*$", m.group(2), re.M):
            vaerdier = []
            for v in VAERDI.finditer(linje):
                if v.group(1) is not None:
                    s = v.group(1).replace("''", "'")
                    s = re.sub(r"\\(.)", lambda x: {"n": "\n", "r": "\r", "t": "\t"}.get(x.group(1), x.group(1)), s)
                    vaerdier.append(s)
                elif v.group(2) is not None:
                    vaerdier.append(int(v.group(2)) if "." not in v.group(2) else float(v.group(2)))
                else:
                    vaerdier.append(None)
            assert len(vaerdier) == len(kolonner), (tabel, linje)
            ud.append(dict(zip(kolonner, vaerdier)))
    return ud


def main():
    sql = SQL.read_text(encoding="utf-8")

    byer = [
        {"id": r["by_id"], "navn": r["by_navn"], "x": r["x_pos"], "y": r["y_pos"], "side": r["hv"]}
        for r in raekker(sql, "byer")
    ]
    billeder = [
        {
            "id": r["id"],
            "by_id": r["by_id"],
            "tekst": r["billede_txt"],
            "lille": r["billede_sti_l"],
            "medium": r["billede_sti_m"],
            "stor": r["billede_sti_s"],
            "noegleord": r["keyword"],
            "oprettet": r["oprettede"],
        }
        for r in raekker(sql, "billeder")
    ]
    opsaetning = {r["navn"]: r["variabel"] for r in raekker(sql, "opsatning")}

    data = {
        "billeder_pr_raekke": int(opsaetning.get("skift", 5)),
        "byer": sorted(byer, key=lambda b: b["id"]),
        "billeder": sorted(billeder, key=lambda b: b["id"]),
    }
    UD.write_text(json.dumps(data, ensure_ascii=False, indent=1) + "\n", encoding="utf-8")
    print(f"{len(byer)} byer og {len(billeder)} billeder skrevet til {UD.relative_to(ROD)}")


if __name__ == "__main__":
    main()
