<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['KC']['login'] !== 'ok') {
    $_SESSION['KC']['login'] = 'no';
}
error_reporting(0);

$PageTitle="Spielübersicht";
function additionalHeaders(){?>
<script> var tunierid = <?php 
    $TunierID = $_ENV["CURRENT_TURNIER"];
    if (isset($_GET["tunierid"])) {
        $TunierID = $_GET["tunierid"];
    }
    echo $TunierID 
?>; console.log(tunierid);</script>
<!-- define additional headers here -->
<script src="../../script/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="./spieluebersicht.js" type="text/javascript"></script>
<?php }
include_once('../default/header.php');
include_once('../default/menu.php');
include_once('spieluebersicht_content.php');
include_once('../default/footer.php');
?>