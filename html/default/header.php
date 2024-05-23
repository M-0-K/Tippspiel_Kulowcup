<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/index.css" rel="stylesheet">
    <link href="/css/bracked.css" rel="stylesheet">
    <title><?= isset($PageTitle)?$PageTitle : "DefaultTitle" ?></title>
    <!-- additional Headers -->
    <?php if (function_exists('additionalHeaders')){
        additionalHeaders();
    }?>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

        header {
            background-color: black;
            color: white;
        }

        .embed-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 ratio */
            height: 100%;
            overflow: hidden;
            width: 100%;
        }

        .embed-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none; /* Entfernen des Rahmens */
        }

        main{

           /* height: inherit;*/
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            width: 100%;
        }

        .col {
            margin-left: 15px;
            vertical-align: bottom;

        }

        a {
            color: white;
            text-decoration: none;
        }

        .menu {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .menu-items {
            display: flex;
            justify-content: flex-end;
            margin-right: 30px;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-right: 10px;
        }

        .menu-toggle div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
        }

        @media (max-width: 600px) {
            header {
                padding: 10px;
            }

            .menu-items {
                display: none;
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .menu-items.show {
                display: flex;
            }

            .menu-toggle {
                display: flex;
            }

            header .col h1 {
                font-size: 1.5em;
                text-align: center;
                width: 100%;
            }

            header .col h3 {
                font-size: 1.2em;
            }

            .embed-container {
                height: 100%;
                padding-bottom: 100%;
                /* Adjust height ratio for mobile */
            }

            .embed-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 95%;
            height: 100%;
        }
        body{

        background-image: url("../../data/background.jpg") ;
        background-position: center;
        background-attachment: fixed;
        }
        }
    </style>

</head>
    <script>
        function toggleMenu() {
            const menuItems = document.getElementById('menuItems');
            menuItems.classList.toggle('show');
        }
    </script>
