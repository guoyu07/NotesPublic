<?php
header("Content-Type:text/html;charset=GB2312");
$domain = $_GET['domain'];
$action = $_GET['action'];
$alexa['pm'] = $alexa['qs'] = $alexa['bl']= $alexa['cbh'] = $alexa['fname'] = $alexa['fpercent'] = $alexa['zp'] =$alexa['cpm']= array();
if($action == 'rangs'){
	$content = file_get_contents('http://www.alexa.com/data/details/traffic_details/'.$domain);	
	$pat1    = "/<td class=\"avg \">(.+)<\/td>/";//����
	if(preg_match_all($pat1, $content, $matches)){
		$a = explode('.',$matches[1][3]);	
		if($a[1]){
			$b = explode('.',$matches[1][2]);
			if($b[1]){		
			   array_push($alexa['pm'],'--','--',$matches[1][0],$matches[1][1]);
			}else{
			   array_push($alexa['pm'],'--',$matches[1][0],$matches[1][1],$matches[1][2]);
			}
		}else{
		   array_push($alexa['pm'],$matches[1][0],$matches[1][1],$matches[1][2],$matches[1][3]);
		}
	}
	$pat2 = "/(.+)<\/td><td class=\'arrow\'>/";	//�����仯����
	if(preg_match_all($pat2, $content, $matches2)){
		if($a[1]){		
			if($b[1]){		
			   array_push($alexa['qs'],'--','--',$matches2[1][0],$matches2[1][1]);
			}else{
			   array_push($alexa['qs'],'--',$matches2[1][0],$matches2[1][1],$matches2[1][2]);
			}
		}else{
		   for($j=0;$j<4;$j++){
			  array_push($alexa['qs'],$matches2[1][$j]);
		   }
		}	
	}
	for($i=0;$i<sizeof($alexa['qs']);$i++){
		if($alexa['qs'][$i]>0){
			$alexa['qs'][$i] = "<img src=images/Down_arrow.gif border=0><font color=#FF0000>".substr($alexa['qs'][$i],1)."</font>";
		}elseif($alexa['qs'][$i]<0){
			$alexa['qs'][$i] = "<img src=images/Up_arrow.gif border=0><font color=#329A02>".substr($alexa['qs'][$i],1)."</font>";
		}
	}
	echo $alexa['pm'][0].'|'.$alexa['qs'][0].'|'.$alexa['pm'][1].'|'.$alexa['qs'][1].'|'.$alexa['pm'][2].'|'.$alexa['qs'][2].'|'.$alexa['pm'][3].'|'.$alexa['qs'][3];exit;
}elseif($action == 'visits'){
	$content = file_get_contents('http://www.alexa.com/data/details/traffic_details/'.$domain);
	$content = iconv("UTF-8","GB2312",$content);
	$pat3 ="/<p class=\"tc1\" style=\"width:30%; text-align:right;\">(.+)<\/p>/";//�й�ҳ�������������վ���ʱ���
	if(preg_match_all($pat3, $content, $matches3)){
		for($k=0;$k<sizeof($matches3[0]);$k++){
			array_push($alexa['bl'],$matches3[0][$k]);
		}
	}
	$pat4 = "/alt=\"China Flag\"\/>(.+)<\/div>/s";//��������
	if(preg_match_all($pat4, $content, $matches4)){
		$a = explode(" ",$matches4[1][0]);
		$alexa['zp'] = array($a[0]);
	}
	$pat7 = "/<p class=\"tc1\" style=\"width:40%; text-align:right;\">(.+)<\/p>/Us";//��������
	if(preg_match_all($pat7, $content, $matches7)){
		for($j=0;$j<sizeof($matches7[0]);$j++){
		   array_push($alexa['cpm'],$matches7[0][$j]);
		}
	}
	$pat8 = "/<a href=\"\/topsites\/countries\/(.*)\">/Uis";//���ұ��
	if(preg_match_all($pat8, $content, $matches8)){
		for($j=0;$j<sizeof($alexa['cpm']);$j++){
		   array_push($alexa['cbh'],$matches8[1][$j]);
		}
	}
?>			
		<table width="780" cellspacing="0">
			<tr>
				<td class="project_left" id="Number">����/��������</td>
				<td class="project">����/��������</td>
				<td class="project">����/��������</td>
				<td class="project">��վ���ʱ���</td>
				<td class="project">ҳ���������</td>
			</tr>	
<?php
for($k=0;$k<sizeof($alexa['cpm']);$k++){
?>
	<tr>
		<td class="rank_left"><?php echo $a=$alexa['cbh'][$k]=='US'?'����':($alexa['cbh'][$k]=='IN'?'ӡ��':($alexa['cbh'][$k]=='CN'?'�й�':($alexa['cbh'][$k]=='DE'?'�¹�':($alexa['cbh'][$k]=='GB'?'Ӣ��':($alexa['cbh'][$k]=='BR'?'����':($alexa['cbh'][$k]=='IR'?'����':($alexa['cbh'][$k]=='JP'?'�ձ�':($alexa['cbh'][$k]=='IT'?'�����':($alexa['cbh'][$k]=='RU'?'����˹':($alexa['cbh'][$k]=='ID'?'ӡ��������':($alexa['cbh'][$k]=='CA'?'���ô�':($alexa['cbh'][$k]=='ES'?'������':($alexa['cbh'][$k]=='FR'?'����':($alexa['cbh'][$k]=='AU'?'�Ĵ�����':($alexa['cbh'][$k]=='PK'?'�ͻ�˹̹':($alexa['cbh'][$k]=='TR'?'������':($alexa['cbh'][$k]=='MX'?'ī����':($alexa['cbh'][$k]=='NL'?'����':($alexa['cbh'][$k]=='ZA'?'�Ϸ�':($alexa['cbh'][$k]=='SA'?'ɳ�ذ�����':($alexa['cbh'][$k]=='PL'?'����':($alexa['cbh'][$k]=='BD'?'�ϼ�����':($alexa['cbh'][$k]=='DZ'?'����������':($alexa['cbh'][$k]=='TH'?'̩��':($alexa['cbh'][$k]=='EG'?'����':($alexa['cbh'][$k]=='SE'?'���':($alexa['cbh'][$k]=='UA'?'�ڿ���':($alexa['cbh'][$k]=='GR'?'ϣ��':($alexa['cbh'][$k]=='HK'?'�������':($alexa['cbh'][$k]=='MO'?'��������':'����'))))))))))))))))))))))))))))));
 ?>
</td>
		<td class="rank"><?php echo $alexa['cbh'][$k]?></td>
		<td class="rank"><?php echo $alexa['cpm'][$k]?></td>
		<td class="rank">--</td>
		<td class="rank">--</td>
	</tr>
<?php
}
?>
</table>
<?php
}elseif($action == 'sonvisits'){
	$content = file_get_contents('http://www.alexa.com/data/details/traffic_details/'.$domain);
	$content = iconv("UTF-8","GB2312",$content);
	$pat5 = "/<p class=\"tc1\" style=\"width:70%\">([\w.+(\-.*)\w.+\.]+[a-z])<\/p>/";	//��������ַ
	if(preg_match_all($pat5, $content, $matches5)){
		for($i=0;$i<sizeof($matches5[0]);$i++){
		  array_push($alexa['fname'],$matches5[0][$i]);
		}
	}
	$pat6 = "/<p class=\"tc1\" style=\"width:30%; text-align:right;\">(.+)<\/p>/Us";//����ҳ����ʱ���
	if(preg_match_all($pat6, $content, $matches6)){
		for($j=0;$j<sizeof($alexa['fname'])+1;$j++){
		   array_push($alexa['fpercent'],$matches6[0][$j]);
		}
	}
?>
	<table width="780" cellspacing="0">
			<tr>
				<td class="project_left">��������ַ [<?php if(sizeof($alexa['fname'])>0) {$a = sizeof($alexa['fname'])+1;}else{$a = 0;} echo $a;?> ��]</td>
				<td class="project">������վ���ʱ���</td>
				<td class="project">����ҳ����ʱ���</td>
				<td class="project">�˾�ҳ�������</td>
			</tr>
<?php
for ($f=0;$f<sizeof($alexa['fname']);$f++){
?>
	<tr>
		<td class="rank_left"><?php echo $alexa['fname'][$f]?></td>
		<td class="rank"><font color="#FF0000">--</font></td>
		<td class="rank" align="center"><font color="#FF0000"><?php echo $alexa['fpercent'][$f]?></font></td>
		<td class="rank"><font color="#FF0000">--</font></td>
	</tr>
<?php
}
if(sizeof($alexa['fname'])>0){
	$m = sizeof($alexa['fname']);
?>
<tr>
		<td class="rank_left">OTHER</td>
		<td class="rank"><font color="#FF0000">--</font></td>
		<td class="rank" align="center"><font color="#FF0000"><?php echo $alexa['fpercent'][$m]?></font></td>
		<td class="rank"><font color="#FF0000">--</font></td>
	</tr>
<?php
}
?>
</table>
<?php
}
?>