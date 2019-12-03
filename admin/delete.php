<?php
session_start();										//初始化SESSION变量
if(!isset($_SESSION['name'])){
	echo "<script>alert('您不具备进行此操作的权限！');window.location.href='Sign.php';</script>";	
}else{

header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include_once("conn/conn.php");							//连接数据库
if ($_GET['action'] == "del"){							//判断是否执行删除
	$sqlstr1 = "delete from tb_demo02 where id = ".$_GET['id'];		//定义删除语句
	$result = mysqli_query($conn,$sqlstr1);				//执行删除操作
	if ($result){
		echo "<script>alert('删除成功');location='index.php';</script>";
	}else{
		echo "删除失败";
	}
}
}
?>
