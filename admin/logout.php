<?php
session_start();
session_destroy();
header("Location: ../login.php"); // العودة إلى صفحة تسجيل الدخول خارج مجلد admin
exit();
?>