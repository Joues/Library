<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除读者</title>
</head>

<body>
<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include_once("conn/conn.php");							//连接数据库
if ($_GET['action'] == "del"){							//判断是否执行删除
	$sqlstr1 = "delete from tb_user where id = ".$_GET['id'];		//定义删除语句
	$result = mysqli_query($conn,$sqlstr1);				//执行删除操作
	if ($result){
		echo "<script>alert('删除成功');location='admin_onemanage.php';</script>";
	}else{
		echo "<script>alert('删除失败');history.go(-1);</script>";
	}
}else if($_POST['action'] == "delall"){						//判断是否执行删除操作
	if(count($_POST['chk']) <= 0){						//判断提交的删除记录是否为空
		echo "<script>alert('请选择记录');history.go(-1);</script>";
	}else{
		for($i = 0; $i < count($_POST['chk']); $i++){		//for语句循环读取复选框提交的值，
			$sqlstr = "delete from tb_user where id = ".$_POST['chk'][$i];	//循环执行删除操作
			mysqli_query($conn,$sqlstr);						//执行删除操作
		}
		echo "<script>alert('删除成功');location='admin_onemanage.php';</script>";
	}
}

?>
</body>
</html>