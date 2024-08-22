<?php
session_start();
session_destroy();
header("Location: h.php");
exit();
?>
