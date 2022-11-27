<?php
session_start();
error_reporting(0);
include('config.php');   
$_SESSION['clogin']=="";
session_unset();


?>
<script language="javascript">
document.location="index.php";
</script>
