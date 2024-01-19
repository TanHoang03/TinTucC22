<?php
    session_start();
    // Xoá session
    session_destroy();
    session_write_close();
    header("location:index.php");
?>