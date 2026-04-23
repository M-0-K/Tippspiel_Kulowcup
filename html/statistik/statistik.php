<?php
include '../../script/db_connection.php'; 

error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['KC']['login'] !== 'ok') {
    $_SESSION['KC']['login'] = 'no';
}

$PageTitle = "Statistiken";

function additionalHeaders(){ ?>
    <script src="../../script/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../../script/chart.js"></script>
    <script src="./statistik.js?v=<?php echo time(); ?>" type="text/javascript"></script>
<?php }

include_once('../default/header.php');
include_once('../default/menu.php');
include_once('statistik_content.php');
include_once('../default/footer.php');
?>