<?php
$ROBOT['google']['name'] = '�ȸ�';
$ROBOT['google']['site_url'] = 'http://www.google.com/search?hl=zh-CN&q=site%3A';
$ROBOT['google']['site_pattern'] = "/���(.*) �����/";
$ROBOT['google']['link_url'] = 'http://www.google.com/search?hl=zh-CN&q=link%3A';
$ROBOT['google']['link_pattern'] = "/���(.*) �����/";

$ROBOT['baidu']['name'] = '�ٶ�';
$ROBOT['baidu']['site_url'] = 'http://www.baidu.com/s?wd=site%3A';
$ROBOT['baidu']['site_pattern'] = "/�ҵ������ҳ(.*)ƪ/";
$ROBOT['baidu']['link_url'] = 'http://www.baidu.com/s?wd=domain%3A';
$ROBOT['baidu']['link_pattern'] = "/�ҵ������ҳ(.*)ƪ/";

$ROBOT['yahoo']['name'] = '�Ż�';
$ROBOT['yahoo']['site_url'] = 'http://search.cn.yahoo.com/search?p=site%3A';
$ROBOT['yahoo']['site_pattern'] = "/�ҵ������ҳ(.*)��/";
$ROBOT['yahoo']['link_url'] = 'http://search.cn.yahoo.com/search?p=linkdomain%3A';
$ROBOT['yahoo']['link_pattern'] = "/�ҵ������ҳ(.*)��/";

$ROBOT['sogou']['name'] = '�ѹ�';
$ROBOT['sogou']['site_url'] = 'http://www.sogou.com/web?query=site%3A';
$ROBOT['sogou']['site_pattern'] = "/�ҵ� (.*) <!--resultbarnum:(.*)-->����ҳ/";;
$ROBOT['sogou']['link_url'] = 'http://www.sogou.com/web?query=link%3A';
$ROBOT['sogou']['link_pattern'] = "/�ҵ� (.*) <!--resultbarnum:(.*)-->����ҳ/";;

$ROBOT['so163']['name'] = '��Ӧ';
$ROBOT['so163']['site_url'] = 'http://cn.bing.com/search?q=site%3A';
$ROBOT['so163']['site_pattern'] = "/�� (.*) �����/";
$ROBOT['so163']['link_url'] = 'http://cn.bing.com/search?q=link%3A';
$ROBOT['so163']['link_pattern'] = "/�� (.*) �����/";

$ROBOT['vnet']['name'] = '�е�';
$ROBOT['vnet']['site_url'] = 'http://www.youdao.com/search?q=site%3A';
$ROBOT['vnet']['site_pattern'] = "/��(.*)�����/";
$ROBOT['vnet']['link_url'] = 'http://www.youdao.com/search?q=link%3A';
$ROBOT['vnet']['link_pattern'] = "/��(.*)�����/";

$ROBOT['soso']['name'] = '����';
$ROBOT['soso']['site_url'] = 'http://www.soso.com/q?w=site%3A';
$ROBOT['soso']['site_pattern'] = "/������(.*)����/";
$ROBOT['soso']['link_url'] = 'http://www.soso.com/q?w=link%3A';
$ROBOT['soso']['link_pattern'] = "/������(.*)����/";
?>