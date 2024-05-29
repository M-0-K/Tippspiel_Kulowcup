<?php
include '../../script/db_connection.php'; // DB-Verbindung herstellen

error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['KC']['login'] !== 'ok') {
    $_SESSION['KC']['login'] = 'no';
}

$PageTitle="Geschichte";
function additionalHeaders(){?>
<!-- define additional headers here -->
    <script src="../../script/jquery-3.6.0.min.js" type="text/javascript"></script>
<?php }
include_once('../default/header.php');
include_once('../default/menu.php');
include_once('history-content.php');
include_once('../default/footer.php');
?>