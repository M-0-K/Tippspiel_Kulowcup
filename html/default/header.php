<!DOCTYPE html>
<html lang="de" <?php include '../../script/config-season.php'; echo (KULOWCUP_SEASON === 'winter' ? 'class="winter"' : ''); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/index.css" rel="stylesheet">
    <link href="../../css/bracked.css" rel="stylesheet">
    <title><?= isset($PageTitle)?$PageTitle : "DefaultTitle" ?></title>
    <!-- additional Headers -->
    <?php if (function_exists('additionalHeaders')){
        additionalHeaders();
    }?>
    <script>
        // Präsentationsmodus: Strg+Shift+P zum Umschalten
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.shiftKey && e.key === 'P') {
                e.preventDefault();
                document.body.classList.toggle('presentation-mode');
            }
        });

        // Präsentationsmodus-Uhr einblenden
        function updatePresentationClock() {
            var clock = document.getElementById('presentation-clock');
            if (!clock) return;

            var now = new Date();
            var hh = String(now.getHours()).padStart(2, '0');
            var mm = String(now.getMinutes()).padStart(2, '0');
            var ss = String(now.getSeconds()).padStart(2, '0');
            clock.textContent = hh + ':' + mm + ':' + ss;
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Uhr-Element einmalig anlegen
            if (!document.getElementById('presentation-clock')) {
                var clock = document.createElement('div');
                clock.id = 'presentation-clock';
                document.body.appendChild(clock);
            }

            updatePresentationClock();
            setInterval(updatePresentationClock, 1000);
        });
    </script>
</head>

