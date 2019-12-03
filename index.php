<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>武汉学院图书管理系统</title>
<link rel="stylesheet" type="text/css" href="css/body.css" />
<link rel="stylesheet" type="text/css" href="css/base_btn.css" />

<style type="text/css">
/* .Div */
.myDiv {
            width: 100%;
            height: 420px;
            margin: 0;
            -webkit-animation-name: 'loop';
            -webkit-animation-duration: 10s;
            -webkit-animation-iteration-count: infinite;
        }
        @-webkit-keyframes "loop"{
            0% { background: url("images/6.jpg") no-repeat;}
            25% { background: url("images/7.jpg") no-repeat;}
            50% { background: url("images/8.jpg") no-repeat;}
            75% { background: url("images/9.jpg") no-repeat;}
            100% {background:  url("images/10.jpg") no-repeat;}
        }
		
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

<div class="header">
<table width="100%" height="80" border="0" cellpadding="0" cellspacing="0" bgcolor="#0099FF">
			<tr>
            <td width="85"></td>
				<td width="193" align="center" valign="middle"><img src="images/logo.PNG" width="232" height="70" longdesc="http://www.whxy.edu.cn/" />
				</td>
                <td align="right">
                <button class="button" ><a href="sign.php" target="_blank">登陆</a></button> 
                <td width="15">&nbsp;</td>
                </td>
			  <td align="left" width="160" ><p><font color="#FFFFFF" style="font-weight:300">校外访问</font></p></td>
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
<form name="form1" method="post" action="">
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
<tr><td width="20px">&nbsp;</td><td height="20">查询结果：</td></tr></table>
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
    if($info==false){ //如果检索的信息不存在，则输出相应的提示信息
        echo "<script>alert对不起，您检索的图书信息不存在!</script>";
    }
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
}
?> 

<div class="row">
  <div class="side">
      <table height="420" border="0" width="100%">
  <tr><td align="left" valign="top"><table width="540" border="0" align="left">
    <tr>
        <td height="60" colspan="3" align="left" valign="middle"><img src="images/gh.PNG" width="20" height="20" /> <span class="word">一站式“导航”</span></td>
        </tr>
      <tr>
        <td width="180" height="150" align="center" valign="middle"><table width="150" border="0" bgcolor="#00CCFF">
          <tr>
            <td height="100" align="center"><table width="150" border="0" bgcolor="#00CCFF">
              <tr>
                <td height="90" align="center" valign="middle"><a href="http://59.172.226.3:8999/login"><img src="images/home_main_icon01.png" width="40" height="50" /></a></td>
              </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="word1" ><span class="words">资源宝库</span></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="180" height="150" align="center" valign="middle"><table width="150" border="0" align="center" >
          <tr>
            <td height="100" align="center"><table width="150" border="0" bgcolor="#00FFCC">
              <tr>
                <td height="90" align="center" valign="middle"><img src="images/home_main_icon06.png" width="40" height="50" /></td>
              </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="words" >培训讲座</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="180" height="150" align="center" valign="middle"><table width="150" border="0" >
          <tr>
            <td height="100" align="center"><table width="150" border="0" bgcolor="#00FFFF">
              <tr>
                <td height="90" align="center" valign="middle"><a href="http://59.172.226.5/eams/thesis/result/student.action"><img src="images/home_main_icon05.png" width="40" height="50" /></a></td>
              </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="words" >论文提交</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="180" height="150" align="center" valign="middle"><table width="150" border="0" >
          <tr>
            <td height="100" align="center"><table width="150" border="0" bgcolor="#6699FF">
              <tr>
                <td height="90" align="center" valign="middle"><img src="images/home_main_icon09.png" width="40" height="50" /></td>
              </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="words" >信息预约</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="180" height="150" align="center" valign="middle"><table width="150" border="0" >
          <tr>
            <td height="100" align="center"><table width="150" border="0" bgcolor="#0099CC">
              <tr>
                <td height="90" align="center" valign="middle"><a href="user.php"><img src="images/home_main_icon08.png" width="40" height="50" /></a></td>
              </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="words" >我的图书馆</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="180" height="150" align="center" valign="middle"><table width="150" border="0" >
          <tr>
            <td height="100" align="center"><table width="150" border="0" bgcolor="#FFCC99">
              <tr>
                <td height="90" align="center" valign="middle"><img src="images/home_main_icon04.png" width="40" height="50" /></td>
              </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="words" >文献传递</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
  </table>
    <p>&nbsp;</p></td></tr>
  </table> 
</form>
  </div>
  
  <div class="main">
    <p><img src="images/gh.PNG" width="20" height="20" /> <span class="word"> 读书风采</span> </p>
    <div class="myDiv"> </div>  	  
  </div>
</div>

<div class="new">
  <table width="100%" border="0">
    <tr>
      <td width="25%" height="180" align="center" valign="top"><table width="100%" border="0"  bgcolor="#99CC33">
        <tr>
          <td width="100%" align="center"><table width="96%" height="284" border="0">
            <tr>
              <td height="40" class="word4"> <span id="text"></span> </td>
            </tr>
            <tr>
              <td height="200" valign="top"><hr align="center" color="#FFFFFF"/>
                <p class="word3">今日借书的还期</span></p>
                <p class="word4">专科生：<span id="text1"></span> </p>
                <p class="word4">本科生：<span id="text2"></span></p>
                <p class="word4">研究生：<span id="text3"></span></p>
                <p class="word4">教职工：<span id="text4"></span></p></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
      <td width="50%" height="250" align="center" valign="top"><table width="92%" border="0" bgcolor="#FFCC66">
        <tr>
          <td><table width="100%" border="0">
            <tr>
              <td height="40" valign="top"><p><img src="images/gh.PNG" width="20" height="20" /><span class="word">自有资源</span></p></td>
            </tr>
            <tr>
              <td><table id="tbList" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
                <tbody>
                  <tr>
                    <td width="6%" background="#E6EFF6" align="center"><img src="http://lib.whxy.net/images/biao2.jpg" alt="" width="7" height="5" /></td>
                    <td width="74%" height="30" background="#E6EFF6"><a href="http://lib.whxy.edu.cn/showarticle.aspx?id=41948" target="_top">易瑞远程访问系统</a></td>
                    <td width="20%" class="word4">2017-02-28</td>
                  </tr>
                  <tr>
                    <td width="6%" background="#E6EFF6" align="center"><img src="http://lib.whxy.net/images/biao2.jpg" alt="" width="7" height="5" /></td>
                    <td width="74%" height="30" background="#E6EFF6"><a href="http://lib.whxy.edu.cn/showarticle.aspx?id=38683" target="_top">博看电子期刊数据库</a></td>
                    <td width="20%" class="word4">2014-12-03</td>
                  </tr>
                  <tr>
                    <td width="6%" background="#E6EFF6" align="center"><img src="http://lib.whxy.net/images/biao2.jpg" alt="" width="7" height="5" /></td>
                    <td width="74%" height="30" background="#E6EFF6"><a href="http://lib.whxy.edu.cn/showarticle.aspx?id=38595" target="_top">超星名师讲坛视频</a></td>
                    <td width="20%" class="word4">2014-11-26</td>
                  </tr>
                  <tr>
                    <td width="6%" background="#E6EFF6" align="center"><img src="http://lib.whxy.net/images/biao2.jpg" alt="" width="7" height="5" /></td>
                    <td width="74%" height="30" background="#E6EFF6"><a href="http://lib.whxy.edu.cn/showarticle.aspx?id=22210" target="_top">新东方多媒体学习库</a></td>
                    <td width="20%" class="word4">2011-05-20</td>
                  </tr>
                  <tr>
                    <td width="6%" background="#E6EFF6" align="center"><img src="http://lib.whxy.net/images/biao2.jpg" alt="" width="7" height="5" /></td>
                    <td width="74%" height="30" background="#E6EFF6"><a href="http://lib.whxy.edu.cn/showarticle.aspx?id=19175" target="_top">超星电子图书（百万册）</a></td>
                    <td width="20%" class="word4">2010-05-27</td>
                  </tr>
                  <tr>
                    <td width="6%" background="#E6EFF6" align="center"><img src="http://lib.whxy.net/images/biao2.jpg" alt="" width="7" height="5" /></td>
                    <td width="74%" height="30" background="#E6EFF6"><a href="http://lib.whxy.edu.cn/showarticle.aspx?id=19173" target="_top">读秀中文学术搜索</a></td>
                    <td width="20%" class="word4">2013-11-20</td>
                  </tr>
                  <tr>
                    <td width="6%" background="#E6EFF6" align="center"><img src="http://lib.whxy.net/images/biao2.jpg" alt="" width="7" height="5" /></td>
                    <td width="74%" height="30" background="#E6EFF6"><a href="http://lib.whxy.edu.cn/showarticle.aspx?id=18467" target="_top">中国知识资源总库</a></td>
                    <td width="20%" class="word4">2010-05-04</td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
          </table>            <span class="word"></span></td>
        </tr>
      </table></td>
      <td width="25%" height="250" align="center" valign="top"><table width="100%" height="250" border="0" background="images/cunbao.jpg">
        <tr>
          <td height="240" align="center"><img src="images/gh.PNG" width="20" height="20" /><span class="word">存包须知</span>
            <p> <span class="word2">1．存包柜方便读者临时存放书包等物品的场所，读者可无偿使用；</span></p>
            <p class="word2"> 2．贵重物品请随身携带，严禁存放危险品；</p>
            <p class="word2"> 3．请爱护存包柜，存放物品轻拿轻放，物品取出后，请关好柜门；</p>
            <p class="word2"> 4．请不要长期占用存包柜，离馆时请务必带走存放物品，工作人员每天清理存包柜，物品丢失概不负责。</p></td>
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
 </form>  
<div class="footer">
  <div>
    <div id="ft">
      <p> <a href="http://www.nlc.gov.cn/" target="_blank">中国国家图书馆</a> ｜ <a href="http://www.calis.edu.cn/" target="_blank">CALIS</a> ｜ <a href="http://www.cashl.edu.cn/portal/" target="_blank">CASHL</a> ｜ <a href="http://lib.hzau.edu.cn/www.library.hb.cn/" target="_blank">湖北省图书馆</a> ｜ <a href="http://www.hbdlib.cn/" target="_blank">湖北省高校数字图书馆</a> ｜<span class="word6"><a href="http://www.whxy.edu.cn/">武汉学院</a> ｜</span> <a href="http://lib.whxy.net/index.aspx">旧版链接</a><a href="http://218.199.76.29/" target="_blank"></a></p>
      <p class="word6">Copyright © 武汉学院图书馆 江夏区黄家湖大道333号 电话：(027-81299699）</p>
      <p class="word6">信息工程学院 软件工程1601班</p>
    </div></div></div>

</body>

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
var time1=year+"年"+(month+2)+"月"+day+"日";
var time2=year+"年"+(month+2)+"月"+day+"日";
var time3=year+"年"+(month+4)+"月"+day+"日";
var time4=year+"年"+(month+4)+"月"+day+"日";
document.getElementById("text").innerHTML = time; 
document.getElementById("text1").innerHTML = time1; 
document.getElementById("text2").innerHTML = time2; 
document.getElementById("text3").innerHTML = time3; 
document.getElementById("text4").innerHTML = time4; 
} 
</script>

</html>