<?php
    require "conn.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM `ly` WHERE `ly`.`id` = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result) {
        echo 1;
        echo "<script>alert('删除成功');location.href='glyjm.php'</script>";
    } else {
        echo 0;
        echo "<script>alert('删除失败');location.href='glyjm.php'</script>";
    }