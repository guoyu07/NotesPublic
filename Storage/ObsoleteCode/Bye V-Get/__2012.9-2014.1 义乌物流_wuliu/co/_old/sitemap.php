<?php
$Qc=mysql_connect('localhost','root','qwdw114');mysql_select_db('vwuliu',$Qc);mysql_query('set names utf8');
$lk=$_GET['l'];$LK=explode('.',$lk);$E=$LK[0];
$Qq=mysql_query('SELECT p,x FROM fi WHERE m="'.$E.'"');$Qr=mysql_num_rows($Qq);if($Qr==0){header('Location: http://wuliu.v-get.com/');exit();}
echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"><url><loc>http://',$E,'.wuliu.v-get.com/</loc><priority>0.9</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/</loc><priority>1</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/about.html</loc><priority>0.8</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/services.html</loc><priority>0.8</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/honor.html</loc><priority>0.8</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/certificate.html</loc><priority>0.8</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/exhibition.html</loc><priority>0.8</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/news.html</loc><priority>0.8</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/contact.html</loc><priority>0.8</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url><url><loc>http://',$E,'.wuliu.v-get.com/logistics/faq.html</loc><priority>0.8</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>monthly</changefreq></url>';

while($Qa=mysql_fetch_array($Qq)){echo '<url><loc>http://',$E,'.wuliu.v-get.com/logistics/exhibition.html?i=',$Qa['x'],'&amp;show=',$Qa['p'],'</loc><priority>0.5</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>yearly</changefreq></url>';}

$Qqn=mysql_query('SELECT i FROM news WHERE m="'.$E.'"');
while($Qan=mysql_fetch_array($Qqn)){echo '<url><loc>http://',$E,'.wuliu.v-get.com/logistics/news.html?view=',$Qan['i'],'</loc><priority>0.5</priority><lastmod>2013-03-03T03:33:33+08:00</lastmod><changefreq>yearly</changefreq></url>';}

echo '</urlset>';

?>