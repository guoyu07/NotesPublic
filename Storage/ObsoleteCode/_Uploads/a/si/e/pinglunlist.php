<?phpinclude('../c/vc_sql.php');session_start();?><!DOCTYPE HTML><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><link href="http://localhost/www.v-get.com/favicon.ico" type="image/ico" rel="shortcut icon" /><link rel="stylesheet" type="text/css" href="http://weigeti.com/i0/vi/i.css"/><script type="text/javascript" src="http://weigeti.com/i0/c.js"></script></head><style type="text/css">body{background:#<?php echo isset($_GET['b'])?$_GET['b']:'fff';?>}.hf{border-bottom:#E6E6E6 1px solid;font-size:12px}.hfl{width:50px;}.hfr{margin:0 0 0 15px;width:<?php echo isset($_GET['r'])?$_GET['r']:'480';?>px}.hft{font-weight:700;font-size:14px;line-height:16px}.hfc{;font-size:14px;line-height:23px;padding:4px 0}.hfb{line-height:13.5px;color:#808080}.hfb .q{color:#C7AEC7}.hfb a{padding:0 5px}</style><body>
<?php$QC=mysql_connect('localhost',"Idvw03nvUs","eoEf20vdfDOe0");mysql_select_db('vv',$QC);mysql_query('set names utf8');$S=$_GET['f'];$V=$_GET['g'];$lid=isset($_GET['id'])?$_GET['id']:0;$nm=isset($_GET['en'])?$_GET['en']:30;$Qq=mysql_query('SELECT * FROM tw WHERE i>'.$lid.' AND (s='.$S.' AND v="'.$V.'") LIMIT 0,20');while($Qa=mysql_fetch_array($Qq)){echo '<div class="hf"><div class="p hfl"><img src="http://weigeti.com/ii/50/0.gif"/></div><div class="hfr p"><div class="hbt"><a href="#">',$Qa['a'],'</a></div><div class="hfc">',$Qa['f'],'</div><div class="hfb"><div class="p">',$Qa['t'],' ',$Qa['ipa'],'</div><div class="q"><a href="#">转发</a>|<a href="#">评论(',$Qa['x'],')</a></div></div></div><div class="o mh"></div></div>';}?><script>A();</script></body></html>