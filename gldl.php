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
			background-image: url(img/glydl.jpg);
			background-size: cover;
		}
		#all{
			width: 300px;
			height: 300px;
			background-color: #afafc6;
			opacity: 0.8;
			margin: 170px auto;
		}
		form {
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
			<p style="margin-left:52px;"><span style="font-size: 25px; line-height: 91px; color: red;">管理员登陆</span></p>
			<form action="" method="post">
				<table>
					<tr>
						<td>用户名：</td>
						<td><input type="text" name = "adminuser"></td>
					</tr>
					<tr>
						<td>密码：</td>
						<td><input type="password" name = "adminpass"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="登录" name="sub"></td>
					</tr>
				</table>
			</form>
			<a href="glyzc.php" style="float: right;">管理员注册</a>
		</div>
	</div>
    <?php
    if(isset($_POST['sub'])) {
        $username = $_POST["adminuser"];
        $userpass = $_POST["adminpass"];
        $select = "SELECT * FROM admin WHERE adminuser = '$username'";
        $result = mysqli_query($conn, $select);
        $row = mysqli_num_rows($result);
        $fetch = mysqli_fetch_array($result);
        if(!empty($username) && !empty($userpass)) {
            if($row > 0) {
                if($fetch['adminpass'] == $userpass) {
                    $_SESSION['admin'] = $username;
                    echo "<script>alert('登录成功');window.location='./index.php'</script>";
                } else {
                    echo "<script>alert('密码错误');</script>";
                }
            } else {
                echo "<script>alert('用户不存在');</script>";
            }
        } else {
            echo "<script>alert('不能为空');</script>";
        }
    }
    ?>
</body>
</html>