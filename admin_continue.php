<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>续借图书</title>
<link rel="stylesheet" type="text/css" href="admin/css/mystyle.css">
<link rel="stylesheet" type="text/css" href="admin/css/body.css" />
<style type="text/css">
.word {
	font-family: "华文宋体";
	font-size: xx-large;
	color: #FFF;
	font-weight: bold;
}
.footer {
	text-align:center;
	color: white;
}
.word1 {
	font-family: "华文仿宋";
	font-size: large;
	color:#FFF;
}
.date {
	color:#F90;
	font-size: 14px;
}
.word2 {
	color:#936;
}
.word3 {
	color: #333;
	font-size: 14px;
	font-family: Arial;
}

            #content {
                float: left;
            }
</style>
<script>
//删除确认
function del(){
    if(!window.confirm('是否要删除数据??'))
	    return false;
}

//全部选择/取消
function chek(){
	 var leng = this.form1.chk.length;
	 if(leng==undefined){
	   leng=1;
	   if(!form1.chk.checked)
	   	document.form1.chk.checked=true;
		else
			document.form1.chk.checked=false;
	 }else{
       for( var i = 0; i < leng; i++)
	    {
			if(!form1.chk[i].checked)
	      		document.form1.chk[i].checked = true;
			else
				document.form1.chk[i].checked = false;
	    }
	 }
	return false;
}
</script>

</head>
<body >
<div class="header">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    	<td height="120" align="center" bgcolor="#00CCFF"><span class="word">基于PHP开发武汉学院图书管理系统后台管理</span></td>
    </tr>
</table>
</div>

<div class="admindate">
<table width="100%" height="20px">
<tr><td width="5.5%">&nbsp;</td><td align="left" width="94.5%"><span class="date">当前用户：admin&nbsp;&nbsp;<b>当前时间: <span id="text" class="date"></span></b></span></td></tr>
</table>
</div>

<div class="row">
<div class="left">
<table width="100%" height="38" border="0" cellpadding="0" cellspacing="0">
    <tr>
	  <td width="100" height="50" align="center" valign="middle"><a href="admin.php" class="word1" >图书管理</a></td></tr>
    <tr>
	  <td width="100" height="50" align="center" valign="middle"><a href="admin_newbook.php" class="word1">添加新书</a></td></tr>
    <tr>
	  <td width="100" height="50" align="center" valign="middle"><a href="admin_onemanage.php" class="word1">读者管理</a></td></tr>
    <tr>
	  <td width="100" height="50" align="center" valign="middle"><a href="admin_newone.php" class="word1">新增读者</a></td></tr>
    <tr>
	  <td width="100" height="50" align="center" valign="middle"><a href="admin_borrowsend.php" class="word1">借书\还书</a></td></tr>
    <tr>
	  <td width="100" height="50" align="center" valign="middle"><a href="admin_continue.php" class="word1">续借图书</a></td></tr>
    <tr>
	  <td width="100" height="50" align="center" valign="middle"><a href="sign.php" class="word1">退出系统</a></td></tr>
</table>
</div>

<div class="main">
<form action="" method="post" name="form1">
<table width="900" height="400" border="0" cellpadding="0" cellspacing="0">
<tr><td width="100%" height="30" colspan="2" align="left" valign="top" class="word3"><a href="admin.php">首页</a>> 续借图书</td></tr>
    <tr bgcolor="#FF9933">
       <td align="center" valign="middle" width="100%" height="20"><p align="center"><span class="word1">图书名称：</span><input type="text" name="book_name">
       </p></td>
    </tr>
    <tr bgcolor="#FF9933">
      <td align="center" valign="middle" width="100%" height="20"><p align="center"><span class="word1">读者姓名：</span>
          <input type="text" name="name">
      </p></td>
    </tr>
    <tr bgcolor="#FF9933">
      <td align="center" valign="middle" width="100%" height="20" align="center"><p align="center">
          <input type="submit" name="submit" value="确认续借">
      </p></td>
    </tr>  
    <tr><td>
    <table width="100%" height="200"><tr>
    <td height="15" width="5%" class="top" align="center">
<?php
$lasttime1 = date('Y-m-d ',strtotime("+60 day"));
include_once("conn/conn.php");//包含数据库连接文件
$lasttime1 = date('Y-m-d ',strtotime("+1 month"));
if(isset($_POST['submit']) && $_POST['submit'] == "确认续借"){
if ($_POST['name'] == "" || $_POST['book_name'] == ""){
	echo "<script>alert('请您填写完整信息！')</script>";
    //exit();
}else{
	$lendsql="update tb_bs set lasttime='$lasttime1' where book_name='%".$_POST['book_name']."%' and name='%".$_POST['name']."%'";
    mysqli_query($conn,$lendsql); 
	echo "<script language=javascript>alert('续借成功！')</script>";
}}
?>
    </td>
</tr>
</table></td></tr></table>
</form>
</div> 
</div>

<div class="footer">
<table width="100%" align="center">
<tr> <td width="100%" align="center">
      <p>&nbsp;</p>
      <p class="word6">Copyright © 武汉学院图书馆 江夏区黄家湖大道333号 电话：(027-81299699）</p>
      <p class="word6">信息工程学院 软件工程1601班</p>
      <p class="word6">&nbsp;</p>
      </td></tr>
</table>
</div>


<script type="text/javascript"> 
setInterval(on,1000);
function on() { 
var date1 =new Date; 
var year=date1.getFullYear(); 
var month=date1.getMonth(); 
var day=date1.getDate(); 
var week="日一二三四五六".charAt(date1.getDay());
var hh=date1.getHours(); 
var mm=date1.getMinutes(); 
var ss=date1.getSeconds(); 
var time=year+"年"+(month+1)+"月"+day+"日 星期" + week+" "+hh+":"+mm+":"+ss; 
document.getElementById("text").innerHTML = time; 
} 
</script>
</body>
</html>
