<?php
session_start();
error_reporting(0);
include('config.php');   
$_SESSION['alogin']=="";
session_unset();


?>
<script language="javascript">
document.location="main.html";
</script>
