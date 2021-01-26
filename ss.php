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
                        <li><a href="add.php" style="font-size: 35px;">添加论坛</a></li>
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
                    <form action="">
					<input type="text" style="width: 670px; height: 60px; font-size: 48px; margin-left: 319px;" name = "search" placeholder="输入姓名或学号查询成绩"/>
					<input type="submit" value="搜索" width="60px" height="60px" style="font-size: 48px; background-color: aqua;" /><br />
                    </form>
					<div class="nr">
                        <div id="list">
                            <div class="Dark">
                                <table>
                                    <tr>
                                        <th>编号</th><th>帖子</th><th>JavaScript程序设计</th><th>PHP网站开发技术</th><th>数据库设计与应用</th><th>HCNA云计算技术</th><th>备注</th>
                                    </tr>
                                    <?php
                                    $search = isset($_GET["search"]) ? $_GET["search"] : "";
									if($search == "") exit();
                                    require "conn.php";
                                    $sql = "SELECT * FROM chengji WHERE name LIKE '%$search%' OR xuehao LIKE '%$search%'";
                                    $result = mysqli_query($conn, $sql);
                                    if($result) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>
                                              <td>" . $row['xuehao'] . "</td>
                                              <td>" . $row['name'] . "</td>
                                              <td>" . $row['js'] . "</td>
                                              <td>" . $row['php'] . "</td>
                                              <td>" . $row['mysql'] . "</td>
                                              <td>" . $row['cloud'] . "</td>
                                              <td><a href='./bj.php?id=" . $row["id"] . "'>编辑</a></td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<script>alert('暂时搜索不到结果');</script>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>
