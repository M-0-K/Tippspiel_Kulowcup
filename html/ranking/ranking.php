<?php
include '../script/db_connection.php'; // DB-Verbindung herstellen

$PageTitle="Ranking";
function additionalHeaders(){?>
<!-- define additional headers here -->
    <script src="/script/jquery-3.6.0.min.js" type="text/javascript"></script>
    <style>
        /* Global Styles */

        #main {
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 1% auto;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .table.row {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .row.header {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 0;
        }

        .cell {
            flex: 1;
            text-align: center;
        }

        .user {
            text-align: center;
        }

        .score {
            text-align: center;
        }


        @media (max-width: 600px) {
            .row {
                flex-direction: column;
                align-items: flex-start;
            }

            .cell {
                text-align: left;
                padding: 5px 0;
            }

            .score {
                text-align: left;
            }
        }
    </style>
<?php }
include_once('../default/header.php');
include_once('../default/menu.php');
include_once('ranking_content.php');
include_once('../default/footer.php');
?>