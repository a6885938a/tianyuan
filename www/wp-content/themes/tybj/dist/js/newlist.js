$(function(){$("img.lazy").show().lazyload({effect:"fadeIn",threshold:0,skip_invisible:!1})}),$(function(){var o,a=$("#rocket-to-top"),n=($(document).scrollTop(),!0);$(window).scroll(function(){var o=$(document).scrollTop();0==o?"0px 0px"==a.css("background-position")?a.fadeOut("slow"):n&&(n=!1,$(".level-2").css("opacity",1),a.delay(100).animate({marginTop:"-1000px"},"normal",function(){a.css({"margin-top":"-25px",display:"none"}),n=!0})):a.fadeIn("slow")}),a.hover(function(){$(".level-2").stop(!0).animate({opacity:1})},function(){$(".level-2").stop(!0).animate({opacity:0})}),$(".level-3").click(function(){function i(){var i=a.css("background-position");if("none"==a.css("display")||0==n)return clearInterval(o),a.css("background-position","0px 0px"),void a.css("height","200px;");switch(i){case"0px 0px":a.css("background-position","-176px 0px");break;case"-176px 0px":a.css("background-position","-264px 0px");break;case"-264px 0px":a.css("background-position","-352px 0px");break;case"-352px 0px":a.css("background-position","-440px 0px");break;case"-440px 0px":a.css("background-position","-176px 0px")}}n&&(o=setInterval(i,50),$("html,body").animate({scrollTop:0},"slow"))}),$(window).scroll(function(){$(window).scrollTop()>200?$("#rocket-lit").fadeIn():$("#rocket-lit").fadeOut()}),$("#rocket-lit").click(function(){$("html,body").animate({scrollTop:$("body").offset().top},500)})}),$(function(){var o=$(".sitebar_list"),a=$(o).offset().top;$.event.add(window,"scroll",function(){var n=$(window).scrollTop();$(o).css("position",n>a?"fixed":"static"),$(o).css("top",n>a?"0px":"")})}),/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)?$(".wp-pagenavi").addClass("web-page"):($(".xianguan .pic").removeClass("web-of").addClass("pc-of"),$("body a").not("a.navbar-brand,.navbar-nav a,.c-self a,.wp-pagenavi a").attr("target","_blank"));