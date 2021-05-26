<?php
session_start();
session_destroy();
   header("location: ../ADMIN/index.php");
?>