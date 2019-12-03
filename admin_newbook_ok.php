<?php
header("Content-type: text/html;charset=utf-8");
include_once("conn/conn.php");
if(isset($_POST["submit"]) && $_POST["submit"]=="添加图书"){
	if(!($_POST['book_name'] and $_POST['book_price'] and $_POST['book_time'] and $_POST['book_type'] and $_POST['book_ISBN'] and $_POST['book_come'])){
	   echo "<script>alert('输入不允许为空!!');</script>";
     }else{
	     $sqlstr1 = "insert into tb_book(book_name,book_come,book_time,book_price,book_type,book_ISBN) values('".$_POST['book_name']."','".$_POST['book_come']."','".$_POST['book_time']."','".$_POST['book_price']."','".$_POST['book_type']."','".$_POST['book_ISBN']."')";
	     $result = @mysqli_query($conn,$sqlstr1);
	     if($result){
	     	echo "<script>alert('添加成功!');history.go(-1);</script>";
	     }else{
		    echo "<script>alert('添加失败!!');history.go(-1);</script>";
	     }
     }
}
?>