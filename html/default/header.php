<!DOCTYPE html>
<html lang="de">

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
</head>
    <script>
        function toggleMenu() {
            const menuItems = document.getElementById('menuItems');
            menuItems.classList.toggle('show');
        }
    </script>
