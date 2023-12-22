<?php
session_start();
unset($_SESSION['login_success']);
session_destroy();
session_write_close();
header("location: ../../templates/index.php");
?>