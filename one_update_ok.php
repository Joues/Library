<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>确认修改读者信息</title>
</head>

<body>
<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("conn/conn.php");//包含数据库连接文件
if($_POST['action'] == "update"){
	if(!($_POST['name'] and $_POST['readID'] and $_POST['pwd'] and $_POST['identity'] and $_POST['phone'] and $_POST['regdate'])){
		echo "输入不允许为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
	}else{
		$sqlstr = "update tb_user set name = '".$_POST['name']."', readID = '".$_POST['readID']."', pwd = '".md5($_POST['pwd'])."', identity = '".$_POST['identity']."', phone = '".$_POST['phone']."', regdate = '".$_POST['regdate']."' where id = ".$_POST['id'];//定义更新语句
		$result = @mysqli_query($conn,$sqlstr);//执行更新语句
		if($result){
			echo "修改成功,点击<a href='admin_onemanage.php'>这里</a>查看";
		}else{
			echo "修改失败.<br>$sqlstr";
		}
	}
}
?>
</body>
</html>