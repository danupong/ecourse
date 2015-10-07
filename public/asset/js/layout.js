// Common function
function bookmarksite (title, url) {if (window.sidebar) window.sidebar.addPanel(title, url, ""); else if (window.opera && window.print) { var elem = document.createElement('a');elem.setAttribute('href', url);elem.setAttribute('title', title);elem.setAttribute('rel', 'sidebar');elem.click();} else if (document.all) window.external.AddFavorite(url, title);}
function startPage(Obj,urlStr){if (document.all && window.external){ Obj.style.behavior='url(#default#homepage)'; Obj.setHomePage(urlStr);} else {alert('리니지2를 시작페이지로 버튼을 드래그 하여 브라우저 상단의 홈아이콘 위에 올려주세요.');}}
function setPng24(obj) {obj.width=obj.height=1; obj.className=obj.className.replace(/\bpng24\b/i,''); obj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+ obj.src +"',sizingMethod='image');";obj.src=''; return '';}

//login영역 관련
function showService(num) {
	var sTab = document.getElementById('tab').getElementsByTagName('li');
	for(var i=0; i<sTab.length && sTab[i].className!='inactive' ; i++) sTab[i].className = '';
	sTab[num].className = 'on';

	var sInfo = document.getElementById('service_info').getElementsByTagName('p');
	for (var i=0; i<sInfo.length; i++) sInfo[i].style.display = 'none';
	sInfo[num].style.display = 'block';
}
function shortNcoin (arg){
	if(!arg) return;
	var maxLength=9;
	for (var i=0; i<arg.length;i++)
	{
		var n = $$('.' + arg[i] + ' strong')[0];
		if(!n) continue;
		var nText=n.innerHTML;
		if (nText.length>maxLength){
			n.title = (i === 0) ? nText + '원' : nText + '점';
			nText = nText.substr(0,8)+".."
			n.innerHTML=nText;
		}
	}
}
//로그인 인풋 박스
$j(document).ready(function(){
	$j('#id').attr('value','');
	$j('body').focus();
});

//block layers closer (2001.05 by dentibes)
var ctrlLayers = [];
$j(document).click(function(e){
for(var i=0;i<ctrlLayers.length;i++){
	//if( !(btn click || layer click) )
	//console.log(ctrlLayers[i][0], ', ', ctrlLayers[i][1]);
	if(document.getElementById(ctrlLayers[i][0]) && document.getElementById(ctrlLayers[i][1]) && e.target){
		if( !($j.contains(document.getElementById(ctrlLayers[i][0]), e.target) || e.target.id==ctrlLayers[i][1] || $j.contains(document.getElementById(ctrlLayers[i][1]), e.target) || e.target.id==ctrlLayers[i][0]) ){
			$j('#'+ctrlLayers[i][0]).removeClass('on');
			$j('#'+ctrlLayers[i][1]).removeClass('chk_display_block');
		}
	}
}
});
var layerCtrl = function(btnID, layerID){
	$j('#'+btnID).click (function(){
		$j('#'+btnID).toggleClass('on');
		$j('#'+layerID).toggleClass('chk_display_block');
	});
	ctrlLayers.push([btnID, layerID]);
}
var layerCtrl_over = function(btnID, layerID){
	var action = function(){
		$j('#'+btnID).toggleClass('on');
		$j('#'+layerID).toggleClass('chk_display_block');
	}
	var _btnID = document.getElementById(btnID);
	var _layerID = document.getElementById(layerID);
	_btnID.onmouseover = action;
	_btnID.onmouseout = action;
	_layerID.onmouseover = action;
	_layerID.onmouseout = action;
}

// Common Var
if (location.href.indexOf('/rc.') == -1) {
	if (location.href.indexOf('power.plaync.co.kr')==-1 && location.href.indexOf('qna.plaync.co.kr')==-1 && location.href.indexOf('search.plaync.co.kr')==-1 && location.href.indexOf('power.plaync.com')==-1 && location.href.indexOf('qna.plaync.com')==-1 && location.href.indexOf('search.plaync.com')==-1) var lin2_path = "";
	else 
	var lin2 = "http://lineage2.plaync.com";
	var lin2_path = "http://lineage2.plaync.com/classic";
	var l2static_path ='http://static.plaync.co.kr/l2classic';
	var search_path ='http://search.plaync.co.kr/lineage2classic';
	var power_path ='http://lineage2classic.power.plaync.com';
	var qna_path ='http://lineage2.qna.plaync.com';
	var l2plex_path ='http://nshop.plaync.com/lineage2';
	var nshop_path ='http://nshop.plaync.com';
	var cs ='https://cs.plaync.com';
} else {
	var lin2 = "http://rc.lineage2.plaync.com";
	var lin2_path = "http://rc.lineage2.plaync.com/classic";
	var l2static_path ='http://rc.static.plaync.co.kr/l2classic';
	var search_path ='http://rc.search.plaync.co.kr/lineage2classic';
	var power_path ='http://rc.lineage2classic.power.plaync.com';
	var qna_path ='http://rc.lineage2.qna.plaync.com';
	var l2plex_path ='http://rc.nshop.plaync.com/lineage2';
	var nshop_path ='http://rc.nshop.plaync.com';
	var cs ='https://rc-cs.plaync.com';
}

// navigation
function MenuRedirect(depth1, depth2) {
	var url="";
	depth1 = String(depth1);
	depth2 = String(depth2);

	switch(depth1){
	case "0":
		switch(depth2){
			case "0": url = lin2_path+"/index"; break;
		}break;
	case "1":
		switch(depth2){
			case "0": url = lin2_path+"/gameinfo/path/index"; break;
			case "1": url = lin2_path+"/gameinfo/path/index"; break;
		}break;
	case "2":
		url= power_path; break;
	case "3":
		switch(depth2){
			case "1": url = lin2_path+"/linkedbbs/serverchannel"; break;
			case "2": url = lin2_path+"/board/classchannel"; break;
			case "3": url = lin2_path+"/board/image/list"; break;
			case "4": url = lin2_path+"/linkedbbs/market/serverchannel"; break;
		}break;
	case "4":
		switch(depth2){
			case "0": url = lin2_path+"/board/notice/list"; break;
			case "1": url = lin2_path+"/board/notice/list"; break;
			case "2": url = lin2_path+"/board/update/list";  break;
			case "3": url = lin2_path+"/event/main/eventlist";  break;
			case "4": url = lin2_path+"/board/gmroom/list";  break;
		}break;
	case "5":
		switch(depth2){
			case "0": url = lin2_path+"/download/client/index"; break;
			case "1": url = lin2_path+"/download/client/index"; break;
			case "2": url = "http://nctalk.plaync.co.kr/";  break;
		}break;
	case "6":
		url= l2plex_path; break;
	}
	if(url) document.location.href = url;
}

//100504 showFlash
var isFlashInstalled=0;
function flashvalidator() {
	if (isFlashInstalled!==0) return isFlashInstalled;
	var agent=navigator.userAgent.toLowerCase();
	isFlashInstalled = true;
	if ( !!agent.match( /msie|trident/ ) ) {
		isFlashInstalled = true;
	} else {
		if (!(typeof !navigator.plugins && typeof navigator.plugins['Shockwave Flash'] == 'object'))
			isFlashInstalled = false;
	}
	return isFlashInstalled;
}
function showFlash() {
if (flashvalidator()===false) {
if (typeof arguments[1]=='object') {
if (arguments[1]['css']!='') {
var css = document.createElement('link');
css.setAttribute('rel', 'stylesheet')
css.setAttribute('type', 'text/css');
css.setAttribute('href', arguments[1]['css']);
document.getElementsByTagName('head')[0].appendChild(css);
}
if (arguments[1]['type'] == 'src') {
document.writeln('<div id=\"'+ arguments[1]['target'] +'\"></div>')
var script = document.createElement('script');
script.setAttribute('type', 'text/javascript');
script.setAttribute('src', arguments[1]['content']);
document.getElementsByTagName('head')[0].appendChild(script);
} else {
document.write(arguments[1]['content']);
}
}
return false;
}
var Options=(arguments.length>0) ? arguments[0] : {};
var Default={
id:'ShockwaveFlash1',
movie:'',
menu:'false',
scale:'noscale',
allowFullScreen:'false',
allowScriptAccess:'always',
width:'0',
height:'0',
quality:'high',
wmode:'transparent',
bgcolor:'',
xml:false
};
for (var attr in Default) {
if (typeof Options[attr]=='undefined')
Options[attr]=Default[attr];
}
if (Options['xml']!==false)
Options['movie']=Options['movie'] + ((Options['movie'].match(/=/)) ? '&' : '?') + 'server=' + Options['xml'] + '&chkMovie=0';
var docProtocol=(location.href.indexOf('https')==0) ? 'https' : 'http';
var SwfMarkUp=[];
SwfMarkUp.push('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="'+docProtocol+'://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,124,0" width="'+Options['width']+'" height="'+Options['height']+'" id="'+Options['id']+'" align="middle">');
for (var key in Options) {
if (key!='id'&&key!='xml')
SwfMarkUp.push('<param name=\"' + key + '\" value=\"' + Options[key] + '\" />');
}
SwfMarkUp.push('<param name="wmode" value=\"' + Options['wmode'] + '\" />');
SwfMarkUp.push('<param name="allowScriptAccess" value=\"always\" />');
SwfMarkUp.push('<param name="menu" value="false" />');
SwfMarkUp.push('<param name="quality" value="high" />');
SwfMarkUp.push('<embed src="'+Options['movie']+'" allowScriptAccess="always" menu="false" quality="high" bgcolor="'+Options['bgcolor']+'" wmode="'+Options['wmode']+'" width="'+Options['width']+'" height="'+Options['height']+'" name="'+Options['id']+'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
SwfMarkUp.push('</object>');
document.write(SwfMarkUp.join(''));
}
// Prototype.js Referenced(noneflash)
function insertAltContent(target, content) {
	if (!$(target)) return;
	$(target).insert({after:content});
	$(target).remove();
}



// Common layout - powerbook, qna, search
function showQuickmenu() {
	document.writeln('<ul class="cs_center">');
	document.writeln('<li class="li_inquiry"><a href="'+cs+'">고객센터</a></li>');
	document.writeln('<li class="li_security"><a href="'+cs+'/security/main/intro">보안 서비스</a></li>');
	document.writeln('<li class="li_coupon"><a href="'+nshop_path+'/gift_coupon/?pagetab=&amp;tab=usable&amp;serviceCode=32">쿠폰 등록 조회</a></li>');
	document.writeln('</ul>');
}
//menu
var checkNavi={
	cNameCheck:0,
	cNameCheck2:0
}
Event.observe(window, 'load', function() {
	var setNavi = {
		resetstate : null
		, load : function(){
			$$('#naviHTML .navi1deps').each(function(e) {
				e.onmouseover = function(){
					clearInterval(setNavi.resetstate);
					$$('#naviHTML .navi1deps').each(function(e) { e.up().removeClassName('on'); });
					this.up().addClassName('on');
				}
				e.onmouseout = function(){
					setNavi.resetstate = setInterval(function _reset(){ setNavi.reset(); },500);
				}
			});
			$$('#naviHTML .navi2deps a').each(function(e) {
				e.onmouseover = function(){ clearInterval(setNavi.resetstate); }
				e.onmouseout = function(){
					setNavi.resetstate = setInterval(function _reset(){ setNavi.reset(); },500);
				}
			});
			setNavi.reset();
		}
		, reset : function(){
			$$('#naviHTML .on').each(function(e) { e.className = e.className.split(' ', 1)[0]; });
			if($$('.'+checkNavi.cNameCheck)[0]) $$('.'+checkNavi.cNameCheck)[0].addClassName(checkNavi.cNameCheck+'_on on');
			if($$('.'+checkNavi.cNameCheck2)[0]) $$('.'+checkNavi.cNameCheck2)[0].addClassName(checkNavi.cNameCheck2+'_on on');
		}
	}
	if($('naviHTML')) setNavi.load();
});

function showNavi(ch1, ch2) {
	document.writeln('<a href="' + lin2_path + '/index" class="logo">Lineage II</a>');
	document.writeln('<ul id="naviHTML">');
	document.writeln('<li class="menu1"><a href="' + lin2_path + '/gameinfo/raid/map" class="navi1deps">정보</a>');
	document.writeln('<ul class="navi2deps sub1">');
	document.writeln('<li class="sub1_1"><a href="' + lin2_path + '/gameinfo/raid/map">레이드</a></li>');
	document.writeln('<li class="sub1_2"><a href="' + lin2_path + '/gameinfo/path/index">사냥터 네비게이션</a></li>');
	document.writeln('</ul>');
	document.writeln('</li>');
	document.writeln('<li class="menu2"><a href="' + power_path + '" class="navi1deps">파워북</a></li>');
	document.writeln('<li class="menu3"><a href="' + lin2_path + '/linkedbbs/serverchannel" class="navi1deps">커뮤니티</a>');
	document.writeln('<ul class="navi2deps sub3">');
	document.writeln('<li class="sub3_1"><a href="' + lin2_path + '/linkedbbs/serverchannel">자유게시판</a></li>');
	document.writeln('<li class="sub3_2"><a href="' + lin2_path + '/board/classchannel">직업게시판</a></li>');
	document.writeln('<li class="sub3_3"><a href="' + lin2_path + '/linkedbbs/qna/list?serverId=0&amp;classid=4">묻고답하기</a></li>');
	document.writeln('<li class="sub3_4"><a href="' + lin2_path + '/board/image/list">이미지게시판</a></li>');
	document.writeln('<li class="sub3_5"><a href="' + lin2_path + '/linkedbbs/market/serverchannel">아이템장터</a></li>');
	document.writeln('</ul>');
	document.writeln('</li>');
	document.writeln('<li class="menu4"><a href="' + lin2_path + '/board/notice/list" class="navi1deps">소식</a>');
	document.writeln('<ul class="navi2deps sub4">');
	document.writeln('<li class="sub4_1"><a href="' + lin2_path + '/board/notice/list">공지</a></li>');
	document.writeln('<li class="sub4_2"><a href="' + lin2_path + '/board/update/list">업데이트</a></li>');
	document.writeln('<li class="sub4_3"><a href="' + lin2_path + '/event/main/eventlist">이벤트</a></li>');
	document.writeln('<li class="sub4_4"><a href="' + lin2_path + '/board/gmroom/list">gm의 방</a></li>');
	document.writeln('</ul>');
	document.writeln('</li>');
	document.writeln('<li class="menu5"><a href="'+lin2_path+'/download/client/index" class="navi1deps">다운로드</a>');
	document.writeln('<ul class="navi2deps sub5">');
	document.writeln('<li class="sub5_1"><a href="'+lin2_path+'/download/client/index">클라이언트</a></li>');
	document.writeln('<li class="sub5_2"><a href="http://nctalk.plaync.co.kr/">엔씨톡</a></li>');
	document.writeln('</ul>');
	document.writeln('</li>');
	document.writeln('<li class="menu6"><a href="'+l2plex_path+'/goods/list?categoryPath=1_13" class="navi1deps">이용권</a></li>');
	document.writeln('</ul>');	
	document.writeln('<a href="'+lin2+'" class="changelive" onmousedown="try{ _trk_clickTrace( \'EVT\', \'/리니지2/클래식/라이브서버 홈 버튼\');}catch(_e){};">라이브서버 홈</a>');
	checkNavi.cNameCheck = 'menu' + ch1;
	checkNavi.cNameCheck2 = 'sub' + ch2;
}

//gameStartOver
$j(document).ready(function() {
	$j(".gamestart .start").mouseover(
	function() {
		$j(".gamestart .start_on").fadeIn();
	});
	$j(".gamestart .start_on").mouseout(
	function() {
		$j(".gamestart .start_on").fadeOut();
	});
});

function showGamestart() {
	document.writeln('<div class="gamestart">');
	document.writeln('<div id="gameStartAni">');
	document.writeln('<div class="aniBg"></div>');
	document.writeln('<div class="frontImg"></div>');
	document.writeln('<a href="#" class="startbtn"></a>');
	document.writeln('</div>');
	document.writeln('</div>');
	$j(document).ready(function(){
		if(!$j("script[src*=movieClip]").length){
			//alert('dd');
			$j.getScript('http://static.plaync.co.kr/common/js/movieClip.min.js', function() {
				var clip01 = new movieClip({
					selector: '#reside .gamestart .aniBg',
					frameRate: 24,
					height: 140,
					max: 91
				});
				jQuery( ".startbtn" ).bind({
						mouseenter: function(e){
								clip01.play({loop:true});								
						},
						mouseleave: function(e){
								clip01.play({speed:-2});
						},
						click: function(e){
								e.preventDefault();
								FlashStartButton();
						}
				});
				jQuery(function(){
						clip01.play({callback:function(){
							clip01.play({speed:-3});
						}});
				});
			});
		}
	});
}

function showFooter() {
	document.writeln('<div class="footerWrap">');
	document.writeln('<ul class="utilmenu">');
	document.writeln('<li class="bizinfo"><a href="http://www.ncsoft.com" target="_blank" title="회사소개">회사소개</a></li>');
	document.writeln('<li class="agreement"><a href="http://main.plaync.co.kr/rule/agreement/gamesvc" target="_parent" title="이용약관">이용약관</a></li>');
	document.writeln('<li class="privacy"><a href="http://main.plaync.co.kr/rule/privacy/privacy" target="_parent" title="개인정보 취급(처리) 방침"><strong>개인정보 취급(처리) 방침</strong></a></li>');
	document.writeln('<li class="youthpolicy"><a href="http://main.plaync.co.kr/rule/youth/youthpolicy" target="_parent" title="청소년 보호 정책"><strong>청소년 보호 정책</strong></a></li>');
	document.writeln('<li class="policy"><a href="http://main.plaync.co.kr/rule/policy/lineage2" target="_parent" title="운영정책">운영정책</a></li>');
	document.writeln('<li class="grade last"><span id="footer_grade">게임이용등급</span>');
	document.writeln('<div class="ly_grade">게임이용등급 정보</div>');
	document.writeln('</li>');
	document.writeln('<li class="pcbang"><a href="http://pcbang.plaync.com/" target="_blank" title="PC방 홈페이지">PC방 홈페이지</a></li>');
	document.writeln('</ul>');
	document.writeln('<address>');
	document.writeln('(주)엔씨소프트 경기도 성남시 분당구 대왕판교로 644번길 12 대표 김택진 사업자 등록번호 144-85-04244 통신판매업신고 제14381호');
	document.writeln('고객상담 1600-0020 팩스 02-2186-3550');
	document.writeln('LINEAGEⅡ&reg; is a rdgistered trademarks of NCsoft Corporation.');
	document.writeln('Copyright &copy; NCsoft Corporation. All Rights Reserved.');
	document.writeln('<a href="http://www.ncsoft.com" class="ncsoft" target="_blank" title="NCsoft">NCsoft</a>');
	document.writeln('<a href="mailto:credit@ncsoft.com" class="email">credit@ncsoft.com</a>');
	document.writeln('<a href="http://ftc.go.kr/info/bizinfo/communicationView.jsp?apv_perm_no=2013378021930201264&area1=&area2=&currpage=1&searchKey=01&searchVal=%EC%97%94%EC%94%A8%EC%86%8C%ED%94%84%ED%8A%B8&stdate=&enddate=" target="_blank" title="사업자정보확인" class="ftc">사업자정보확인</a>');
	document.writeln('</address>');
	document.writeln('<dl id="global_sites" class="global_sites">');
	document.writeln('<dt>Lineage2 (Korea)</dt>');
	document.writeln('<dd style="display:none;">');
	document.writeln('<ul>');
	document.writeln('<li class="first">Global Sites</li>');
	document.writeln('<li><a href="http://lineage2.plaync.co.kr" target="_blank">Lineage2 (Korea)</a></li>');
	document.writeln('<li class="m_type2"><a href="http://truly-free.lineage2.com" target="_blank">Lineage2 (US)</a></li>');
	document.writeln('</ul>');
	document.writeln('</dd>');
	document.writeln('</dl>');
	document.writeln('</div>');
}
jQuery(document).ready(function() {
	// global site toggle
	jQuery('#global_sites').bind('click', function(e) {
		var el = e.target;
		if (el.tagName == 'DT' || el.tagName == 'A') {
			jQuery('#global_sites').find('DT').toggleClass('up');
			jQuery('#global_sites').find('DD').toggle();
		} else
		return;
	});
	// 게임등급 toggle
	jQuery('#footer_grade').bind('click', function(e) {
		jQuery('DIV.ly_grade').toggle();
	});

	jQuery(document.body).bind('click', function(e) {
		var el = e.target;
		if (jQuery(el).parent('DL').is('#global_sites')) return;
		jQuery('#global_sites').find('DD').hide();
	
		if (jQuery(el).is('#footer_grade')) return;
		jQuery('DIV.ly_grade').hide();
	});
});


	var rollingData = function( option ) {
		this.opt = option || {};
		this.init();
	};
	rollingData.prototype = {
		init: function() {
			if ( !this.opt.banner ) {
				return;
			}
			this.old = this.ing = this.loop = null;
			this.opt.time = this.opt.time || 4000;
			this.now = this.opt.startAt || 0;
			this.opt.fn = this.opt.fn || [ 'basic' ];
			this.opt.term = this.opt.term || 0;
			this.prepare();
		},
		prepare: function() {
			$j( this.opt.banner + ' .hidden').remove();
			$j( this.opt.banner ).find( this.opt.bannerFind ).hide().has( 'img[src="about:blank"]' ).remove();
			this.banners = $j( this.opt.banner ).find( this.opt.bannerFind );
			this.total = this.banners.length - 1;

			this.pager = $j( this.opt.page );

			if (this.total <1) this.pager.hide()
			else this.pager.show();


				for ( var i = 0, ins = $j( this.opt.page ); i <= this.total; i++ ) {
				//ins.append( '<a href="' + $j(this.banners[i]).find("a").attr("href") + '">' + i + '</a>' );    // 2012-06-08 cherryai
					ins.append( '<a>' + i + '</a>' );
				}
				this.pages = $j( this.opt.page + ' a');


			var _this = this;
			this.loop = function() {
				_this.old = _this.now;
				_this.now = _this.now >= _this.total ? 0 : _this.now + 1;
				if(!_this.total) return;
				_this.eff();
				_this.ing = setTimeout( _this.loop, _this.opt.time );
			}
			this.evtBind();
			this.start();
		},
		evtBind: function() {
			var _this = this;
			$j( [this.pages, this.banners] ).each(function() {
				var target = this;
				target.bind({
					mouseover: function() { on( target, target.index( this ) ) },
					focusin: function() { on( target, target.index( this ) ) },
					mouseout: restart,
					focusout: restart
				});
			});
			function on( target, index ) {
				_this.stop();
				if ( target === _this.pages && _this.now !== index ) {
					_this.old = _this.now;
					_this.now = index;
					_this.eff();
				}
			}
			function restart() { _this.ing = setTimeout( _this.loop, _this.opt.time ) }

			 
			//$j(this.opt.banner).find('.prevPage').bind('click', function() {
			$j(this.opt.page).find('.prevPage').bind('click', function() {
				_this.prev();
			});
			//$j(this.opt.banner).find('.nextPage').bind('click', function() {
			$j(this.opt.page).find('.nextPage').bind('click', function() {
				_this.next();
			});
		 
		},
		start: function() {
			this.eff();
			this.banners.eq( this.now ).show();
			this.pages.eq( this.now ).attr( 'class', this.addOn );

			var me = this;
			setTimeout( function(){
				me.ing = setTimeout( me.loop, me.opt.time );
			}, this.opt.term );
		},
		eff: function() {
			for ( var i = 0; i < this.opt.fn.length; i++ ) {
				if ( this[ this.opt.fn[i] ] ) {
					this[ this.opt.fn[i] ]();
				}
			}
			if ( this.ing ) {
				this.pages.eq( this.old ).attr( 'class', this.rmvOn );
				this.pages.eq( this.now ).attr( 'class', this.addOn );
			}
		},
		stop: function() { clearTimeout( this.ing ); },
		addOn: function( i, v ) { if(!v) v=""; return v + 'on'; },
		rmvOn: function( i, v ) { if(!v) v=""; return v.replace( 'on', '' ); },
		basic: function() {
			if ( !this.ing ) {
				return;
			}
			this.banners.eq( this.old ).hide();
			this.banners.eq( this.now ).show();
		},
		next: function() {
			this.stop();
			this.old = this.now;
			this.now = this.now >= this.total ? 0 : this.now + 1;
			this.eff();
			this.ing = setTimeout( this.loop, this.opt.time );
		},
		prev: function() {
			this.stop();
			this.old = this.now;
			this.now = this.now <= 0 ? this.total : this.now - 1;
			this.eff();
			this.ing = setTimeout( this.loop, this.opt.time );
		}
	};
	rollingData.prototype.fadeInOut = function() {
		if ( !this.ing ) {
			this.banners.show().css({ 'zIndex' : '0', 'opacity' : 0 });
			this.banners.eq( this.now ).css({ 'zIndex' : '2', 'opacity' : 1 });
			return;
		}
		var _this = this;
		this.banners.eq( this.now ).css( 'zIndex', '2' ).animate( { 'opacity': 1 }, {
			duration: 1000,
			queue: false
		});
		this.banners.eq( this.old ).css( 'zIndex', '1' ).animate( { 'opacity': 0 }, {
			duration: 1000,
			queue: false,
			complete: function() {
				$j( this ).css( { 'zIndex': '0' } );
			}
		});
	};



jQuery('document').ready(function($){
    var COOKIE_NAME = 'l2_default_pc',
        COOKIE_DOMAIN = '.plaync.com',
        COOKIE_EXPIRED = 365, // day
        checkOnCookie = getCookie( COOKIE_NAME );
       /*
    var markupLayer = [
            '<div id="setDefaultSiteLayer" style="display:none;position:relative;left:0;right:0;height:70px;background:#0b1315 url(http://static.plaync.co.kr/lineage2_v2/layout/pattern_default_site.png) repeat-x 0 0;z-index:1000">',
            '   <div style="position:relative; width:1100px; margin: 0 auto;">',
            '		<dl style="overflow:hidden;margin:0;padding-top:26px;">',
            '			<dt style="float:left;margin-right:18px;font-weight:bold; font-size:14px; font-family:Malgun Gothic, dotum; color:#d0d0d0">클래식 서버 바로 가기</dt>',
            '			<dd style="float:left;margin:4px 0 0;padding:0 0 0 19px;font:11px/13px dotum;border-left:1px solid #565c5d;color:#7e7e7e;">라이브 홈페이지를 거치지 않고 클래식 홈페이지로 바로 이동할 수 있습니다.</dd>',
            '		</dl>',
            '		<div style="position: absolute; left:632px;top:0;line-height:70px;">',
            '   	    <input type="radio" id="setClassic" name="setDefaultSite" value="classic" style="vertical-align:middle;" onmousedown="try{ _trk_clickTrace( \'EVT\', \'/리니지2/클래식/바로가기설정/ON\');}catch(_e){};" />',
            '	 	    <label for="setClassic" style="font-weight:bold;font-size:14px;font-family:Malgun Gothic, dotum;vertical-align:middle;color:#dddddd;cursor:pointer;" onmousedown="try{ _trk_clickTrace( \'EVT\', \'/리니지2/클래식/바로가기설정/ON\');}catch(_e){};" >ON</label>',
            '		</div>',
            '		<div style="position: absolute; left:736px;top:0;line-height:70px;">',
            '      		<input type="radio" id="setNormal" name="setDefaultSite" value="normal" style="vertical-align:middle;" onmousedown="try{ _trk_clickTrace( \'EVT\', \'/리니지2/클래식/바로가기설정/OFF\');}catch(_e){};"/>',
            '  	    	<label for="setNormal" style="font-weight:bold;font-size:14px;font-family:Malgun Gothic, dotum;vertical-align:middle;color:#dddddd;cursor:pointer;" onmousedown="try{ _trk_clickTrace( \'EVT\', \'/리니지2/클래식/바로가기설정/OFF\');}catch(_e){};">OFF</label>',
            '		</div>',
            '		<button id="closeDefatultSite" style="position:absolute;display:inline-block;width:39px;height:17px;right:0;top:28px;border:0;padding:0;text-align:right;font:12px dotum;color:#a2a2a2;background:url(http://static.plaync.co.kr/lineage2_v2/layout/btn_close.png) no-repeat 0 center;cursor:pointer;" onmousedown="try{ _trk_clickTrace( \'EVT\', \'/리니지2/클래식/바로가기설정/닫기\');}catch(_e){};">닫기</button>',
            '   </div>',
            '</div>'
        ];
        markupLayer = markupLayer.join('');
    var markupButton = '<button id="activeDefaultSite" style="position:absolute;display:inline-block;right:0;top:7px;width:136px;height:17px;padding:0;text-indent:-9999px;font-size:0;border:0;background:url(http://static.plaync.co.kr/l2classic/classic_layout/btn_active_default_site.png) no-repeat 0 0;cursor:pointer;" onmousedown="try{ _trk_clickTrace( \'EVT\', \'/리니지2/클래식/바로가기설정/열기\');}catch(_e){};">클래식 서버 바로가기 설정</button>';

    $( '#div_nctop' ).after( markupLayer );
    $( '#header' ).append( markupButton );
	*/
    function getCookie( name ){
        var nameOfCookie = name + "=";
        var x = 0;
         
        while ( x <= document.cookie.length ){
            var y = ( x + nameOfCookie.length );
            if ( document.cookie.substring( x, y ) == nameOfCookie ) {
                if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
                        endOfCookie = document.cookie.length;
                return unescape( document.cookie.substring( y, endOfCookie ) );
            }
            x = document.cookie.indexOf( " ", x ) + 1;
            if ( x == 0 )
                break;
        }
        return "";
    }

    function setCookie( name, value, expiredays ){
        var todayDate = new Date();
        todayDate.setDate( todayDate.getDate() + expiredays );
        document.cookie = name + "=" + escape( value ) + "; path=/;domain="+COOKIE_DOMAIN+"; expires=" + todayDate.toGMTString() + ";"
    } 

    function toggleDefaultSite(){
    	$('#setDefaultSiteLayer').animate({
    		height: "toggle"
    	}, 150);
    }

    if( checkOnCookie == 'classic' ){
        $( '#setClassic' ).attr('checked', 'checked');
    } else {
        $( '#setNormal' ).attr('checked', 'checked');
    }


    $( '#setDefaultSiteLayer' ).find('input[type=radio]').click( function(e){
	    setCookie( COOKIE_NAME, e.target.value, COOKIE_EXPIRED );
	    toggleDefaultSite();
    });

    $( '#activeDefaultSite' ).click( function(){
        toggleDefaultSite();
    });


    $( '#closeDefatultSite' ).click( function(){
       toggleDefaultSite();
    });
});