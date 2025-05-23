# ⚽ Tippspiel Kulowcup

## 📝 Inhaltsverzeichnis
- [⚽ Tippspiel Kulowcup](#-tippspiel-kulowcup)
  - [📝 Inhaltsverzeichnis](#-inhaltsverzeichnis)
  - [📝 Beschreibung](#-beschreibung)
  - [📁 Projektstruktur](#-projektstruktur)
  - [🚀 Installation (für Einsteiger mit XAMPP unter Windows)](#-installation-für-einsteiger-mit-xampp-unter-windows)
    - [1. XAMPP herunterladen und installieren](#1-xampp-herunterladen-und-installieren)
    - [2. XAMPP starten](#2-xampp-starten)
    - [3. Datenbank und Benutzer einrichten](#3-datenbank-und-benutzer-einrichten)
    - [4. Projektdateien einfügen](#4-projektdateien-einfügen)
    - [5. Weiterleitung anpassen (optional, aber empfohlen)](#5-weiterleitung-anpassen-optional-aber-empfohlen)
    - [6. Anwendung im Browser öffnen](#6-anwendung-im-browser-öffnen)
  - [🤝 Mitwirken](#-mitwirken)



Ein webbasiertes Fußball-Tippspiel für den Kulowcup, entwickelt mit PHP, HTML, CSS und JavaScript.

## 📝 Beschreibung

Dieses Projekt ermöglicht es Benutzern, an einem Fußball-Tippspiel teilzunehmen, Spielergebnisse vorherzusagen und Punkte basierend auf der Genauigkeit ihrer Tipps zu sammeln. Es bietet eine benutzerfreundliche Oberfläche und eine einfache Möglichkeit, den Wettbewerb zu verfolgen.

## 📁 Projektstruktur

* `index.html`: Weiterleitung zur Startseite des Tippspiels.
* `css/`: Enthält Stylesheets für das Design der Anwendung.
* `script/`: Beinhaltet PHP-Dateien für die Datenbankverbindung.
* `html/`: Weitere HTML- und PHP-Seiten der Anwendung.
* `DB/`: Datenbankdateien und -skripte.
* `data/`: Enthält Bilder und Grafiken für die Website.
* `.vscode/`: Konfigurationsdateien für Visual Studio Code.

## 🚀 Installation (für Einsteiger mit XAMPP unter Windows)

### 1. XAMPP herunterladen und installieren

* Lade XAMPP für Windows von [SourceForge](https://sourceforge.net/projects/xampp/files/) herunter.
  **Tipp:** Die portable Version ist besonders einsteigerfreundlich.
* Entpacke das Archiv in einen Ordner, z. B. `C:\xampp`.
* Führe im entpackten Ordner die Datei `setup_xampp.bat` aus.
* Warte, bis die Einrichtung abgeschlossen ist.

### 2. XAMPP starten

* Öffne `xampp-control.exe`.
* Starte **Apache** und **MySQL** durch Klick auf „Start“.

### 3. Datenbank und Benutzer einrichten

1. **phpMyAdmin öffnen:**
   Rufe im Browser [http://localhost/phpmyadmin](http://localhost/phpmyadmin) auf.

2. **Datenbank anlegen:**

   * Klicke auf **„Datenbanken“**.
   * Erstelle eine neue Datenbank mit dem Namen `tippspiel`.

3. **Benutzer anlegen:**

   * Gehe zum Reiter **„Benutzerkonten“**.
   * Klicke auf **„Benutzerkonto hinzufügen“**.
   * Benutzername: `webserver`
   * Hostname: `localhost`
   * Passwort: `47114711`
   * Passwort wiederholen: `47114711`
   * Weise dem Benutzer **alle Rechte** für die Datenbank `tippspiel` zu.
   * Klicke auf **„OK“**.

4. **Datenbankstruktur importieren:**

   * Wähle links die Datenbank `tippspiel` aus.
   * Klicke oben auf **„Importieren“**.
   * Wähle die SQL-Datei aus dem Ordner `DB/` deines Projekts.
   * Klicke auf **„OK“**, um die Tabellen zu importieren.

### 4. Projektdateien einfügen

* Klone dieses Repository in den `htdocs`-Ordner von XAMPP (z. B. `C:\xampp\htdocs`):

```bash
git clone https://github.com/M-0-K/Tippspiel_Kulowcup.git
```

* Alternativ kannst du das Projekt auch als ZIP-Datei herunterladen und manuell entpacken.

### 5. Weiterleitung anpassen (optional, aber empfohlen)

Wenn du möchtest, dass beim Aufruf von `http://localhost` direkt dein Tippspiel geöffnet wird, kannst du die `index.php` im `htdocs`-Verzeichnis wie folgt anpassen:

```php
<?php
	if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: ' . $uri . '/Tippspiel_Kulowcup/index.php');
	exit;
?>
```

### 6. Anwendung im Browser öffnen

* Starte deinen Browser und öffne die Adresse:

```
http://localhost/
```

Die Anwendung sollte nun geladen werden. Falls Fehler auftreten, überprüfe die Zugangsdaten in deiner PHP-Datei (DSN, Benutzername und Passwort) sowie die MySQL-Einstellungen.

---

## 🤝 Mitwirken

Beiträge sind willkommen! Wenn du Verbesserungen vorschlagen oder Fehler melden möchtest, eröffne bitte ein [Issue](https://github.com/M-0-K/Tippspiel_Kulowcup/issues) oder erstelle einen Pull Request.

