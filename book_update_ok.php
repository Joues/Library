<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>确认修改图书信息</title>
</head>

<body>
<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("conn/conn.php");//包含数据库连接文件
if($_POST['action'] == "update"){
	if(!($_POST['book_name'] and $_POST['book_price'] and $_POST['book_time'] and $_POST['book_type'] and $_POST['book_ISBN'] and $_POST['book_come'])){
		echo "输入不允许为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
	}else{
		$sqlstr = "update tb_book set book_name = '".$_POST['book_name']."', book_price = '".$_POST['book_price']."', book_time = '".$_POST['book_time']."', book_type = '".$_POST['book_type']."', book_ISBN = '".$_POST['book_ISBN']."', book_come = '".$_POST['book_come']."' where book_id = ".$_POST['book_id'];//定义更新语句
		$result = @mysqli_query($conn,$sqlstr);//执行更新语句
		if($result){
			echo "修改成功,点击<a href='admin.php'>这里</a>查看";
		}else{
			echo "修改失败.<br>$sqlstr";
		}
	}
}
?>
</body>
</html>