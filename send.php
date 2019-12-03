<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>还书系统</title>
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
<form name="form" method="post" action="">
		<input name='ecmsfrom' type='hidden' value='9'>
		<input type="hidden" name="show" value="title,newstext">
	
    <select name="classid" id="choose">
      <option value="0">关键字</option>
      <option value="1">新闻中心</option>
      <option value="4">技术文档</option>
      <option value="22">下载中心</option>
    </select>
    <input class="inp_srh" name="book_name"  placeholder="请输入书名……" />
    <input class="btn_srh" type="submit" name="submit" value="搜索" />  
    </td></tr> </table>
</div>           
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.select.js"></script>
</div>

<?php
include_once("conn/conn.php");
//浏览图书
if(isset($_POST['submit']) && $_POST['submit'] == "搜索"){
?>
<div id="index_search">
<center>
<table width="89%" border="0" cellpadding="0" cellspacing="0">
<tr><td height="20px"></td></tr>
<tr bgcolor="#999999"><td width="20px">&nbsp;</td><td height="20">查询结果如下：</td></tr></table>
<table width="89%" border="1" bordercolor="#FFFFFF" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FF9966">
    <td width="10%" height="25px" bgcolor="#FFCC00" class="top" align="center">编号</td>
    <td width="20%" height="25px" class="top" align="center">书名</td>
    <td width="10%" height="25px" class="top" align="center">价格</td>
    <td width="15%" height="25px" class="top" align="center">出版时间</td>
    <td width="10%" height="25px" class="top" align="center">所属类别</td>
    <td width="15%" height="25px" class="top" align="center">ISBN编码</td>
    <td width="20%" height="25px" class="top" align="center">出版社</td>
  </tr>
<?php
    $sql = @mysqli_query($conn,"select * from tb_book");
    $info = mysqli_fetch_object($sql);
    $book_name = $_POST['book_name'];
	
	$pagesize = 4 ;									//每页显示记录数
    $sql = mysqli_query($conn,"select * from tb_book where book_name like '%".$book_name."%'"); //如果选择的条件为"like",则进行模糊查询
    $totalNum = mysqli_num_rows($sql);					//总记录数
	$pagecount = ceil($totalNum/$pagesize);						//总页数
	(!isset($_GET['page']))?($page = 1):$page = $_GET['page'];				//当前显示页数
	($page <= $pagecount)?$page:($page = $pagecount);//当前页大于总页数时把当前页定义为总页数
	$f_pageNum = $pagesize * ($page - 1);								//当前页的第一条记录
	$sqlstr1 = "select * from tb_book where book_name like '%".$book_name."%'"." limit ".$f_pageNum.",".$pagesize;//定义SQL语句，通过limit关键字控制查询范围和数量
	$result = mysqli_query($conn,$sqlstr1);								//执行查询语句
	
	$info = mysqli_fetch_object($result);
    if($info == false){ //如果检索的信息不存在，则输出相应的提示信息
        echo "<script>alert对不起，您检索的图书信息不存在!</script>";
    }else{
    do{
?>
        <tr align="left" bgcolor="#00CCCC">
         <td width="10%" height="20px" bgcolor="#FFCC00" align="center"><span class="word6"><?php echo $info->book_id; ?></span></td>
         <td width="20%" height="20px" align="center"><span class="word6"><?php echo $info->book_name; ?></span></td>
         <td width="10%" height="20px" align="center"><span class="word6"><?php echo $info->book_price; ?></span></td>
         <td width="15%" height="20px" align="center"><span class="word6"><?php echo $info->book_time; ?></span></td>
         <td width="10%" height="20px" align="center"><span class="word6"><?php echo $info->book_type; ?></span></td>
         <td width="15%" height="20px" align="center"><span class="word6"><?php echo $info->book_ISBN; ?></span></td>
         <td width="20%" height="20px" align="center"><span class="word6"><?php echo $info->book_come; ?></span></td>        
        </tr>
<?php
     }while($info = mysqli_fetch_object($result));
?>
<tr>
	<td height="25" colspan="9" align="left" bgcolor="#FF6666">&nbsp;&nbsp;
<?php
    echo "共".$totalNum."条记录&nbsp;&nbsp;";
	echo "第".$page."页/共".$pagecount."页&nbsp;&nbsp;";
	if($page!=1){//如果当前页不是1则输出有链接的首页和上一页
	    echo "<a href='?page=1'>首页</a>&nbsp;";
		echo "<a href='?page=".($page-1)."'>上一页</a>&nbsp;&nbsp;";
	}else{//否则输出没有链接的首页和上一页
	    echo "首页&nbsp;上一页&nbsp;&nbsp;";
	}
	if($page!=$pagecount){//如果当前页不是最后一页则输出有链接的下一页和尾页
	    echo "<a href='?page=".($page+1)."'>下一页</a>&nbsp;";
		echo "<a href='?page=".$pagecount."'>尾页</a>&nbsp;&nbsp;";
	}else{//否则输出没有链接的下一页和尾页
	    echo "下一页&nbsp;尾页&nbsp;&nbsp;";
	}
?>
    </td>
  </tr> 
</table>
</center>
</div>
<?php
}}
?> 
</form>

<div class="sign">
<table width="100%" height="440" >
<tr>
  <td height="35" align="center"><table width="100%" border="0">
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="47%">您好！<?php echo $_SESSION['name']; ?>，欢迎您！  当前日期： <?php echo date("Y-m-d")." ";?></td>
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
      <table width="800" height="400">
      <tr><td align="center"><span class="word5">请输入姓名以验证您的身份，输入书名进行借阅。</span></td></tr>
      <tr><td>
<form action="" method="post" name="form5">
  <table width="800" heiht="100">
    <tr><td align="center"><table width="100%" border="0">
  <tr>
    <td width="200">&nbsp;</td>
    <td width="50" align="right">姓名：</td>
    <td width="200" height="30" align="left"><input type="text" name="name" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">书名：</td>
    <td height="30" align="left"><input type="text" name="book_name" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td height="30" align="left"><input type="submit" name="submit" value="还书"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></td></tr>
</table>
<?php
$readID = $_SESSION['readID'];
$name = $_SESSION['name'];
$begintime = date("Y-m-d");
$lasttime = date('Y-m-d ',strtotime("+1 month"));
if(isset($_POST['submit']) && $_POST['submit'] == "还书"){
if ($_POST['name'] == "" || $_POST['book_name'] == ""){
	echo "<script>alert('请您填写完整信息！')</script>";
    //exit();
}else if ($_SESSION['name'] != $_POST['name']){
	echo "<script language=javascript>alert('请使用您当前登陆的身份信息!')</script>";
	//exit();
}else{
	$lendsql="delete from tb_bs where name='%".$_POST['name']."%' and book_name = '%".$_POST['book_name']."%'";
    mysqli_query($conn,$lendsql); 
	echo "<script language=javascript>alert('还书成功！')</script>";
}}
?>
</form>
  </td></tr>    </table>      
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