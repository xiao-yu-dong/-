<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<title></title>
	</head>
	<body>
		<div id="all">
			<div id="head">
				<div class="head-top">
					<ul>
						<li><a href="index.php" style="font-size: 35px; margin: 20px;">主页</a></li>
						<li><a href="ss.php" style="font-size: 35px;">论坛信息查询</a></li>
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
					<!--<img src="img/bg.jpg">-->
				</div>
			</div>
			<div id="middle">
				<div class="middle-left">
					<ul>
						<li><span style="font-size: 32px;" onclick="xx()">论坛信息</span></li>
						<li><span style="font-size: 32px;" onclick="xc()">论坛信息查询</span></li>
<!--						<li><span style="font-size: 32px;" onclick="tj()"></span></li>-->
					</ul>
				</div>
				<div class="middle-right">
					<div class="right-01">
						<p><span style="font-size: 47px;line-height: 63px;">论坛信息</span></p>
                        <div id="list">
                            <div class="Dark">
                                <table>
                                    <tr>
                                        <th>编号</th><th>帖子</th><th>摘要</th><th>详细</th>
                                    </tr>
                                    <?php
                                    require "conn.php";
                                    $sql = "SELECT * FROM data";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>
                                          <td>".$row['xuehao']."</td>
                                          <td>".$row['name']."</td>
                                          <td>".$row['riqi']."</td>
                                          <td><a href='./user.php?id=".$row["id"]."'>点击查看详情</a></td>
                                        </tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
					</div>
					<div class="right-02">
						<p><span style="font-size: 47px;line-height: 63px;">论坛信息查询</span></p>
                        <div id="list">
                            <div class="Dark">
                                <table>
                                    <tr>
                                        <th>编号</th><th>帖子</th><th>亲亲麻烦 。没错</th><th>是件好事成</th><th>宣传</th><th>按时</th><th>备注</th>
                                    </tr>
                                    <?php
                                    require "conn.php";
                                    $sql = "SELECT * FROM chengji";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>
                                          <td>".$row['xuehao']."</td>
                                          <td>".$row['name']."</td>
                                          <td>".$row['js']."</td>
                                          <td>".$row['php']."</td>
                                          <td>".$row['mysql']."</td>
                                          <td>".$row['cloud']."</td>
                                          <td><a href='./bj.php?id=".$row["id"]."'>编辑</a></td>
                                        </tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
					</div>
                    <!--
					<div class="right-03">
						<p><span style="font-size: 47px;line-height: 63px;">图书购买推荐</span></p>
						<ul>
							<li>
								<table>
									<tr>
										<td><img src="img/gm.jpg" width="210px" height="210px"></td>
									</tr>
									<tr>
										<td>作品名称</td><td>《偷影子的人 》</td>
									</tr>
									<tr>
										<td>作者</td><td>[法]马克·李维</td>
									</tr>
									<tr>
										<td>出版日期</td><td>2010年</td>
									</tr>
									<tr>
										<td>作品简介</td><td>故事讲述了一个老是受班上同学欺负的瘦弱小男孩，因为拥有一种特殊能力而强大：他能“偷别人的影子”，
											因而能看见他人心事，听见人们心中不愿意说出口的秘密。他开始成为需要帮助者的心灵伙伴，为每个偷来的影子找到点亮生命的小小光芒。</td>
									</tr>
								</table>
							</li>
							<li>
								<table>
									<tr>
										<td><img src="img/gm3.jpg"></td>
									</tr>
									<tr>
										<td>作品名称</td><td>《一个人的朝圣 》</td>
									</tr>
									<tr>
										<td>作者</td><td>蕾秋·乔伊斯</td>
									</tr>
									<tr>
										<td>出版日期</td><td>2012年</td>
									</tr>
									<tr>
										<td>作品简介</td><td>《一个人的朝圣》讲述了一个退休老人为探望病危友人而独自踏上漫长旅程的故事
											，主人公哈罗德的出发点是为了给予友人希望，最终却实现了自我救赎，激发了对自我价值的再肯定、对成长缺陷的新认知及对现实命运的接受和理解。
											同时，其妻子在等待及关注哈罗德的过程中，对痛苦的过往逐一进行审视，触发了对爱的全新领悟和对自我的重新认识。</td>
									</tr>
								</table>
							</li>
							<li>
								<table>
									<tr>
										<td><img src="img/gm6.jpg"></td>
									</tr>
									<tr>
										<td>作品名称</td><td>《解忧杂货店 》</td>
									</tr>
									<tr>
										<td>作者</td><td>【日】东野圭吾 </td>
									</tr>
									<tr>
										<td>出版日期</td><td>2012年3月 </td>
									</tr>
									<tr>
										<td>作品简介</td><td>该书讲述了在僻静街道旁的一家杂货店，只要写下烦恼投进店前门卷帘门的投信口，
											第二天就会在店后的牛奶箱里得到回答：因男友身患绝症，年轻女孩月兔在爱情与梦想间徘徊；松冈克郎为了音乐梦想离家漂泊
										 	，却在现实中寸步难行；少年浩介面临家庭巨变，挣扎在亲情与未来的迷茫中……他们将困惑写成信投进杂货店，奇妙的事情随即不断发生。</td>
									</tr>
								</table>
							</li>
							<li>
								<table>
									<tr>
										<td><img src="img/gm5.jpg"></td>
									</tr>
									<tr>
										<td>作品名称</td><td>《皮囊 》</td>
									</tr>
									<tr>
										<td>作者</td><td>蔡崇达 </td>
									</tr>
									<tr>
										<td>出版日期</td><td> 2014-10-1</td>
									</tr>
									<tr>
										<td>作品简介</td><td>《皮囊》是一部有着小说阅读质感的散文集，由蔡崇达编写、韩寒监制。
											文集风格沉稳，表达了作者这一代理想膨胀却又深感现实骨感而无处安身的青年人对自己命运的深切思考。</td>
									</tr>
								</table>
							</li>
						</ul>
					</div>
					-->
				</div>
			</div>
		</div>
		<script>
			var right1 = document.getElementsByClassName("right-01")[0];
			var right2 = document.getElementsByClassName("right-02")[0];
			function xx(){
				right1.style.display = "block";
				right2.style.display = "none";
			}
			function xc(){
				right1.style.display = "none";
				right2.style.display = "block";
			}
		</script>
	</body>
</html>
