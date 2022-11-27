<?php
session_start();
error_reporting(0);
include('config.php');   
$_SESSION['blogin']=="";
session_unset();


?>
<script language="javascript">
document.location="index.php";
</script>
