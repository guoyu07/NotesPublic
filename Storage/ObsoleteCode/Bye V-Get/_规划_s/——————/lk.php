<?php/*16进制转义+  == %2b/ ==%2f? ==%3f% ==%25# ==%23& == %36=  ==%3d使用urlencode就行了*/$r=$_SERVER['HTTP_REFERER'];$L=$_GET['l'];$L=urldecode($L);$R=parse_url($r);$d=$R['host'];$D=substr($d,-9);//未来要搭建商务搜索引擎，所以要学百度用302跳转if($D=='v-get.com'){header('location:http://'.$L);exit;}else {header('location:http://www.v-get.com');exit;}?>