(function(){
$('cs').onsubmit=function(){var k=this.sk,v;v=k.value;if(T(v)){
F($p('+-&^%,.',''),function(r){v=$r(v,RegExp('\\'+r,'g'),' ');});
F([['襄樊','襄阳'],['礼陵','醴陵'],['拖运','托运'],['思茅','普洱'],['　',' ']],function(r){v=$r(v,RegExp(r[0],'g'),r[1]);});
v=$r(v,/\s+/g,' ');
v=$r(v,/(^\s*)|(\s*$)/g,'');
k.value=v;this.submit()}};
})();