<?php

/* 请仅设置 表 查询权限   插入 和 查询 权限  
 为了您网站的数据库安全，请不要设置更多权限！！

 */
$mysqladd='localhost';     //数据库地址
$mysqluser='';   //可插入权限的用户名
$mysqlpass='';   //数据库该用户名密码

$DB='';  //数据库
$pre='pre_'; // 数据库前缀
$TBuid=$pre.'common_member';
$TBthread=$pre.'forum_thread';
$TBtag=$pre.'common_tag';
$TBtagitem=$pre.'common_tagitem';
$TBpost=$pre.'forum_post';
$VGETID='VGETID1IdwVd'; //这里是由E维科技提供的接口，请不要修改


if(!isset($_POST['vgetid'])||$VGETID!=$_POST['vgetid']){echo 'V-Get! ID is wrong!';exit;}


$connect=mysql_connect($mysqladd,$mysqluser,$mysqlpass);mysql_select_db($DB,$connect);mysql_query('set names utf8');

if(!isset($_POST['count'])){
$USER=$_POST['user'];$A=$_POST['a'];$K=$_POST['k'];$TM=$_POST['tm'];
$F=$_POST['f'];$editorClass=$_POST['editorclass'];$H=$_POST['h'];

//由于是php模拟post，所以已经在e.v-get.com进行了 urlencode
//对$F前端已经转码为 \"了，而 <> 是mysql 大于小于，所以如果用 "insert ... '$F'"遇到大小于有的php会自动替换成&nbsp; 而通过再传递Post，会把 \" 替换成\\\" ，所以前台一律不对f /d 修改引号
//前台和 e.v-get.com都已替换了 '为 &#39;
//这里不需要 $D

//传递的值产生：width=\\\"500\\\"
$F=str_replace('=\\\\\\"','=\\"',$F);$F=str_replace('\\\\\\"','\\"',$F);

$editorArr=array(0=>'<T/>',1=>'<E/>',5=>'<G/>',9=>'<V/>');
$H.=$editorArr[$editorClass];
 
//为了防止代码被利用，所以代码通过tp.v-get.com验证
//验证 编辑用户名，返回的是 网站网址

//但是curl socket都需要服务器开启很多dll，所以file_get_contents不需要开启任何东西，更加兼容！！
/* 
$CID=$_POST['cid'];
$VGETurl='http://localhost/tool/e.v-get.com_editor/editor_check.php?user='.$USER.'&pass='.$PASS.'&cid='.$CID;
$checkCusweb=file_get_contents($VGETurl);
if($checkCusweb!='v'){echo '用户名和密码错误';exit;} */







/* 以下是discuz forum_forum字段 帖子*/
/* 
fid查询，是否存在，不存在就不能插入
 */














/* 以下是discuz pre_forum_thread字段 帖子*/
/* 
tid 自动增加
*fid  论坛分类id
*subject =  标题
*dateline  =  时间数字化
*author=作者
*authorid=id
*lastpost  =  最后评论时间，默认跟dateline一致
*lastposter 最后评论人  默认和 作者一样
*status=32
 */


$Quid='SELECT uid,username from '.$TBuid.' WHERE email="'.$USER.'@www.luexu.com" LIMIT 1'; 
 $Qqid=mysql_query($Quid) or die ('This Editor has not registed in the website: '.mysql_error());
$Qaid=mysql_fetch_array($Qqid);
$uid=$Qaid['uid'];$USERNAME=$Qaid['username'];


//表pre_common_tag
//tagid	标签ID
//tagname	标签名
//status	显示状态 0:正常 1:关闭 2:推荐 3:用户标签

$tagK=explode(',',$K);
$LtagK=count($tagK);
$LtagK=($LtagK>5)?5:$LtagK;
//最多5个tag
$QsTag='';
for($tagid=0;$tagid<$LtagK;$tagid++){
$TAG=$tagK[$tagid];
//插入不重复的标签
//dual 是一个特殊表，虚拟的，但是不能用其他名字，mysql只认识dual
$QsTagInsert="INSERT INTO $TBtag (tagname) SELECT '$TAG' FROM dual WHERE NOT EXISTS (SELECT * FROM $TBtag WHERE tagname='$TAG')";
mysql_query($QsTagInsert) or die ('Tagname cannot be inserted: '.mysql_error());
$QsTag.='OR tagname="'.$TAG.'" ';
}




 /* 以下是discuz pre_forum_post字段 */
/* 

× pid	贴子编号  
× fid	贴子所属论坛编号==论坛分类id，需要先从forum_forum 查询该id是否存在
× tid	贴子所属主题编号  == 从 forum_thread 获取
× first	是否为所属主题第一个贴子  =1
× author	贴子作者用户名
× authorid	贴子作者UID
× subject	贴子标题
× dateline	发贴时间=时间数字化
× message	贴子内容
× useip	作者发贴时的IP地址
invisible	是否通过审核 0正常，1未通过审核，-1回收站，-2 等待审核 -3 忽略不显示/草稿 -5 回收站回帖
anonymous	是否匿名贴子
usesig	是否启用签名
htmlon	是否启用HTML代码，这里即使=1，也不可以存储html代码
bbcodeoff	是否关闭discuz!代码
smileyoff	是否关闭表情
parseurloff	是否关闭URL自动解析
attachment	是否含用附件
rate	评分所得分数
ratetimes	评分加权值，不象是打分次数
status	贴子状态：位运算存储 0x00 - FF 总共支持8个标志位[1]
#tags	标签,默认可以为空，
comment	是否有评论
 */
 
$relatebytag=$TM+1;
$Qs="INSERT INTO $TBthread (fid,subject,dateline,lastpost,author,authorid,lastposter,status,relatebytag) VALUES ($A,'$H',$TM,$TM,'$USERNAME',$uid,'$USERNAME',32,$relatebytag);";
mysql_query($Qs) or die ('Article cannot be inserted: '.mysql_error());
$tid=mysql_insert_id();



//tagitem
$TAGS='';$QsTag='SELECT tagid,tagname FROM '.$TBtag.' WHERE '.substr($QsTag,2);
$QqTag=mysql_query($QsTag);

while($QaTag=mysql_fetch_array($QqTag)){
$tagid=$QaTag['tagid'];$tagname=$QaTag['tagname'];
//2,爱你却	3,你好	4,我爱你
$TAGS.=$tagid.','.$tagname.'	';

$QsTagItem="INSERT INTO $TBtagitem (tagid,itemid,idtype) VALUES ($tagid,$tid,'tid')";
mysql_query($QsTagItem) or die ('tagItem cannot be inserted: '.mysql_error());
}	
//tagitem

/* discuz专门替换 
$F=str_replace('<p>','',$F);
$F=str_replace('</p>','\n\n',$F);
*/
//开启  htmlon=1  bbcodeoff=-1 这样就可以存储html源代码了

$Qs2='SELECT pid FROM '.$TBpost.' ORDER BY pid DESC LIMIT 1';
$Qq=mysql_query($Qs2) or die ('Select the max forum_post failed: '.mysql_error());
$Qa=mysql_fetch_array($Qq);
$pid=$Qa['pid'];
$pid++;
$Qs2='INSERT INTO '.$TBpost.' (pid,fid,tid,first,message,useip,subject,dateline,author,authorid,tags,htmlon,bbcodeoff) VALUES ('.$pid.','.$A.','.$tid.',1,"'.$F.'","114.80.166.240","'.$H.'",'.$TM.',"'.$USERNAME.'",'.$uid.',"'.$TAGS.'",1,-1);';
mysql_query($Qs2) or die ('forum_post cannot be inserted: '.mysql_error());


$Qs3='INSERT INTO '.$pre.'forum_post_tableid (pid) VALUES ('.$pid.');';
//这里不用能or dir 因为，pid是主键，可能会重复，为了避免插入重复，所以这里不能用or die
mysql_query($Qs3);
mysql_close($connect);
//这里是返回给e.v-get.com模拟post，如果是v，就表示插入成功，否则错误！
echo 'v';exit;

}
else {

//这里users可以是多个，用_隔开，为了避免编辑与客户直接接触，禁止编辑接触此网址和客户网址！！
// 不要在文章头部加，因为类似discuz会再改造的。引用 文章标题尾部加：<T/>  伪原创：<E/>   再原创：<G/>  纯原创<V/>  这种符号可以不显示  <0/>等数字形式会显示出来，唯有这个不会显示[/]
//互联网企业年会美女火辣照片对比<G/>  [/]
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><base target="_blank"><p>如果再修改，修改成&lt;&ltT/&gt;&gt; 两个小于 两个大于，这样就可以通过本页修改了</p>';

$Qscheck='SELECT subject FROM '.$TBpost.' WHERE subject LIKE "%/&gt;&gt;"';
$Qqcheck=mysql_query($Qscheck);$Qrcheck=mysql_num_rows($Qqcheck);
if($Qrcheck>0){
$Qsreplace='UPDATE '.$TBthread.' SET subject=REPLACE(subject,"&lt;&lt;","<")';
mysql_query($Qsreplace);
$Qsreplace='UPDATE '.$TBthread.' SET subject=REPLACE(subject,"/&gt;&gt;","/>")';
mysql_query($Qsreplace);
$Qsreplace='UPDATE '.$TBpost.' SET subject=REPLACE(subject,"&lt;&lt;","<")';
mysql_query($Qsreplace);
$Qsreplace='UPDATE '.$TBpost.' SET subject=REPLACE(subject,"/&gt;&gt;","/>")';
mysql_query($Qsreplace);
}
$USERs=$_POST['users'];$aUSER=explode('_',$USERs);$countV=0;$countG=0;$countE=0;$countT=0;$counts=0;$charless=$_POST['charless'];




$lasttime=$_POST['lasttime'];
$Now=date('Y-m-d H:i:s');
echo '<strong style="color:#090">',$lasttime,'</strong> 至 ',$Now,'<hr>';
$CountTime=strtotime($lasttime);

if($charless<850){
foreach($aUSER as $USERi=>$USER){
$Quid='SELECT uid,username from '.$TBuid.' WHERE email="'.$USER.'@www.luexu.com" LIMIT 1'; 
 $Qqid=mysql_query($Quid) or die ('无法查询到用户表'.mysql_error());
$Qaid=mysql_fetch_array($Qqid);
$uid=$Qaid['uid'];$USERNAME=$Qaid['username'];
if($uid<1){echo $USER,'@www.luexu.com 未在网站中找到……';exit;}
$Qscount='SELECT COUNT(*) FROM '.$TBthread.' WHERE authorid='.$uid.' AND dateline>'.$CountTime;
$Qqcount=mysql_query($Qscount) or die ('找寻forum_thread最大值错误：'.mysql_error());
$Qz=mysql_fetch_array($Qqcount);
$Qzall=$Qz[0];

$QsV='SELECT COUNT(*) FROM '.$TBthread.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject LIKE "%<V/>"';
$QqV=mysql_query($QsV);
$QzV=mysql_fetch_array($QqV);
$QzV0=$QzV[0];

$QsG='SELECT COUNT(*) FROM '.$TBthread.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject LIKE "%<G/>"';
$QqG=mysql_query($QsG);
$QzG=mysql_fetch_array($QqG);
$QzG0=$QzG[0];

$QsE='SELECT COUNT(*) FROM '.$TBthread.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject LIKE "%<E/>"';
$QqE=mysql_query($QsE);
$QzE=mysql_fetch_array($QqE);
$QzE0=$QzE[0];

$QsT='SELECT COUNT(*) FROM '.$TBthread.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject LIKE "%<T/>"';
$QqT=mysql_query($QsT);
$QzT=mysql_fetch_array($QqT);
$QzT0=$QzT[0];
echo '<p>',$USER,'@www.luexu.com 共发布：<b style="color:#F00">',$Qzall,'</b> 篇文章；纯原创：<b style="color:#F00">',$QzV0,'</b> 篇；再原创：<b style="color:#F00">',$QzG0,'</b> 篇；伪原创：<b style="color:#F00">',$QzE0,'</b> 篇；引用：<b style="color:#F00">',$QzT0,'</b> 篇文章；</p>';
$count+=$Qzall;$countV+=$QzV0;$countG+=$QzG0;$countE+=$QzE0;$countT+=$QzT0;
$Qs0='SELECT tid FROM '.$TBthread.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject NOT LIKE "%/>"';
$Qq0=mysql_query($Qs0);
while($Qa0=mysql_fetch_array($Qq0)){$Qqtid=$Qa0['tid'];echo '<a href="http://xxxxx.com/bbs/thread-',$Qqtid,'-1-1.html">',$Qqtid,'</a> ';}
}
}

else {
$charless++;


foreach($aUSER as $USERi=>$USER){
$Quid='SELECT uid,username from '.$TBuid.' WHERE email="'.$USER.'@www.luexu.com" LIMIT 1'; 
 $Qqid=mysql_query($Quid) or die ('无法查询到用户表'.mysql_error());
$Qaid=mysql_fetch_array($Qqid);
$uid=$Qaid['uid'];$USERNAME=$Qaid['username'];
if($uid<1){echo $USER,'@www.luexu.com 未在网站中找到……';exit;}
$Qscount='SELECT COUNT(*) FROM '.$TBpost.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND char_length(message)>'.$charless;
$Qqcount=mysql_query($Qscount) or die ('找寻forum_post最大值错误：'.mysql_error());
$Qz=mysql_fetch_array($Qqcount);
$Qzall=$Qz[0];

$QsV='SELECT COUNT(*) FROM '.$TBpost.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject LIKE "%<V/>"';
$QqV=mysql_query($QsV);
$QzV=mysql_fetch_array($QqV);
$QzV0=$QzV[0];

$QsG='SELECT COUNT(*) FROM '.$TBpost.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject LIKE "%<G/>" AND char_length(message)>'.$charless;
$QqG=mysql_query($QsG);
$QzG=mysql_fetch_array($QqG);
$QzG0=$QzG[0];

$QsE='SELECT COUNT(*) FROM '.$TBpost.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject LIKE "%<E/>" AND char_length(message)>'.$charless;
$QqE=mysql_query($QsE);
$QzE=mysql_fetch_array($QqE);
$QzE0=$QzE[0];

$QsT='SELECT COUNT(*) FROM '.$TBpost.' WHERE authorid='.$uid.' AND dateline>'.$CountTime.' AND subject LIKE "%<T/>" AND char_length(message)>'.$charless;
$QqT=mysql_query($QsT);
$QzT=mysql_fetch_array($QqT);
$QzT0=$QzT[0];
echo '<p>',$USER,'@www.luexu.com 字数<strong style="color:#090">',$charless,'</strong>以上文章：<b style="color:#F00">',$Qzall,'</b> 篇；纯原创：<b style="color:#F00">',$QzV0,'</b> 篇；再原创：<b style="color:#F00">',$QzG0,'</b> 篇；伪原创：<b style="color:#F00">',$QzE0,'</b> 篇；引用：<b style="color:#F00">',$QzT0,'</b> 篇；</p>';
$count+=$Qzall;$countV+=$QzV0;$countG+=$QzG0;$countE+=$QzE0;$countT+=$QzT0;
}

}
echo '<hr><p>E维科技 <span style="color:#090">',$lasttime,'</span> 至 ',$Now,' 字数<strong style="color:#090">',$charless,'</strong>以上文章：<b style="color:#F00">',$count,'</b> 篇；<a href="editor_xxxxx_sitemap.php">纯原创：<b style="color:#F00">',$countV,'</b> 篇</a>；<a href="editor_xxxxx_sitemap.php?vget=good">再原创：<b style="color:#F00">',$countG,'</b> 篇</a>；<a href="editor_xxxxx_sitemap.php?vget=ebook">伪原创：<b style="color:#F00">',$countE,'</b> 篇</a>；<a href="editor_xxxxx_sitemap.php?vget=tag">引用：<b style="color:#F00">',$countT,'</b> 篇</a>；</p><hr>';
}

?>