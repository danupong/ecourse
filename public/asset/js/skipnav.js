var skipnavJS = (function(){
	var isFirstTabkey = true;
	var skipNavE = null;
	var testMode = false;
	var isNoIE = ( document.addEventListener );
	var isIE = ( document.attachEvent );

	function init() {
		skipNavE = document.getElementById('skipNavFirst');
		if ( skipNavE == null || skipNavE == undefined || skipNavE == 0 ) return;
		addEvents(skipNavE, 'focus', 'onfocus', onEvent);

		testMode = ( location.href.indexOf('#test') > -1 );
		if ( testMode ) console.log('---testMode start---');

		// 인풋 박스 포커싱 이벤트
		if ( jQuery ) {
			if ( jQuery('body').delegate != undefined ) {
				jQuery('body').delegate('input:not(:hidden),textarea', 'focus', onEvent);
			} else if ( jQuery('body').on != undefined ) {
				jQuery('body').on('focus', 'input:not(:hidden),textarea', onEvent);
			};
		} else {
			var list_temp = document.getElementsByTagName('input');
			for (var i = 0, len = list_temp.length, node; i<len; i++) {
				node = list_temp[i];
				if ( node.type != 'hidden' ){
					addEvents(node, 'focus', 'onfocus', onEvent);
				}
			};
		};

		addEvents(document, 'keyup', 'onkeyup', onEvent); // 텝키 키보드 이벤트 
	}

	function onEvent(ev) {
		if ( !isFirstTabkey ) return;
		if ( ev.type=='focus' || ev.type=='focusin' || (ev.type=='keyup' && ev.keyCode && ev.keyCode==9) ){
			isFirstTabkey = false;
			if (ev.type=='keyup' && ev.keyCode==9){
				if(ev.target.name && (ev.target.name=='id' || ev.target.name=='pwd')){
				}else{
					skipNavE.focus();
				}
			}
			if (testMode) console.log('event:', ev.target.name, ev.type, ' skipnav:', isFirstTabkey);
		}
	}

	function addEvents (obj, typeW, typeIE, fn) {
		if ( isNoIE ) {
			obj.addEventListener(typeW, fn, false);
		} else if ( isIE ) {
			obj.attachEvent(typeIE, function () {
				return fn.call(obj, window.event);
			});
		}
	}

	addEvents(document, "DOMContentLoaded", "onreadystatechange", function (ev) {
		if ( isNoIE ) {
			document.removeEventListener("DOMContentLoaded", arguments.callee, false);
			init();
		} else if ( isIE ){
			if (document.readyState === "complete"){
				document.detachEvent("onreadystatechange", arguments.callee);
				init();
			}	
		};
	});

	return {
		isFirst:function() {	return isFirstTabkey;	}
	}
})();

// 웹킷계열 브라우저 포커스 이동 버그 수정
var webkithashlinkfix = (function () {
    var a = navigator.userAgent.toLowerCase().indexOf("webkit") > -1,
        b = document;
    if (!a || !b.querySelectorAll) return;
    var c = function (a) {
        var b = [],
            c = 0;
        for (; c < a.length; ++c) {
            b.push(a[c]);
        }
        return Array.prototype.slice.call(b, 0);
    };
    window.addEventListener("load", function () {
        c(b.querySelectorAll(".skipNav a")).forEach(function (a) {
            a.addEventListener("click", function () {
                var a = b.getElementById(this.href.split("#")[1]);
                if (a==null) return;
                var c = a.getAttribute("tabindex");
                var e = b.defaultView.getComputedStyle(a, null).getPropertyValue("outline-width");
                a.setAttribute("tabindex", 0);
                a.style.outlineWidth = 0;
                a.focus();
                if (c === null) {
                	a.removeAttribute("tabindex");
                }else{ 
                	a.setAttribute("tabindex", c);
                }
            }, false);
        })
    }, false);
})();