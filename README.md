#Anleitung zum Betrieb des Digitalen Frachtbriefs.

##Betrieb im eigenen Applikatons Container:

####Schritt 1:
Aus dem GitHub das Repository [Digitaler Frachtbrief Container-Applikation](https://github.com/thorwalez/waybill-container-app.git) clonen ob jetzt master oder Tag ist egal.
Bevorzugt wird immer das Aktueller Tag da im master sich Änderungen befinden könnten.

```
# in ein Verzeichnis deiner Wahl!
$: git clone https://github.com/thorwalez/pdftohtmlTool.git waybill
```

####Schritt 2:
Folge den Anweisungen aus der README.md des Repositories.

Kurze Zusammenfassung am beispiel Mac:
Schritt 2.1 Bauen des Images:
``
$: cd mac/
$mac/: sh tntapp.sh build
``

Hinweis: Sollte auf dem Host-System bereits ein Ubuntu:latest existieren kann es zu fehlern kommen wenn dies veraltet ist.
          Als erste Maßnahme wäre es dieses Image zu Aktuallisieren mit dem Konsolen Befehl `$: docker pull ubuntu:latest`
          darauf sollte der Build Prozess Fehlerfrei funktionieren.

Schritt 2.2 Starten des Containers:
Unter Linux und Mac werden die Container gleich nach dem Bauen gestartet, das ist unter Windows nicht so daher muss hier der Start extra ausgeführt werden.

```
# unter Windows Host Systemen
$: cd windows/
$windows/: .\start.bat
```
Schritt 2.3 Stopen des Containers:
```
# unter Windows
$: cd windows/
$windows/: .\stop.bat

# unter Linux/Mac

$: cd mac/
$mac/: sh tntapp.sh stop
```


##Betrieb auf einen vServer im Container oder auf einem Host-System:

Anforderung vServer:
- Unix System (Ubuntu, Debian, usw.)
- ghostscript [Hinweis: dieses ist meist schon als Standard installiert in einem Linux System]
- php > 7.*
- composer

####Schritt 1 Soruce Code der Web-Applikation beziehen:
Aus dem GitHub das Repository [Digitaler Frachtbrief Web-Applikation](https://github.com/thorwalez/waybill-creater.git) clonen ob jetzt master oder Tag ist egal.
Bevorzugt wird immer das Aktueller Tag da im master sich Änderungen befinden könnten.

```
# in ein Verzeichnis deiner Wahl!
$: git clone https://github.com/thorwalez/pdftohtml.git waybill
```

Es wird von einem Strikten Verzeichnis ausgeganegn "/var/www/app" das kann aktuell nur im Code selbst angepasst werden in 6 Classen, leicht zu finden in dem auf dem "src/" Verzeichnis danach gesucht wird.
Hinweis: Hier würde dann aber auch kein Support mehr stattfinden da ungetestet ob eine Pfad Anpassung Probleme macht, im Grunde aber sollte wenn Einheitlich alles laufen.

####Schritt 2 Webserver einrichten:
Wenn man die Web-App auf einem eignen vServer betreiben möchte benötigt man natürlich einen Webserver "nginx" oder "apache".
Dieser muss dann auf das Verzeichnis der Web-App schauen und auf den "public" Ordner lauschen.

####Schritt 3 Web-App einrichten:
Hier muss nun erst einmal die Packages für die Web-App installiert werden und ein "data/" Ordner angelegt werden.

Schritt 3.1 Packages installieren:
```
server$\var\www\app\: composer install
```
    
Schritt 3.2 Data Ordner anlegen:
Dieser Ordner muss natürlich Schreib und Lese Rechte erhalten, damit darin die PDF Dateien angelegt werden können.
```
server$\var\www\app\: mkdir -p data
```

Schritt 4 Aufruf Browser:
Browser deiner Wahl starten und die entsprechende URL des vServers aufrufen der im Web-Server als Domain hinterlegt wurde.

Beispiel:
```
https://app.deineFirma.de
```
Darauf sollte eine Seite angezeigt werden mit "Willkommen zur..." und einem Start-Button, darauf klicken und das Formular für den Frachtbrief wird angezeigt.
Probe lauf einfach alle Felder die Rot umrahmt sind ausfüllen und auf erstellen klicken.