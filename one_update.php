<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>读者信息修改</title>
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
<?php
    include_once("conn/conn.php");//包含数据库连接文件
  	if($_GET['action'] == "update"){//判断地址栏参数action的值是否等于update
	$sqlstr = "select id,name,readID,pwd,identity,phone,regdate from tb_user where id = ".$_GET['id'];//定义查询语句
	$result = @mysqli_query($conn,$sqlstr);//执行查询语句
	$rows = mysqli_fetch_row($result);//将查询结果返回为数组
?>
	  <form name="intFrom" method="post" action="one_update_ok.php">

		<table width="900" height="200"  border="0" cellpadding="0" cellspacing="0">
        <tr><td><table><tr><td>
  <td width="100%" height="30px" align="left" valign="top" class="word3"><a href="admin.php">首页</a> > <a href="admin_onemanage.php">读者管理</a> > 修改读者信息</td></tr></table></td></tr>
<tr>
          <tr align="center" valign="middle">
		  <td width="30%" class="c_td">&nbsp;</td>
            <td width="15%" align="right" class="c_td">&nbsp;</td>
            <td width="25%" class="c_td">&nbsp;</td>
			<td width="30%" class="c_td">&nbsp;</td>
          </tr>
          <tr>
		  <td class="c_td" height="30px">&nbsp;</td>
            <td align="right" valign="middle" class="c_td"><span class="word3">姓名：</span></td>
            <td align="left" valign="middle" class="c_td"><input type="text" name="name" value="<?php echo $rows[1] ?>"></td>
			<td class="c_td">&nbsp;</td>
          </tr>
          <tr>
		  <td class="c_td" height="30px">&nbsp;</td>
            <td align="right" valign="middle" class="c_td"><span class="word3">读者证号：</span></td>
            <td align="left" valign="middle" class="c_td"><input type="text" name="readID" value="<?php echo $rows[2] ?>"></td>
          	<td class="c_td">&nbsp;</td>
		  </tr>
          <tr>
		  <td class="c_td" height="30px">&nbsp;</td>
            <td align="right" valign="middle" class="c_td"><span class="word3">密码：</span></td>
            <td align="left" valign="middle" class="c_td"><input type="text" name="pwd" value="<?php echo $rows[3] ?>"></td>
            <td class="c_td">&nbsp;</td>
		  </tr>
          <tr>
		  <td class="c_td" height="30px">&nbsp;</td>
            <td align="right" valign="middle" class="c_td"><span class="word3">身份类别：</span></td>
            <td align="left" valign="middle" class="c_td"><input type="text" name="identity" value="<?php echo $rows[4] ?>"></td>
            <td class="c_td">&nbsp;</td>
		  </tr>
          <tr>
		  <td class="c_td" height="30px">&nbsp;</td>
            <td align="right" valign="middle" class="c_td"><span class="word3">电话：</span></td>
            <td align="left" valign="middle" class="c_td"><input type="text" name="phone" value="<?php echo $rows[5] ?>"></td>
            <td class="c_td">&nbsp;</td>
		  </tr>
          <tr>
		  <td class="c_td" height="30px">&nbsp;</td>
            <td align="right" valign="middle" class="c_td"><span class="word3">注册日期：</span></td>
            <td align="left" valign="middle" class="c_td"><input type="text" name="regdate" value="<?php echo $rows[6] ?>"></td>
            <td class="c_td">&nbsp;</td>
		  </tr>
		  <tr align="center" valign="middle">
		  <td class="c_td" height="30px">&nbsp;</td>
            <td colspan="2" class="c_td" height="30px">
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="id" value="<?php echo $rows[0] ?>">
			<input type="submit" name="Submit" value="修改信息">
              <input type="reset" name="reset" value="重置数据"></td>
           <td class="c_td">&nbsp;</td>
	      </tr>
        </table>
    </form>
<?php
	}
?>
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
