<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人信息管理</title>
</head>

<link rel="stylesheet" type="text/css" href="css/body.css" />
<link rel="stylesheet" type="text/css" href="css/base_btn.css" />

<style type="text/css">
		
/* search */
.search{border:2px solid #0CC;height:40px;margin:25px auto 0px auto;width:525px;}
.search select{display:none;}
.search .select_box{font-size:12px;color:#FFF;width:100px;line-height:35px;float:left;position:relative;text-align:left;}
.search .select_showbox{height:35px;background:url(images/search_ico.png) no-repeat 80px center;text-indent:1.5em;}
.search .select_showbox.active{background:url(images/search_ico_hover.png) no-repeat 80px center;}
.search .select_option{border:2px solid #0CC;border-top:none;display:none;left:-2px;top:35px;position:absolute;z-index:99;background:#6CF;}
.search .select_option li{list-style-type:none;text-indent:1.5em;width:90px;cursor:pointer;text-align:center;}
.search .select_option li.selected{background-color:#0FC;color:#FFF;}
.search .select_option li.hover{background:#0FC;color:#fff;}
.search input.inp_srh,.search input.btn_srh{border:none;background:none;height:38px;line-height:35px;float:left}
.search input.inp_srh{outline:none;width:361px;}
.search input.btn_srh{
	background: #0CC;
	color: #FFF;
	font-family: "微软雅黑";
	font-size: 15px;
	width: 60px;
	text-align: center;
}

.word {
	font-size: 24px;
}
.words {
	color: #FFF;
}
.word2 {
	color: #0CF;
}
.word3 {
	font-size: 18px;
	font-weight: bold;
	color: #FFF;
}
.word4 {
	color: #FFF;
}
.word5 {
	color: #FFF;
}
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.word6 {
	color: #FFF;
}
</style>
</head>

<body>
<?php
session_start();										//初始化SESSION变量
if(!isset($_SESSION['name'])){
	echo "<script>alert('请先登录后再次尝试！');window.location.href='sign.php';</script>";	
}
header("Content-type: text/html;charset=utf-8");
?>
<div class="header">
<table width="100%" height="80" border="0" cellpadding="0" cellspacing="0" bgcolor="#0099FF">
			<tr>
            <td width="85"></td>
				<td width="193" align="center" valign="middle"><img src="images/logo.PNG" width="232" height="70" longdesc="http://www.whxy.edu.cn/" />
				</td>
                <td align="right">
                <button class="button" ><a href="sign.php" target="_blank">退出登录</a></button> 
                <td width="15">&nbsp;</td>
                </td>
			  <td align="left" width="160" ><p><a href="admin_sign.php">管理员登录</a></p></td>
			</tr>
</table>
</div>
 
<div class="navbar">
<table width="100%">
<tr><td width="10%"></td>

<td><a href="index.php">首页</a>
  <a href="http://www.whxy.edu.cn/" target="_blank">学校官网</a><a href="user.php">我的图书馆</a>
  <a href="admin.php">我是管理员</a></td>
<td><a href="#" class="right">关于我们</a></td></tr>
</table>
  
</div>

<div id="search">                     
    <table width="100%" height="140" border="0">
      <tr>
        <td align="center">      
        <div class="search radius6">      
<form name="searchform" method="post" action="index.html">
		<input name='ecmsfrom' type='hidden' value='9'>
		<input type="hidden" name="show" value="title,newstext">
	</form>
    <select name="classid" id="choose">
      <option value="0">关键字</option>
      <option value="1">新闻中心</option>
      <option value="4">技术文档</option>
      <option value="22">下载中心</option>
    </select>
    <input class="inp_srh" name="keyboard"  placeholder="请输入需要搜索的内容……" />
    <input class="btn_srh" type="submit" name="submit" value="搜索" />  
    </td></tr> </table>
</div>           
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.select.js"></script>
</div>
 
<div class="sign">
<table width="100%" height="440" >
<tr>
  <td height="35" align="center"><table width="100%" border="0">
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="47%">您好！<?php echo $_SESSION['name'] ?>，欢迎您！  当前日期： <?php echo date("Y-m-d")." ";?></td>
      <td width="47%" align="right">当前位置：<a href="user.php">首页 </a>&gt; 我的图书馆</td>
      <td>&nbsp;</td>
    </tr>
  </table></td>
  </tr>
  
<tr>
  <td height="5" align="center"><hr width="96%" color="#FFFFFF" /></td>
</tr>

<tr>
  <td height="400" align="center"><table width="100%" border="0">
    <tr>
      <td width="3%" align="center">
        <p>&nbsp;</p></td>
      <td width="27%" align="center" bgcolor="#333333"><p><a href="user.php">今日图书推荐</a></p>
        <p><a href="user_search.php">图书高级查询</a></p>
        <p><a href="borrow.php">借书系统</a></p>
        <p><a href="send.php">还书系统</a></p>
        <p><a href="user_manage.php">个人信息管理</a></p></td>
      <td width="70%" height="400">
      <div class="sign_massage">         
	  <form name="intFrom" method="post" action="user_manage_ok.php">
      <table width="800" height="400" align="center">
		  <tr>
		    <td align="center" class="c_td"><p><span class="word3">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
		      <input type="text" name="pwd" placeholder="请输入新密码。">
		    </p>
		      <p>		        <span class="word3">联系方式：</span>
		        <input type="text" name="phone" placeholder="请输入11位联系方式。">
		        </p>
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="book_id">
              <input type="submit" name="submit" value="修改信息">
              <input type="reset" name="reset" value="重置数据"></td>
		    </tr>
          <tr align="center" valign="middle">
            <td height="30" class="c_td">&nbsp;</td>
          </tr>
        </table>
<?php
if(isset($_POST["submit"])&& $_POST["submit"]=="修改信息"){	
    $name = $_SESSION['name'];
	if(($_POST['pwd'] and $_POST['phone']) == null){
		echo "<script>alert('输入不允许为空!')</script>";
	}else{
		echo "<script>window.location.href='user_manage_ok.php'</script>";
	}
}
?>
    </form>               
          </td>
      </tr>
      </table>
       </div></td>
    </tr>
  </table></td>
  </tr>
</table>
</div>

<div class="foot">
  <table width="100%" border="0">
    <tr>
      <td width="25%" align="center">&nbsp;</td>
      <td width="50%" align="center"><table width="100%" border="0">
        <tr>
          <td align="center"><img src="images/textsms.png" width="48" height="48" /></td>
          <td align="center">&nbsp;</td>
          <td align="center"><img src="images/weibo.png" width="48" height="48" /></td>
          <td align="center">&nbsp;</td>
          <td align="center"><img src="images/weixin.png" width="48" height="48" /></td>
          <td align="center">&nbsp;</td>
          <td align="center"><img src="images/qq.png" width="48" height="48" /></td>
          <td align="center">&nbsp;</td>
          <td align="center"><img src="images/call_phone.png" width="48" height="48" /></td>
          </tr>
      </table></td>
      <td width="25%" align="center">&nbsp;</td>
    </tr>
  </table>
</div>
 
<div class="footer">
  <div>
    <div id="ft">
      <p> <a href="http://www.nlc.gov.cn/" target="_blank">中国国家图书馆</a> ｜ <a href="http://www.calis.edu.cn/" target="_blank">CALIS</a> ｜ <a href="http://www.cashl.edu.cn/portal/" target="_blank">CASHL</a> ｜ <a href="http://lib.hzau.edu.cn/www.library.hb.cn/" target="_blank">湖北省图书馆</a> ｜ <a href="http://www.hbdlib.cn/" target="_blank">湖北省高校数字图书馆</a> ｜<span class="word6"><a href="http://www.whxy.edu.cn/">武汉学院</a> ｜</span> <a href="http://lib.whxy.net/index.aspx">旧版链接</a><a href="http://218.199.76.29/" target="_blank"></a></p>
      <p class="word6">Copyright © 武汉学院图书馆 江夏区黄家湖大道333号 电话：(027-81299699）</p>
      <p class="word6">信息工程学院 软件工程1601班</p>
    </div></div></div>

</body>

</html>