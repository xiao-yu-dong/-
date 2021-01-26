<?php
    session_start();
    if(!isset($_SESSION["admin"])) {
        echo "<script>alert('没有权限，请先登陆');location.href='gldl.php';</script>";
    } else if(isset($_SESSION["username"])) {
        echo "<script>alert('权限不足，请登陆管理员账户');location.href='gldl.php';</script>";
    }
?>
<!doctype html>
<html lang="zh-cn">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <style>
            html, body {
                width: 100%;
                height: 100%;
                background: url(img/timg.jpg) no-repeat 100% 100%;
                background-size: 100%;
                overflow: hidden;
            }
            table {
                width: 500px;
                height: 400px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: rgba(255,255,255,0.9);
            }
            caption {
                font-weight: bold;
                font-size: 30px;
            }
            table tr td {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
            $id = $_GET["id"];
            require "conn.php";
            $sql = "SELECT * FROM chengji WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        ?>
        <form action="" method = "post">
            <table>
                <caption>帖子修改</caption>
                <tr>
                    <td>帖子</td><td><?php echo $row['name'];?></td>
                </tr>
                <tr>
                    <td>编号</td><td><?php echo $row["xuehao"];?></td>
                </tr>
                <tr>
                    <td>JavaScript程序设计</td><td><input type="text" name = "js" value = "<?php echo $row["js"];?>"></td>
                </tr>
                <tr>
                    <td>PHP网页开发技术</td><td><input type="text" name = "php" value = "<?php echo $row["php"];?>"></td>
                </tr>
                <tr>
                    <td>数据库设计与应用</td><td><input type="text" name = "mysql" value = "<?php echo $row["mysql"];?>"></td>
                </tr>
                <tr>
                    <td>HCNA云计算技术</td><td><input type="text" name = "cloud" value = "<?php echo $row["cloud"];?>"></td>
                </tr>
                <tr>
                    <td></td><td><input type="submit" name = "sub" value = "修改"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST["sub"])) {
                $js = $_POST["js"];
                $php = $_POST["php"];
                $mysql = $_POST["mysql"];
                $cloud = $_POST["cloud"];
                $xiu = "UPDATE chengji SET js = '$js', php = '$php', mysql = '$mysql', cloud = '$cloud' WHERE id = '$id'";
                $result_xiu = mysqli_query($conn, $xiu);
                if($result_xiu) {
                    echo "<script>alert('修改成功');location.href='index.php'</script>";
                } else {
                    echo "<script>alert('修改失败');location.href='index.php'</script>";
                }
            }
        ?>

    </body>
</html>