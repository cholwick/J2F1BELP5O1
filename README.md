# J2F1BELP5O1 - Dynamic Characters Application

Een dynamische PHP-applicatie gebouwd als schoolopdracht voor het MBO Software Development (Leerpad 5 - Databases & PHP). De applicatie toont een overzicht van personages uit een relationele database en biedt gedetailleerde weergaven per karakter.

## 🚀 Functionaliteiten

- **Dynamisch Karakteroverzicht (`index.php`)**:
  - Toont automatisch het actuele aantal karakters in de header (`Alle [X] characters uit de database`).
  - Karakters worden alfabetisch gesorteerd op naam (`ORDER BY name ASC`).
  - Elke kaart bevat de avatar, naam, health (levenskracht), attack (aanvalskracht) en defense (verdediging).
  - Directe doorkliklink naar de detailpagina via GET-parameters (`character.php?id=...`).

- **Dynamische Detailpagina (`character.php`)**:
  - Volledige statistieken en biografie van het geselecteerde karakter.
  - De achtergrondkleur van het stats-blok past zich dynamisch aan op basis van de kolom `color` in de database (bijv. `crimson`, `plum`, `yellowgreen`).
  - Wapens en bepantsering worden conditioneel weergegeven (alleen getoond als het karakter deze bezit).
  - Voorzien van een terugknop naar het overzicht en foutafhandeling wanneer een ongeldig ID wordt opgevraagd.

- **Veiligheid & Kwaliteit**:
  - Veilige databaseverbinding via **PDO** (PHP Data Objects).
  - Voorkomt SQL-injecties door het gebruik van **Prepared Statements** (`$stmt->prepare()` en parameters).
  - XSS-preventie met `htmlspecialchars()` en nette regeleinden via `nl2br()`.
  - 100% valide **W3C HTML5** markup (0 errors, 0 warnings).
  - Modulaire architectuur met `require_once` voor databaseverbinding en herbruikbare footer.

---

## 🛠️ Installatie & Gebruik

### 1. Vereisten
- [XAMPP](https://www.apachefriends.org/) (met Apache en MySQL/MariaDB)
- PHP 8.0 of hoger

### 2. Database Importeren
1. Start **Apache** en **MySQL** in het XAMPP Control Panel.
2. Ga in je browser naar [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. Maak een nieuwe database aan met de naam `characters` (collation: `utf8mb4_general_ci`).
4. Selecteer de database `characters` en ga naar het tabblad **Importeren**.
5. Kies het meegeleverde bestand `characters.sql` en klik op **Starten** (*Go*).

### 3. Applicatie Uitvoeren
1. Plaats de projectmap in je XAMPP webroot: `C:\xampp\htdocs\J2F1BELP5O1`.
2. Open in je browser:
   ```
   http://localhost/J2F1BELP5O1/index.php
   ```

---

## 📁 Bestandsstructuur

```text
J2F1BELP5O1/
├── includes/
│   ├── database.php      # PDO database connectie met try/catch
│   └── footer.php        # Herbruikbare footer met copyright
├── resources/
│   ├── css/
│   │   └── style.css     # CSS styling voor overzicht en detailweergave
│   └── images/           # Afbeeldingen en avatars van alle karakters
├── voorbeelden/          # Referentiescreenshots van het verwachte resultaat
├── character.php         # Detailweergave per karakter
├── characters.sql        # Database dump met tabel en records
├── index.php             # Dynamische overzichtspagina
└── README.md             # Projectdocumentatie
```

---

## 👤 Auteur
**Lake Arderne**  
*MBO Software Development - Jaar 2 Fase 1 (J2F1)*
