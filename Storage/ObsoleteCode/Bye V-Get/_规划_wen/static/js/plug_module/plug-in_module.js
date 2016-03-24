// jQuery.ScrollTo
(function(d){function h(b){return"object"==typeof b?b:{top:b,left:b}}var l=d.scrollTo=function(b,c,a){d(window).scrollTo(b,c,a)};l.defaults={axis:"xy",duration:1.3<=parseFloat(d.fn.jquery)?0:1,limit:!0};l.window=function(){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){if(this.nodeName&&-1==d.inArray(this.nodeName.toLowerCase(),["iframe","#document","html","body"]))return this;var b=(this.contentWindow||this).document||this.ownerDocument||this;return/webkit/i.test(navigator.userAgent)||
"BackCompat"==b.compatMode?b.body:b.documentElement})};d.fn.scrollTo=function(b,c,a){"object"==typeof c&&(a=c,c=0);"function"==typeof a&&(a={onAfter:a});"max"==b&&(b=9E9);a=d.extend({},l.defaults,a);c=c||a.duration;a.queue=a.queue&&1<a.axis.length;a.queue&&(c/=2);a.offset=h(a.offset);a.over=h(a.over);return this._scrollable().each(function(){function n(e){i.animate(f,c,a.easing,e&&function(){e.call(this,b,a)})}if(b){var j=this,i=d(j),e=b,m,f={},p=i.is("html,body");switch(typeof e){case "number":case "string":if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(e)){e=
h(e);break}e=d(e,this);if(!e.length)return;case "object":if(e.is||e.style)m=(e=d(e)).offset()}d.each(a.axis.split(""),function(b,d){var c=d=="x"?"Left":"Top",k=c.toLowerCase(),g="scroll"+c,h=j[g],o=l.max(j,d);if(m){f[g]=m[k]+(p?0:h-i.offset()[k]);if(a.margin){f[g]=f[g]-(parseInt(e.css("margin"+c))||0);f[g]=f[g]-(parseInt(e.css("border"+c+"Width"))||0)}f[g]=f[g]+(a.offset[k]||0);a.over[k]&&(f[g]=f[g]+e[d=="x"?"width":"height"]()*a.over[k])}else{c=e[k];f[g]=c.slice&&c.slice(-1)=="%"?parseFloat(c)/100*
o:c}a.limit&&/^\d+$/.test(f[g])&&(f[g]=f[g]<=0?0:Math.min(f[g],o));if(!b&&a.queue){h!=f[g]&&n(a.onAfterFirst);delete f[g]}});n(a.onAfter)}}).end()};l.max=function(b,c){var a="x"==c?"Width":"Height",h="scroll"+a;if(!d(b).is("html,body"))return b[h]-d(b)[a.toLowerCase()]();var a="client"+a,j=b.ownerDocument.documentElement,i=b.ownerDocument.body;return Math.max(j[h],i[h])-Math.min(j[a],i[a])}})(jQuery);

// fancyBox 2.1.4
(function(C,z,f,r){var q=f(C),n=f(z),b=f.fancybox=function(){b.open.apply(this,arguments)},H=navigator.userAgent.match(/msie/),w=null,s=z.createTouch!==r,t=function(a){return a&&a.hasOwnProperty&&a instanceof f},p=function(a){return a&&"string"===f.type(a)},F=function(a){return p(a)&&0<a.indexOf("%")},l=function(a,d){var e=parseInt(a,10)||0;d&&F(a)&&(e*=b.getViewport()[d]/100);return Math.ceil(e)},x=function(a,b){return l(a,b)+"px"};f.extend(b,{version:"2.1.4",defaults:{padding:15,margin:20,width:800,height:600,minWidth:100,minHeight:100,maxWidth:9999,maxHeight:9999,autoSize:!0,autoHeight:!1,autoWidth:!1,autoResize:!0,autoCenter:!s,fitToView:!0,aspectRatio:!1,topRatio:0.5,leftRatio:0.5,scrolling:"auto",wrapCSS:"",arrows:!0,closeBtn:!0,closeClick:!1,nextClick:!1,mouseWheel:!0,autoPlay:!1,playSpeed:3E3,preload:3,modal:!1,loop:!0,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},iframe:{scrolling:"auto",preload:!0},swf:{wmode:"transparent",allowfullscreen:"true",allowscriptaccess:"always"},keys:{next:{13:"left",34:"up",39:"left",40:"up"},prev:{8:"right",33:"down",37:"right",38:"down"},close:[27],play:[32],toggle:[70]},direction:{next:"left",prev:"right"},scrollOutside:!0,index:0,type:null,href:null,content:null,title:null,tpl:{wrap:'<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',image:'<img class="fancybox-image" src="{href}" alt="" />',iframe:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen'+(H?' allowtransparency="true"':"")+"></iframe>",error:'<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',closeBtn:'<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',next:'<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',prev:'<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'},openEffect:"fade",openSpeed:250,openEasing:"swing",openOpacity:!0,openMethod:"zoomIn",closeEffect:"fade",closeSpeed:250,closeEasing:"swing",closeOpacity:!0,closeMethod:"zoomOut",nextEffect:"elastic",nextSpeed:250,nextEasing:"swing",nextMethod:"changeIn",prevEffect:"elastic",prevSpeed:250,prevEasing:"swing",prevMethod:"changeOut",helpers:{overlay:!0,title:!0},onCancel:f.noop,beforeLoad:f.noop,afterLoad:f.noop,beforeShow:f.noop,afterShow:f.noop,beforeChange:f.noop,beforeClose:f.noop,afterClose:f.noop},group:{},opts:{},previous:null,coming:null,current:null,isActive:!1,isOpen:!1,isOpened:!1,wrap:null,skin:null,outer:null,inner:null,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,transitions:{},helpers:{},open:function(a,d){if(a&&(f.isPlainObject(d)||(d={}),!1!==b.close(!0)))return f.isArray(a)||(a=t(a)?f(a).get():[a]),f.each(a,function(e,c){var k={},g,h,j,m,l;"object"===f.type(c)&&(c.nodeType&&(c=f(c)),t(c)?(k={href:c.data("fancybox-href")||c.attr("href"),title:c.data("fancybox-title")||c.attr("title"),isDom:!0,element:c},f.metadata&&f.extend(!0,k,c.metadata())):k=c);g=d.href||k.href||(p(c)?c:null);h=d.title!==r?d.title:k.title||"";m=(j=d.content||k.content)?"html":d.type||k.type;!m&&k.isDom&&(m=c.data("fancybox-type"),m||(m=(m=c.prop("class").match(/fancybox\.(\w+)/))?m[1]:null));p(g)&&(m||(b.isImage(g)?m="image":b.isSWF(g)?m="swf":"#"===g.charAt(0)?m="inline":p(c)&&(m="html",j=c)),"ajax"===m&&(l=g.split(/\s+/,2),g=l.shift(),l=l.shift()));j||("inline"===m?g?j=f(p(g)?g.replace(/.*(?=#[^\s]+$)/,""):g):k.isDom&&(j=c):"html"===m?j=g:!m&&(!g&&k.isDom)&&(m="inline",j=c));f.extend(k,{href:g,type:m,content:j,title:h,selector:l});a[e]=k}),b.opts=f.extend(!0,{},b.defaults,d),d.keys!==r&&(b.opts.keys=d.keys?f.extend({},b.defaults.keys,d.keys):!1),b.group=a,b._start(b.opts.index)},cancel:function(){var a=b.coming;a&&!1!==b.trigger("onCancel")&&(b.hideLoading(),b.ajaxLoad&&b.ajaxLoad.abort(),b.ajaxLoad=null,b.imgPreload&&(b.imgPreload.onload=b.imgPreload.onerror=null),a.wrap&&a.wrap.stop(!0,!0).trigger("onReset").remove(),b.coming=null,b.current||b._afterZoomOut(a))},close:function(a){b.cancel();!1!==b.trigger("beforeClose")&&(b.unbindEvents(),b.isActive&&(!b.isOpen||!0===a?(f(".fancybox-wrap").stop(!0).trigger("onReset").remove(),b._afterZoomOut()):(b.isOpen=b.isOpened=!1,b.isClosing=!0,f(".fancybox-item, .fancybox-nav").remove(),b.wrap.stop(!0,!0).removeClass("fancybox-opened"),b.transitions[b.current.closeMethod]())))},play:function(a){var d=function(){clearTimeout(b.player.timer)},e=function(){d();b.current&&b.player.isActive&&(b.player.timer=setTimeout(b.next,b.current.playSpeed))},c=function(){d();f("body").unbind(".player");b.player.isActive=!1;b.trigger("onPlayEnd")};if(!0===a||!b.player.isActive&&!1!==a){if(b.current&&(b.current.loop||b.current.index<b.group.length-1))b.player.isActive=!0,f("body").bind({"afterShow.player onUpdate.player":e,"onCancel.player beforeClose.player":c,"beforeLoad.player":d}),e(),b.trigger("onPlayStart")}else c()},next:function(a){var d=b.current;d&&(p(a)||(a=d.direction.next),b.jumpto(d.index+1,a,"next"))},prev:function(a){var d=b.current;d&&(p(a)||(a=d.direction.prev),b.jumpto(d.index-1,a,"prev"))},jumpto:function(a,d,e){var c=b.current;c&&(a=l(a),b.direction=d||c.direction[a>=c.index?"next":"prev"],b.router=e||"jumpto",c.loop&&(0>a&&(a=c.group.length+a%c.group.length),a%=c.group.length),c.group[a]!==r&&(b.cancel(),b._start(a)))},reposition:function(a,d){var e=b.current,c=e?e.wrap:null,k;c&&(k=b._getPosition(d),a&&"scroll"===a.type?(delete k.position,c.stop(!0,!0).animate(k,200)):(c.css(k),e.pos=f.extend({},e.dim,k)))},update:function(a){var d=a&&a.type,e=!d||"orientationchange"===d;e&&(clearTimeout(w),w=null);b.isOpen&&!w&&(w=setTimeout(function(){var c=b.current;c&&!b.isClosing&&(b.wrap.removeClass("fancybox-tmp"),(e||"load"===d||"resize"===d&&c.autoResize)&&b._setDimension(),"scroll"===d&&c.canShrink||b.reposition(a),b.trigger("onUpdate"),w=null)},e&&!s?0:300))},toggle:function(a){b.isOpen&&(b.current.fitToView="boolean"===f.type(a)?a:!b.current.fitToView,s&&(b.wrap.removeAttr("style").addClass("fancybox-tmp"),b.trigger("onUpdate")),b.update())},hideLoading:function(){n.unbind(".loading");f("#fancybox-loading").remove()},showLoading:function(){var a,d;b.hideLoading();a=f('<div id="fancybox-loading"><div></div></div>').click(b.cancel).appendTo("body");n.bind("keydown.loading",function(a){if(27===(a.which||a.keyCode))a.preventDefault(),b.cancel()});b.defaults.fixed||(d=b.getViewport(),a.css({position:"absolute",top:0.5*d.h+d.y,left:0.5*d.w+d.x}))},getViewport:function(){var a=b.current&&b.current.locked||!1,d={x:q.scrollLeft(),y:q.scrollTop()};a?(d.w=a[0].clientWidth,d.h=a[0].clientHeight):(d.w=s&&C.innerWidth?C.innerWidth:q.width(),d.h=s&&C.innerHeight?C.innerHeight:q.height());return d},unbindEvents:function(){b.wrap&&t(b.wrap)&&b.wrap.unbind(".fb");n.unbind(".fb");q.unbind(".fb")},bindEvents:function(){var a=b.current,d;a&&(q.bind("orientationchange.fb"+(s?"":" resize.fb")+(a.autoCenter&&!a.locked?" scroll.fb":""),b.update),(d=a.keys)&&n.bind("keydown.fb",function(e){var c=e.which||e.keyCode,k=e.target||e.srcElement;if(27===c&&b.coming)return!1;!e.ctrlKey&&(!e.altKey&&!e.shiftKey&&!e.metaKey&&(!k||!k.type&&!f(k).is("[contenteditable]")))&&f.each(d,function(d,k){if(1<a.group.length&&k[c]!==r)return b[d](k[c]),e.preventDefault(),!1;if(-1<f.inArray(c,k))return b[d](),e.preventDefault(),!1})}),f.fn.mousewheel&&a.mouseWheel&&b.wrap.bind("mousewheel.fb",function(d,c,k,g){for(var h=f(d.target||null),j=!1;h.length&&!j&&!h.is(".fancybox-skin")&&!h.is(".fancybox-wrap");)j=h[0]&&!(h[0].style.overflow&&"hidden"===h[0].style.overflow)&&(h[0].clientWidth&&h[0].scrollWidth>h[0].clientWidth||h[0].clientHeight&&h[0].scrollHeight>h[0].clientHeight),h=f(h).parent();if(0!==c&&!j&&1<b.group.length&&!a.canShrink){if(0<g||0<k)b.prev(0<g?"down":"left");else if(0>g||0>k)b.next(0>g?"up":"right");d.preventDefault()}}))},trigger:function(a,d){var e,c=d||b.coming||b.current;if(c){f.isFunction(c[a])&&(e=c[a].apply(c,Array.prototype.slice.call(arguments,1)));if(!1===e)return!1;c.helpers&&f.each(c.helpers,function(d,e){e&&(b.helpers[d]&&f.isFunction(b.helpers[d][a]))&&(e=f.extend(!0,{},b.helpers[d].defaults,e),b.helpers[d][a](e,c))});f.event.trigger(a+".fb")}},isImage:function(a){return p(a)&&a.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp)((\?|#).*)?$)/i)},isSWF:function(a){return p(a)&&a.match(/\.(swf)((\?|#).*)?$/i)},_start:function(a){var d={},e,c;a=l(a);e=b.group[a]||null;if(!e)return!1;d=f.extend(!0,{},b.opts,e);e=d.margin;c=d.padding;"number"===f.type(e)&&(d.margin=[e,e,e,e]);"number"===f.type(c)&&(d.padding=[c,c,c,c]);d.modal&&f.extend(!0,d,{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,mouseWheel:!1,keys:null,helpers:{overlay:{closeClick:!1}}});d.autoSize&&(d.autoWidth=d.autoHeight=!0);"auto"===d.width&&(d.autoWidth=!0);"auto"===d.height&&(d.autoHeight=!0);d.group=b.group;d.index=a;b.coming=d;if(!1===b.trigger("beforeLoad"))b.coming=null;else{c=d.type;e=d.href;if(!c)return b.coming=null,b.current&&b.router&&"jumpto"!==b.router?(b.current.index=a,b[b.router](b.direction)):!1;b.isActive=!0;if("image"===c||"swf"===c)d.autoHeight=d.autoWidth=!1,d.scrolling="visible";"image"===c&&(d.aspectRatio=!0);"iframe"===c&&s&&(d.scrolling="scroll");d.wrap=f(d.tpl.wrap).addClass("fancybox-"+(s?"mobile":"desktop")+" fancybox-type-"+c+" fancybox-tmp "+d.wrapCSS).appendTo(d.parent||"body");f.extend(d,{skin:f(".fancybox-skin",d.wrap),outer:f(".fancybox-outer",d.wrap),inner:f(".fancybox-inner",d.wrap)});f.each(["Top","Right","Bottom","Left"],function(a,b){d.skin.css("padding"+b,x(d.padding[a]))});b.trigger("onReady");if("inline"===c||"html"===c){if(!d.content||!d.content.length)return b._error("content")}else if(!e)return b._error("href");"image"===c?b._loadImage():"ajax"===c?b._loadAjax():"iframe"===c?b._loadIframe():b._afterLoad()}},_error:function(a){f.extend(b.coming,{type:"html",autoWidth:!0,autoHeight:!0,minWidth:0,minHeight:0,scrolling:"no",hasError:a,content:b.coming.tpl.error});b._afterLoad()},_loadImage:function(){var a=b.imgPreload=new Image;a.onload=function(){this.onload=this.onerror=null;b.coming.width=this.width;b.coming.height=this.height;b._afterLoad()};a.onerror=function(){this.onload=this.onerror=null;b._error("image")};a.src=b.coming.href;!0!==a.complete&&b.showLoading()},_loadAjax:function(){var a=b.coming;b.showLoading();b.ajaxLoad=f.ajax(f.extend({},a.ajax,{url:a.href,error:function(a,e){b.coming&&"abort"!==e?b._error("ajax",a):b.hideLoading()},success:function(d,e){"success"===e&&(a.content=d,b._afterLoad())}}))},_loadIframe:function(){var a=b.coming,d=f(a.tpl.iframe.replace(/\{rnd\}/g,(new Date).getTime())).attr("scrolling",s?"auto":a.iframe.scrolling).attr("src",a.href);f(a.wrap).bind("onReset",function(){try{f(this).find("iframe").hide().attr("src","//about:blank").end().empty()}catch(a){}});a.iframe.preload&&(b.showLoading(),d.one("load",function(){f(this).data("ready",1);s||f(this).bind("load.fb",b.update);f(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();b._afterLoad()}));a.content=d.appendTo(a.inner);a.iframe.preload||b._afterLoad()},_preloadImages:function(){var a=b.group,d=b.current,e=a.length,c=d.preload?Math.min(d.preload,e-1):0,f,g;for(g=1;g<=c;g+=1)f=a[(d.index+g)%e],"image"===f.type&&f.href&&((new Image).src=f.href)},_afterLoad:function(){var a=b.coming,d=b.current,e,c,k,g,h;b.hideLoading();if(a&&!1!==b.isActive)if(!1===b.trigger("afterLoad",a,d))a.wrap.stop(!0).trigger("onReset").remove(),b.coming=null;else{d&&(b.trigger("beforeChange",d),d.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove());b.unbindEvents();e=a.content;c=a.type;k=a.scrolling;f.extend(b,{wrap:a.wrap,skin:a.skin,outer:a.outer,inner:a.inner,current:a,previous:d});g=a.href;switch(c){case "inline":case "ajax":case "html":a.selector?e=f("<div>").html(e).find(a.selector):t(e)&&(e.data("fancybox-placeholder")||e.data("fancybox-placeholder",f('<div class="fancybox-placeholder"></div>').insertAfter(e).hide()),e=e.show().detach(),a.wrap.bind("onReset",function(){f(this).find(e).length&&e.hide().replaceAll(e.data("fancybox-placeholder")).data("fancybox-placeholder",!1)}));break;case "image":e=a.tpl.image.replace("{href}",g);break;case "swf":e='<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="'+g+'"></param>',h="",f.each(a.swf,function(a,b){e+='<param name="'+a+'" value="'+b+'"></param>';h+=" "+a+'="'+b+'"'}),e+='<embed src="'+g+'" type="application/x-shockwave-flash" width="100%" height="100%"'+h+"></embed></object>"}(!t(e)||!e.parent().is(a.inner))&&a.inner.append(e);b.trigger("beforeShow");a.inner.css("overflow","yes"===k?"scroll":"no"===k?"hidden":k);b._setDimension();b.reposition();b.isOpen=!1;b.coming=null;b.bindEvents();if(b.isOpened){if(d.prevMethod)b.transitions[d.prevMethod]()}else f(".fancybox-wrap").not(a.wrap).stop(!0).trigger("onReset").remove();b.transitions[b.isOpened?a.nextMethod:a.openMethod]();b._preloadImages()}},_setDimension:function(){var a=b.getViewport(),d=0,e=!1,c=!1,e=b.wrap,k=b.skin,g=b.inner,h=b.current,c=h.width,j=h.height,m=h.minWidth,u=h.minHeight,n=h.maxWidth,v=h.maxHeight,s=h.scrolling,q=h.scrollOutside?h.scrollbarWidth:0,y=h.margin,p=l(y[1]+y[3]),r=l(y[0]+y[2]),z,A,t,D,B,G,C,E,w;e.add(k).add(g).width("auto").height("auto").removeClass("fancybox-tmp");y=l(k.outerWidth(!0)-k.width());z=l(k.outerHeight(!0)-k.height());A=p+y;t=r+z;D=F(c)?(a.w-A)*l(c)/100:c;B=F(j)?(a.h-t)*l(j)/100:j;if("iframe"===h.type){if(w=h.content,h.autoHeight&&1===w.data("ready"))try{w[0].contentWindow.document.location&&(g.width(D).height(9999),G=w.contents().find("body"),q&&G.css("overflow-x","hidden"),B=G.height())}catch(H){}}else if(h.autoWidth||h.autoHeight)g.addClass("fancybox-tmp"),h.autoWidth||g.width(D),h.autoHeight||g.height(B),h.autoWidth&&(D=g.width()),h.autoHeight&&(B=g.height()),g.removeClass("fancybox-tmp");c=l(D);j=l(B);E=D/B;m=l(F(m)?l(m,"w")-A:m);n=l(F(n)?l(n,"w")-A:n);u=l(F(u)?l(u,"h")-t:u);v=l(F(v)?l(v,"h")-t:v);G=n;C=v;h.fitToView&&(n=Math.min(a.w-A,n),v=Math.min(a.h-t,v));A=a.w-p;r=a.h-r;h.aspectRatio?(c>n&&(c=n,j=l(c/E)),j>v&&(j=v,c=l(j*E)),c<m&&(c=m,j=l(c/E)),j<u&&(j=u,c=l(j*E))):(c=Math.max(m,Math.min(c,n)),h.autoHeight&&"iframe"!==h.type&&(g.width(c),j=g.height()),j=Math.max(u,Math.min(j,v)));if(h.fitToView)if(g.width(c).height(j),e.width(c+y),a=e.width(),p=e.height(),h.aspectRatio)for(;(a>A||p>r)&&(c>m&&j>u)&&!(19<d++);)j=Math.max(u,Math.min(v,j-10)),c=l(j*E),c<m&&(c=m,j=l(c/E)),c>n&&(c=n,j=l(c/E)),g.width(c).height(j),e.width(c+y),a=e.width(),p=e.height();else c=Math.max(m,Math.min(c,c-(a-A))),j=Math.max(u,Math.min(j,j-(p-r)));q&&("auto"===s&&j<B&&c+y+q<A)&&(c+=q);g.width(c).height(j);e.width(c+y);a=e.width();p=e.height();e=(a>A||p>r)&&c>m&&j>u;c=h.aspectRatio?c<G&&j<C&&c<D&&j<B:(c<G||j<C)&&(c<D||j<B);f.extend(h,{dim:{width:x(a),height:x(p)},origWidth:D,origHeight:B,canShrink:e,canExpand:c,wPadding:y,hPadding:z,wrapSpace:p-k.outerHeight(!0),skinSpace:k.height()-j});!w&&(h.autoHeight&&j>u&&j<v&&!c)&&g.height("auto")},_getPosition:function(a){var d=b.current,e=b.getViewport(),c=d.margin,f=b.wrap.width()+c[1]+c[3],g=b.wrap.height()+c[0]+c[2],c={position:"absolute",top:c[0],left:c[3]};d.autoCenter&&d.fixed&&!a&&g<=e.h&&f<=e.w?c.position="fixed":d.locked||(c.top+=e.y,c.left+=e.x);c.top=x(Math.max(c.top,c.top+(e.h-g)*d.topRatio));c.left=x(Math.max(c.left,c.left+(e.w-f)*d.leftRatio));return c},_afterZoomIn:function(){var a=b.current;a&&(b.isOpen=b.isOpened=!0,b.wrap.css("overflow","visible").addClass("fancybox-opened"),b.update(),(a.closeClick||a.nextClick&&1<b.group.length)&&b.inner.css("cursor","pointer").bind("click.fb",function(d){!f(d.target).is("a")&&!f(d.target).parent().is("a")&&(d.preventDefault(),b[a.closeClick?"close":"next"]())}),a.closeBtn&&f(a.tpl.closeBtn).appendTo(b.skin).bind("click.fb",function(a){a.preventDefault();b.close()}),a.arrows&&1<b.group.length&&((a.loop||0<a.index)&&f(a.tpl.prev).appendTo(b.outer).bind("click.fb",b.prev),(a.loop||a.index<b.group.length-1)&&f(a.tpl.next).appendTo(b.outer).bind("click.fb",b.next)),b.trigger("afterShow"),!a.loop&&a.index===a.group.length-1?b.play(!1):b.opts.autoPlay&&!b.player.isActive&&(b.opts.autoPlay=!1,b.play()))},_afterZoomOut:function(a){a=a||b.current;f(".fancybox-wrap").trigger("onReset").remove();f.extend(b,{group:{},opts:{},router:!1,current:null,isActive:!1,isOpened:!1,isOpen:!1,isClosing:!1,wrap:null,skin:null,outer:null,inner:null});b.trigger("afterClose",a)}});b.transitions={getOrigPosition:function(){var a=b.current,d=a.element,e=a.orig,c={},f=50,g=50,h=a.hPadding,j=a.wPadding,m=b.getViewport();!e&&(a.isDom&&d.is(":visible"))&&(e=d.find("img:first"),e.length||(e=d));t(e)?(c=e.offset(),e.is("img")&&(f=e.outerWidth(),g=e.outerHeight())):(c.top=m.y+(m.h-g)*a.topRatio,c.left=m.x+(m.w-f)*a.leftRatio);if("fixed"===b.wrap.css("position")||a.locked)c.top-=m.y,c.left-=m.x;return c={top:x(c.top-h*a.topRatio),left:x(c.left-j*a.leftRatio),width:x(f+j),height:x(g+h)}},step:function(a,d){var e,c,f=d.prop;c=b.current;var g=c.wrapSpace,h=c.skinSpace;if("width"===f||"height"===f)e=d.end===d.start?1:(a-d.start)/(d.end-d.start),b.isClosing&&(e=1-e),c="width"===f?c.wPadding:c.hPadding,c=a-c,b.skin[f](l("width"===f?c:c-g*e)),b.inner[f](l("width"===f?c:c-g*e-h*e))},zoomIn:function(){var a=b.current,d=a.pos,e=a.openEffect,c="elastic"===e,k=f.extend({opacity:1},d);delete k.position;c?(d=this.getOrigPosition(),a.openOpacity&&(d.opacity=0.1)):"fade"===e&&(d.opacity=0.1);b.wrap.css(d).animate(k,{duration:"none"===e?0:a.openSpeed,easing:a.openEasing,step:c?this.step:null,complete:b._afterZoomIn})},zoomOut:function(){var a=b.current,d=a.closeEffect,e="elastic"===d,c={opacity:0.1};e&&(c=this.getOrigPosition(),a.closeOpacity&&(c.opacity=0.1));b.wrap.animate(c,{duration:"none"===d?0:a.closeSpeed,easing:a.closeEasing,step:e?this.step:null,complete:b._afterZoomOut})},changeIn:function(){var a=b.current,d=a.nextEffect,e=a.pos,c={opacity:1},f=b.direction,g;e.opacity=0.1;"elastic"===d&&(g="down"===f||"up"===f?"top":"left","down"===f||"right"===f?(e[g]=x(l(e[g])-200),c[g]="+=200px"):(e[g]=x(l(e[g])+200),c[g]="-=200px"));"none"===d?b._afterZoomIn():b.wrap.css(e).animate(c,{duration:a.nextSpeed,easing:a.nextEasing,complete:b._afterZoomIn})},changeOut:function(){var a=b.previous,d=a.prevEffect,e={opacity:0.1},c=b.direction;"elastic"===d&&(e["down"===c||"up"===c?"top":"left"]=("up"===c||"left"===c?"-":"+")+"=200px");a.wrap.animate(e,{duration:"none"===d?0:a.prevSpeed,easing:a.prevEasing,complete:function(){f(this).trigger("onReset").remove()}})}};b.helpers.overlay={defaults:{closeClick:!0,speedOut:200,showEarly:!0,css:{},locked:!s,fixed:!0},overlay:null,fixed:!1,create:function(a){a=f.extend({},this.defaults,a);this.overlay&&this.close();this.overlay=f('<div class="fancybox-overlay"></div>').appendTo("body");this.fixed=!1;a.fixed&&b.defaults.fixed&&(this.overlay.addClass("fancybox-overlay-fixed"),this.fixed=!0)},open:function(a){var d=this;a=f.extend({},this.defaults,a);this.overlay?this.overlay.unbind(".overlay").width("auto").height("auto"):this.create(a);this.fixed||(q.bind("resize.overlay",f.proxy(this.update,this)),this.update());a.closeClick&&this.overlay.bind("click.overlay",function(a){f(a.target).hasClass("fancybox-overlay")&&(b.isActive?b.close():d.close())});this.overlay.css(a.css).show()},close:function(){f(".fancybox-overlay").remove();q.unbind("resize.overlay");this.overlay=null;!1!==this.margin&&(f("body").css("margin-right",this.margin),this.margin=!1);this.el&&this.el.removeClass("fancybox-lock")},update:function(){var a="100%",b;this.overlay.width(a).height("100%");H?(b=Math.max(z.documentElement.offsetWidth,z.body.offsetWidth),n.width()>b&&(a=n.width())):n.width()>q.width()&&(a=n.width());this.overlay.width(a).height(n.height())},onReady:function(a,b){f(".fancybox-overlay").stop(!0,!0);this.overlay||(this.margin=n.height()>q.height()||"scroll"===f("body").css("overflow-y")?f("body").css("margin-right"):!1,this.el=z.all&&!z.querySelector?f("html"):f("body"),this.create(a));a.locked&&this.fixed&&(b.locked=this.overlay.append(b.wrap),b.fixed=!1);!0===a.showEarly&&this.beforeShow.apply(this,arguments)},beforeShow:function(a,b){b.locked&&(this.el.addClass("fancybox-lock"),!1!==this.margin&&f("body").css("margin-right",l(this.margin)+b.scrollbarWidth));this.open(a)},onUpdate:function(){this.fixed||this.update()},afterClose:function(a){this.overlay&&!b.isActive&&this.overlay.fadeOut(a.speedOut,f.proxy(this.close,this))}};b.helpers.title={defaults:{type:"float",position:"bottom"},beforeShow:function(a){var d=b.current,e=d.title,c=a.type;f.isFunction(e)&&(e=e.call(d.element,d));if(p(e)&&""!==f.trim(e)){d=f('<div class="fancybox-title fancybox-title-'+c+'-wrap">'+e+"</div>");switch(c){case "inside":c=b.skin;break;case "outside":c=b.wrap;break;case "over":c=b.inner;break;default:c=b.skin,d.appendTo("body"),H&&d.width(d.width()),d.wrapInner('<span class="child"></span>'),b.current.margin[2]+=Math.abs(l(d.css("margin-bottom")))}d["top"===a.position?"prependTo":"appendTo"](c)}}};f.fn.fancybox=function(a){var d,e=f(this),c=this.selector||"",k=function(g){var h=f(this).blur(),j=d,k,l;!g.ctrlKey&&(!g.altKey&&!g.shiftKey&&!g.metaKey)&&!h.is(".fancybox-wrap")&&(k=a.groupAttr||"data-fancybox-group",l=h.attr(k),l||(k="rel",l=h.get(0)[k]),l&&(""!==l&&"nofollow"!==l)&&(h=c.length?f(c):e,h=h.filter("["+k+'="'+l+'"]'),j=h.index(this)),a.index=j,!1!==b.open(h,a)&&g.preventDefault())};a=a||{};d=a.index||0;!c||!1===a.live?e.unbind("click.fb-start").bind("click.fb-start",k):n.undelegate(c,"click.fb-start").delegate(c+":not('.fancybox-item, .fancybox-nav')","click.fb-start",k);this.filter("[data-fancybox-start=1]").trigger("click");return this};n.ready(function(){f.scrollbarWidth===r&&(f.scrollbarWidth=function(){var a=f('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),b=a.children(),b=b.innerWidth()-b.height(99).innerWidth();a.remove();return b});if(f.support.fixedPosition===r){var a=f.support,d=f('<div style="position:fixed;top:20px;"></div>').appendTo("body"),e=20===d[0].offsetTop||15===d[0].offsetTop;d.remove();a.fixedPosition=e}f.extend(b.defaults,{scrollbarWidth:f.scrollbarWidth(),fixed:f.support.fixedPosition,parent:f("body")})})})(window,document,jQuery);

(function(e){var d=e.fancybox;d.helpers.buttons={defaults:{skipSingle:!1,position:"top",tpl:'<div id="fancybox-buttons"><ul><li><a class="btnPrev" title="上一张" href="javascript:;"></a></li><li><a class="btnPlay" title="自动播放" href="javascript:;"></a></li><li><a class="btnNext" title="下一张" href="javascript:;"></a></li><li><a class="btnToggle" title="切换尺寸" href="javascript:;"></a></li><li><a class="btnClose" title="关闭" href="javascript:jQuery.fancybox.close();"></a></li></ul></div>'},
list:null,buttons:null,beforeLoad:function(c,a){c.skipSingle&&2>a.group.length?(a.helpers.buttons=!1,a.closeBtn=!0):a.margin["bottom"===c.position?2:0]+=30},onPlayStart:function(){this.buttons&&this.buttons.play.attr("title","Pause slideshow").addClass("btnPlayOn")},onPlayEnd:function(){this.buttons&&this.buttons.play.attr("title","Start slideshow").removeClass("btnPlayOn")},afterShow:function(c,a){var b=this.buttons;b||(this.list=e(c.tpl).addClass(c.position).appendTo("body"),b={prev:this.list.find(".btnPrev").click(d.prev),
next:this.list.find(".btnNext").click(d.next),play:this.list.find(".btnPlay").click(d.play),toggle:this.list.find(".btnToggle").click(d.toggle)});0<a.index||a.loop?b.prev.removeClass("btnDisabled"):b.prev.addClass("btnDisabled");a.loop||a.index<a.group.length-1?(b.next.removeClass("btnDisabled"),b.play.removeClass("btnDisabled")):(b.next.addClass("btnDisabled"),b.play.addClass("btnDisabled"));this.buttons=b;this.onUpdate(c,a)},onUpdate:function(c,a){var b;this.buttons&&(b=this.buttons.toggle.removeClass("btnDisabled btnToggleOn"),
a.canShrink?b.addClass("btnToggleOn"):a.canExpand||b.addClass("btnDisabled"))},beforeClose:function(){this.list&&this.list.remove();this.buttons=this.list=null}}})(jQuery);

// jQuery.Cookie
(function(e,h,i){function j(b){return b}function k(b){return decodeURIComponent(b.replace(l," "))}var l=/\+/g,d=e.cookie=function(b,c,a){if(c!==i){a=e.extend({},d.defaults,a);null===c&&(a.expires=-1);if("number"===typeof a.expires){var f=a.expires,g=a.expires=new Date;g.setDate(g.getDate()+f)}c=d.json?JSON.stringify(c):String(c);return h.cookie=[encodeURIComponent(b),"=",d.raw?c:encodeURIComponent(c),a.expires?"; expires="+a.expires.toUTCString():"",a.path?"; path="+a.path:"",a.domain?"; domain="+
a.domain:"",a.secure?"; secure":""].join("")}c=d.raw?j:k;a=h.cookie.split("; ");for(f=0;g=a[f]&&a[f].split("=");f++)if(c(g.shift())===b)return b=c(g.join("=")),d.json?JSON.parse(b):b;return null};d.defaults={};e.removeCookie=function(b,c){return null!==e.cookie(b)?(e.cookie(b,null,c),!0):!1}})(jQuery,document);

// LocationSelect.js
var com={elfvision:{}};com.elfvision.kit={};com.elfvision.kit.LocationSelect={};com.elfvision.ajax={};com.elfvision.DEBUG=!1;(function(){var f,k,m,g,n,w,x,q,r,s,t,c,y,u,l,z,h;if(com.elfvision.DEBUG){var B=(new Date).getTime();c=function(){for(var a=0,b=arguments.length,d=["[DEBUG at ",(new Date).getTime()-B," ] : "];a<b;a++)d.push(arguments[a]);void 0!==window.console&&"function"==typeof window.console.log&&console.log.apply(console,d)}}else c=function(){};u=function(a,b){return function(){b.apply(a,arguments)}};y=function(a,b,d,e){c("attaching event",b,"on the object",a);var j=function(b){d.apply(e||a,[b])};void 0!==window.jQuery?jQuery(a).bind(b,j):document.addEventListener?a.addEventListener(b,j,!1):document.attachEvent&&(j=function(b){b||(b=window.event);d.apply(e||a,[{_event:b,type:b.type,target:b.srcElement,currentTarget:a,relatedTarget:b.fromElement?b.fromElement:b.toElement,eventPhase:b.srcElement==a?2:3,clientX:b.clientX,clientY:b.clientY,screenX:b.screenX,screenY:b.screenY,altKey:b.altKey,ctrlKey:b.ctrlKey,shiftKey:b.shiftKey,charCode:b.keyCode,stopPropagation:function(){this._event.cancelBubble=!0},preventDefault:function(){this._event.returnValue=!1}}])},a.attachEvent("on"+b,j))};var p,A=[function(){return new XMLHttpRequest},function(){return new ActiveXObject("Msxml2.XMLHTTP")},function(){return new ActiveXObject("Msxml3.XMLHTTP")},function(){return new ActiveXObject("Microsoft.XMLHTTP")}];q={create:function(){if(p)return p();for(var a=0;a<A.length;a++)try{var b=A[a],d=b();if(d)return p=b,d}catch(c){}p=function(){throw Error("XMLHttpRequest not supported");};p()}};r=function(a){if(!a.url)throw Error("getJson : Must provide url for the request!");var b=q.create();b.onreadystatechange=function(){c("Request Object ",b);if(4==b.readyState&&(200==b.status||0===b.status))if(c("JSON is successfully retrived according to ",a),a.callback){c("about to parse json");var d=JSON.parse(b.responseText);c("parsed ",d);a.callback.call(this,d)}};b.open("GET",a.url,!0);b.setRequestHeader("Cache-Control","max-age=0,no-cache,no-store,post-check=0,pre-check=0");b.setRequestHeader("Expires","Mon, 26 Jul 1997 05:00:00 GMT");b.send(null)};s=function(a,b){var d=document.createElement("script"),c,j;b&&(c=/callback=(\w+)&*/,j=c.exec(a)[1],window[j]=function(a){b(a);window[j]=null});d.src=a;document.getElementsByTagName("head")[0].appendChild(d)};t=function(a,b){var d=document.createElement("script");d.src=a;c("getting script",a);b&&(d.onload=b,d.onreadystatechange=function(){(4==d.readyState||"loaded"==d.readyState||"complete"==d.readyState)&&b()});document.getElementsByTagName("head")[0].appendChild(d)};h=function(a,b){if(Array.prototype.forEach)return Array.prototype.forEach.call(a,b);var d=a.length>>>0;if("function"!=typeof b)throw new TypeError;for(var c=0;c<d;c++)c in a&&b.call(b,a[c],c,this)};z=function(a){if(a&&"object"===typeof a&&a.constructor===Array)return!0};l=function(){this.observers=[];this.guid=0};l.prototype.subscribe=function(a){var b=this.guid++;this.observers[b]=a;return b};l.prototype.unSubscribe=function(a){delete this.observers[a]};l.prototype.notify=function(a){for(var b in this.observers){var d=this.observers[b];d instanceof Function?d.call(this,a):d.update.call(this,a)}};f=function(a){this.onRowsInserted=new l;this.onRowsRemoved=new l;this.onRowsUpdated=new l;this.onSelectedIndexChanged=new l;this.items=[];this.selectedIndex=0;this.level=a.level||0;this.label=a.label||"Select..."};f.prototype.read=function(a){return a?(c("reading items["+a+"]:",this.items[a]),this.items[a]):this.items};f.prototype.insert=function(a){z(a)?(a=[a],this.items=this.items.concat(a)):this.items.push(a);this.onRowsInserted.notify({source:this,items:a})};f.prototype.remove=function(a){var b;a?h(this.items,function(d,c){d.id===a&&(b=d,this.items.splice(c,1))}):this.items=[];c("notifying removing");this.onRowsRemoved.notify({source:this,items:[b]})};f.prototype.update=function(a){a=a||[];c("updating list model with ",a);this.items=[{id:0,text:this.label}].concat(a);c("notifying updating");this.onRowsUpdated.notify({source:this,items:a})};f.prototype.getSelectedIndex=function(){return this.selectedIndex};f.prototype.setSelectedIndex=function(a){var b=this.getSelectedIndex();b!==a&&(this.selectedIndex=a,c("notifying index changed",a),this.onSelectedIndexChanged.notify({source:this,previous:b,present:a,previousItem:this.read(b),presentItem:this.read(a),level:this.level}))};k=function(a){this.model=a.model;this.controller=a.controller;this.element=a.element;a=u(this,this.rebuildList);var b=u(this.controller.parent,this.controller.parent.update);this.model.onRowsInserted.subscribe(a);this.model.onRowsRemoved.subscribe(a);this.model.onRowsUpdated.subscribe(a);this.model.onSelectedIndexChanged.subscribe(b);c("this list item",this);y(this.element,"change",this.controller.updateSelectedIndex,this.controller)};k.prototype.show=function(){this.element.style.display="inline-block"};k.prototype.hide=function(){this.element.style.display="none"};k.prototype.rebuildList=function(a){if(a&&a.present&&0===a.present)this.elements.list.selectedIndex=0;else{c("Rebuilding list ",this);var b=this.element;a=this.model.read();var d;b.innerHTML="";c(a.length);h(a,function(a){d=new Option;d.setAttribute("value",a.id?a.text:"");d.appendChild(document.createTextNode(a.text));b.appendChild(d)});this.model.setSelectedIndex(0)}};m=function(a){this.parent=a.parent;this.model=new f({level:a.level,label:a.label});this.view=new k({model:this.model,controller:this,element:a.element})};m.prototype.refresh=function(a){c("refresh data with ",a);this.model.update(a)};m.prototype.updateSelectedIndex=function(a){this.model.setSelectedIndex(a.target.selectedIndex)};m.prototype.selectByText=function(a){var b=this;h(this.model.read(),function(d,e){d.text.match("^"+a)==a&&(c("auto detected ",d,e),b.model.setSelectedIndex(e),b.view.element.selectedIndex=e)})};m.prototype.selectByID=function(a){var b=this;h(this.model.read(),function(d,e){d.id.toString().match("^"+a)==a&&(c("auto detected ",d,e),b.model.setSelectedIndex(e),b.view.element.selectedIndex=e)})};m.prototype.getValue=function(){return this.model.read(this.model.getSelectedIndex()).text};g=function(a){this.labels=a.labels;this.currentGeo={};this.lists=[];this.elements=a.elements;this.parent=a.parent};g.prototype.init=function(){c("init select group");for(var a=0,b=this.labels.length;a<b;a++)this.lists.push(new m({label:this.labels[a],element:this.elements[a],level:a,parent:this}));c("lists built ",this);c(this.parent.listHelper.find(-1));this.lists[0].refresh(this.parent.listHelper.find(-1));this.lists[0].view.show()};g.prototype.update=function(a){if(a.level!=this.lists.length-1)if(c("Updating SelectGroup contents",this),0===a.present){a=a.level+1;for(var b=this.lists.length;a<b;a++)this.lists[a].refresh(),this.lists[a].view.hide()}else{switch(a.level){case 0:this.currentGeo.province=a.presentItem.text;break;case 1:this.currentGeo.city=a.presentItem.text;break;case 2:this.currentGeo.district=a.presentItem.text}this.lists[a.level+1].refresh(this.parent.listHelper.find(a.level,a.presentItem.id));this.lists[a.level+1].view.show()}};g.prototype.setValues=function(a){c("setting group values",a);var b=this;h(a,function(a,c){a&&b.lists[c].selectByText(a)})};g.prototype.setValuesID=function(a){c("setting group values",a);var b=this;h(a,function(a,c){a&&b.lists[c].selectByID(a)})};g.prototype.setValuesCode=function(a){c("setting group values",a);var b=this;h(a,function(a,c){a&&b.lists[c].selectByText(a)})};g.prototype.getValues=function(){var a=[];h(this.lists,function(b){a.push(b.getValue())});return a};n=function(a){this.detectGeoLocation=void 0===a.detectGeoLocation?!0:a.detectGeoLocation;this.detector=a.detector||w;this.listHelper=a.listHelper||x.getInstance({dataUrl:a.dataUrl});this.selectGroup=new g({parent:this,labels:a.labels,elements:a.elements});var b=this;this.listHelper.fetch(function(){c("exec fetech callback");b.selectGroup.init();b.detectGeoLocation&&b.detector()})};n.prototype.report=function(){return this.selectGroup.getValues()};n.prototype.select=function(a){this.selectGroup.setValues(a)};n.prototype.selectID=function(a){this.selectGroup.setValuesID(a)};w=function(){c("Detect!!!!");var a=this,b;t("http://j.maxmind.com/app/geoip.js",function(){c("Maxmind API Loaded!");b="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20json%20where%0A%20%20url%3D%22http%3A%2F%2Fmaps.google.com%2Fmaps%2Fapi%2Fgeocode%2Fjson%3Flatlng%3D"+geoip_latitude()+"%2C"+geoip_longitude()+"%26sensor%3Dfalse%26language%3Dzh-CN%22&format=json&diagnostics=true&callback=locationselectcb";s(b,function(b){c("Geocoder Request Completed through YQL ",b);if("OK"===b.query.results.json.status){b=b.query.results.json.results[0].address_components;var e,j;c("Geocoder statuts ok",b);h(b,function(a){var b=a.types[0];"locality"===b?e=a.long_name:"administrative_area_level_1"===b&&(j=a.long_name)});a.select([j,e])}})})};var v;x={getInstance:function(a){if(!v){var b=a.dataUrl||"js/areas.js",d,e={};d={get:function(a){return e[a]},set:function(a,b){e[a]=b}};v={fetch:function(a){c("feteching areas data");r({url:b,callback:function(b){c("area data : ",b);d.set("province",b.province);d.set("city",b.city);d.set("district",b.district);a()}})},find:function(a,b){var e=[];c("querying by record id : ",b,"by list in level : ",a);if(d.get(b))c("lucky! we have it cached"),e=d.get(b);else if(c("finding it in areas data"),-1===a)c("this is a query for province data"),e=d.get("province");else{var f=b.toString().substring(0,2*(a+1)),k=RegExp("^"+f+"\\d*"),g=0===a?d.get("city"):d.get("district");h(g,function(a,b){k.test(a.id)&&e.push(g[b])})}c("Return results : ",e);return e}}}return v}};com.elfvision.kit.LocationSelect=n;com.elfvision.ajax.XhrFactory=q;com.elfvision.ajax.getJson=r;com.elfvision.ajax.jsonp=s;com.elfvision.ajax.getScript=t})();void 0!==window.jQuery&&($.LocationSelect={build:function(f){var k;f.elements=this.get();k=new com.elfvision.kit.LocationSelect(f);$.LocationSelect.all[f.name]=k;return this}},$.LocationSelect.all={},$.fn.LocationSelect=$.LocationSelect.build);

// AJAX Uploader

var _ajax_uploader = _ajax_uploader || {};

/**
 * Adds all missing properties from second obj to first obj
 */ 
_ajax_uploader.extend = function(first, second) {
	
    for (var prop in second){
        first[prop] = second[prop];
    }
};  

/**
 * Searches for a given element in the array, returns -1 if it is not present.
 * @param {Number} [from] The index at which to begin the search
 */
_ajax_uploader.indexOf = function(arr, elt, from){
    if (arr.indexOf) return arr.indexOf(elt, from);
    
    from = from || 0;
    var len = arr.length;    
    
    if (from < 0) from += len;  

    for (; from < len; from++){  
        if (from in arr && arr[from] === elt){  
            return from;
        }
    }  
    return -1;  
}; 
    
_ajax_uploader.getUniqueId = (function(){
    var id = 0;
    return function(){ return id++; };
})();

//
// Events

_ajax_uploader.attach = function(element, type, fn){
    if (element.addEventListener){
        element.addEventListener(type, fn, false);
    } else if (element.attachEvent){
        element.attachEvent('on' + type, fn);
    }
};
_ajax_uploader.detach = function(element, type, fn){
    if (element.removeEventListener){
        element.removeEventListener(type, fn, false);
    } else if (element.attachEvent){
        element.detachEvent('on' + type, fn);
    }
};

_ajax_uploader.preventDefault = function(e){
    if (e.preventDefault){
        e.preventDefault();
    } else{
        e.returnValue = false;
    }
};

//
// Node manipulations

/**
 * Insert node a before node b.
 */
_ajax_uploader.insertBefore = function(a, b){
    b.parentNode.insertBefore(a, b);
};
_ajax_uploader.remove = function(element){
    element.parentNode.removeChild(element);
};

_ajax_uploader.contains = function(parent, descendant){       
    // compareposition returns false in this case
    if (parent == descendant) return true;
    
    if (parent.contains){
        return parent.contains(descendant);
    } else {
        return !!(descendant.compareDocumentPosition(parent) & 8);
    }
};

/**
 * Creates and returns element from html string
 * Uses innerHTML to create an element
 */
_ajax_uploader.toElement = (function(){
    var div = document.createElement('div');
    return function(html){
        div.innerHTML = html;
        var element = div.firstChild;
        div.removeChild(element);
        return element;
    };
})();

//
// Node properties and attributes

/**
 * Sets styles for an element.
 * Fixes opacity in IE6-8.
 */
_ajax_uploader.css = function(element, styles){
    if (styles.opacity != null){
        if (typeof element.style.opacity != 'string' && typeof(element.filters) != 'undefined'){
            styles.filter = 'alpha(opacity=' + Math.round(100 * styles.opacity) + ')';
        }
    }
    _ajax_uploader.extend(element.style, styles);
};
_ajax_uploader.hasClass = function(element, name){
    var re = new RegExp('(^| )' + name + '( |$)');
    return re.test(element.className);
};
_ajax_uploader.addClass = function(element, name){
    if (!_ajax_uploader.hasClass(element, name)){
        element.className += ' ' + name;
    }
};
_ajax_uploader.removeClass = function(element, name){
    var re = new RegExp('(^| )' + name + '( |$)');
    element.className = element.className.replace(re, ' ').replace(/^\s+|\s+$/g, "");
};
_ajax_uploader.setText = function(element, text){
    element.innerText = text;
    element.textContent = text;
};
_ajax_uploader.setHTML = function(element, html){
    element.innerHTML = html;
};

//
// Selecting elements

_ajax_uploader.children = function(element){
    var children = [],
    child = element.firstChild;

    while (child){
        if (child.nodeType == 1){
            children.push(child);
        }
        child = child.nextSibling;
    }

    return children;
};

_ajax_uploader.getByClass = function(element, className){
    if (element.querySelectorAll){
        return element.querySelectorAll('.' + className);
    }

    var result = [];
    var candidates = element.getElementsByTagName("*");
    var len = candidates.length;

    for (var i = 0; i < len; i++){
        if (_ajax_uploader.hasClass(candidates[i], className)){
            result.push(candidates[i]);
        }
    }
    return result;
};

/**
 * obj2url() takes a json-object as argument and generates
 * a querystring. pretty much like jQuery.param()
 * 
 * how to use:
 *
 *    `_ajax_uploader.obj2url({a:'b',c:'d'},'http://any.url/upload?otherParam=value');`
 *
 * will result in:
 *
 *    `http://any.url/upload?otherParam=value&a=b&c=d`
 *
 * @param  Object JSON-Object
 * @param  String current querystring-part
 * @return String encoded querystring
 */
_ajax_uploader.obj2url = function(obj, temp, prefixDone){
    var uristrings = [],
        prefix = '&',
        add = function(nextObj, i){
            var nextTemp = temp 
                ? (/\[\]$/.test(temp)) // prevent double-encoding
                   ? temp
                   : temp+'['+i+']'
                : i;
            if ((nextTemp != 'undefined') && (i != 'undefined')) {  
                uristrings.push(
                    (typeof nextObj === 'object') 
                        ? _ajax_uploader.obj2url(nextObj, nextTemp, true)
                        : (Object.prototype.toString.call(nextObj) === '[object Function]')
                            ? encodeURIComponent(nextTemp) + '=' + encodeURIComponent(nextObj())
                            : encodeURIComponent(nextTemp) + '=' + encodeURIComponent(nextObj)                                                          
                );
            }
        }; 

    if (!prefixDone && temp) {
      prefix = (/\?/.test(temp)) ? (/\?$/.test(temp)) ? '' : '&' : '?';
      uristrings.push(temp);
      uristrings.push(_ajax_uploader.obj2url(obj));
    } else if ((Object.prototype.toString.call(obj) === '[object Array]') && (typeof obj != 'undefined') ) {
        // we wont use a for-in-loop on an array (performance)
        for (var i = 0, len = obj.length; i < len; ++i){
            add(obj[i], i);
        }
    } else if ((typeof obj != 'undefined') && (obj !== null) && (typeof obj === "object")){
        // for anything else but a scalar, we will use for-in-loop
        for (var i in obj){
            add(obj[i], i);
        }
    } else {
        uristrings.push(encodeURIComponent(temp) + '=' + encodeURIComponent(obj));
    }

    return uristrings.join(prefix)
                     .replace(/^&/, '')
                     .replace(/%20/g, '+'); 
};

//
//
// Uploader Classes
//
//
	
var _ajax_uploader = _ajax_uploader || {};
  
/**
 * Creates upload button, validates upload, but doesn't create file list or dd. 
 */
_ajax_uploader.FileUploaderBasic = function(o){	
    this._options = {
        // set to true to see the server response
        debug: false,
        action: '/server/upload',
        params: {},
        button: null,
        multiple: true,
        maxConnections: 3,
        // validation        
        allowedExtensions: [],               
        sizeLimit: 0,   
        minSizeLimit: 0,                             
        // events
        // return false to cancel submit
        onSubmit: function(id, fileName){},
        onProgress: function(id, fileName, loaded, total){},
        onComplete: function(id, fileName, responseJSON){},
        onCancel: function(id, fileName){},
        // messages                
        messages: {
            typeError: "{file} 是个无效文件. 只接受下列文件: {extensions}",
            sizeError: "{file} 文件尺寸太大, 最大文件尺寸为: {sizeLimit}.",
            minSizeError: "{file} 文件尺寸太小, 最小文件尺寸为:  {minSizeLimit}.",
            emptyError: "{file} 是个空文件, 请重新选择.",
            onLeave: "文件正在上传, 是否中断继续."            
        },
        showMessage: function(message){
            $.alert(message);
        }               
    };
    _ajax_uploader.extend(this._options, o);
        
    // number of files being uploaded
    this._filesInProgress = 0;
    this._handler = this._createUploadHandler(); 
    
    if (this._options.button){ 
        this._button = this._createUploadButton(this._options.button);
    }
                        
    this._preventLeaveInProgress();         
};
   
_ajax_uploader.FileUploaderBasic.prototype = {
    setParams: function(params){
        this._options.params = params;
    },
    getInProgress: function(){
        return this._filesInProgress;         
    },
    _createUploadButton: function(element){
        var self = this;
        
        return new _ajax_uploader.UploadButton({
            element: element,
            multiple: this._options.multiple && _ajax_uploader.UploadHandlerXhr.isSupported(),
            onChange: function(input){
                self._onInputChange(input);
            }        
        });           
    },    
    _createUploadHandler: function(){
        var self = this,
            handlerClass;        
        
        if(_ajax_uploader.UploadHandlerXhr.isSupported()){           
            handlerClass = 'UploadHandlerXhr';                        
        } else {
            handlerClass = 'UploadHandlerForm';
        }

        var handler = new _ajax_uploader[handlerClass]({
            debug: this._options.debug,
            action: this._options.action,         
            maxConnections: this._options.maxConnections,   
            onProgress: function(id, fileName, loaded, total){                
                self._onProgress(id, fileName, loaded, total);
                self._options.onProgress(id, fileName, loaded, total);                    
            },            
            onComplete: function(id, fileName, result){
                self._onComplete(id, fileName, result);
                self._options.onComplete(id, fileName, result);
            },
            onCancel: function(id, fileName){
                self._onCancel(id, fileName);
                self._options.onCancel(id, fileName);
            }
        });

        return handler;
    },    
    _preventLeaveInProgress: function(){
        var self = this;
        
        _ajax_uploader.attach(window, 'beforeunload', function(e){
            if (!self._filesInProgress){return;}
            
            var e = e || window.event;
            // for ie, ff
            e.returnValue = self._options.messages.onLeave;
            // for webkit
            return self._options.messages.onLeave;             
        });        
    },    
    _onSubmit: function(id, fileName){
        this._filesInProgress++;  
    },
    _onProgress: function(id, fileName, loaded, total){        
    },
    _onComplete: function(id, fileName, result){
        this._filesInProgress--;                 
        if (result.error){
            this._options.showMessage(result.error);
        }             
    },
    _onCancel: function(id, fileName){
        this._filesInProgress--;        
    },
    _onInputChange: function(input){
        if (this._handler instanceof _ajax_uploader.UploadHandlerXhr){                
            this._uploadFileList(input.files);                   
        } else {             
            if (this._validateFile(input)){                
                this._uploadFile(input);                                    
            }                      
        }               
        this._button.reset();   
    },  
    _uploadFileList: function(files){
        for (var i=0; i<files.length; i++){
            if ( !this._validateFile(files[i])){
                return;
            }            
        }
        
        for (var i=0; i<files.length; i++){
            this._uploadFile(files[i]);        
        }        
    },       
    _uploadFile: function(fileContainer){      
        var id = this._handler.add(fileContainer);
        var fileName = this._handler.getName(id);
        
        if (this._options.onSubmit(id, fileName) !== false){
            this._onSubmit(id, fileName);
            this._handler.upload(id, this._options.params);
        }
    },      
    _validateFile: function(file){
        var name, size;
        
        if (file.value){
            // it is a file input            
            // get input value and remove path to normalize
            name = file.value.replace(/.*(\/|\\)/, "");
        } else {
            // fix missing properties in Safari
            name = file.fileName != null ? file.fileName : file.name;
            size = file.fileSize != null ? file.fileSize : file.size;
        }
                    
        if (! this._isAllowedExtension(name)){            
            this._error('typeError', name);
            return false;
            
        } else if (size === 0){            
            this._error('emptyError', name);
            return false;
                                                     
        } else if (size && this._options.sizeLimit && size > this._options.sizeLimit){            
            this._error('sizeError', name);
            return false;
                        
        } else if (size && size < this._options.minSizeLimit){
            this._error('minSizeError', name);
            return false;            
        }
        
        return true;                
    },
    _error: function(code, fileName){
        var message = this._options.messages[code];        
        function r(name, replacement){ message = message.replace(name, replacement); }
        
        r('{file}', this._formatFileName(fileName));        
        r('{extensions}', this._options.allowedExtensions.join(', '));
        r('{sizeLimit}', this._formatSize(this._options.sizeLimit));
        r('{minSizeLimit}', this._formatSize(this._options.minSizeLimit));
        
        this._options.showMessage(message);                
    },
    _formatFileName: function(name){
        if (name.length > 33){
            name = name.slice(0, 19) + '...' + name.slice(-13);    
        }
        return name;
    },
    _isAllowedExtension: function(fileName){
        var ext = (-1 !== fileName.indexOf('.')) ? fileName.replace(/.*[.]/, '').toLowerCase() : '';
        var allowed = this._options.allowedExtensions;
        
        if (!allowed.length){return true;}        
        
        for (var i=0; i<allowed.length; i++){
            if (allowed[i].toLowerCase() == ext){ return true;}    
        }
        
        return false;
    },    
    _formatSize: function(bytes){
        var i = -1;                                    
        do {
            bytes = bytes / 1024;
            i++;  
        } while (bytes > 99);
        
        return Math.max(bytes, 0.1).toFixed(1) + ['kB', 'MB', 'GB', 'TB', 'PB', 'EB'][i];          
    }
};

       
/**
 * Class that creates upload widget with drag-and-drop and file list
 * @inherits _ajax_uploader.FileUploaderBasic
 */
_ajax_uploader.FileUploader = function(o){
	if (!!navigator.userAgent.match(/like Mac OS X/) || G_UPLOAD_ENABLE != 'Y')
	{
		return false;
	}
	
    // call parent constructor
    _ajax_uploader.FileUploaderBasic.apply(this, arguments);
    
    // additional options    
    _ajax_uploader.extend(this._options, {
        element: null,
        // if set, will be used instead of _ajax_upload-list in template
        listElement: null,
                
        template: //'<div class="_ajax_upload-drop-area"><span>拖拽文件到这里上传</span></div>' +
                '<div class="_ajax_upload-button i_upload_but" style="float:left;margin-right:10px;"></div>' +
                '<ul id="upload-ul" class="_ajax_upload-list i_upload i_clear" style="clear:both;"></ul>',

        // template for one item in file list
        fileTemplate: '<li>' +
        		'<span class="loading file_icon"></span>' +
                '<p class="_ajax_upload-file  i_loadname"></p>' +
                '<p class="_ajax_upload-size  i_loadkb"></p>' +
				'<p class="_ajax_upload-inset"><a href="javascript:;" class="fr delect_file"  onclick="if (confirm(\'' + _t('确认删除?') + '\')) { _ajax_uploader_delete_attach(this.href, $(this).parent().parent()) } return false;">' + _t('删除') + '</a></p>' +
            '</li>',        
        
        classes: {
            // used to get elements from templates
            button: '_ajax_upload-button',
            drop: '_ajax_upload-drop-area',
            dropActive: '_ajax_upload-drop-area-active',
            list: '_ajax_upload-list',
                        
            file: '_ajax_upload-file',
            spinner: 'loading',
            size: '_ajax_upload-size',
            //cancel: '_ajax_upload-cancel',

            // added to list item when upload completes
            // used in css to hide progress spinner
            success: '_ajax_upload-success',
            fail: 'error_border',
			inset:'_ajax_upload-inset'
        }
    });
    // overwrite options with user supplied    
    _ajax_uploader.extend(this._options, o);       

    this._element = this._options.element;
    this._element.innerHTML = this._options.template;        
    this._listElement = this._options.listElement || this._find(this._element, 'list');
    
    this._classes = this._options.classes;
        
    this._button = this._createUploadButton(this._find(this._element, 'button'));        
    
	//this._element.getAttribute('id') == 
    //this._bindCancelEvent();
    //this._setupDragDrop();
};

function insetImages(obj){
	var iframeId = document.getElementById('answer_content_ifr') ? document.getElementById('answer_content_ifr') : document.getElementById('question_detail_ifr');
	var objElements = iframeId.contentWindow.document.getElementById('tinymce');
	var rel = obj.parentNode.parentNode.getElementsByTagName('span')[0].getAttribute('rel');
	var html = '<img src="'+rel+'"/>';
	objElements.designMode="On";
	if(getBrowser()=='ie'){   
        objElements.focus();  
        o=iframeId.document.selection.createRange();  
        o.pasteHTML(html);  
   }else{  
        objElements.focus();  
        var rng = iframeId.contentWindow.getSelection().getRangeAt(0);
        var frg = rng.createContextualFragment(html);  
        rng.insertNode(frg);
    } 
};
 
//获取浏览器版本  
function getBrowser(){  
    var agentValue = window.navigator.userAgent.toLowerCase();  
    if(agentValue.indexOf('msie')>0){  
        return "ie";  
    }else if(agentValue.indexOf('firefox')>0){  
        return "ff";  
    }else if(agentValue.indexOf('chrome')>0){  
        return "chrome";  
    }  
}  

// inherit from Basic Uploader
_ajax_uploader.extend(_ajax_uploader.FileUploader.prototype, _ajax_uploader.FileUploaderBasic.prototype);

_ajax_uploader.extend(_ajax_uploader.FileUploader.prototype, {
    /**
     * Gets one of the elements listed in this._options.classes
     **/
    _find: function(parent, type){                                
        var element = _ajax_uploader.getByClass(parent, this._options.classes[type])[0];        
        if (!element){
            throw new Error('element not found ' + type);
        }
        
        return element;
    },
    
    _setupDragDrop: function(){
        var self = this,
            dropArea = this._find(this._element, 'drop');                        

        var dz = new _ajax_uploader.UploadDropZone({
            element: dropArea,
            onEnter: function(e){
                _ajax_uploader.addClass(dropArea, self._classes.dropActive);
                e.stopPropagation();
            },
            onLeave: function(e){
                e.stopPropagation();
            },
            onLeaveNotDescendants: function(e){
                _ajax_uploader.removeClass(dropArea, self._classes.dropActive);  
            },
            onDrop: function(e){
                dropArea.style.display = 'none';
                _ajax_uploader.removeClass(dropArea, self._classes.dropActive);
                self._uploadFileList(e.dataTransfer.files);    
            }
        });
                
        dropArea.style.display = 'none';

        _ajax_uploader.attach(document, 'dragenter', function(e){     
            if (!dz._isValidFileDrag(e)) return; 
            
            dropArea.style.display = 'block';            
        });                 
        _ajax_uploader.attach(document, 'dragleave', function(e){
            if (!dz._isValidFileDrag(e)) return;            
            
            var relatedTarget = document.elementFromPoint(e.clientX, e.clientY);
            // only fire when leaving document out
            if ( ! relatedTarget || relatedTarget.nodeName == "HTML"){               
                dropArea.style.display = 'none';                                            
            }
        });                
    },
    
    _onSubmit: function(id, fileName){
        _ajax_uploader.FileUploaderBasic.prototype._onSubmit.apply(this, arguments);
        this._addToList(id, fileName);
    },
    
    _onProgress: function(id, fileName, loaded, total){
        _ajax_uploader.FileUploaderBasic.prototype._onProgress.apply(this, arguments);
		
        var item = this._getItemByFileId(id);
        var size = this._find(item, 'size');
        size.style.display = '';
        
        var text;
        
        if (loaded != total) {
            //text = Math.round(loaded / total * 100) + '% from ' + this._formatSize(total);
            text = Math.round(loaded / total * 100) + '%';
        } else {                                   
            //text = this._formatSize(total);
            text = this._formatSize(total);
        }
        
        _ajax_uploader.setHTML(size, text);         
    },
    
    _onComplete: function(id, fileName, result) {    
		
        _ajax_uploader.FileUploaderBasic.prototype._onComplete.apply(this, arguments);

        // mark completed
        var item = this._getItemByFileId(id);                
	
        if (result.success) {
        	if (typeof(result.delete_url) != 'undefined')
        	{
				_ajax_uploader.getByClass(item, 'delect_file')[0].href = result.delete_url.replace(/&amp;/g, '&');				
        	}
        	
        	if (typeof(result.thumb) != 'undefined')
        	{
        		$(this._find(item, 'spinner')).css('background-image','url('+result.thumb+')').attr('rel', result.thumb);
				if(typeof(result.attach_id) != 'undefined'){
					$('<a/>').attr('href','javascript:;').attr('onclick','insert_attach(this,'+result.attach_id+',\''+result.attach_tag+'\')').html('插入').appendTo($(this._find(item, 'inset')));
				}
        	}
        	else if (typeof(result.class_name) != 'undefined')
        	{
        		_ajax_uploader.addClass(this._find(item, 'spinner'), result.class_name);
        	}
        	else
        	{
        		_ajax_uploader.addClass(item, this._classes.success);  
        	}
        } else {
        	if (!$.browser.msie)
        	{
        		_ajax_uploader.getByClass(item, 'delect_file')[0].style.display = 'none';
        	}
        	
        	_ajax_uploader.addClass(this._find(item, 'spinner'), 'error');
        	
            _ajax_uploader.addClass(item, this._classes.fail);
			_ajax_uploader.getByClass(item, 'delect_file')[0].style.display = 'none';
        }
        
        _ajax_uploader.removeClass(this._find(item, 'spinner'), this._classes.spinner); 
    },
    
    _addToList: function(id, fileName){
        var item = _ajax_uploader.toElement(this._options.fileTemplate);                
        item.qqFileId = id;

        var fileElement = this._find(item, 'file');        
        _ajax_uploader.setText(fileElement, this._formatFileName(fileName));
        this._find(item, 'size').style.display = 'none'; 
        
        this._listElement.appendChild(item);
    },
    
    _getItemByFileId: function(id){
        var item = this._listElement.firstChild;        
        
        // there can't be txt nodes in dynamically created list
        // and we can  use nextSibling
        while (item){            
            if (item.qqFileId == id) return item;            
            item = item.nextSibling;
        }          
    },
    
    /**
     * delegate click event for cancel link 
     **/
    _bindCancelEvent: function(){
        var self = this,
            list = this._listElement;            
        
        _ajax_uploader.attach(list, 'click', function(e){            
            e = e || window.event;
            var target = e.target || e.srcElement;
            
            if (_ajax_uploader.hasClass(target, self._classes.cancel)){                
                _ajax_uploader.preventDefault(e);
               
                var item = target.parentNode;
                self._handler.cancel(item.qqFileId);
                _ajax_uploader.remove(item);
            }
        });
    }    
});
    
_ajax_uploader.UploadDropZone = function(o){
    this._options = {
        element: null,  
        onEnter: function(e){},
        onLeave: function(e){},  
        // is not fired when leaving element by hovering descendants   
        onLeaveNotDescendants: function(e){},   
        onDrop: function(e){}                       
    };
    _ajax_uploader.extend(this._options, o); 
    
    this._element = this._options.element;
    
    this._disableDropOutside();
    this._attachEvents();   
};

_ajax_uploader.UploadDropZone.prototype = {
    _disableDropOutside: function(e){
        // run only once for all instances
        if (!_ajax_uploader.UploadDropZone.dropOutsideDisabled ){

            _ajax_uploader.attach(document, 'dragover', function(e){
                if (e.dataTransfer){
                    e.dataTransfer.dropEffect = 'none';
                    e.preventDefault(); 
                }           
            });
            
            _ajax_uploader.UploadDropZone.dropOutsideDisabled = true; 
        }        
    },
    
    _attachEvents: function(){
        var self = this;              
                  
        _ajax_uploader.attach(self._element, 'dragover', function(e){
            if (!self._isValidFileDrag(e)) return;
            
            var effect = e.dataTransfer.effectAllowed;
            if (effect == 'move' || effect == 'linkMove'){
                e.dataTransfer.dropEffect = 'move'; // for FF (only move allowed)    
            } else {                    
                e.dataTransfer.dropEffect = 'copy'; // for Chrome
            }
                                                     
            e.stopPropagation();
            e.preventDefault();                                                                    
        });
        
        _ajax_uploader.attach(self._element, 'dragenter', function(e){
            if (!self._isValidFileDrag(e)) return;
                        
            self._options.onEnter(e);
        });
        
        _ajax_uploader.attach(self._element, 'dragleave', function(e){
            if (!self._isValidFileDrag(e)) return;
            
            self._options.onLeave(e);
            
            var relatedTarget = document.elementFromPoint(e.clientX, e.clientY);                      
            // do not fire when moving a mouse over a descendant
            if (_ajax_uploader.contains(this, relatedTarget)) return;
                        
            self._options.onLeaveNotDescendants(e); 
        });
                
        _ajax_uploader.attach(self._element, 'drop', function(e){
            if (!self._isValidFileDrag(e)) return;
            
            e.preventDefault();
            self._options.onDrop(e);
        });          
    },
    
    _isValidFileDrag: function(e){
        var dt = e.dataTransfer,
            // do not check dt.types.contains in webkit, because it crashes safari 4            
            isWebkit = navigator.userAgent.indexOf("AppleWebKit") > -1;                        

        // dt.effectAllowed is none in Safari 5
        // dt.types.contains check is for firefox            
        return dt && dt.effectAllowed != 'none' && 
            (dt.files || (!isWebkit && dt.types.contains && dt.types.contains('Files')));
        
    }        
}; 

_ajax_uploader.UploadButton = function(o) {
    this._options = {
        element: null,  
        // if set to true adds multiple attribute to file input      
        multiple: false,
        // name attribute of file input
        name: 'file',
        onChange: function(input){},
        hoverClass: '_ajax_upload-button-hover',
        focusClass: '_ajax_upload-button-focus'                       
    };
    
    _ajax_uploader.extend(this._options, o);
        
    this._element = this._options.element;
    
    // make button suitable container for input
    _ajax_uploader.css(this._element, {
        position: 'relative',
        overflow: 'hidden',
        // Make sure browse button is in the right side
        // in Internet Explorer
        direction: 'ltr'
    });   
    
    this._input = this._createInput();
};

_ajax_uploader.UploadButton.prototype = {
    /* returns file input element */    
    getInput: function(){
        return this._input;
    },
    /* cleans/recreates the file input */
    reset: function(){
        if (this._input.parentNode){
            _ajax_uploader.remove(this._input);    
        }                
        
        _ajax_uploader.removeClass(this._element, this._options.focusClass);
        this._input = this._createInput();
    },    
    _createInput: function(){                
        var input = document.createElement("input");
        
        if (this._options.multiple){
            input.setAttribute("multiple", "multiple");
        }
                
        input.setAttribute("type", "file");
        input.setAttribute("name", this._options.name);
        
        _ajax_uploader.css(input, {
            position: 'absolute',
            // in Opera only 'browse' button
            // is clickable and it is located at
            // the right side of the input
            right: 0,
            top: 0,
            fontFamily: 'Arial',
            // 4 persons reported this, the max values that worked for them were 243, 236, 236, 118
            fontSize: '118px',
            margin: 0,
            padding: 0,
            cursor: 'pointer',
            opacity: 0
        });
        
        this._element.appendChild(input);

        var self = this;
        _ajax_uploader.attach(input, 'change', function(){
            self._options.onChange(input);
        });
                
        _ajax_uploader.attach(input, 'mouseover', function(){
            _ajax_uploader.addClass(self._element, self._options.hoverClass);
        });
        _ajax_uploader.attach(input, 'mouseout', function(){
            _ajax_uploader.removeClass(self._element, self._options.hoverClass);
        });
        _ajax_uploader.attach(input, 'focus', function(){
            _ajax_uploader.addClass(self._element, self._options.focusClass);
        });
        _ajax_uploader.attach(input, 'blur', function(){
            _ajax_uploader.removeClass(self._element, self._options.focusClass);
        });

        // IE and Opera, unfortunately have 2 tab stops on file input
        // which is unacceptable in our case, disable keyboard access
        if (window.attachEvent){
            // it is IE or Opera
            input.setAttribute('tabIndex', "-1");
        }

        return input;            
    }        
};

/**
 * Class for uploading files, uploading itself is handled by child classes
 */
_ajax_uploader.UploadHandlerAbstract = function(o){
    this._options = {
        debug: false,
        action: G_BASE_URL+'/upload.php',
        // maximum number of concurrent uploads        
        maxConnections: 999,
        onProgress: function(id, fileName, loaded, total){},
        onComplete: function(id, fileName, response){},
        onCancel: function(id, fileName){}
    };
    _ajax_uploader.extend(this._options, o);    
    
    this._queue = [];
    // params for files in queue
    this._params = [];
};

_ajax_uploader.UploadHandlerAbstract.prototype = {
    log: function(str){
        if (this._options.debug && window.console) console.log('[uploader] ' + str);        
    },
    /**
     * Adds file or file input to the queue
     * @returns id
     **/    
    add: function(file){},
    /**
     * Sends the file identified by id and additional query params to the server
     */
    upload: function(id, params){
        var len = this._queue.push(id);

        var copy = {};        
        _ajax_uploader.extend(copy, params);
        this._params[id] = copy;        
                
        // if too many active uploads, wait...
        if (len <= this._options.maxConnections){               
            this._upload(id, this._params[id]);
        }
    },
    /**
     * Cancels file upload by id
     */
    cancel: function(id){
        this._cancel(id);
        this._dequeue(id);
    },
    /**
     * Cancells all uploads
     */
    cancelAll: function(){
        for (var i=0; i<this._queue.length; i++){
            this._cancel(this._queue[i]);
        }
        this._queue = [];
    },
    /**
     * Returns name of the file identified by id
     */
    getName: function(id){},
    /**
     * Returns size of the file identified by id
     */          
    getSize: function(id){},
    /**
     * Returns id of files being uploaded or
     * waiting for their turn
     */
    getQueue: function(){
        return this._queue;
    },
    /**
     * Actual upload method
     */
    _upload: function(id){},
    /**
     * Actual cancel method
     */
    _cancel: function(id){},     
    /**
     * Removes element from queue, starts upload of next
     */
    _dequeue: function(id){
        var i = _ajax_uploader.indexOf(this._queue, id);
        this._queue.splice(i, 1);
                
        var max = this._options.maxConnections;
        
        if (this._queue.length >= max && i < max){
            var nextId = this._queue[max-1];
            this._upload(nextId, this._params[nextId]);
        }
    }        
};

/**
 * Class for uploading files using form and iframe
 * @inherits _ajax_uploader.UploadHandlerAbstract
 */
_ajax_uploader.UploadHandlerForm = function(o){
    _ajax_uploader.UploadHandlerAbstract.apply(this, arguments);
       
    this._inputs = {};
};
// @inherits _ajax_uploader.UploadHandlerAbstract
_ajax_uploader.extend(_ajax_uploader.UploadHandlerForm.prototype, _ajax_uploader.UploadHandlerAbstract.prototype);

_ajax_uploader.extend(_ajax_uploader.UploadHandlerForm.prototype, {
    add: function(fileInput){
        fileInput.setAttribute('name', 'qqfile');
        var id = '_ajax_upload-handler-iframe' + _ajax_uploader.getUniqueId();       
        
        this._inputs[id] = fileInput;
        
        // remove file input from DOM
        if (fileInput.parentNode){
            _ajax_uploader.remove(fileInput);
        }
                
        return id;
    },
    getName: function(id){
        // get input value and remove path to normalize
        return this._inputs[id].value.replace(/.*(\/|\\)/, "");
    },    
    _cancel: function(id){
        this._options.onCancel(id, this.getName(id));
        
        delete this._inputs[id];        

        var iframe = document.getElementById(id);
        if (iframe){
            // to cancel request set src to something else
            // we use src="javascript:false;" because it doesn't
            // trigger ie6 prompt on https
            iframe.setAttribute('src', 'javascript:false;');

            _ajax_uploader.remove(iframe);
        }
    },     
    _upload: function(id, params){                        
        var input = this._inputs[id];
        
        if (!input){
            throw new Error('file with passed id was not added, or already uploaded or cancelled');
        }                

        var fileName = this.getName(id);
                
        var iframe = this._createIframe(id);
        var form = this._createForm(iframe, params);
        form.appendChild(input);

        var self = this;
        this._attachLoadEvent(iframe, function(){                                 
            self.log('iframe loaded');
            
            var response = self._getIframeContentJSON(iframe);

            self._options.onComplete(id, fileName, response);
            self._dequeue(id);
            
            delete self._inputs[id];
            // timeout added to fix busy state in FF3.6
            setTimeout(function(){
                _ajax_uploader.remove(iframe);
            }, 1);
        });

        form.submit();        
        _ajax_uploader.remove(form);        
        
        return id;
    }, 
    _attachLoadEvent: function(iframe, callback){
        _ajax_uploader.attach(iframe, 'load', function(){
            // when we remove iframe from dom
            // the request stops, but in IE load
            // event fires
            if (!iframe.parentNode){
                return;
            }

            // fixing Opera 10.53
            if (iframe.contentDocument &&
                iframe.contentDocument.body &&
                iframe.contentDocument.body.innerHTML == "false"){
                // In Opera event is fired second time
                // when body.innerHTML changed from false
                // to server response approx. after 1 sec
                // when we upload file with iframe
                return;
            }

            callback();
        });
    },
    /**
     * Returns json object received by iframe from server.
     */
    _getIframeContentJSON: function(iframe){
        // iframe.contentWindow.document - for IE<7
        var doc = iframe.contentDocument ? iframe.contentDocument: iframe.contentWindow.document,
            response;
        
        this.log("converting iframe's innerHTML to JSON");
        this.log("innerHTML = " + doc.body.innerHTML);
                        
        try {
            response = eval("(" + doc.body.innerHTML + ")");
        } catch(err){
            response = {};
        }        

        return response;
    },
    /**
     * Creates iframe with unique name
     */
    _createIframe: function(id){
        // We can't use following code as the name attribute
        // won't be properly registered in IE6, and new window
        // on form submit will open
        // var iframe = document.createElement('iframe');
        // iframe.setAttribute('name', id);

        var iframe = _ajax_uploader.toElement('<iframe src="javascript:false;" name="' + id + '" />');
        // src="javascript:false;" removes ie6 prompt on https

        iframe.setAttribute('id', id);

        iframe.style.display = 'none';
        document.body.appendChild(iframe);

        return iframe;
    },
    /**
     * Creates form, that will be submitted to iframe
     */
    _createForm: function(iframe, params){
        // We can't use the following code in IE6
        // var form = document.createElement('form');
        // form.setAttribute('method', 'post');
        // form.setAttribute('enctype', 'multipart/form-data');
        // Because in this case file won't be attached to request
        var form = _ajax_uploader.toElement('<form method="post" enctype="multipart/form-data"></form>');

        var queryString = _ajax_uploader.obj2url(params, this._options.action);

        form.setAttribute('action', queryString);
        form.setAttribute('target', iframe.name);
        form.style.display = 'none';
        document.body.appendChild(form);

        return form;
    }
});

/**
 * Class for uploading files using xhr
 * @inherits _ajax_uploader.UploadHandlerAbstract
 */
_ajax_uploader.UploadHandlerXhr = function(o){
    _ajax_uploader.UploadHandlerAbstract.apply(this, arguments);

    this._files = [];
    this._xhrs = [];
    
    // current loaded size in bytes for each file 
    this._loaded = [];
};

// static method
_ajax_uploader.UploadHandlerXhr.isSupported = function(){

    var input = document.createElement('input');
    input.type = 'file';        
    
    return (
        'multiple' in input &&
        typeof File != "undefined" &&
        typeof (new XMLHttpRequest()).upload != "undefined" );       
};

// @inherits _ajax_uploader.UploadHandlerAbstract
_ajax_uploader.extend(_ajax_uploader.UploadHandlerXhr.prototype, _ajax_uploader.UploadHandlerAbstract.prototype)

_ajax_uploader.extend(_ajax_uploader.UploadHandlerXhr.prototype, {
    /**
     * Adds file to the queue
     * Returns id to use with upload, cancel
     **/    
    add: function(file){
        if (!(file instanceof File)){
            throw new Error('Passed obj in not a File (in _ajax_uploader.UploadHandlerXhr)');
        }
                
        return this._files.push(file) - 1;        
    },
    getName: function(id){        
        var file = this._files[id];
        // fix missing name in Safari 4
        return file.fileName != null ? file.fileName : file.name;       
    },
    getSize: function(id){
        var file = this._files[id];
        return file.fileSize != null ? file.fileSize : file.size;
    },    
    /**
     * Returns uploaded bytes for file identified by id 
     */    
    getLoaded: function(id){
        return this._loaded[id] || 0; 
    },
    /**
     * Sends the file identified by id and additional query params to the server
     * @param {Object} params name-value string pairs
     */    
    _upload: function(id, params){
        var file = this._files[id],
            name = this.getName(id),
            size = this.getSize(id);
                
        this._loaded[id] = 0;
                                
        var xhr = this._xhrs[id] = new XMLHttpRequest();
        var self = this;
                                        
        xhr.upload.onprogress = function(e){
            if (e.lengthComputable){
                self._loaded[id] = e.loaded;
                self._options.onProgress(id, name, e.loaded, e.total);
            }
        };

        xhr.onreadystatechange = function(){            
            if (xhr.readyState == 4){
                self._onComplete(id, xhr);                    
            }
        };

        // build query string
        params = params || {};
        params['qqfile'] = name;
        var queryString = _ajax_uploader.obj2url(params, this._options.action);

        xhr.open("POST", queryString, true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.setRequestHeader("X-File-Name", encodeURIComponent(name));
        xhr.setRequestHeader("Content-Type", "application/octet-stream");
        xhr.send(file);
    },
    _onComplete: function(id, xhr){
        // the request was aborted/cancelled
        if (!this._files[id]) return;
        
        var name = this.getName(id);
        var size = this.getSize(id);
        
        this._options.onProgress(id, name, size, size);
                
        if (xhr.status == 200){
            this.log("xhr - server response received");
            this.log("responseText = " + xhr.responseText);
                        
            var response;
                    
            try {
                response = eval("(" + xhr.responseText + ")");
            } catch(err){
                response = {};
            }
            
            this._options.onComplete(id, name, response);
                        
        } else {                   
            this._options.onComplete(id, name, {});
        }
                
        this._files[id] = null;
        this._xhrs[id] = null;    
        this._dequeue(id);                    
    },
    _cancel: function(id){
        this._options.onCancel(id, this.getName(id));
        
        this._files[id] = null;
        
        if (this._xhrs[id]){
            this._xhrs[id].abort();
            this._xhrs[id] = null;                                   
        }
    }
});

function _ajax_uploader_delete_attach(url, el)
{
	var this_el = el;
	
	$.get(url, function (result) {
		if (result.errno == "-1")
		{
			$.alert(result.err);
		}
		else
		{
			this_el.fadeOut();
			this_el.remove();
		}
	}, 'json');
}

function _ajax_uploader_append_file(selecter, v)
{
	var url = '';
	
	if (typeof(v['thumb']) != 'undefined')
    {    	
    	if (typeof(v['thumb']) != 'string')
    	{
    		url = v['thumb']['90x90'];
    	}
    	else
    	{
    		url = v['thumb'];
    	}
    }
    
    var html = '<li>' +
        '<span class="file_icon ' + v['class_name'] + '" '+(url==null || url=='' ? '' : 'style="background-image:url('+url+')"')+'></span>' +
        '<p class="_ajax_upload-file i_loadname" title="' + v['file_name'] + '">' + (v['file_name']).substring(0,10) + '...</p>' +
        '<p class="_ajax_upload-inset "><a href="' + v['delete_link'] + '" onclick="if (confirm(\'' + _t('确认删除?') + '\')) { _ajax_uploader_delete_attach(this.href, $(this).parent().parent()) } return false;" class="delect_file fr">' + _t('删除') + '</a>';
        
        if (typeof(v['thumb']) != 'undefined' && typeof(v['attach_id']) != 'undefined')
        {
	        html += '<a href="javascript:;" onclick="insert_attach(this, ' + v['attach_id'] + ',\'' + v['attach_tag'] + '\')">' + _t('插入') + '</a></p>';
        }else{
			html += '</p>';
		}
       
        html += '</li>';
	
	
	$(selecter).append(html);
}