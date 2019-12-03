<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>确认修改个人信息</title>
</head>

<body>
<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("conn/conn.php");//包含数据库连接文件
if($_POST['action'] == "update"){
$sqlstr = "update tb_user set pwd = '".md5($_POST['pwd'])."', phone = '".$_POST['phone']."' where name like '%".$name."%'";//定义更新语句
$result = @mysqli_query($conn,$sqlstr);//执行更新语句
if($result){
	echo "<script>alert('修改成功!')</script>";
}else{
	echo "<script>alert('修改失败!')</script>";
}
}
?>
</body>
</html>