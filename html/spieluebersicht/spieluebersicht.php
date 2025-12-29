<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['KC']['login'] !== 'ok') {
    $_SESSION['KC']['login'] = 'no';
}
error_reporting(0);

$PageTitle = "Spielübersicht";
function additionalHeaders()
{ ?>
    <script>
        <?php
        $turnierId =
            $_SERVER['CURRENT_TURNIER']
            ?? $_ENV['CURRENT_TURNIER']
            ?? getenv('CURRENT_TURNIER')
            ?? 0;

        if (isset($_GET['tunierid']) && ctype_digit($_GET['tunierid'])) {
            $turnierId = (int) $_GET['tunierid'];
        }
        ?>
        var turnierid = <?= (int) $turnierId ?>;
        console.log(turnierid);
    </script>

    <!-- define additional headers here -->
    <script src="../../script/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="./spieluebersicht.js" type="text/javascript"></script>
<?php }
include_once('../default/header.php');
include_once('../default/menu.php');
include_once('spieluebersicht_content.php');
include_once('../default/footer.php');
?>