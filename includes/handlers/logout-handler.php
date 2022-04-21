<?php
    session_start();
    session_destroy();

    //redirect to homepage after logging out
    header("Location: ../../index.php");
?>