<?php
if (isset($_POST['submit'])) {
    print_r($_POST);
}

$PageTitle="Registrierung";
function additionalHeaders(){?>
<!-- define additional headers here -->
<script src="../../script/jquery-3.6.0.min.js" type="text/javascript"></script>
<?php }
include_once('../default/header.php');
include_once('../default/menu.php');

include_once('register_content.php');
include_once('../default/footer.php');
?>