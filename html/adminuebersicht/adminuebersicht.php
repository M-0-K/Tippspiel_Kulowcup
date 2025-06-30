<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['KC']['isadmin'] !== true){
  exit(header("Location:../login/login.php"));
}
error_reporting(0);

$PageTitle="Spieladministration";
function additionalHeaders(){?>
<!-- define additional headers here -->
<script src="../../script/jquery-3.6.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="./adminuebersicht.js"></script>
<?php }
include_once('../default/header.php');
include_once('../default/menu.php');
include_once('adminuebersicht_content.php');
include_once('../default/footer.php');
?>