<?php
session_start();
session_destroy();
header("Location: ../frontend/login_view.php");
?>