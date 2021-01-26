<!doctype html>
<html>
<head>
    <title></title>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="./css/user.css">
</head>
<body>
<?php
require "./conn.php";
$studentId = $_GET["id"];
$sql = "SELECT * FROM data WHERE id = $studentId";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<div class="title">
    帖子信息
</div>
<div id="outer">
    <table border="1">
        <tr>
            <td>帖子</td><td><?php echo $row["name"];?></td>
        </tr>
        <tr>
            <td>编号</td><td><?php echo $row["riqi"];?></td>
        </tr>
        <tr>
            <td>摘要</td><td><?php echo $row["nianling"]?></td>
        </tr>
        <tr>
            <td>性别：</td><td><?php echo $row['xingbie']?></td>
        </tr>
        <tr>
            <td>学科：</td><td><?php echo $row['xueke'];?></td>
        </tr>
        <tr>
            <td>号：</td><td><?php echo $row["xuehao"]; ?></td>
        </tr>
        <tr>
            <td>星座：</td><td><?php echo $row["xingzuo"]; ?></td>
        </tr>
        <tr>
            <td rowspan="3">个性标签</td><td rowspan="3"></td>
        </tr>
    </table>
    <a href="index.php">返回主页</a>
</div>
</body>
</html>