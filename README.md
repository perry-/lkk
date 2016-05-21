# LKK

Her finner du kildekoden for http://kidsakoder.no.

kidsakoder.no kjører Wordpress. Dette er et PHP-rammeverk, så det er ikke så
lett å komme i gang med utvilkling.

# Komme i gang

1. Installér Apache2 og MySQL. Hvordan dette gjøres i detalj dekkes ikke der,
   men om du er usikker kan du prøve MAMP eller XAMPP eller noen annen ferdig
   løsning for dette.
2. Sjekk ut kildekoden i dokument-roten.
3. Lag en database wp_lkk
4. Skaff tak i innholdet du trenger for å kjøre siden. Dette må noen i
   prosjektet hjelpe deg med, inntil videre.
5. Importér databasen fra mysql-dumpen du fikk. Les "vanlige feil" under dersom
   du har MySQL 5.5 eller eldre.
6. Kopiér wp-config-sample.php til wp-config.php og sett inn passord og
   brukernavn til databasen.
7. Sjekk om siden fungerer ved å åpne http://localhost/

## Vanlige feil

Dersom du kjører MySQL 5.5 eller eldre må du endre datatabasetabelltype fra
InnoDB til MyISAM. Redigér mysql.sql og erstatt alle instanser av InnoDB med
MyISAM.

Dersom undersider ikke laster, husk å skru på rewrite-modulen i Apache.
