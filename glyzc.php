<?php
session_start();
require "./conn.php";
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Document</title>
</head>
<body>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		body{
			background-image: url(img/glyzc.jpg);
			background-size: cover;
		}
		#all{
			width: 300px;
			height: 300px;
			background-color: #afafc6;
			opacity: 0.8;
			margin: 170px auto;
		}
		form{
			margin-left: 40px;
		}
        input[type=text], input[type=password] {
            width: 150px;
            height: 20px;
            margin: 10px 0;
        }
	</style>
	<div id="all">
		<div id="dlbg">
			<p style="margin-left:52px;"><span style="font-size: 25px; line-height: 71px; color: red;">管理员注册</span></p>
			<form action="" method="post">
				<table>
					<tr>
						<td>用户名：</td>
						<td><input type="text" name = 'username'></td>
					</tr>
					<tr>
						<td>密码：</td>
						<td><input type="password" name = 'userpass'></td>
					</tr>
					<tr>
						<td>确定密码：</td>
						<td><input type="password" name = 'valipass'></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="注册" name="sub"></td>
					</tr>
				</table>
			</form>
			<a href="index.php" style="float: left;">返回主页</a>
		</div>
	</div>
    <?php
    if(isset($_POST['sub'])) {
        $username = $_POST["username"];
        $userpass = $_POST["userpass"];
        $valipass = $_POST["valipass"];

        $sql = "SELECT * FROM admin WHERE adminuser = '$username'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            $row = mysqli_num_rows($result);
        } else {
            echo "发生错误";
        }
        if(!empty($username) && !empty($userpass) && !empty($valipass)) {
            if($row == 0) {
                echo 0;
                if(strlen($username) <= 10) {
                    if(strlen($userpass) <= 18) {
                        if($userpass == $valipass) {
                            $logtime = date("Y-m-d H:i:s");
                            $insert = "INSERT INTO admin(adminuser, adminpass, regtime) VALUES('$username', '$userpass', '$logtime')";
                            $result2 = mysqli_query($conn, $insert);
                            if($result2) {
                                echo "<script>alert('注册成功');</script>";
                                $_SESSION['admin'] = $username;
                                echo "<script>location.href='./index.php'</script>";
                            } else {
                                echo 0;
                            }
                        } else {
                            echo "<script>alert('密码不一致');</script>";
                        }
                    } else {
                        echo "<script>alert('长度不能超过18位');</script>";
                    }
                } else {
                    echo "<script>alert('长度不能超过10位');</script>";
                }
            } else {
                echo "<script>alert('用户名已存在');</script>";
                echo '1';
            }
        } else {
            echo "<script>alert('不能为空');</script>";
        }
    }
    ?>
</body>
</html>