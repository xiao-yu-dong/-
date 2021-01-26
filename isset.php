<?php
    if(isset($_SESSION['username']) || isset($_SESSION['admin'])) {
        if(isset($_SESSION['username'])) {
            echo "<script>alert('已登录');location.href='./index.php'</script>";
        }
        if(isset($_SESSION['admin'])) {
            echo "<script>alert('已登录');localhost.href='./glyjm.php'</script>";
        }
        exit();
    }