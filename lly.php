<?php
session_start();
require "conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/ss.css" />
		<title></title>
	</head>
	<body>
		<div id="all">
			<div id="head">
				<div class="head-top">
					<ul>
						<li><a href="index.php" style="font-size: 35px; margin: 20px;">主页</a></li>
						<li><a href="ss.php" style="font-size: 35px;">论坛查询</a></li>
                        <li><a href="add.php" style="font-size: 35px;">添加帖子</a></li>
						<li><a href="lly.php" style="font-size: 35px;margin: 20px;">反馈</a></li>
					</ul>
                    <?php if(isset($_SESSION['admin'])) {?>
                        <a style="margin-left: 150px; line-height: 1em;" href="./desc.php?name=admin&q=index&h=php">注销登录</a>  --
                        欢迎你，<?php echo $_SESSION['admin']?>
                    <?php } else {?>
                        <a href="gldl.php" style="margin-left: 200px; line-height: 1em;">登录</a>/<a href="glyzc.php">注册</a>
                    <?php }?>
                    <form action='ss.php'>
                        <input type="text" name = "search" style="margin-left: 200px;"><input type="submit" value="搜索" style="cursor: pointer;" />
                    </form>
				</div>
				<div class="banner">
					<img src="img/bg.jpg">
				</div>
				<div id="middle">
					<p style="margin-left:400px;"><span style="font-size: 30px;">你对本系统有什么意见，请写下你的反馈!</span></p>
					<div class="nr">
						<form action="lly.php" method="post" style="margin-left: 400px">
							<table border="1">
								<tr><td>标题:</td>
									<td><input type="text" name = "title" ></td>
								</tr><br />
								<tr>
									<td>你的反馈:</td>
									<td><textarea rows="10"cols="90" name = 'content'></textarea></td>
								</tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name = "sub" value = "提交"></td>
                                </tr>
							</table>
						</form>
                        <?php
                            if(isset($_POST['sub'])) {
                                $title = $_POST['title'];
                                $content = $_POST['content'];

                                if(!empty($title) && !empty($content)) {
                                    $time = date("Y-m-d H:i:s");
                                    $content1 = "<p>".$content."</p>";
                                    $insert = "INSERT INTO ly(title, content, update_time) VALUES('$title', '$content1', '$time')";
                                    $result2 = mysqli_query($conn, $insert);
                                    if($result2) {
                                        echo "<script>alert('反馈成功');</script>";
                                    } else {
                                        echo "<script>alert('反馈失败');</script>";
                                    }
                                } else {
                                    echo "<script>alert('不能为空');</script>";
                                }
                            }
                        ?>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>
