<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['KC']['login'] !== 'ok') {
    $_SESSION['KC']['login'] = 'no';
}
error_reporting(0);

$PageTitle="Preset";
function additionalHeaders(){?>
<!-- define additional headers here -->
<script src="/script/jquery-3.6.0.min.js" type="text/javascript"></script>
<?php }
include_once('/html/default/header.php');
include_once('/html/default/menu.php');
include_once('preset_content.php');
include_once('/html/default/footer.php');
?>