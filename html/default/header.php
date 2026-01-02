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
        // Präsentationsmodus: Strg+Shift+P zum Umschalten des Headers
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.shiftKey && e.key === 'P') {
                e.preventDefault();
                document.body.classList.toggle('presentation-mode');
            }
        });
    </script>
</head>

