<?php
$Qc=mysql_connect("localhost","wla1Ako","vgt1295EN");mysql_select_db("v3",$Qc);mysql_query("set names utf8");
$v=$_POST['v'];
if($v<11){

$I='';
for($i=0;$i<$v;++$i){ 

$x='v'.$i;
$I.='i='.$_POST[$x].' OR ';

}
$Qq=mysql_query('SELECT i,p,h FROM c WHERE '.$I.' i=0 LIMIT 0,'.$v);
while($Qa=mysql_fetch_array($Qq)){
$H=$Qa['h'];
echo '<a href="http://wuliu.v-get.com/',$Qa['i'],'" title="',$H,'" target="_blank"><img src="http://weigeti.com/i1/v3/200/',$Qa['p'],'.gif" alt="',$H,'"><br>',preg_replace('/^.+市/u','',$H),'</a>';

}
}
else {exit;}
?>