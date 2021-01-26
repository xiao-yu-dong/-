<?php
    $name = $_GET['name'];
    $q = $_GET['q'];
    $h = $_GET['h'];
    session_start();
    unset($_SESSION[$name]);
    echo "<script>location.href='./".$q.".".$h."'</script>";