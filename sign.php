<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>智慧武院-统一身份认证</title>
<link type="text/css" href="css/sign.css" />
<style type="text/css">
.word {
	font-size: 18px;
	font-weight: bold;
	color: #000;
}

	body,p,div,ul,li,h1,h2,h3,h4,h5,h6{
		margin:0;
		padding: 0;
	}
	body{
		background: ; 
	}
	#login{
		width: 400px;
		height: 300px;
		background: #FFF;
		margin:100px auto;
		position: relative;
	}
	#login h1{
	text-align: center;
	position: absolute;
	left: 129px;
	top: -49px;
	font-size: 24px;
	color: #FFF;
	margin-top: 10px;
	margin-left: 20px;
	}
	#login form p{
		text-align: center;
	}
	#user{
		background:url(images/user.png) rgba(0,0,0,.1) no-repeat;
		width: 200px;
		height: 30px;
		border:solid #ccc 1px;
		border-radius: 3px;
		padding-left: 32px;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	#pwd{
		background: url(images/pwd.png) rgba(0,0,0,.1) no-repeat;
		width: 200px;
		height: 30px;
		border:solid #ccc 1px;
		border-radius: 3px;
		padding-left: 32px;
		margin-bottom: 30px;
	}
	#yzm{
		background: url() rgba(0,0,0,.1) no-repeat;
		width: 105px;
		height: 30px;
		border:solid #ccc 1px;
		border-radius: 3px;
		padding-left: 20px;
		margin-left: 80px;
		margin-bottom: 30px;
	}
	#submit{
		width: 232px;
		height: 30px;
		background: rgba(0,0,0,.1);
		border:solid #ccc 1px;
		border-radius: 3px;
	}
	#submit:hover{
		cursor: pointer;
		background:#D8D8D8;
	}
.word2 {
	font-family: "华文仿宋";
}
</style>
<style type="text/css">  
.nocode {  
	display: inline-block;
    width: 100px;  
    height: 25px;
	margin-left: 80px;
}  
  
.code {  
	display: inline-block;
    color: #ff0000;  
    font-family: Tahoma, Geneva, sans-serif;  
    font-style: italic;  
    font-weight: bold;  
    text-align: center;  
    width: 130px;  
    height: 25px;  
    line-height: 25px;
    cursor: pointer;  
    border:1px solid #e2b4a2;
    background: #e2b4a2;
	margin-left: 82px;
}  
  
.input {  
    width: 70px;
	height: 25px;
	border:solid #ccc 1px;
	border-radius: 3px;
	padding-left: 20px;
	margin-bottom: 30px;  
}  
</style>  

</head>

<body>
<?php
session_start();
session_unset();
session_destroy();
?>
<div class="header">
<table width="100%" height="20" bgcolor="#0099FF">
<tr><td>

</td></tr>
</table>
</div>

<div class="navbar">
<table width="100%" height="180" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td width="20%" align="center" valign="middle"><img src="images/logo.jpg" width="232" height="70" longdesc="http://www.whxy.edu.cn/" /></td>
<td width="20%" valign="middle"><p>&nbsp;</p>
  <p class="word">数字校园统一身份认证</p></td>
<td width="55%" align="center"><p class="word2">温馨提示：</p>
  <p class="word2">1.该登录网页管理员登录和注册用户登录共同适用；</p>
  <p class="word2">2.管理员默认账户名：admin；管理员默认密码为：admin888;</p>
  <p class="word2">3.本图书管理系统不支持外部注册。</p></td></tr>
</table>
</div>

<div class="main">
<table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" background="images/sign_bg.jpg">
<tr>
<td width="60%"></td>
<td width="40%">
<div id="login">
<h1>身份认证</h1>	
	<form action="" method="post" name="form2">
		<p><input type="text" name="name" id="user" placeholder="用户名"></p>
		<p><input type="password" name="pwd" id="pwd" placeholder="密码"></p>
        <span id="code" class="nocode">验证码</span> <input type="text" class="input" name="input" /> 
        <script src="js/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="js/code.js"></script>  
		<p><input type="submit" name="submit" id="submit" value="登录"></p>
	
</div>
</td>
</tr>
</table>
</div>


<?php
include_once("conn/conn.php");
header("Content-type: text/html;charset=utf-8");
if(isset($_POST["submit"])&& $_POST["submit"]=="登录"){	
	if(!($_POST['name'] and $_POST['pwd'])){
		echo "<script>alert('输入不允许为空!')</script>";
	}else{
		$name = htmlspecialchars($_POST['name']);
		$pwd = md5($_POST['pwd']);
		session_start();
		$_SESSION['name']=$_POST['name'];
		$sql = "select id from tb_user where name='$name' and pwd='$pwd' limit 1";
		$result = @mysqli_query($conn,$sql);//执行sql
		if($results = @mysqli_fetch_array($result)){	
		    $strsql = "select * from tb_user where name='$name' and pwd='$pwd'";
		    $res = @mysqli_query($conn,$strsql);//执行sql
			$ress = @mysqli_fetch_array($res);
		    $_SESSION['readID'] =  $ress[2];	
			echo "<script>window.location.href='user.php'</script>";
		}else{
            echo "<script>alert('用户名或密码错误!')</script>";	
		}
	}
    @mysqli_close();//关闭数据库
}
?>

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

</form>
</body>
</html>