<?php
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['WT13']['login'] !== 'ok'){
    exit(header("Location:login.php"));
}
?>

<!DOCTYPE html>
<html lang='de'>
    <head>
        <meta charset='UTF-8'>
        <title>Chat mit Ajax (LP)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href ="favicon.png" rel="shortcut icon">
        <link rel="stylesheet" href="../css/index.css">
        <style>
            #anzahl {
                text-align: center;
                width: 20px;
            }

        </style>
        <script>
            function senden() {
                document.getElementById('store').value = 'true';
                eintragen();
                document.getElementById('store').value = 'false';
                //---------Eingabefeld leeren---------------
                let eingabefeld = document.getElementById('eingabetext');
                eingabefeld.value = '';
                eingabefeld.focus();
            }
            function KeyCode(ev) { //von onKeyPress gestartet
                if (ev) {
                    TastenWert = ev.which // Wert des Ereignisobjektes, enthält keycode der gedrückten Taste (deprecated)
                } else {
                    TastenWert = window.event.keyCode //gibt den Zahlenwert der gedrückten Taste zurück (deprecated)
                }

                if (TastenWert == 13)
                {
                    //document.form.submit();
                    senden();
                }
            }
            document.onkeypress = KeyCode;
        </script>
    </head>
    <body>

        <header>
            <h2>Ajax-Chat mit Long-Polling</h2>
        </header>
        <main>
                <div style="border: solid black; width: 1000px; min-height: 50px; max-height: 400px; overflow-y: auto; margin: 0px auto; background-color:lightgray;" id="chatausgabe"></div>
                <div id="chat" style="width: 1000px; margin: auto; text-align: center;">
                    <form name="chatbeitrag" style="display: inline;" onsubmit="return false;" onKeyPress="KeyCode;">

                        <label>Eingabezeile:</label>
                        <input type="text" name="eingabetext" id="eingabetext" autofocus style="width: 550px;">
                        <input type="hidden" name="autor" value="<?php echo $_SESSION['WT13']['K_id']; ?> ">
                        <input type='hidden' name="anz_ds" id='anz_ds'> 
                        <input type='hidden' name='last_ds' id='last_ds' value='0'>
                        <input type="hidden" name="store" value="false" id="store">
                        <input type="button" name="upload" value="absenden" id="laden">
                    </form>


                </div>
                <script>
                    var xhr = new XMLHttpRequest(); //xhr ist ein Variablenname
                    function eintragen() {
                        let formPostData = new FormData(document.forms.namedItem('chatbeitrag'));
                        xhr.open('POST', 'db_backend.php', true);
                        xhr.onreadystatechange = ausgeben;
                        xhr.send(formPostData);
                    }
                    document.getElementById("laden").addEventListener("click", senden, true);
                    function ausgeben() {
                        try {
                            let DONE = 4; // readyState 4 - request is done
                            let OK = 200; // status 200 - successful return
                            if (xhr.readyState === DONE) {
                                if (xhr.status === OK) {
                                    //console.log(xhr.responseText);
                                    let ausgabediv = document.getElementById('chatausgabe');
                                    // Alle Kindknoten entfernen
                                    while (ausgabediv.firstChild) {
                                        ausgabediv.removeChild(ausgabediv.firstChild);
                                    }

                                    var inhalt = JSON.parse(xhr.responseText);// erzeugt aus JSON-formatiertem Text ein Javascript-Objekt
                                    //ausgabediv.innerHTML = JSON.stringify(inhalt); //schreibt Objekt als String in Ausgabediv
                                    var eintragIds = new Array();
                                    for (let zeile of inhalt) { // Ausgabe der Datensätze aus dem Javascript-Objekt
                                        eintragIds.push(parseInt(zeile.e_id)); // id als int-Wert zum Array hinzufügen
                                        let neuerabsatz = document.createElement('p');
                                        neuerabsatz.setAttribute("style", "margin: 3px;");
                                        let neuerbeitrag = document.createTextNode(
                                                zeile.datum + " Uhr: (" + zeile.nachname + ") " + zeile.beitrag);
                                        neuerabsatz.appendChild(neuerbeitrag);
                                        ausgabediv.appendChild(neuerabsatz);
                                    }
                                    //console.log(eintragIds);
                                    var last_id = eintragIds.shift(); // erstes Element aus Array zurückgeben
                                    //console.log(last_id);
                                    document.getElementById('last_ds').value = last_id; // id vom letzten Datensatz
                                    //------------------------------------------
                                    eintragen();
                                } else {
                                    console.log('Error: ' + xhr.status);
                                }
                            }
                        } catch (e) {
                            alert('Caught Exception: ' + e.description);
                        }
                    }
                    window.addEventListener("load", eintragen);
                </script>

        </main>
        <footer>
        </footer>
    </body>
</html>
