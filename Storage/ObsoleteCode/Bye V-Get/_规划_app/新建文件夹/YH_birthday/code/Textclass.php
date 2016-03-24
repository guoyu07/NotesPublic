<?php 
class CtbClass { 
	var $file='list.txt'; 
	var $index; 
	//����һ���ļ���д������ 
	function null_write($new) 
	{ 
	$f=fopen($this->file,"w"); 
		flock($f,LOCK_EX); 
		fputs($f,$new); 
		fclose($f); 
	} 
	// ������ݼ�¼���ļ�ĩ�� 
	function add_write($new) { 
		$f=fopen($this->file,"a"); 
		flock($f,LOCK_EX); 
		fputs($f,$new); 
		fclose($f); 
	} 
	// ���readfile()�ķ���һ��ʹ��,��һ������ת��Ϊһά���� 
	function make_array($line) { 
		$array = explode("\x0E",$line); 
		return $array; 
	} 
	//��Ϊһά����ת��һ������ 
	function join_array($line) { 
		$array = join("\x0E",$line); 
		return $array; 
	} 
	// ���������ļ��������� 
	function getlines() { 
		$f=file($this->file); 
		return count($f); 
	} 
	// ������һ�е����ݼ�¼(����) 
	function next_line() { 
		$this->index=$this->index++; 
		return $this->get(); 
	} 
	// ������һ�е����ݼ�¼(����) 
	function prev_line() { 
		$this->index=$this->index--; 
		return $this->get(); 
	} 
	// ���ص�ǰ�е����ݼ�¼���ݽ�С 
	function get() { 
		$f=fopen($this->file,"r"); 
		flock($f,LOCK_SH); 
		for($i=0;$i<=$this->index;$i++) { 
			$rec=fgets($f,1024); 
		} 
		$line=explode("\x0E",$rec); 
		fclose($f); 
		return $line; 
	} 
	// ���ص�ǰ�е����ݼ�¼���ݽϴ� 
	function get_big_file() { 
		$f=fopen($this->file,"r"); 
		flock($f,LOCK_SH); 
		for($i=0;$i<=$this->index;$i++) { 
			$rec=fgets($f,1024*5); 
		} 
		$line=explode("\x0E",$rec); 
		fclose($f); 
		return $line; 
	} 
	// �������ļ�---��һά���鷵���ļ����� 
	function read_file() { 
		if (file_exists($this->file)) { 
			$line =file($this->file); 
		} 
	return $line; 
	} 
	// �������ļ�---�Զ�ά���鷵���ļ����� 
	function openFile() { 
		if (file_exists($this->file)) { 
			$f =file($this->file); 
			$lines = array(); 
			foreach ($f as $rawline) { 
			$tmpline = explode("\x0E",$rawline); 
			array_push($lines, $tmpline); 
			} 
		} 
		return $lines; 
	} 
	// ����һ������,�ϲ���һ������,��д�����ļ� 
	function overwrite($array){ 
		$newline = implode("\x0E",$array); 
		$f = fopen($this->file,"w"); 
		flock($f,LOCK_EX); 
		fputs($f,$newline); 
		fclose($f); 
	} 
	// ���һ�����ݼ�¼���ļ�ĩ�� 
	function add_line($array,$check_n=1) { 
		$s=implode("\x0E",$array); 
		$f=fopen($this->file,"a"); 
		flock($f,LOCK_EX); 
		fputs($f,$s); 
		if ($check_n==1) fputs($f,"\n"); 
		fclose($f); 
	} 
	// ����һ�����ݼ�¼���ļ���ǰ�� 
	function insert_line($array) { 
		$newfile = implode("\x0E",$array); 
		$f = fopen($this->file,"r"); 
		flock($f,LOCK_SH); 
		while ($line = fgets($f,1024)) { 
			$newfile .= $line; 
		} 
		fclose($f); 
		$f = fopen($this->file,"w"); 
		flock($f,LOCK_EX); 
		fputs($f,$newfile); 
		fclose($f); 
	} 
	// �������з������������ݼ�¼,������ÿ���ֽ����ݽϴ����� 
	function update($column,$query_string,$update_array) { 
		$update_string = implode("\x0E",$update_array); 
		$newfile = ""; 
		$fc=file($this->file); 
		$f=fopen($this->file,"r"); 
		flock($f,LOCK_SH); 
		for ($i=0;$i<count($fc);$i++) { 
			$list = explode("\x0E",$fc[$i]); 
			if ($list[$column] != $query_string) { 
				$newfile = $newfile.chop($fc[$i])."\n"; 
			} else { 
				$newfile = $newfile.$update_string; 
			} 
		} 
		fclose($f); 
		$f=fopen($this->file,"w"); 
		flock($f,LOCK_EX); 
		fputs($f,$newfile); 
		fclose($f); 
	} 
	// �������з������������ݼ�¼,������ÿ���ֽ����ݽ�С����� 
	function update2($column,$query_string,$update_array) { 
		$newline = implode("\x0E",$update_array); 
		$newfile = ""; 
		$f = fopen($this->file,"r"); 
		flock($f,LOCK_SH); 
		while ($line = fgets($f,1024)) { 
			$tmpLine = explode("\x0E",$line); 
			if ($tmpLine[$column] == $query_string) { 
				$newfile .= $newline; 
			} else { 
				$newfile .= $line; 
			} 
		} 
		fclose($f); 
		$f = fopen($this->file,"w"); 
		flock($f,LOCK_EX); 
		fputs($f,$newfile); 
		fclose($f); 
	} 
	// ɾ�����з������������ݼ�¼,������ÿ���ֽ����ݽϴ����� 
	function delete($column,$query_string) { 
		$newfile = ""; 
		$fc=file($this->file); 
		$f=fopen($this->file,"r"); 
		flock($f,LOCK_SH); 
		for ($i=0;$i<count($fc);$i++) { 
			$list = explode("\x0E",$fc[$i]); 
			if ($list[$column] != $query_string) { 
				$newfile = $newfile.chop($fc[$i])."\n"; 
			} 
		} 
		fclose($f); 
		$f=fopen($this->file,"w"); 
		flock($f,LOCK_EX); 
		fputs($f,$newfile); 
		fclose($f); 
	} 
	// ɾ�����з������������ݼ�¼,������ÿ���ֽ����ݽ�С����� 
	function delete2($column,$query_string){ 
		$newfile = ""; 
		$f = fopen($this->file,"r"); 
		flock($f,LOCK_SH); 
		while ($line = fgets($f,1024)) { 
			$tmpLine = explode("\x0E",$line); 
			if ($tmpLine[$column] != $query_string) { 
				$newfile .= $line; 
			} 
		} 
		fclose($f); 
		$f = fopen($this->file,"w"); 
		flock($f,LOCK_EX); 
		fputs($f,$newfile); 
		fclose($f); 
	} 
	//ȡ��һ���ļ���ĳ���ֶε����ֵ 
	function get_max_value($column) { 
		$tlines = file($this->file); 
		for ($i=0;$i<=count($tlines);$i++) { 
			$line=explode("\x0E",$tlines[$i]); 
			$get_value[]=$line[$column]; 
		} 
		$get_max_value = max($get_value); 
		return $get_max_value; 
	}
	
	// ���������ļ���ĳ���ֶ��Ƿ����$query_string���в�ѯ,�Զ�ά���鷵�����з������������� 
	function select($column, $query_string) { 
		$tline = $this->openfile(); 
		$lines = array(); 
		foreach ($tline as $line) { 
			if ($line[$column] == $query_string) { 
				array_push($lines, $line); 
			} 
		} 
		return $lines; 
	} 
	// ������function select()һ��,�ٶȿ����������� 
	function select2($column, $query_string) { 
		if (file_exists($this->file)) { 
			$tline = $this->read_file(); 
			foreach ($tline as $tmpLine) { 
				$line = $this->make_array($tmpLine); 
				if ($line[$column] == $query_string) { 
					$lines[]=$tmpLine; 
				} 
			} 
		} 
		return $lines; 
	} 
	// ���������ļ���ĳ���ֶ��Ƿ����$query_string���в�ѯ,��һά���鷵�ص�һ���������������� 
	function select_line($column, $query_string) { 
		$tline = $this->read_file(); 
		foreach ($tline as $tmpLine) { 
			$line = $this->make_array($tmpLine); 
			if ($line[$column] == $query_string) { 
				return $line; 
				break; 
			} 
		} 
	} 
	// select next/prev line(next_prev ==> 1/next, 2/prev) by cx 
	function select_next_prev_line($column, $query_string, $next_prev) { 
		$tline = $this->read_file(); 
		$line_key_end = count($tline) - 1; 
		$line_key = -1; 
		foreach ($tline as $tmpLine) { 
			$line_key++; 
			$line = $this->make_array($tmpLine); 
			if ($next_prev == 1) { // next? 
				if ($line[$column] == $query_string) { 
					if ($line_key == 0) { 
						return 0; 
					} else { 
						$line_key_up = $line_key - 1; 
						return $up_line; 
					} 
				} else { 
					$up_line = $line; 
				} 
			} elseif ($next_prev == 2) { // prev? 
				if ($line[$column] == $query_string) { 
					if ($line_key == $line_key_end) { 
						return 0; 
					} else { 
						$line_key_down = $line_key + 1; 
						break; 
					} 
				} 
			} else { 
				return 0; 
			} 
		} 
		$down_line = $this->make_array($tline[$line_key_down]); 
		return $down_line; 
	}

} 

$file=fopen('list.txt',"a+");
if($file == FALSE)exit('<font color=red>�޷��������ߴ�list.txt</font>');

function __urljudge($url){
	$suffixes="com|net|org|gov|biz|com.tw|com.hk|com.ru|net.tw|net.hk|net.ru|info|cn|com.cn|net.cn|org.cn|gov.cn|mobi|name|sh|ac|la|travel|tm|us|cc|tv|jobs|asia|hn|lc|hk|bz|com.hk|ws|tel|io|tw|ac.cn|bj.cn|sh.cn|tj.cn|cq.cn|he.cn|sx.cn|nm.cn|ln.cn|jl.cn|hl.cn|js.cn|zj.cn|ah.cn|fj.cn|jx.cn|sd.cn|ha.cn|hb.cn|hn.cn|gd.cn|gx.cn|hi.cn|sc.cn|gz.cn|yn.cn|xz.cn|sn.cn|gs.cn|qh.cn|nx.cn|xj.cn|tw.cn|hk.cn|mo.cn|org.hk";
	if(!eregi("^(www\.)?([A-Za-z0-9-])+\.($suffixes)$",$url)){
		echo "<script language='javascript'>alert('���������ַ�����Ϲ������������!');</script>";
		exit;
	}else {return $url;}
}

function get_real_ip(){
	$ip=false;
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
		for ($i = 0; $i < count($ips); $i++) {
			if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

$ip=get_real_ip();

$text_class=new CtbClass();

$date=mktime (date(H)-24, date(i), date(s), date(m), date(d), date(Y));

$history=$text_class->openFile();
for ($i=0;$i<count($history);$i++){
	if ($history[$i][2] < $date){
		$text_class->delete2(2,$history[$i][2]);
	}
}
?>
