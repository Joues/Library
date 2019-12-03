<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>借书\还书</title>
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
	  <td width="100" height="50" align="center" valign="middle"><a href="admin_sign.php" class="word1">注销登录</a></td></tr>
</table>
</div>

<div class="main">
<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td width="100%" height="30px" align="left" valign="top" class="word3"><a href="admin.php">首页</a>> 借书\还书</td></tr>
<tr>
    <tr>
      <td align="center" valign="middle">
<?php
include_once("conn/conn.php");
//浏览图书
?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<form name="form1" id="form1" method="post" action="admin_borrowsend_delete.php">
  <tr>
    <td height="20" width="5%" class="top" align="center">状态</td>
    <td width="10%" class="top" align="center">编号</td>
    <td width="15%" class="top" align="center">读者证号</td>
    <td width="10%" class="top" align="center">姓名</td>
    <td width="15%" class="top" align="center">书名</td>
	<td width="10%" class="top" align="center">借书时间</td>
    <td width="10%" class="top" align="center">还书时间</td>
    <td width="10%" class="top" align="center">操作</td>
  </tr>
<?php
    $pagesize = 7 ;									//每页显示记录数
	$sqlstr = "select * from tb_bs order by bs_id";
	$total = mysqli_query($conn,$sqlstr);//执行查询语句
	$totalNum = mysqli_num_rows($total);					//总记录数
	$pagecount = ceil($totalNum/$pagesize);						//总页数
	(!isset($_GET['page']))?($page = 1):$page = $_GET['page'];				//当前显示页数
	($page <= $pagecount)?$page:($page = $pagecount);//当前页大于总页数时把当前页定义为总页数
	$f_pageNum = $pagesize * ($page - 1);								//当前页的第一条记录
	$sqlstr1 = $sqlstr." limit ".$f_pageNum.",".$pagesize;//定义SQL语句，通过limit关键字控制查询范围和数量
	$result = mysqli_query($conn,$sqlstr1);								//执行查询语句
	
	//$result = mysqli_query($conn,$sqlstr);

	while ($rows = mysqli_fetch_row($result)){
		echo "<tr><td height='25' align='center' class='m_td' bgcolor='#669999'>";
		echo "<input type=checkbox name='chk[]' id='chk' value=".$rows[0].">";
		echo "</td>";
		for($i = 0; $i < count($rows); $i++){
			echo "<td height='30' align='center' class='m_td' bgcolor='#FFCC66'>".$rows[$i]."</td>";
		}
		echo "<td class='m_td' align='center' bgcolor='#669999'><a href=admin_borrowsend_delete.php?action=del&id=".$rows[0]." onclick = 'return del();'>删除</a></td>";
		echo "</tr>";
	}
?>
<tr>
	<td height="25" width="800" colspan="8" class="m_td" align="left" bgcolor="#CCCC99">
	<a href="" class="word2" onClick="return chek();">全选/取消</a>&nbsp;&nbsp;
		<input type="hidden" name="action" value="delall"><input type="submit" value="删除选择" onclick = 'return del();'>&nbsp;&nbsp;</td>
</tr>
</form>
<tr>
	<td height="25" colspan="8" align="left" bgcolor="#FF6666">&nbsp;&nbsp;
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
 </td>
    </tr>
</table>

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
