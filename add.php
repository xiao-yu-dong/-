<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title></title>
    <style>
        table {
            width: 500px;
            height: 400px;
            margin: 0 auto;
            font-size: 20px;
        }
        caption {
            font-weight: bold;
            font-size: 30px;
        }
        table tr td {
            text-align: center;
            padding: 10px 0;
        }
        table tr td input[type=text], table tr td input[type=date] {
            width: 200px;
            height: 30px;
        }
        table tr td input[type=submit] {
            width: 80px;
            height: 30px;
        }
    </style>
</head>
<body>
<div id="all">
    <div id="head">
        <div class="head-top">
            <ul>
                <li><a href="index.php" style="font-size: 35px; margin: 20px;">主页</a></li>
                <li><a href="ss.php" style="font-size: 35px;">论坛查询</a></li>
                <li><a href="" style="font-size: 35px;">添加帖子</a></li>
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
    </div>
    <div id="middle">
        <form action="" method = "post" class = "in">
            <table>
                <tr>
                    <td>提诶子</td><td><input type="text" name = "name"><span style = "color: red;">*</span></td>
                </tr>
                <tr>
                    <td>编号</td><td><input type="text" name="xuehao" id=""><span style = "color: red;">*</span></td>
                </tr>
                <tr>
                    <td>摘要</td><td><input type="date" name="riqi" id=""><span style = "color: red;">*</span></td>
                </tr>
                <tr>
                    <td>详情</td><td><input type="text" name="nianling" id=""><span style = "color: red;">*</span></td>
                </tr>
                <tr>
                    <td>学科</td><td><input type="text" name="xueke" id=""><span style = "color: red;">*</span></td>
                </tr>
                <tr>
                    <td>性别</td><td><input type="text" name="xingbie" id=""><span style = "color: red;">*</span></td>
                </tr>
                <tr>
                    <td>星座</td><td><input type="text" name="xingzuo" id=""><span style = "color: red;">*</span></td>
                </tr>
                <tr>
                    <td>JavaScript程序设计</td><td><input type="text" name = "js"><span style = "color: red;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td>PHP网页开发技术</td><td><input type="text" name = "php"><span style = "color: red;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td>数据库设计与应用</td><td><input type="text" name = "mysql"><span style = "color: red;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td>HCNA云计算技术</td><td><input type="text" name = "cloud"><span style = "color: red;">&nbsp;</span></td>
                </tr>
                <tr>
                    <td></td><td><input type="submit" name = "sub" value = "添加"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST["sub"])) {
                require "conn.php";
                $name = $_POST["name"];
                $xuehao = $_POST["xuehao"];
                $riqi = $_POST["riqi"];
                $nianling = $_POST["nianling"];
                $xueke = $_POST["xueke"];
                $xingbie = $_POST["xingbie"];
                $xingzuo = $_POST["xingzuo"];
                $js = $_POST["js"];
                $php = $_POST["php"];
                $mysql = $_POST["mysql"];
                $cloud = $_POST["cloud"];
                $sql2 = "SELECT * FROM `data` WHERE `xuehao` LIKE '$xuehao'";
                $result2 = mysqli_query($conn, $sql2);
                $row = mysqli_num_rows($result2);

                if(!empty($name) && !empty($xuehao) && !empty($riqi) && !empty($xueke) && !empty($xingbie) && !empty($xingzuo) && !empty($nianling)) {
                    if(strlen($xuehao) == 10) {
                        if($row == 0) {
                            $sql = "INSERT INTO `data` (`name`, `xuehao`, `riqi`, `nianling`, `xueke`, `xingzuo`, `xingbie`) 
                                    VALUES ( '$name', '$xuehao', '$riqi', '$nianling', '$xueke', '$xingzuo', '$xingbie');";
                            $result = mysqli_query($conn, $sql);
                            $sql3 = "INSERT INTO `chengji` (`xuehao`, `name`, `js`, `php`, `mysql`, `cloud`) 
                                    VALUES ('$xuehao', '$name', '$js', '$php', '$mysql', '$cloud')";
                            $result3 = mysqli_query($conn, $sql3);
                            if($result3 && $result){
                                echo "<script>alert('添加成功');</script>";
                            } else {
                                echo "<script>alert('添加失败');</script>";
                            }
                        } else {
                            echo "<script>alert('学号已存在');</script>";
                        }
                    } else {
                        echo "<script>alert('学号长度为10位');</script>";
                    }
                } else {
                    echo "<script>alert('带红星的不能为空');</script>";
                }
            }
        ?>
    </div>
</div>

</body>
</html>
