<?php
	/**
		* Plugin 			tarteaucitronJS
		*
		* @CMS required			PluXml 
		*
		* @version			0.0
		* @date				2023-12-11
		* @author 			G.Cyrillus
	**/
	
	$this->service=array(
	'ABTasty'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.abtastyID = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'abtasty\');
	</script>',
	
	'remove'=>'<script type="text/javascript" src="//try.abtasty.com/id.js"></script>'),
	
	'Arc.io'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.arcId = \'arcId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'arcio\');
	</script>',
	
	'remove'=>'<script async src="https://arc.io/widget.min.js#arcId"></script>'),	
	
	'Genial.ly'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'genially\');
	</script>',
	'widget'=> '
	<div class="tac_genially" geniallyid="geniallyid" width="width" height="height"></div>',
	
	'remove'=>'<div style="position: relative; padding-bottom: 109.00%; padding-top: 0; height: 0;"><iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://view.genial.ly/geniallyid" width="width" height="height" frameborder="0" scrolling="yes" allowfullscreen="allowfullscreen"></iframe></div>'),
	
	'Geoportail maps Embed'=> array(
	'add'=>'
	<script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'geoportail\');
	</script>',
	'widget'=> '
	<div class="geoportail" data-url="url" width="width" height="height"></div>',
	'remove'=>'<iframe width="width" height="height" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" sandbox="allow-forms allow-scripts allow-same-origin" src="url" allowfullscreen></iframe>'),
	
	'Google Fonts'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.googleFonts = \'families\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googlefonts\');
	</script>',
	'remove'=>'<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.24/webfont.js"></script>
	<script>
	WebFont.load({
	google: {
	families: [\'families\']
	}
	});
	</script>'),
	
	'Google jsapi'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'jsapi\');
	</script>',
	'remove'=>'<script type="text/javascript" src="//www.google.com/jsapi"></script>'),
	
	'Google Maps'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.googlemapsKey = \'API KEY\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googlemaps\');
	</script>',
	'widget'=> '
	<div class="googlemaps-canvas" zoom="zoom" latitude="latitude" longitude="longitude" style="width: widthpx; height: heightpx;"></div>
	<script>tarteaucitron.user.mapscallback = \'callback_function\';tarteaucitron.user.googlemapsLibraries = \'LIBRARIES\';</script>
	',
	'remove'=>'<script src="https://maps.googleapis.com/maps/api/js?key=API KEY" type="text/javascript"></script>
	<script type="text/javascript">
	function initialize() {
	var mapOptions = {
	center: { lat: latitude, lng: longitude},
	zoom: zoom
	};
	var map = new google.maps.Map(document.getElementById(\'map-canvas\'),
	mapOptions);
	}
	google.maps.event.addDomListener(window, \'load\', initialize);
	</script>'),
	
	'Google Maps (search query)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googlemapssearch\');
	</script>',
	'widget'=> '
	<div class="googlemapssearch" data-search="SEARCHWORDS" data-api-key="YOUR_GOOGLE_MAP_API_KEY" width="WIDTH" height="HEIGHT" ></div>',
	'remove'=>'<iframe width="WIDTH" height="HEIGHT" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=SEARCHWORDS" allowfullscreen> </iframe>'),
	
	'Google Tag Manager'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.googletagmanagerId = \'GTM-XXXX\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googletagmanager\');
	</script>',
	'remove'=>'<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
	new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
	\'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,\'script\',\'dataLayer\',\'GTM-XXXX\');</script>'),
	
	'Google Tag Manager (multiple)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.multiplegoogletagmanagerId = [\'GTM-XXXX\'];
	(tarteaucitron.job = tarteaucitron.job || []).push(\'multiplegoogletagmanager\');
	</script>',
	'remove'=>'<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
	new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
	\'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,\'script\',\'dataLayer\',\'GTM-XXXX\');</script>'),
	
	'HelloAsso'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'helloasso\');
	</script>',
	'widget'=> '
	<div class="tac_helloasso" data-url="url" width="width" height="height"></div>',
	'remove'=>'<iframe id="haWidget" allowtransparency="true" scrolling="auto" src="url" style="width:width;height:height;border:none;" onload="window.scroll(0, this.offsetTop)"></iframe>'),
	
	'M6 Météo'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'m6meteo\');
	</script>',
	'widget'=> '
	<div class="tac_m6meteo" data-id="id" width="width" height="height"></div>',
	'remove'=>'<div id="cont_id">
	<div id="spa_xxx"><a id="a_xxx" href="" target="_top" style="color:#333;text-decoration:none;">Météo</a> ©<a target="_top" href="https://www.meteocity.com">M6météo</a></div>
	<script type="text/javascript" src="https://www.meteocity.com/widget/js/xxx"></script>
	</div>'),
	
	'Marketo munchkin'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.marketomunchkinkey = \'marketomunchkinkey\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'marketomunchkin\');
	</script>',
	'remove'=>'<script>        var didInit = false;
	function initMunchkin() {
	if(didInit === false) {
	didInit = true;
	Munchkin.init(\'marketomunchkinkey\');
	}
	}
	var s = document.createElement(\'script\');
	s.type = \'text/javascript\';
	s.async = true;
	s.src = \'//munchkin.marketo.net/munchkin.js\';
	s.onreadystatechange = function() {
	if (this.readyState == \'complete\' || this.readyState == \'loaded\') {
	initMunchkin();
	}
	};
	s.onload = initMunchkin;
	document.getElementsByTagName(\'head\')[0].appendChild(s);</script>'),
	
	'Matomo Tag Manager'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.matomotmUrl = \'matomomtUrl\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'matomotm\');
	</script>',
	'remove'=>'<script>
	var _mtm = window._mtm = window._mtm || [];
	_mtm.push({\'mtm.startTime\': (new Date().getTime()), \'event\': \'mtm.Start\'});
	var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0];
	g.async=true; g.src=\'matomomtUrl\'; s.parentNode.insertBefore(g,s);
	</script>'),
	
	'MTcaptcha'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.mtcaptchaSitekey = \'SiteKey\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'mtcaptcha\');
	</script>',
	'remove'=>'<script>
	var mtcaptchaConfig = {
	"sitekey": "SiteKey"
	};
	(function(){var mt_service = document.createElement(\'script\');mt_service.async = true;mt_service.src = \'https://service.mtcaptcha.com/mtcv1/client/mtcaptcha.min.js\';(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(mt_service);
	var mt_service2 = document.createElement(\'script\');mt_service2.async = true;mt_service2.src = \'https://service2.mtcaptcha.com/mtcv1/client/mtcaptcha2.min.js\';(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(mt_service2);}) ();
	</script>'),
	
	'MyFeelBack (Skeepers)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.myfeelbackId = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'myfeelback\');
	</script>',
	'remove'=>'<script type=\'text/javascript\'> window._Mfb_useCookie = true; // Review the commented lines. Insert real values for the placeholders window._Mfb_ud = { _context : { lang : undefined, // You can force the language of the survey. privacyMode : false, _page : { url : location.pathname, storageDuration : 30 // You can add page\'s properties here ie : pageProperties : { property1 : \'value\', property2 : \'value\'} } } }; (function() { var mfb = document.createElement(\'script\'); mfb.type = \'text/javascript\'; mfb.charset = \'UTF-8\'; mfb.async = true; mfb.id = \'MFBActor\'; mfb.src = \'https://actorssl-5637.kxcdn.com/actor/ID/action\'; var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(mfb, s); })(); </script>
	'),
	
	'Météo France'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'meteofrance\');
	</script>',
	'widget'=> '
	<div class="tac_meteofrance" data-insee="insee" width="width" height="height"></div>',
	'remove'=>'<iframe id="widget_autocomplete_preview"  width="width" height="height" frameborder="0" src="https://meteofrance.com/widget/prevision/insee"></iframe>'),
	
	'OneSignal'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.onesignalAppId = \'onesignalAppId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'onesignal\');
	</script>',
	'remove'=>'<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" type="text/javascript"></script>
	<script>
	var OneSignal = window.OneSignal || [];
	OneSignal.push(function() {
	OneSignal.init({
	appId: "onesignalAppId",
	});
	});
	</script>'),
	
	'Openstreetmap Embed'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'openstreetmap\');
	</script>',
	'widget'=> '
	<div class="openstreetmap" data-url="url" width="width" height="height"></div>',
	'remove'=>'<iframe width="width" height="height" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="url" style="border: 1px solid black"></iframe>'),
	
	'Pingdom'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.pingdomId = \'pingdomId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'pingdom\');
	</script>',
	'remove'=>'<script> var _prum = [[\'id\', \'pingdomId\'], [\'mark\', \'firstbyte\', (new Date()).getTime()]]; (function() { var s = document.getElementsByTagName(\'script\')[0] , p = document.createElement(\'script\'); p.async = \'async\'; p.src = \'//rum-static.pingdom.net/prum.min.js\'; s.parentNode.insertBefore(p, s); })(); </script>
	'),
	
	'reCAPTCHA'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.recaptchaapi = \'XXXXX\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'recaptcha\');
	</script>',
	'widget'=> '
	<div class="g-recaptcha" data-sitekey="sitekey"></div>',
	'remove'=>'<script src=\'https://www.google.com/recaptcha/api.js?render=XXXXX\'></script>'),
	
	'Stonly'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.stonlyId = \'stonlyId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'stonly\');
	</script>',
	'remove'=>'<!-- stonly-widget - copy into the head -->
	<script>var STONLY_WID = "stonlyId";</script>
	<script>
	!function(s,t,o,n,l,y,w,g){s.StonlyWidget||((w=s.StonlyWidget=function(){
	w._api?w._api.apply(w,arguments):w.queue.push(arguments)}).queue=[],(y=t.createElement(o)).async=!0,
	(g=new XMLHttpRequest).open("GET",n+"version?v="+Date.now(),!0),g.onreadystatechange=function(){
	4===g.readyState&&(y.src=n+"stonly-widget.js?v="+(200===g.status?g.responseText:Date.now()),
	(l=t.getElementsByTagName(o)[0]).parentNode.insertBefore(y,l))},g.send())
	}(window,document,"script","https://stonly.com/js/widget/v2/");
	</script>
	<!-- stonly-widget - copy into the head -->'),
	
	'TagCommander'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.tagcommanderid = \'tagcommanderid\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'tagcommander\');
	</script>',
	'remove'=>'<script type="text/javascript" src="https://cdn.tagcommander.com/tagcommanderid.js"></script>'),
	
	'Timeline JS'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'timelinejs\');
	</script>',
	'widget'=> '
	<div class="timelinejs-canvas" spreadsheet_id="spreadsheet_id" width="width" height="height" lang="lang_2_letter" font="font (Bevan-PotanoSans | Georgia-Helvetica | Arvo-PTSans)" map="map (toner | osm)" start_at_end="start_at_end (false | true)" hash_bookmark="hash_bookmark (false | true)" start_at_slide="start_at_slide (0 | ...)" start_zoom="start_zoom (0 | ... | 5)"></div>
	',
	'remove'=>'<iframe src="//cdn.knightlab.com/libs/timeline/latest/embed/index.html?source=spreadsheet_id&font=font&maptype=map&lang=lang_2_letter&start_at_end=start_at_end&hash_bookmark=hash_bookmark&start_at_slide=start_at_slide&start_zoom_adjust=start_zoom_adjust&height=height" width="width" height="height" frameborder="0"></iframe>
	'),
	
	'Typekit (adobe)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.typekitId = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'typekit\');
	</script>',
	'remove'=>'<script type="text/javascript" src="//use.typekit.net/id.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>'),
	
	'X (formerly Twitter) Widgets API'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'twitterwidgetsapi\');
	</script>',
	'remove'=>''),
	
	'Active Campaign 2023'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.activecampaignAccount = \'Account\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'activecampaignvgo\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
	
	vgo(\'setAccount\', \'Account\');
	
	vgo(\'setTrackByDefault\', true);
	vgo(\'process\');
	</script>'),
	
	'Calendly'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'calendly\');
	</script>',
	'widget'=> '
	<div class="calendly-inline-widget" data-url=https://calendly.com/URL30min style="min-width:320px;height:1030px;"></div>',
	'remove'=>'<script type="text/javascript" src=https://assets.calendly.com/assets/external/widget.js async></script>'),
	
	'Collect Chat'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.collectchatId = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'collectchat\');
	</script>',
	'remove'=>'<script>(function(w, d) { w.CollectId = "ID"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", https://collectcdn.com/launcher.js); h.appendChild(s); })(window, document);</script>
	'),
	
	'Crisp Chat'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.crispID = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'crisp\');
	</script>',
	'remove'=>'<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID=ID;(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
	'),
	
	'Facil\'ITI'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.facilitiID = \'facilitiID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'faciliti\');
	</script>',
	'remove'=>'<script type="text/javascript">(function(w, d, s, f) {
	w[f] = w[f] || {conf: function () { (w[f].data = w[f].data || []).push(arguments);}};
	var l = d.createElement(s), e = d.getElementsByTagName(s)[0];
	l.async = 1; l.src = \'https://ws.facil-iti.com/tag/faciliti-tag.min.js\'; e.parentNode.insertBefore(l, e);
	}(window, document, \'script\', \'FACIL_ITI\'));
	FACIL_ITI.conf(\'userId\', \'facilitiID\');</script>'),
	
	'Gallica'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gallica\');
	</script>',
	'widget'=> '
	<div class="gallica_player" data-style="style" data-src="src"></div>',
	'remove'=>'<div style="display: block; "><iframe style="style" src="src"></iframe></div>'),
	
	'Google Agenda'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gagenda\');
	</script>',
	'widget'=> '
	<div class="gagenda_embed" width="width" height="height" data="data"></div>',
	'remove'=>'<iframe width="width" height="height" src="https://www.google.com/calendar/embed?data"></iframe>'),
	
	'Google Docs'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gdocs\');
	</script>',
	'widget'=> '
	<div class="gdocs_embed" width="width" height="height" id="id"></div>',
	'remove'=>'<iframe width="width" height="height" src="https://docs.google.com/document/d/e/id/pub?embedded=true"></iframe>'),
	
	'Google Forms'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gforms\');
	</script>',
	'widget'=> '
	<div class="gforms_embed" width="width" height="height" id="id"></div>',
	'remove'=>'<iframe width="width" height="height" src="https://docs.google.com/forms/d/e/id/viewform?embedded=true"></iframe>'),
	
	'Google Maps (no api)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'maps_noapi\');
	</script>',
	'widget'=> '
	<div class="googlemaps_embed" width="width" height="height" id="id"></div>',
	'remove'=>'<iframe width="width" height="height" src="https://google.com/maps/embed?pb=id"></iframe>'),
	
	'Google Optimize'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.goptimize = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'goptimize\');
	</script>',
	'remove'=>'<script src="https://www.googleoptimize.com/optimize.js?id=ID"></script>'),
	
	'Google Sheets'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gsheets\');
	</script>',
	'widget'=> '
	<div class="gsheets_embed" width="width" height="height" id="id" headers="headers"></div>',
	'remove'=>'<iframe width="width" height="height" src="https://docs.google.com/spreadsheets/d/e/id/pubhtml?widget=true&amp;headers=headers"></iframe>'),
	
	'Google Signin'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googlesignin\');
	</script>',
	'remove'=>'<script src="https://accounts.google.com/gsi/client" async defer></script>'),
	
	'Google Slides'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gslides\');
	</script>',
	'widget'=> '
	<div class="gslides_embed" width="width" height="height" id="id" autostart="autostart (true | false)" loop="loop (true | false)" delay="delay"></div>
	',
	'remove'=>'<iframe width="width" height="height" src="https://docs.google.com/presentation/d/e/id/embed?start=autostart (true | false)&loop=loop (true | false)&delayms=delay"></iframe>'),
	
	'hCaptcha'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'hcaptcha\');
	</script>',
	'widget'=> '
	<div class="h-captcha" data-sitekey="siteKey"></div>',
	'remove'=>'<script src="https://hcaptcha.com/1/api.js"></script>'),
	
	'Posthog'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.posthogApiKey = \'apiKey\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'posthog\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.posthogHost = \'host\';</script>',
	'remove'=>'<script>
	!function(t,e){var o,n,p,r;e.__SV||(window.posthog=e,e._i=[],e.init=function(i,s,a){function g(t,e){var o=e.split(".");2==o.length&&(t=t[o[0]],e=o[1]),t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}}(p=t.createElement("script")).type="text/javascript",p.async=!0,p.src=s.api_host+"/static/array.js",(r=t.getElementsByTagName("script")[0]).parentNode.insertBefore(p,r);var u=e;for(void 0!==a?u=e[a]=[]:a="posthog",u.people=u.people||[],u.toString=function(t){var e="posthog";return"posthog"!==a&&(e+="."+a),t||(e+=" (stub)"),e},u.people.toString=function(){return u.toString(1)+".people (stub)"},o="capture identify alias people.set people.set_once set_config register register_once unregister opt_out_capturing has_opted_out_capturing opt_in_capturing reset isFeatureEnabled onFeatureFlags".split(" "),n=0;n<o.length;n++)g(u,o[n]);e._i.push([i,s,a])},e.__SV=1)}(document,window.posthog||[]);
	posthog.init(\'apiKey\', {api_host: \'host\'})
	</script>'),
	
	'Robo Fabrica Chatbot'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.robofabricaUuid = \'uuid\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'robofabrica\');
	</script>',
	'widget'=> '
	<button id="inceptive-cw-launch" type="button" name="button"></button>',
	'remove'=>'<script src="https://app.robofabrica.tech/widget/script" type="text/javascript" id="inceptive-cw-script" unique-url="uuid" label="start" launch-btn-id="inceptive-cw-launch" chat-server-url="https://app.robofabrica.tech:443"></script>
	
	<button id="inceptive-cw-launch" type="button" name="button" ></button>'),
	
	'sendinblue'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.sendinblueKey = \'Key\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'sendinblue\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function() {
	window.sib = {
	equeue: [],
	client_key: "Key"
	};
	window.sendinblue = {};
	for (var j = [\'track\', \'identify\', \'trackLink\', \'page\'], i = 0; i < j.length; i++) {
	(function(k) {
	window.sendinblue[k] = function() {
	var arg = Array.prototype.slice.call(arguments);
	(window.sib[k] || function() {
	var t = {};
	t[k] = arg;
	window.sib.equeue.push(t);
	})(arg[0], arg[1], arg[2], arg[3]);
	};
	})(j[i]);
	}
	var n = document.createElement("script"),
	i = document.getElementsByTagName("script")[0];
	n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
	})();
	</script>'),
	
	'service perso'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'serviceperso\');
	</script>',
	'remove'=>''),
	
	'tolk.ai'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.tolkaiBot = \'bot\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'tolkai\');
	</script>',
	'remove'=>'<script>
	var tcfbot = "bot";
	var TcfWbchtParams = { behaviour: \'default\' };
	var display = \'iframe\';
	var script = document.createElement(\'script\');
	script.type = \'text/javascript\';
	script.src = \'https://script.tolk.ai/iframe-latest.js\';
	document.body.appendChild(script);
	</script>'),
	
	'Trustpilot'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'trustpilot\');
	</script>',
	'widget'=> '
	<div class="trustpilot-widget" data-locale="dataLocale" data-template-id="templateId" data-businessunit-id="businessunitId" data-style-height="height" data-style-width="width" data-theme="theme (light | dark)" data-stars="stars" data-review-languages="reviewLocale"></div>
	',
	'remove'=>'<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.sync.bootstrap.min.js" async></script>'),
	
	'Ubib Chatbot'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.ubibId = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'ubib\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.ubibHash = \'hash\';</script><div id="libchat_hash"></div>',
	'remove'=>'<script src="https://id.libanswers.com/load_chat.php?hash=hash"></script>'),
	
	'Disqus'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.disqusShortname = \'disqus_shortname\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'disqus\');
	</script>',
	'widget'=> '
	<div id="disqus_thread"></div>',
	'remove'=>'<script type="text/javascript">
	var disqus_shortname = \'disqus_shortname\';
	/* * * DON\'T EDIT BELOW THIS LINE * * */
	(function() {
	var dsq = document.createElement(\'script\');
	dsq.type = \'text/javascript\';
	dsq.async = true;
	dsq.src = \'//\' + disqus_shortname + \'.disqus.com/embed.js\';
	(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
	})();
	</script>'),
	
	'Facebook (commentaire)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'facebookcomment\');
	</script>',
	'widget'=> '
	<div class="fb-comments" data-numposts="5" data-colorscheme="light" data-href="CURRENT_URI"></div>
	<div class="fb-comments" data-numposts="5" data-colorscheme="dark" data-href="CURRENT_URI"></div>',
	'remove'=>'<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
	}
	(document, \'script\', \'facebook-jssdk\'));
	</script>'),
	
	'ActiSTAT'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.actistatId = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'actistat\');
	</script>',
	'remove'=>'<script async defer data-website-id="id" src="https://actistat.fr/umami.js"></script>'),
	
	'Adobe - Analysis Workspace'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.adobeworkspaceId1 = \'id1\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'adobeworkspace\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.adobeworkspaceId2 = \'id2\';tarteaucitron.user.adobeworkspaceId3 = \'id3\';</script>',
	'remove'=>'<script src="https://assets.adobedtm.com/id1/id2/launch-id3.min.js" async></script>'),
	
	'Adobe Analytics'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.adobeanalyticskey = \'adobeanalyticskey\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'adobeanalytics\');
	</script>',
	'remove'=>'<script type="text/javascript" src="//assets.adobedtm.com/launch-adobeanalyticskey.min.js" async></script>'),
	
	'Alexa'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.alexaAccountID = \'account_id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'alexa\');
	</script>',
	'remove'=>'<script type="text/javascript">
	_atrk_opts = { atrk_acct:"account_id", domain:"domain.name",dynamic: true};
	(function() { var as = document.createElement(\'script\'); as.type = \'text/javascript\'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName(\'script\')[0];s.parentNode.insertBefore(as, s); })();
	</script>'),
	
	'Amplitude'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.amplitude = \'API_KEY\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'amplitude\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function(e,t){var n=e.amplitude||{_q:[],_iq:{}};var r=t.createElement("script")
	;r.type="text/javascript"
	;r.integrity="sha384-vYYnQ3LPdp/RkQjoKBTGSq0X5F73gXU3G2QopHaIfna0Ct1JRWzwrmEz115NzOta"
	;r.crossOrigin="anonymous";r.async=true
	;r.src="https://cdn.amplitude.com/libs/amplitude-5.8.0-min.gz.js"
	;r.onload=function(){if(!e.amplitude.runQueuedFunctions){
	console.log("[Amplitude] Error: could not load SDK")}}
	;var i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)
	;function s(e,t){e.prototype[t]=function(){
	this._q.push([t].concat(Array.prototype.slice.call(arguments,0)));return this}}
	var o=function(){this._q=[];return this}
	;var a=["add","append","clearAll","prepend","set","setOnce","unset"]
	;for(var u=0;u<a.length;u++){s(o,a[u])}n.Identify=o;var c=function(){this._q=[]
	;return this}
	;var l=["setProductId","setQuantity","setPrice","setRevenueType","setEventProperties"]
	;for(var p=0;p<l.length;p++){s(c,l[p])}n.Revenue=c
	;var d=["init","logEvent","logRevenue","setUserId","setUserProperties","setOptOut","setVersionName","setDomain","setDeviceId", "enableTracking", "setGlobalUserProperties","identify","clearUserProperties","setGroup","logRevenueV2","regenerateDeviceId","groupIdentify","onInit","logEventWithTimestamp","logEventWithGroups","setSessionId","resetSessionId"]
	;function v(e){function t(t){e[t]=function(){
	e._q.push([t].concat(Array.prototype.slice.call(arguments,0)))}}
	for(var n=0;n<d.length;n++){t(d[n])}}v(n);n.getInstance=function(e){
	e=(!e||e.length===0?"$default_instance":e).toLowerCase()
	;if(!n._iq.hasOwnProperty(e)){n._iq[e]={_q:[]};v(n._iq[e])}return n._iq[e]}
	;e.amplitude=n})(window,document);
	
	amplitude.getInstance().init("API_KEY");
	</script>'),
	
	'AT Internet (privacy by design)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.atLibUrl = \'SMARTTAG_JS_LINK\';
	tarteaucitron.user.atMore = function () { /* add here your optionnal ATInternet.Tracker.Tag configuration */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'atinternet\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.atinternetSendData = sendData (true | false);tarteaucitron.user.atNoFallback = noFallback (false | true);</script>',
	'remove'=>'<script src="SMARTTAG_JS_LINK"></script>'),
	
	'Clarity'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.clarity = \'clarity_id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'clarity\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function(c,l,a,r,i,t,y){
	c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
	t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
	y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
	})(window, document, "clarity", "script", "clarity_id");
	</script>'),
	
	'Clicky'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.clickyId = YOUR-ID;
	tarteaucitron.user.clickyMore = function () { /* add here your optionnal clicky function */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'clicky\');
	</script>',
	'remove'=>'<script type="text/javascript">
	var clicky_site_ids = clicky_site_ids || [];
	clicky_site_ids.push(YOUR-ID);
	(function() {
	var s = document.createElement(\'script\');
	s.type = \'text/javascript\';
	s.async = true;
	s.src = \'//static.getclicky.com/js\';
	( document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0] ).appendChild( s ); })();
	</script>'),
	
	'Compteur.fr'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.compteurID = \'compteurID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'compteur\');
	</script>',
	'remove'=>'<span id="wtscompteurID"></span>
	<script>
	var wts7 = {};
	var wts=document.createElement(\'script\');wts.async=true;
	wts.src=\'https://server2.compteur.fr/log7.js\';document.head.appendChild(wts);
	wts.onload = function(){ wtslog7(compteurID,1); };
	</script>'),
	
	'ContentSquare'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.contentsquareID = \'YOUR_TAG_ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'contentsquare\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function() {
	var mt = document.createElement("script"); mt.type = "text/javascript"; mt.async = true;
	mt.src = "//t.contentsquare.net/uxa/YOUR_TAG_ID.js";
	document.getElementsByTagName("head")[0].appendChild(mt);
	})();
	</script>'),
	
	'Crazy Egg'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.crazyeggId = \'account_id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'crazyegg\');
	</script>',
	'remove'=>'<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/account_id.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
	</script>'),
	
	'eTracker'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.etracker = \'data-secure-code\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'etracker\');
	</script>',
	'remove'=>'<script id="_etLoader" type="text/javascript" charset="UTF-8" data-secure-code="data-secure-code" src="//static.etracker.com/code/e.js"></script>
	'),
	
	'Eulerian (not officially supported)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.eulerianHost = \'host\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'eulerian\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function(e,a){var i=e.length,y=5381,k=\'script\',s=window,v=document,o=v.createElement(k);for(;i;){i-=1;y=(y*33)^e.charCodeAt(i)}y=\'_EA_\'+(y>>>=0);(function(e,a,s,y){s[a]=s[a]||function(){(s[y]=s[y]||[]).push(arguments);s[y].eah=e;};}(e,a,s,y));i=new Date/1E7|0;o.ea=y;y=i%26;o.async=1;o.src=\'//\'+e+\'/\'+String.fromCharCode(97+y,122-y,65+y)+(i%1E3)+\'.js?2\';s=v.getElementsByTagName(k)[0];s.parentNode.insertBefore(o,s);})
	(\'host\',\'EA_push\');
	EA_push();
	</script>'),
	
	'FERank (privacy by design)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'ferank\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function() {
	var ferank = document.createElement(\'script\');
	ferank.type = \'text/javascript\';
	ferank.async = true;
	ferank.src = \'//static.ferank.fr/pixel.js\';
	var s = document.getElementsByTagName(\'script\')[0];
	s.parentNode.insertBefore(ferank, s);
	})();
	</script>'),
	
	'Firebase'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.firebaseApiKey = \'APIKEY\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'firebase\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.firebaseAuthDomain = \'AUTHDOMAIN\';tarteaucitron.user.firebaseDatabaseUrl = \'DATABASEURL\';tarteaucitron.user.firebaseProjectId = \'PROJECTID\';tarteaucitron.user.firebaseStorageBucket = \'STORAGEBUCKET\';tarteaucitron.user.firebaseAppId = \'APPID\';tarteaucitron.user.firebaseMeasurementId = \'MEASUREMENTID\';</script>
	',
	'remove'=>'<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-analytics.js"></script>
	<script>
	var firebaseConfig = {
	apiKey: "APIKEY",
	authDomain: "AUTHDOMAIN",
	databaseURL: "DATABASEURL",
	projectId: "PROJECTID",
	storageBucket: "STORAGEBUCKET",
	appId: "APPID",
	measurementId: "MEASUREMENTID",
	};
	firebase.initializeApp(firebaseConfig);
	firebase.analytics();
	</script>'),
	
	'Force24'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.force24trackingId = \'trackingId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'force24\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.force24clientId = \'clientId\';</script>',
	'remove'=>'<script>
	(function (f, o, r, c, e, _2, _4) {
	f.Force24Object = e, f[e] = f[e] || function () {
	f[e].q = f[e].q || [], f[e].q.push(arguments)
	}, f[e].l = 1 * new Date, _2 = o.createElement(r),
	_4 = o.getElementsByTagName(r)[0], _2.async = !0, _2.src = c, _4.parentNode.insertBefore(_2, _4)
	})(window, document, "script", "https://static.websites.data-crypt.com/scripts/activity/v3/inject-v3.min.js", "f24");
	
	f24(\'config\', \'set_tracking_id\', \'trackingId\');
	f24(\'config\', \'set_client_id\', \'clientId\');
	</script>'),
	
	'FreshSales (CRM)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.freshsalescrmId = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'freshsalescrm\');
	</script>',
	'remove'=>'<script src=\'//eu.fw-cdn.com/ID.js\' chat=\'false\'></script>'),
	
	'Get+'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.getplusId = \'ACCOUNT_ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'getplus\');
	</script>',
	'remove'=>'<script type="text/javascript">
	var webleads_site_ids = webleads_site_ids || [];
	webleads_site_ids.push(ACCOUNT_ID);
	
	(function() {
	var s = document.createElement(\'script\');
	s.type = \'text/javascript\';
	s.async = true;
	s.src = ( document.location.protocol == \'https:\' ? \'https://stats.webleads-tracker.com/js\' : \'http://stats.webleads-tracker.com/js\' );
	( document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0] ).appendChild( s );
	})();
	</script>'),
	
	'GetQuanty'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.getguanty = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'getquanty\');
	</script>',
	'remove'=>'<script async defer src="https://get.smart-data-systems.com/gq?siteid=id&consent=1"></script>'),
	
	'Google Analytics (ga.js)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.gajsUa = \'UA-XXXXXXXX-X\';
	tarteaucitron.user.gajsMore = function () { /* add here your optionnal _ga.push() */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gajs\');
	</script>',
	'remove'=>'<script>
	var _gaq = _gaq || [];
	_gaq.push([\'_setAccount\', \'UA-XXXXXXX-X\']);
	_gaq.push([\'_trackPageview\']);
	
	(function() {
	var ga = document.createElement(\'script\');
	ga.type = \'text/javascript\';
	ga.async = true;
	ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
	var s = document.getElementsByTagName(\'script\')[0];
	s.parentNode.insertBefore(ga, s);
	})();
	
	// your optionnal _ga.push()
	</script>'),
	
	'Google Analytics (GA4)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.gtagUa = \'G-XXXXXXXXX\';
	// tarteaucitron.user.gtagCrossdomain = [\'example.com\', \'example2.com\'];
	tarteaucitron.user.gtagMore = function () { /* add here your optionnal gtag() */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gtag\');
	</script>',
	'remove'=>'<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXX"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag(\'js\', new Date());
	
	gtag(\'config\', \'G-XXXXXXXXX\');
	
	// your optionnal gtag()
	</script>'),
	
	'Google Analytics (gtag.js) [for multiple UA]'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.multiplegtagUa = [\'UA-XXXXXXXX-X\', \'UA-XXXXXXXX-X\', \'UA-XXXXXXXX-X\'];
	(tarteaucitron.job = tarteaucitron.job || []).push(\'multiplegtag\');
	</script>',
	'remove'=>'<script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXX-X"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag(\'js\', new Date());
	
	gtag(\'config\', \'UA-XXXXXXXX-X\');
	
	// your optionnal gtag()
	</script>'),
	
	'Google Analytics (universal)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.analyticsUa = \'UA-XXXXXXXX-X\';
	tarteaucitron.user.analyticsMore = function () { /* optionnal ga.push() */ };
	tarteaucitron.user.analyticsUaCreate = { /* optionnal create configuration */ };
	tarteaucitron.user.analyticsAnonymizeIp = true;
	tarteaucitron.user.analyticsPageView = { /* optionnal pageview configuration */ };
	tarteaucitron.user.analyticsMore = function () { /* optionnal ga.push() */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'analytics\');
	</script>',
	'remove'=>'<script>
	(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');
	
	ga(\'create\', \'UA-XXXXXXXX-X\', \'auto\');
	ga(\'send\', \'pageview\');
	
	// your optionnal ga.push()
	</script>'),
	
	'Hotjar'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'hotjar\');
	</script>',
	'widget'=> '
	<script type="text/javascript">tarteaucitron.user.hotjarId = hotjarId;tarteaucitron.user.HotjarSv = HotjarSv;</script>',
	'remove'=>'<script>
	(function(h,o,t,j,a,r){
	h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	h._hjSettings={hjid:hotjarId,hjsv:HotjarSv};
	a=o.getElementsByTagName(\'head\')[0];
	r=o.createElement(\'script\');r.async=1;
	r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	a.appendChild(r);
	})(window,document,\'//static.hotjar.com/c/hotjar-\',\'.js?sv=\');
	</script>'),
	
	'Hubspot'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.hubspotId = \'API_KEY\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'hubspot\');
	</script>',
	'remove'=>'<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/API_KEY.js"></script>'),
	
	'Kameleoon'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.kameleoon = \'kameleoon_id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'kameleoon\');
	</script>',
	'remove'=>'<script src="https://kameleoon_id.kameleoon.eu/kameleoon.js"></script>'),
	
	'Koban'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.kobanurl = \'KOBEN_URL\';
	tarteaucitron.user.kobanapi = \'KOBAN_API\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'koban\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function (i, s, o, g, r, a, m) {
	i[\'KobanObject\'] = r; i[r] = i[r] || function () {
	(i[r].q = i[r].q || []).push(arguments)
	}, i[r].l = 1 * new Date(); a = s.createElement(o),
	m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
	})
	(window, document, \'script\', \'KOBEN_URL\', \'kb\');
	kb(\'reg\', \'KOBAN_API\');
	</script>'),
	
	'Leadinfo'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.leadinfoId = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'leadinfo\');
	</script>',
	'remove'=>'<script> (function(l,e,a,d,i,n,f,o){if(!l[i]){l.GlobalLeadinfoNamespace=l.GlobalLeadinfoNamespace||[]; l.GlobalLeadinfoNamespace.push(i);l[i]=function(){(l[i].q=l[i].q||[]).push(arguments)};l[i].t=l[i].t||n; l[i].q=l[i].q||[];o=e.createElement(a);f=e.getElementsByTagName(a)[0];o.async=1;o.src=d;f.parentNode.insertBefore(o,f);} }(window,document,"script","https://cdn.leadinfo.net/ping.js","leadinfo","ID")); </script>
	'),
	
	'Matomo (privacy by design)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.matomoId = SITE_ID;
	(tarteaucitron.job = tarteaucitron.job || []).push(\'matomo\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.matomoHost = \'YOUR_MATOMO_URL\';</script>',
	'remove'=>'<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push([\'trackPageView\']);
	_paq.push([\'enableLinkTracking\']);
	(function() {
	var u="YOUR_MATOMO_URL";
	_paq.push([\'setTrackerUrl\', u+\'piwik.php\']);
	_paq.push([\'setSiteId\', SITE_ID]);
	var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0];
	g.type=\'text/javascript\'; g.async=true; g.defer=true; g.src=u+\'piwik.js\'; s.parentNode.insertBefore(g,s);
	})();
	</script>'),
	
	'Matomo Cloud (privacy by design)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.matomoId = SITE_ID;
	(tarteaucitron.job = tarteaucitron.job || []).push(\'matomocloud\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.matomoHost = \'YOUR_MATOMO_URL\';tarteaucitron.user.matomoCustomJSPath = \'JS_PATH\';</script>',
	'remove'=>'<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push([\'trackPageView\']);
	_paq.push([\'enableLinkTracking\']);
	(function() {
	var u="YOUR_MATOMO_URL";
	_paq.push([\'setTrackerUrl\', u+\'matomo.php\']);
	_paq.push([\'setSiteId\', SITE_ID]);
	var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0];
	g.type=\'text/javascript\'; g.async=true; g.defer=true; g.src=\'JS_PATH\'; s.parentNode.insertBefore(g,s);
	})();
	</script>'),
	
	'Mautic'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.mauticurl = \'mautic_url\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'mautic\');
	</script>',
	'remove'=>'<script>
	(function(w,d,t,u,n,a,m){w[\'MauticTrackingObject\']=n;
	w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
	m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
	})(window,document,\'script\',\'mautic_url\',\'mt\');
	
	mt(\'send\', \'pageview\');
	</script>'),
	
	'MicroAnalytics'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.microanalyticsID = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'microanalytics\');
	</script>',
	'remove'=>'<script data-host="https://microanalytics.io/" data-dnt="false" src="https://microanalytics.io/js/script.js" id="ID" async defer></script>
	'),
	
	'Microsoft Campaign Analytics'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'microsoftcampaignanalytics\');
	</script>',
	'widget'=> '
	<script type="text/javascript">tarteaucitron.user.microsoftcampaignanalyticsUUID = \'UUID\';tarteaucitron.user.microsoftcampaignanalyticsdomaineId = \'domainId\';tarteaucitron.user.microsoftcampaignanalyticsactionId = \'actionId\';</script>
	',
	'remove'=>'<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script>
	<script id="mstag_tops" type="text/javascript" src="https://flex.atdmt.com/mstag/site/UUID/mstag.js"></script>
	<script class="conversionmsn" type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"domainId",type:"1",actionid:"actionId"})</script>'),
	
	'Mixpanel'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'mixpanel\');
	</script>',
	'remove'=>'<script type="text/javascript">
	(function (f, b) { if (!b.__SV) { var e, g, i, h; window.mixpanel = b; b._i = []; b.init = function (e, f, c) { function g(a, d) { var b = d.split("."); 2 == b.length && ((a = a[b[0]]), (d = b[1])); a[d] = function () { a.push([d].concat(Array.prototype.slice.call(arguments, 0))); }; } var a = b; "undefined" !== typeof c ? (a = b[c] = []) : (c = "mixpanel"); a.people = a.people || []; a.toString = function (a) { var d = "mixpanel"; "mixpanel" !== c && (d += "." + c); a || (d += " (stub)"); return d; }; a.people.toString = function () { return a.toString(1) + ".people (stub)"; }; i = "disable time_event track track_pageview track_links track_forms track_with_groups add_group set_group remove_group register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking start_batch_senders people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user people.remove".split( " "); for (h = 0; h < i.length; h++) g(a, i[h]); var j = "set set_once union unset remove delete".split(" "); a.get_group = function () { function b(c) { d[c] = function () { call2_args = arguments; call2 = [c].concat(Array.prototype.slice.call(call2_args, 0)); a.push([e, call2]); }; } for ( var d = {}, e = ["get_group"].concat( Array.prototype.slice.call(arguments, 0)), c = 0; c < j.length; c++) b(j[c]); return d; }; b._i.push([e, f, c]); }; b.__SV = 1.2; e = f.createElement("script"); e.type = "text/javascript"; e.async = !0; e.src = "undefined" !== typeof MIXPANEL_CUSTOM_LIB_URL ? MIXPANEL_CUSTOM_LIB_URL : "file:" === f.location.protocol && "//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//) ? "https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js" : "//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js"; g = f.getElementsByTagName("script")[0]; g.parentNode.insertBefore(e, g); } })(document, window.mixpanel || []);
	</script>'),
	
	'Open Web Analytics'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.openwebanalyticsHost = \'HOST\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'openwebanalytics\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.openwebanalyticsId = \'SITE_ID\';</script>',
	
	'remove'=>'<!-- Start Open Web Analytics Tracker -->
	<script type=\'text/javascript\'>
	//<![CDATA[
	var owa_baseUrl = \'HOST\';
	var owa_cmds = owa_cmds || [];
	owa_cmds.push([\'setDebug\', true]);
	owa_cmds.push([\'setSiteId\', \'SITE_ID\']);
	owa_cmds.push([\'trackPageView\']);
	owa_cmds.push([\'trackClicks\']);
	
	(function() {
	var _owa = document.createElement(\'script\'); _owa.type = \'text/javascript\'; _owa.async = true;
	owa_baseUrl = (\'https:\' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, \'https:\') : owa_baseUrl );
	_owa.src = owa_baseUrl + \'modules/base/js/owa.tracker-combined-min.js\';
	var _owa_s = document.getElementsByTagName(\'script\')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
	}());
	//]]>
	</script>
	<!-- End Open Web Analytics Code -->'),	
	
	'Pardot'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.piAId = \'piAId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'pardot\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.piCId = \'piCId\';</script>',
	
	'remove'=>'<script type="text/javascript">
	piAId = "piAId";
	piCId = "piCId";
	piHostname = "pi.pardot.com";
	
	(function() {
	function async_load(){
	var s = document.createElement(\'script\'); s.type = \'text/javascript\';
	s.src = (\'https:\' == document.location.protocol ? \'https://pi\' : \'http://cdn\') + \'.pardot.com/pd.js\';
	var c = document.getElementsByTagName(\'script\')[0]; c.parentNode.insertBefore(s, c);
	}
	if(window.attachEvent) { window.attachEvent(\'onload\', async_load); }
	else { window.addEventListener(\'load\', async_load, false); }
	})();
	
	</script>'),	
	
	'Piano Analytics'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.pianoSite = siteId;
	(tarteaucitron.job = tarteaucitron.job || []).push(\'pianoanalytics\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.pianoCollectDomain = \'collectDomain\';tarteaucitron.user.pianoSendData = sendData (true | false);</script>',
	
	'remove'=>'<script src="https://tag.aticdn.net/piano-analytics.js"></script> <script type="text/javascript"> pa.setConfigurations({site:siteId, collectDomain:\'collectDomain\' });</script><script type="text/javascript"> pa.sendEvent(\'page.display\', {\'page\' : \'page name\', \'page_chapter1\' : \'level 1\', \'page_chapter2\' : \'level 2\', \'page_chapter3\' : \'level 3\' }); </script>
	'),	
	
	'Piwik Pro'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.piwikProId = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'piwikpro\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.piwikProContainer = \'container\';</script>',
	
	'remove'=>'<script type="text/javascript">(function(window, document, dataLayerName, id) {window[dataLayerName]=window[dataLayerName]||[],window[dataLayerName].push({start:(new Date).getTime(),event:"stg.start"});var scripts=document.getElementsByTagName(\'script\')[0],tags=document.createElement(\'script\');function stgCreateCookie(a,b,c){var d="";if(c){var e=new Date;e.setTime(e.getTime()+24*c*60*60*1e3),d="; expires="+e.toUTCString()}document.cookie=a+"="+b+d+"; path=/"}var isStgDebug=(window.location.href.match("stg_debug")||document.cookie.match("stg_debug"))&&!window.location.href.match("stg_disable_debug");stgCreateCookie("stg_debug",isStgDebug?1:"",isStgDebug?14:-1);var qP=[];dataLayerName!=="dataLayer"&&qP.push("data_layer_name="+dataLayerName),isStgDebug&&qP.push("stg_debug");var qPString=qP.length>0?("?"+qP.join("&")):"";tags.async=!0,tags.src=https://container.containers.piwik.pro/+id+".js"+qPString,scripts.parentNode.insertBefore(tags,scripts);!function(a,n,i){a[n]=a[n]||{};for(var c=0;c<i.length;c++)!function(i){a[n][i]=a[n][i]||{},a[n][i].api=a[n][i].api||function(){var a=[].slice.call(arguments,0);"string"==typeof a[0]&&window[dataLayerName].push({event:n+"."+i+":"+a[0],parameters:[].slice.call(arguments,1)})}}(i[c])}(window,"ppms",["tm","cm"]);})(window, document, \'dataLayer\', \'ID\'); </script>
	'),	
	
	'Plausible'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.plausibleDomain = \'plausibleDomain\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'plausible\');
	</script>',
	
	'remove'=>'<script defer data-domain="plausibleDomain" src="https://plausible.io/js/script.js"></script>'),		
	
	'Plezi'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.pleziTenant = \'pleziTenant\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'plezi\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.pleziTw = \'pleziTw\';</script>',
	
	'remove'=>'<script type=\'text/javascript\' async src=\'https://app.plezi.co/scripts/ossleads_analytics.js?tenant=\'pleziTenant\'&tw=\'pleziTw\'\'></script>
	'),
	
	'SharpSpring'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.ssAccount = \'ACCOUNT\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'sharpspring\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.ssId = \'ID\';</script>',
	
	'remove'=>'<script type="text/javascript">
	var _ss = _ss || [];
	_ss.push([\'_setDomain\', \'https://ID.marketingautomation.services/net\']);
	_ss.push([\'_setAccount\', \'ACCOUNT\']);
	_ss.push([\'_trackPageView\']);
	window._pa = window._pa || {};
	
	(function() {
	var ss = document.createElement(\'script\');
	ss.type = \'text/javascript\'; ss.async = true;
	ss.src = (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + \'ID.marketingautomation.services/client/ss.js?ver=2.4.0\';
	var scr = document.getElementsByTagName(\'script\')[0];
	scr.parentNode.insertBefore(ss, scr);
	})();
	</script>'),
	
	'Shinystat'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.shinystatUser = \'user\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'shinystat\');
	</script>',
	
	'remove'=>'<script src="//codice.shinystat.com/cgi-bin/getcod.cgi?USER=user"></script>'),
	
	'Simple Analytics (privacy by design)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'simpleanalytics\');
	</script>',
	
	'remove'=>'<script async defer src="https://scripts.simpleanalyticscdn.com/latest.js"></script>
	<noscript><img src="https://queue.simpleanalyticscdn.com/noscript.gif" alt=""
	/></noscript>'),
	
	'Snapchat'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.snapchatId = \'snapchatId\';
	tarteaucitron.user.snapchatMore = function () { /* add here your optionnal snapchat function */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'snapchat\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.snapchatEmail = \'snapchatEmail\';</script>',
	
	'remove'=>'<script type=\'text/javascript\'> (function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function() {a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)}; a.queue=[];var s=\'script\';r=t.createElement(s);r.async=!0; r.src=n;var u=t.getElementsByTagName(s)[0]; u.parentNode.insertBefore(r,u);})(window,document, \'https://sc-static.net/scevent.min.js\'); snaptr(\'init\', \'snapchatId\', { \'user_email\': \'snapchatEmail\' }); snaptr(\'track\', \'PAGE_VIEW\'); </script>
	'),
	
	'StatCounter'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'statcounter\');
	</script>',
	'widget'=> '
	<div class="statcounter-canvas"></div>
	<script type="text/javascript">var sc_project = sc_project, sc_invisible = sc_invisible (0 | 1), sc_security = "sc_security", sc_text = sc_text (0 | 2 | 3 | 4 | 5);</script>
	
	',
	
	'remove'=>'<script type="text/javascript">
	var scJsHost = (("https:" == document.location.protocol) ?
	"https://secure." : "http://www.");
	document.write("<sc"+"ript type=\'text/javascript\' src=\'" +
	scJsHost+
	"statcounter.com/counter/counter.js\'></"+"script>");
	</script>'),
	
	'Tiktok'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.tiktokId = \'tiktokId\';
	tarteaucitron.user.tiktokMore = function () { /* add here your optionnal tiktok function */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'tiktok\');
	</script>',
	
	'remove'=>'<script> (function() { var ta = document.createElement(\'script\'); ta.type = \'text/javascript\'; ta.async = true; ta.src = \'https://analytics.tiktok.com/i18n/pixel/sdk.js?sdkid=tiktokId\'; var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ta, s); })(); </script>'),
	
	'UserPilot'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.userpilotToken = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'userpilot\');
	</script>',
	
	'remove'=>'<script>window.userpilotSettings = {token: "ID"}; </script><script src = "https://js.userpilot.io/sdk/latest.js"></script>'),
	
	'Verizon Dot Tag'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.verizondottagProjectId = \'verizon_project_id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'verizondottag\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.verizondottagPixelId = \'verizon_pixel_id\';</script>',
	
	'remove'=>'<script type="text/javascript">(function(w,d,t,r,u){w[u]=w[u]||[];w[u].push({properties:{pixelId:"verizon_pixel_id"},
	projectId:"verizon_project_id"});var s=d.createElement(t);s.src=r;s.async=true;s.onload=s.onreadystatechange=function(){var y,rs=this.readyState,c=w[u];if(rs&&rs!="complete"&&rs!="loaded"){return}try{y=YAHOO.ywa.I13N.fireBeacon;w[u]=[];w[u].push=function(p){y([p])};y(c)}catch(e){}};var scr=d.getElementsByTagName(t)[0],par=scr.parentNode;par.insertBefore(s,scr)})(window,document,"script","https://s.yimg.com/wi/ytc.js","dotq"); </script>
	'),
	
	'Visiblee'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.visibleeclientid = \'CLIENTID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'visiblee\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.visibleedomain = \'DOMAIN_COM\';</script>',
	
	'remove'=>'<script src="//www.link-page.info/tracking_CLIENTID.js"></script>'),
	
	'VisualRevenue'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.visualrevenueId = ID;
	(tarteaucitron.job = tarteaucitron.job || []).push(\'visualrevenue\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	var _vrq = _vrq || [];
	_vrq.push([\'id\', ID]);
	_vrq.push([\'automate\', true]);
	_vrq.push([\'track\', function(){}]);
	(function(d, a){
	var s = d.createElement(a),
	x = d.getElementsByTagName(a)[0];
	s.async = true;
	s.src = \'http://a.visualrevenue.com/vrs.js\';
	x.parentNode.insertBefore(s, x);
	})(document, \'script\');
	</script>'),
	
	'Webmecanik'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.webmecanikurl = \'webmecanikurl\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'webmecanik\');
	</script>',
	
	'remove'=>'<script>
	(function(w, d, t, u, n, a, m) {
	w[\'MauticTrackingObject\'] = n;
	w[n] = w[n] || function() {
	(w[n].q = w[n].q || []).push(arguments)
	}, a = d.createElement(t), m = d.getElementsByTagName(t)[0];
	a.async = 1;
	a.src = u;
	m.parentNode.insertBefore(a, m)
	})(window, document, \'script\', \'webmecanikurl\', \'mt\');
	mt(\'send\', \'pageview\');
	</script>'),
	
	'Weborama'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'weborama\');
	</script>',
	
	'remove'=>'<script type="text/javascript" src="https://cstatic.weborama.fr/js/advertiserv2/adperf_conversion.js"></script>'),
	
	'Woopra'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.woopraDomain = \'woopraDomain\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'woopra\');
	</script>',
	
	'remove'=>'<script>
	(function(){
	var t,i,e,n=window,o=document,a=arguments,s="script",r=["config","track","identify","visit","push","call","trackForm","trackClick"],c=function(){var t,i=this;for(i._e=[],t=0;r.length>t;t++)(function(t){i[t]=function(){return i._e.push([t].concat(Array.prototype.slice.call(arguments,0))),i}})(r[t])};for(n._w=n._w||{},t=0;a.length>t;t++)n._w[a[t]]=n[a[t]]=n[a[t]]||new c;i=o.createElement(s),i.async=1,i.src="//static.woopra.com/js/w.js",e=o.getElementsByTagName(s)[0],e.parentNode.insertBefore(i,e)
	})("woopra");
	woopra.config({
	domain: woopraDomain
	});
	woopra.track();
	</script>'),
	
	'Wysistat'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'wysistat\');
	</script>',
	'widget'=> '
	<script type="text/javascript">tarteaucitron.user.wysistat = {"cli": "nom", "frm": "frame", "prm": "prm", "ce": "compteurExtranet", "page": "page", "roi": "roi", "prof": "profiling", "cpt": "compte"};</script>',
	
	'remove'=>'<!--STATTAG-->
	<script type="text/javascript">var valeur=0;</script>
	<script type="text/javascript" src="http://www.wysistat.com/statistique.js";></script>
	<script type="text/javascript">if (valeur==1){stat("nom","frame","prm","compteurExtranet","page","roi","profiling","compte");}</script>
	<noscript><a href="[http://www.wysistat.com"]http://www.wysistat.com"; title="mesure audience internet">mesure d\'audience</a></noscript>
	<!--/STATTAG-->'),
	
	'Wysistat (privacy by design)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.wysistatNom = \'nom\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'wysistathightrack\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	var _wsq = _wsq || [];
	_wsq.push([\'_setNom\', \'nom\']);
	_wsq.push([\'_wysistat\']);
	
	(function(){
	var ws   = document.createElement(\'script\');
	ws.type  = \'text/javascript\';
	ws.async = true;
	ws.src = (\'https:\' == document.location.protocol ? \'https://www/\' : \'http://www/\') + \'.wysistat.com/ws.jsa\';
	var s    = document.getElementsByTagName(\'script\')[0]||document.getElementsByTagName(\'body\')[0];
	s.parentNode.insertBefore(ws, s);
	})();
	</script>'),
	
	'Xiti'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.xitiId = \'YOUR-ID\';
	tarteaucitron.user.xitiMore = function () { /* add here your optionnal xiti function */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'xiti\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	Xt_param = \'s=YOUR-ID&p=\';
	try {Xt_r = top.document.referrer;}
	catch(e) {Xt_r = document.referrer; }
	Xt_h = new Date();
	Xt_i = \'<img width="39" height="25" border="0" alt="" \';
	Xt_i += \'src="http://logv3.xiti.com/hit.xiti?\'+Xt_param;
	Xt_i += \'&hl=\'+Xt_h.getHours()+\'x\'+Xt_h.getMinutes()+\'x\'+Xt_h.getSeconds();
	if(parseFloat(navigator.appVersion)>=4) {Xt_s=screen;Xt_i+=\'&r=\'+Xt_s.width+\'x\'+Xt_s.height+\'x\'+Xt_s.pixelDepth+\'x\'+Xt_s.colorDepth;}
	document.write(Xt_i+\'&ref=\'+Xt_r.replace(/[<>"]/g, \'\').replace(/&/g, \'$\')+\'" title="Internet Audience">\');
	</script>'),
	
	'Yandex Metrica'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.yandexmetrica = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'metrica\');
	</script>',
	
	'remove'=>'<script type="text/javascript" >
	(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
	
	ym(id, "init", {
	clickmap:true,
	trackLinks:true,
	accurateTrackBounce:true,
	webvisor:true
	});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/id" style="position:absolute; left:-9999px;" alt="" /></div></noscr'),
	
	'Zoho PageSense'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.zohoPageSenseProjectId = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'zohopagesense\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.zohoPageSenseScriptHash = \'hash\';</script>',
	
	'remove'=>'<script src="https://cdn-eu.pagesense.io/js/id/hash.js"></script>'),
	
	'Active Campaign'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.actid = \'actid\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'activecampaign\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	var trackcmp_email = \'\';
	var trackcmp = document.createElement("script");
	trackcmp.async = true;
	trackcmp.type = \'text/javascript\';
	trackcmp.src = \'//trackcmp.net/visit?actid=actid&e=\'+encodeURIComponent(trackcmp_email)+\'&r=\'+encodeURIComponent(document.referrer)+\'&u=\'+encodeURIComponent(window.location.href);
	var trackcmp_s = document.getElementsByTagName("script");
	if (trackcmp_s.length) {
	trackcmp_s[0].parentNode.appendChild(trackcmp);
	} else {
	var trackcmp_h = document.getElementsByTagName("head");
	trackcmp_h.length && trackcmp_h[0].appendChild(trackcmp);
	}
	</script>'),
	
	'Ad Up Technology (ads)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'aduptech_ads\');
	</script>',
	'widget'=> '
	<div class="aduptech_ads"
	placementKey="PLACEMENT_KEY"></div>
	
	<div class="aduptech_ads"
	style="width:WIDTH;height:HEIGHT;"
	responsive="1"
	placementKey="PLACEMENT_KEY"></div>',
	
	'remove'=>'// static ads (synchronous)
	<script type="text/javascript"
	src="https://s.d.adup-tech.com/ads/display.js?p=PLACEMENT_KEY">
	</script>
	
	
	// static ads (asynchronous)
	<div id="adup1"></div>
	<script type="text/javascript">
	window.uAd_init = function() {
	window.uAd.embed("adup1", {
	placementKey: "PLACEMENT_KEY",
	responsive: false
	});
	};
	if (typeof window.uAd === "object") window.uAd_init();
	else (function(d, t) {
	var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
	g.src = "https://s.d.adup-tech.com/jsapi";
	g.async = true;
	s.parentNode.insertBefore(g, s);
	}(document, "script"));
	</script>
	
	
	// responsive ads (synchronous)
	<div style="width:WIDTH;height:HEIGHT;">
	<script type="text/javascript"
	src="https://s.d.adup-tech.com/ads/responsive.js?p=PLACEMENT_KEY">
	</script>
	</div>
	
	
	// responsive ads (asynchronous)
	<div id="adup1" style="width:WIDTH;height:HEIGHT;"></div>
	<script type="text/javascript">
	window.uAd_init = function() {
	window.uAd.embed("adup1", {
	placementKey: "PLACEMENT_KEY",
	responsive: true
	});
	};
	if (typeof window.uAd === "object") window.uAd_init();
	else (function(d, t) {
	var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
	g.src = "https://s.d.adup-tech.com/jsapi";
	g.async = true;
	s.parentNode.insertBefore(g, s);
	}(document, "script"));
	</script>'),
	
	'Ad Up Technology (conversion)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'aduptech_conversion\');
	</script>',
	'widget'=> '
	<div class="aduptech_conversion"
	advertiserId="ADVERTISER_ID"
	conversionCode="CONVERSION_CODE"></div>',
	
	'remove'=>'<img src="https://d.adup-tech.com/campaign/conversion/ADVERTISER_ID?t=CONVERSION_CODE"
	width="1px"
	height="1px"
	border="0px"
	alt="" />'),
	
	'Ad Up Technology (retargeting)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'aduptech_retargeting\');
	</script>',
	'widget'=> '
	<div class="aduptech_retargeting"
	account="ACCOUNT_ID"
	product=\'["PRODUCT_ID1", "PRODUCT_ID2"]\'
	track="productList" ></div>',
	
	'remove'=>'<script type="text/javascript" src="https://s.d.adup-tech.com/services/retargeting.js" async="true"></script>
	<script type="text/javascript">
	window.AdUpRetargeting = function(api) {
	api.setAccount(ACCOUNT_ID)
	.setProduct(["PRODUCT_ID1", "PRODUCT_ID2"])
	.trackProductList();
	};
	</script>'),
	
	'Adform'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.adformpm = adformpm;
	(tarteaucitron.job = tarteaucitron.job || []).push(\'adform\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.adformpagename = \'adformpagename\';</script>',
	
	'remove'=>'<script type="text/javascript">
	var _adftrack = {
	pm: adformpm,
	divider: encodeURIComponent(\'|\'),
	pagename: encodeURIComponent(\'adformpagename\')
	};
	(function () {
	var s = document.createElement(\'script\');
	s.type = \'text/javascript\';
	s.async = true;
	s.src = \'//track.adform.net/serving/scripts/trackpoint/async/\';
	var x = document.getElementsByTagName(\'script\')[0];
	x.parentNode.insertBefore(s, x);
	})();
	</script>
	<noscript>
	<p style="margin:0;padding:0;border:0;">
	<img src="//track.adform.net/Serving/TrackPoint/?pm=adformpm&ADFPageName=WebsiteName|SectionName|SubSection|PageName&ADFdivider=|" width="1" height="1" alt="" />
	</p>
	</noscript>'),
	
	'Affilae'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.affilae = \'PID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'affilae\');
	</script>',
	
	'remove'=>'<script type="text/javascript"> var _ae = { "pid":"PID", }; (function() { var element = document.createElement(\'script\'); element.type = \'text/javascript\'; element.async = true; element.src = \'//static.affilae.com/ae-v3.5.js\'; var scr = document.getElementsByTagName(\'script\')[0]; scr.parentNode.insertBefore(element, scr); })(); </script>
	'),
	
	'Amazon'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'amazon\');
	</script>',
	'widget'=> '
	<div class="amazon_product" amazonid="xxxxx-xx" productid="product_id"></div>',
	
	'remove'=>'<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=FR&source=ss&ref=ss_til&ad_type=product_link&tracking_id=amazon_id&marketplace=amazon&region=FR&placement=product_id&show_border=true&link_opens_in_new_window=true"></iframe>
	'),
	
	'antvoice'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.antvoiceId = \'antvoiceId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'antvoice\');
	</script>',
	
	'remove'=>'<script> window.avDataLayer = window.avDataLayer || []; window.avtag = window.avtag || function(_cmd,_p){window.avDataLayer.push({cmd:_cmd,p:_p});} avtag(\'init\', {id:\'antvoiceId\'}); </script><script async src="https://static.avads.net/avtag.min.js"></script>
	'),
	
	'Bing Ads Universal Event Tracking'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.bingadsID = \'bingadsID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'bingads\');
	</script>',
	
	'remove'=>'<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"bingadsID"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>
	'),
	
	'Clicmanager'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'clicmanager\');
	</script>',
	'widget'=> '
	<div class="clicmanager-canvas" c="c" s="s" t="t"></div>',
	
	'remove'=>'<script type="text/javascript" src="http://ads.clicmanager.fr/exe.php?c=c&s=s&t=t&q="></script>'),
	
	'Criteo'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'criteo\');
	</script>',
	'widget'=> '
	<div class="criteo-canvas" zoneid="zoneid"></div>',
	
	'remove'=>'<script type="text/javascript">
	document.MAX_ct0 =\'\';
	var m3_u = (location.protocol==\'https:\'?\'https://cas.criteo.com/delivery/ajs.php?\':\'http://cas.criteo.com/delivery/ajs.php?\');
	var m3_r = Math.floor(Math.random()*99999999999);
	document.write ("<scr"+"ipt type=\'text/javascript\' src=\'"+m3_u);
	document.write ("zoneid=zoneid");document.write("&amp;nodis=1");
	document.write (\'&amp;cb=\' + m3_r);
	if (document.MAX_used != \',\') document.write ("&amp;exclude=" + document.MAX_used);
	document.write (document.charset ? \'&amp;charset=\'+document.charset : (document.characterSet ? \'&amp;charset=\'+document.characterSet : \'\'));
	document.write ("&amp;loc=" + escape(window.location));
	if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
	if (document.context) document.write ("&context=" + escape(document.context));
	if ((typeof(document.MAX_ct0) != \'undefined\') && (document.MAX_ct0.substring(0,4) == \'http\')) {
	document.write ("&amp;ct0=" + escape(document.MAX_ct0));
	}
	if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
	document.write ("\'></scr"+"ipt>");
	</script>'),
	
	'Criteo OneTag'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.criteoonetagAccount = account;
	(tarteaucitron.job = tarteaucitron.job || []).push(\'criteoonetag\');
	</script>',
	
	'remove'=>'<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
	<script type="text/javascript">
	window.criteo_q = window.criteo_q || [];
	window.criteo_q.push(
	{ event: "setAccount", account: account},
	);
	</script>'),
	
	'Dating Affiliation'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'datingaffiliation\');
	</script>',
	'widget'=> '
	<div class="datingaffiliation-canvas" data-comfrom="data-comfrom" data-r="data-r" data-p="data-p" data-cf0="data-cf0" data-langue="data-langue" data-forwardAffiliate="data-forwardAffiliate" data-cf2="data-cf2" data-cfsa2="data-cfsa2" width="width" height="height"></div>
	',
	
	'remove'=>'<iframe src="http://www.tools-affil2.com/rotaban/ban.php?comfrom=data-comfrom&r=data-r&p=data-p&cf0=data-cf0&langue=data-langue&forward_affiliate=data-forwardAffiliate&cf2=data-cf2&cfsa2=data-cfsa2" width="width" height="height" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
	'),
	
	'Dating Affiliation (popup)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'datingaffiliationpopup\');
	</script>',
	'widget'=> '
	<div class="datingaffiliationpopup-canvas" comfrom="comfrom" promo="promo" productid="productid" submitconfig="submitconfig" ur="ur" brand="brand" lang="lang" cf0="cf0" cf2="cf2" subid1="subid1" cfsa2="cfsa2" subid2="subid2" nicheid="nicheid" degreid="degreid" bt="bt" vis="vis" hid="hid" snd="snd" aabd="aabd" aabs="aabs"></div>
	',
	
	'remove'=>'<script src="http://www.promotools.biz/da/popunder/script.php?comfrom=comfrom&promo=promo&productid=productid&submitconfig=submitconfig&ur=ur&brand=brand&lang=lang&cf0=cf0&cf2=cf2&subid1=subid1&cfsa2=cfsa2&subid2=subid2&nicheid=nicheid&degreid=degreid&bt=bt&vis=vis&hid=hid&snd=snd&aabd=aabd&aabs=aabs"></script>
	'),
	
	'DoubleClick'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'doubleclick\');
	</script>',
	'widget'=> '
	<div class="doubleclick_container" data-id1="data-id1" data-id2="data-id2" data-type="data-type" data-cat="data-cat" data-item="data-item" data-quantity="data-quantity" data-price="data-price" data-postage="data-postage" data-seller="data-seller" data-gdpr="data-gdpr" data-gdpr-consent="data-gdpr-consent" data-ord="data-ord" data-num="data-num"></div>
	',
	
	'remove'=>'<iframe src="https://data-id1.fls.doubleclick.net/activityi;src=data-id2;type=data-type;cat=data-cat;item=data-item;quantity=data-quantity;price=data-price;postage=data-postage;seller=data-seller;gdpr=data-gdpr;gdpr_consent=data-gdpr-consent;ord=data-ord;num=data-num;?" width="1" height="1" frameborder="0" style="display:none"></iframe>
	'),
	
	'Equativ'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.equativId = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'equativ\');
	</script>',
	
	'remove'=>'<script type="application/javascript" src="https://ced.sascdn.com/tag/ID/smart.js" async></script>'),
	
	'Eskimi'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.eskimiInit = \'init\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'eskimi\');
	</script>',
	
	'remove'=>'<script> !function(f,e,t,u,n,s,p) {if(f.esk)return;n=f.esk=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f.___esk)f.___esk=n;n.push=n;n.loaded=!0;n.queue=[];s=e.createElement(t);s.async=!0;s.src=u;p=e.getElementsByTagName(t)[0];p.parentNode.insertBefore(s,p)}(window,document,\'script\', \'[https://dsp-media.eskimi.com/assets/js/e/gtr.min.js?_=0.0.0.4\'](https://dsp-media.eskimi.com/assets/js/e/gtr.min.js?_=0.0.0.4%27)); esk(\'init\', \'init\'); </script>
	'),
	
	'FERank (pub)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'ferankpub\');
	</script>',
	'widget'=> '
	<ins class="ferank-publicite" client="id_client" style="display:inline-block;width:widthpx;height:heightpx" titre="couleur_titre" texte="couleur_texte"></ins>
	',
	
	'remove'=>'<script type="text/javascript">
	(function() {
	var ferank = document.createElement(\'script\');
	ferank.type = \'text/javascript\';
	ferank.async = true;
	ferank.src = \'//static.ferank.fr/publicite.async.js\';
	var s = document.getElementsByTagName(\'script\')[0];
	s.parentNode.insertBefore(ferank, s);
	})();
	</script>'),
	
	'Google Ads'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.googleadsId = \'AW-XXXXXXXXX\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googleads\');
	</script>',
	
	'remove'=>'<script async src="https://www.googletagmanager.com/gtag/js?id=AW-XXXXXXXXX"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag(\'js\', new Date());
	
	gtag(\'config\', \'AW-XXXXXXXXX\');
	</script>'),
	
	'Google Adsense'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'adsense\');
	</script>',
	'widget'=> '
	<ins class="adsbygoogle" style="display:inline-block;width:widthpx;height:heightpx" data-ad-client="ca_pub_xxxxxxxxxxxxxxx" data-ad-slot="ad_slot"></ins><script type="text/javascript">(adsbygoogle = window.adsbygoogle || []).push({});</script>
	',
	
	'remove'=>'<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>'),
	
	'Google Adsense Automatic'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.adsensecapub = \'caPub\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'adsenseauto\');
	</script>',
	
	'remove'=>'<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=caPub" crossorigin="anonymous"></script>'),
	
	'Google Adsense Search'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'adsensesearch\');
	</script>',
	'widget'=> '
	<div id="afscontainer1"></div>
	<script type="text/javascript" charset="utf-8">
	(function(g,o){g[o]=g[o]||function(){(g[o][\'q\']=g[o][\'q\']||[]).push(arguments)},g[o][\'t\']=1*new Date})(window,\'_googCsa\');
	var pageOptions = {
	\'pubId\' : \'test client ID\', // Enter your own client-ID here
	\'query\' : \'flowers\', // User query for this page
	\'styleId\': \'7824176615\' // Enter your own style ID here
	};
	
	var adblock1 = {
	\'container\' : \'afscontainer1\',
	\'width\' : 700
	};
	
	var adblock2 = {
	\'container\' : \'afscontainer2\',
	\'width\' : 700
	};
	
	_googCsa(\'ads\', pageOptions, adblock1, adblock2);
	</script>',
	
	'remove'=>'<script async="async" src="https://www.google.com/adsense/search/ads.js"></script>'),
	
	'Google Adsense Search (form)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'adsensesearchform\');
	</script>',
	'widget'=> '
	<form action="url_destination" id="cse-search-box" target="target (_self | _blank)"><div><input type="hidden" name="cx" value="partner-pub-XXXXXXXXXXXX:XXXXXX" /><input type="hidden" name="ie" value="UTF-8" /><input type="text" name="q" size="25" /><input type="submit" name="sa" value="Search" /></div></form>
	',
	
	'remove'=>'<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
	'),
	
	'Google Adsense Search (result)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.adsensesearchresultCx = \'partner-pub-XXXXXXXXXXXXX:XXXXXXX\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'adsensesearchresult\');
	</script>',
	'widget'=> '
	<gcse:searchresults-only id="gcse_searchresults"></gcse:searchresults-only>',
	
	'remove'=>'<script>
	(function() {
	var cx = \'partner-pub-XXXXXXXXXXXXX:XXXXXXX\';
	var gcse = document.createElement(\'script\');
	gcse.type = \'text/javascript\';
	gcse.async = true;
	gcse.src = (document.location.protocol == \'https:\' ? \'https:\' : \'http:\') +
	\'//www.google.com/cse/cse.js?cx=\' + cx;
	var s = document.getElementsByTagName(\'script\')[0];
	s.parentNode.insertBefore(gcse, s);
	})();
	</script>'),
	
	'Google Adwords (conversion)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googleadwordsconversion\');
	</script>',
	'widget'=> '
	<script type="text/javascript">tarteaucitron.user.adwordsconversionId = \'id\';tarteaucitron.user.adwordsconversionLabel = \'label\';tarteaucitron.user.adwordsconversionLanguage  = \'language\';tarteaucitron.user.adwordsconversionFormat = \'format\';tarteaucitron.user.adwordsconversionColor = \'color\';tarteaucitron.user.adwordsconversionValue = \'value\';tarteaucitron.user.adwordsconversionCurrency = \'currency\';tarteaucitron.user.adwordsconversionCustom1 = \'custom1\';tarteaucitron.user.adwordsconversionCustom2 = \'custom2\';</script>',
	
	'remove'=>'<script type="text/javascript">
	var google_conversion_id = "id";
	var google_conversion_label = "label";
	var google_conversion_language = "language";
	var google_conversion_format = "format";
	var google_conversion_color = "color";
	var google_conversion_value = value;
	var google_conversion_currency = "currency";
	var google_remarketing_only = false;
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>'),
	
	'Google Adwords (remarketing)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.adwordsremarketingId = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googleadwordsremarketing\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	var google_conversion_id = "id";
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>'),
	
	'Google Partners Badge'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'googlepartners\');
	</script>',
	'widget'=> '
	<div class="g-partnersbadge" data-agency-id="id"></div>',
	
	'remove'=>'<script src="https://apis.google.com/js/platform.js" async defer></script>'),
	
	'Klaviyo'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.klaviyoCompanyId = \'CompanyId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'klaviyo\');
	</script>',
	
	'remove'=>'<script async type="text/javascript" src="//static.klaviyo.com/onsite/js/klaviyo.js?company_id=CompanyId"></script>'),
	
	'Kwanko'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'kwanko\');
	</script>',
	'widget'=> '
	<div class="tac_kwanko" data-mclic="mclic"></div>',
	
	'remove'=>'<img src="https://action.metaffiliation.com/trk.php?mclic=mclic" width="1" height="1" border="0" />'),
	
	'Lead Forensics'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.leadforensicsId = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'leadforensics\');
	</script>',
	
	'remove'=>'<script type="text/javascript" src="https://secure.team8save.com/js/sc/id.js"></script>'),
	
	'Linkedin Insight'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.linkedininsighttag = \'linkedin_partner_id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'linkedininsighttag\');
	</script>',
	
	'remove'=>'<script type="text/javascript"><!--//--><![CDATA[// ><!--
	_linkedin_partner_id = "linkedin_partner_id";
	window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
	window._linkedin_data_partner_ids.push(_linkedin_partner_id);
	//--><!]]>
	</script><script type="text/javascript"><!--//--><![CDATA[// ><!--
	(function(){var s = document.getElementsByTagName("script")[0];
	var b = document.createElement("script");
	b.type = "text/javascript";b.async = true;
	b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
	s.parentNode.insertBefore(b, s);})();
	//--><!]]>
	</script><noscript><img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=311233&amp;fmt=gif" />
	</noscript>'),
	
	'Outbrain'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'outbrain\');
	</script>',
	'widget'=> '
	<div class="OUTBRAIN" data-src="PERMALINK" data-widget-id="ID"></div>',
	
	'remove'=>'<script src="https://widgets.outbrain.com/outbrain.js"></script>'),
	
	'Outbrain Amplify'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.outbrainamplifyId = \'id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'outbrainamplify\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	!function(_window, _document) {
	var OB_ADV_ID = \'id\';
	if (_window.obApi) {
	var toArray = function(object) {
	return Object.prototype.toString.call(object) === \'[object Array]\' ? object : [object];
	};
	_window.obApi.marketerId = toArray(_window.obApi.marketerId).concat(toArray(OB_ADV_ID));
	return;
	}
	var api = _window.obApi = function() {
	api.dispatch ? api.dispatch.apply(api, arguments) : api.queue.push(arguments);
	};
	api.version = \'1.1\';
	api.loaded = true;
	api.marketerId = OB_ADV_ID;
	api.queue = [];
	var tag = _document.createElement(\'script\');
	tag.async = true;
	tag.src = \'https://amplify.outbrain.com/cp/obtp.js\';
	tag.type = \'text/javascript\';
	var script = _document.getElementsByTagName(\'script\')[0];
	script.parentNode.insertBefore(tag, script);
	}(window, document); obApi(\'track\', \'PAGE_VIEW\');
	</script>'),
	
	'Pinterest Pixel'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.pinterestpixelId = \'pixelid\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'pinterestpixel\');
	</script>',
	
	'remove'=>'<script>!function(e){if(!window.pintrk){window.pintrk=function(){window.pintrk.queue.push(
	Array.prototype.slice.call(arguments))};var
	n=window.pintrk;n.queue=[],n.version="3.0";var
	t=document.createElement("script");t.async=!0,t.src=e;var
	r=document.getElementsByTagName("script")[0];r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
	pintrk(\'load\', \'pixelid\');
	pintrk(\'page\');</script>'),
	
	'Prelinker'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'prelinker\');
	</script>',
	'widget'=> '
	<div class="prelinker-canvas" siteId="siteId" bannerId="bannerId" defaultLanguage="defaultLanguage" tracker="tracker"></div>',
	
	'remove'=>'<script type="text/javascript" src="//promo.easy-dating.org/banner/index?site_id=siteId&banner_id=bannerId&default_language=defaultLanguage&tr4ck=tracker"></script>
	'),
	
	'Pubdirecte'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'pubdirecte\');
	</script>',
	'widget'=> '
	<div class="pubdirecte-canvas" pid="id" ref="ref"></div>',
	
	'remove'=>'<script src="http://www.pubdirecte.com/script/banniere.php?id=id&ref=ref"></script>'),
	
	'ShareASale'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'shareasale\');
	</script>',
	'widget'=> '
	<div class="shareasale-canvas" amount="amount" tracking="tracking" transtype="transtype" persale="persale" perlead="perlead" perhit="perhit" merchantID="merchantID"></div>',
	
	'remove'=>'<img src="https://shareasale.com/sale.cfm?amount=amount&tracking=tracking&transtype=transtype&persale=persale&perlead=perlead&perhit=perhit&merchantID=merchantID" width=1 height=1>'),
	
	'Twenga'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'twenga\');
	</script>
	
	<script type="text/javascript">tarteaucitron.user.twengaId = id;tarteaucitron.user.twengaLocale = \'locale\';</script>',
	
	'remove'=>'<script type="text/javascript" src="//tracker.twenga.locale/st/tracker_id.js"></script>'),
	
	'vShop'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'vshop\');
	</script>',
	'widget'=> '
	<div class="vcashW" style="width: widthpx; height: heightpx;" data-key="key" data-tracking="zone" data-category="category" data-keyword="keyword" data-layout="layout (small | medium | big)" data-theme="theme (shadow | circle)" data-linkColor="link_color" data-textColor="text_color" data-backgroundColor="background_color" data-borderColor="border_color"></div>
	',
	
	'remove'=>'<script type="text/javascript" src="http://vshop.fr/js/w.js"></script>'),
	
	'X (formerly Twitter) Universal Website Tag'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.twitteruwtId = \'twitter_uwt_Id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'twitteruwt\');
	</script>',
	
	'remove'=>'<script><!--//--><![CDATA[// ><!--
	!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
	},s.version=\'1.1\',s.queue=[],u=t.createElement(n),u.async=!0,u.src=\'//static.ads-twitter.com/uwt.js\',
	a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,\'script\');
	// Insert Twitter Pixel ID and Standard Event data below
	twq(\'init\',\'twitter_uwt_Id\');
	twq(\'track\',\'PageView\');
	//--><!]]>
	</script>'),
	
	'Xandr (Conversion)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'xandrconversion\');
	</script>',
	'widget'=> '
	<div id="uniqId" xandrconversionId="xandrconversionId" xandrconversionSeg="xandrconversionSeg" xandrconversionOrderId="xandrconversionOrderId" xandrconversionValue="xandrconversionValue" xandrconversionRedir="xandrconversionRedir" xandrconversionOther="xandrconversionOther"></div>
	',
	
	'remove'=>'<img src="//ib.adnxs.com/px?t=2&id=xandrconversionId&seg=xandrconversionSeg&order_id=xandrconversionOrderId&value=xandrconversionValue&redir=xandrconversionRedir&other=xandrconversionOther" width="1" height="1" />
	'),
	
	'Xandr (Segment)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'xandrsegment\');
	</script>',
	'widget'=> '
	<div id="uniqId" xandrsegmentAdd="xandrsegmentAdd" xandrsegmentAddCode="xandrsegmentAddCode" xandrsegmentRemove="xandrsegmentRemove" xandrsegmentRemoveCode="xandrsegmentRemoveCode" xandrsegmentMember="xandrsegmentMember" xandrsegmentRedir="xandrsegmentRedir" xandrsegmentValue="xandrsegmentValue" xandrsegmentOther="xandrsegmentOther"></div>
	',
	
	'remove'=>'<img src="//ib.adnxs.com/seg?t=2&add=xandrsegmentAdd&add_code=xandrsegmentAddCode&remove=xandrsegmentRemove&remove_code=xandrsegmentRemoveCode&member=xandrsegmentMember&redir=xandrsegmentRedir&value=xandrsegmentValue&other=xandrsegmentOther" width="1" height="1" />
	'),
	
	'Xandr (Universal)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.xandrId = \'xandrId\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'xandr\');
	</script>',
	
	'remove'=>'<script>!function(e,i){if(!e.pixie){var n=e.pixie=function(e,i,a){n.actionQueue.push({action:e,actionValue:i,params:a})};n.actionQueue=[];var a=i.createElement("script");a.async=!0,a.src="//acdn.adnxs.com/dmp/up/pixie.js";var t=i.getElementsByTagName("head")[0];t.insertBefore(a,t.firstChild)}}(window,document);pixie(\'init\', \'xandrId\');pixie(\'event\', \'PageView\');</script>
	'),
	
	'AddThis'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.addthisPubId = \'YOUR-PUB-ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'addthis\');
	</script>',
	'widget'=> '
	<div class="addthis_inline_share_toolbox"></div>',
	
	'remove'=>'<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=YOUR-PUB-ID"></script>'),
	
	'AddToAny (feed)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.addtoanyfeedUri = \'feed_uri\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'addtoanyfeed\');
	</script>',
	'widget'=> '
	<a class="a2a_dd" href="#" onclick="window.open(tarteaucitron.user.addtoanyfeedSubscribeLink)"><img src="//static.addtoany.com/buttons/subscribe_171_16.gif" width="171" height="16" border="0" alt="Subscribe"/></a>
	<a class="a2a_dd" href="#" onclick="window.open(tarteaucitron.user.addtoanyfeedSubscribeLink)"><img src="//static.addtoany.com/buttons/subscribe_120_16.gif" width="120" height="16" border="0" alt="Subscribe"/></a>
	',
	
	'remove'=>'<script type="text/javascript">
	var a2a_config = a2a_config || {};
	a2a_config.linkurl = "feed_uri";
	</script>
	<script type="text/javascript" src="//static.addtoany.com/menu/feed.js"></script>'),
	
	'AddToAny (share)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'addtoanyshare\');
	</script>',
	'widget'=> '
	<a class="a2a_dd" href="https://www.addtoany.com/share_save"><img src="//static.addtoany.com/buttons/share_save_171_16.png" width="171" height="16" border="0" alt="Share"/></a>
	<a class="a2a_dd" href="https://www.addtoany.com/share_save"><img src="//static.addtoany.com/buttons/share_save_120_16.png" width="120" height="16" border="0" alt="Share"/></a>
	<span class="tac_addtoanyshare"></span><div class="a2a_kit a2a_default_style"><a class="a2a_dd" href="https://www.addtoany.com/share_save">Share</a><span class="a2a_divider"></span><a class="a2a_button_facebook"></a><a class="a2a_button_twitter"></a><a class="a2a_button_google_plus"></a></div>
	<span class="tac_addtoanyshare"></span><div class="a2a_kit a2a_kit_size_32 a2a_default_style"><a class="a2a_dd" href="https://www.addtoany.com/share_save"></a><a class="a2a_button_facebook"></a><a class="a2a_button_twitter"></a><a class="a2a_button_google_plus"></a></div>
	',
	
	'remove'=>'<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>'),
	
	'Discord (Server Widget)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'discord\');
	</script>',
	'widget'=> '
	<div class="discord_widget" width="width" height="height" guildID="guildID"></div>',
	
	'remove'=>'<iframe width="width" height="height" src="https://discord.com/widget?id=guildID"></iframe>'),
	
	'eKomi'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.ekomiCertId = \'CERT-ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'ekomi\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	(function(){
	eKomiIntegrationConfig = new Array(
	{certId:\'CERT-ID\'}
	);
	if(typeof eKomiIntegrationConfig != "undefined"){for(var eKomiIntegrationLoop=0;eKomiIntegrationLoop<eKomiIntegrationConfig.length;eKomiIntegrationLoop++){
	var eKomiIntegrationContainer = document.createElement(\'script\');
	eKomiIntegrationContainer.type = \'text/javascript\'; eKomiIntegrationContainer.defer = true;
	eKomiIntegrationContainer.src = (document.location.protocol==\'https:\'?\'https:\':\'http:\') +"//connect.ekomi.de/integration_1410173009/" + eKomiIntegrationConfig[eKomiIntegrationLoop].certId + ".js";
	document.getElementsByTagName("head")[0].appendChild(eKomiIntegrationContainer);
	}}else{if(\'console\' in window){ console.error(\'connectEkomiIntegration - Cannot read eKomiIntegrationConfig\'); }}
	})();
	</script>'),
	
	'Facebook'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'facebook\');
	</script>',
	'widget'=> '
	<div class="fb-like" data-layout="standard" data-action="like" data-share="true"></div>
	
	<div class="fb-like" data-layout="standard" data-action="like" data-share="false"></div>
	
	<div class="fb-like" data-layout="box_count" data-action="like" data-share="true"></div>
	
	<div class="fb-like" data-layout="box_count" data-action="like" data-share="false"></div>
	
	<div class="fb-like" data-layout="button_count" data-action="like" data-share="true"></div>
	
	<div class="fb-like" data-layout="button_count" data-action="like" data-share="false"></div>
	
	<div class="fb-like" data-layout="button" data-action="like" data-share="true"></div>
	
	<div class="fb-like" data-layout="button" data-action="like" data-share="false"></div>
	
	<div class="fb-like" data-layout="standard" data-action="recommend" data-share="true"></div>
	
	<div class="fb-like" data-layout="standard" data-action="recommend" data-share="false"></div>
	
	<div class="fb-like" data-layout="box_count" data-action="recommend" data-share="true"></div>
	
	<div class="fb-like" data-layout="box_count" data-action="recommend" data-share="false"></div>
	
	<div class="fb-like" data-layout="button_count" data-action="recommend" data-share="true"></div>
	
	<div class="fb-like" data-layout="button_count" data-action="recommend" data-share="false"></div>
	
	<div class="fb-like" data-layout="button" data-action="recommend" data-share="true"></div>
	
	<div class="fb-like" data-layout="button" data-action="recommend" data-share="false"></div>',
	
	'remove'=>'<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
	}
	(document, \'script\', \'facebook-jssdk\'));
	</script>'),
	
	'Facebook (Customer Chat)'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.facebookChatID = ID;
	(tarteaucitron.job = tarteaucitron.job || []).push(\'facebookcustomerchat\');
	</script>',
	'widget'=> '
	<div class="fb-customerchat"></div>',
	
	'remove'=>'<script> (function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = \'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js\';
	fjs.parentNode.insertBefore(js, fjs);
	}(document, \'script\', \'facebook-jssdk\'));
	</script>'),
	
	'Facebook (like box)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'facebooklikebox\');
	</script>',
	'widget'=> '
	<div class="fb-like-box" data-href="page_url" data-width="width" data-height="height" data-colorscheme="light" data-show-faces="faces (true | false)" data-header="header (true | false)" data-stream="posts (false | true)" data-show-border="border (true | false)"></div>
	
	<div class="fb-like-box" style="background:#141823" data-href="page_url" data-width="width" data-height="height" data-colorscheme="dark" data-show-faces="faces (true | false)" data-header="header (true | false)" data-stream="posts (false | true)" data-show-border="border (true | false)"></div>
	',
	
	'remove'=>'<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
	}
	(document, \'script\', \'facebook-jssdk\'));
	</script>'),
	
	'Facebook (post)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'facebookpost\');
	</script>',
	'widget'=> '
	<div class="tac_facebookpost" data-appId="appId" data-url="url" data-show-text="show_text (true|false)" width="width" height="height"></div>
	',
	
	'remove'=>'<iframe allowtransparency="true" scrolling="auto" src="https://www.facebook.com/plugins/post.php?href=url&amp;width=width&amp;show_text=show_text&amp;appId=appId&amp;height=height"></iframe>
	'),
	
	'Facebook Pixel'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.facebookpixelId = \'YOUR-ID\'; tarteaucitron.user.facebookpixelMore = function () { /* add here your optionnal facebook pixel function */ };
	(tarteaucitron.job = tarteaucitron.job || []).push(\'facebookpixel\');
	</script>',
	
	'remove'=>'<script> !function(f,b,e,v,n,t,s) { if(f.fbq) return; n=f.fbq=function(){ n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments); }; if(!f._fbq) f._fbq=n; n.push=n; n.loaded=!0; n.version=\'2.0\'; n.queue=[]; t=b.createElement(e); t.async=!0; t.src=v; s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s); } (window, document,\'script\', \'https://connect.facebook.net/en_US/fbevents.js\'); fbq(\'init\', \'YOUR-ID\'); fbq(\'track\', \'PageView\'); </script>
	'),
	
	'Google+'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gplus\');
	</script>',
	'widget'=> '
	<div class="g-plusone" data-size="small" data-annotation="inline" data-width="300"></div>
	
	<div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300"></div>
	
	<div class="g-plusone" data-annotation="inline" data-width="300"></div>
	
	<div class="g-plusone" data-size="tall" data-annotation="inline" data-width="300"></div>
	
	<div class="g-plusone" data-size="small"></div>
	
	<div class="g-plusone" data-size="medium"></div>
	
	<div class="g-plusone"></div>
	
	<div class="g-plusone" data-size="tall"></div>
	
	<div class="g-plusone" data-size="small" data-annotation="none"></div>
	
	<div class="g-plusone" data-size="medium" data-annotation="none"></div>
	
	<div class="g-plusone" data-annotation="none"></div>
	
	<div class="g-plusone" data-size="tall" data-annotation="none"></div>
	
	<div class="g-plus" data-action="share" data-height="15"></div>
	
	<div class="g-plus" data-action="share"></div>
	
	<div class="g-plus" data-action="share" data-height="24"></div>
	
	<div class="g-plus" data-action="share" data-annotation="bubble" data-height="15"></div>
	
	<div class="g-plus" data-action="share" data-annotation="bubble"></div>
	
	<div class="g-plus" data-action="share" data-annotation="bubble" data-height="24"></div>
	
	<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>
	
	<div class="g-plus" data-action="share" data-annotation="none" data-height="15"></div>
	
	<div class="g-plus" data-action="share" data-annotation="none"></div>
	
	<div class="g-plus" data-action="share" data-annotation="none" data-height="24"></div>',
	
	'remove'=>'<script src="https://apis.google.com/js/platform.js" async defer> {lang: \'fr\'} </script>'),
	
	'Google+ (badge)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'gplusbadge\');
	</script>',
	'widget'=> '
	<div class="g-page" data-width="width" data-href="//plus.google.com/u/0/page_id" data-rel="publisher" data-showtagline="description (true | false)" data-showcoverphoto="cover (true | false)"></div>
	
	<div class="g-page" data-theme="dark" data-width="width" data-href="//plus.google.com/u/0/page_id" data-rel="publisher" data-showtagline="description (true | false)" data-showcoverphoto="cover (true | false)"></div>
	
	<div class="g-page" data-layout="landscape" data-width="width" data-href="//plus.google.com/u/0/page_id" data-rel="publisher" data-showtagline="description (true | false)" data-showcoverphoto="cover (true | false)"></div>
	
	<div class="g-page" data-layout="landscape" data-theme="dark" data-width="width" data-href="//plus.google.com/u/0/page_id" data-rel="publisher" data-showtagline="description (true | false)" data-showcoverphoto="cover (true | false)"></div>
	
	<div class="g-person" data-width="width" data-href="//plus.google.com/u/0/page_id" data-rel="author" data-showtagline="description (true | false)" data-showcoverphoto="cover (true | false)"></div>
	
	<div class="g-person" data-theme="dark" data-width="width" data-href="//plus.google.com/u/0/page_id" data-rel="author" data-showtagline="description (true | false)" data-showcoverphoto="cover (true | false)"></div>
	
	<div class="g-person" data-layout="landscape" data-width="width" data-href="//plus.google.com/u/0/page_id" data-rel="author" data-showtagline="description (true | false)" data-showcoverphoto="cover (true | false)"></div>
	
	<div class="g-person" data-layout="landscape" data-theme="dark" data-width="width" data-href="//plus.google.com/u/0/page_id" data-rel="author" data-showtagline="description (true | false)" data-showcoverphoto="cover (true | false)"></div>
	',
	
	'remove'=>'<script src="https://apis.google.com/js/platform.js" async defer> {lang: \'fr\'} </script>'),
	
	'Instagram'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'instagram\');
	</script>',
	'widget'=> '
	<div class="instagram_post" postID="postID" width="width" height="height"></div>',
	
	'remove'=>'<iframe src="//www.instagram.com/postID/embed" width="width" height="height" frameborder="0"></iframe>'),
	
	'Linkedin'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'linkedin\');
	</script>',
	'widget'=> '
	<span class="tacLinkedin"></span><script type="IN/Share" data-counter="top"></script>
	
	<span class="tacLinkedin"></span><script type="IN/Share" data-counter="right"></script>
	
	<span class="tacLinkedin"></span><script type="IN/Share"></script>',
	
	'remove'=>'<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US </script>'),
	
	'Pinterest'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'pinterest\');
	</script>',
	'widget'=> '
	<span class="tacPinterest"></span><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="white"></a>
	
	<span class="tacPinterest"></span><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="gray"></a>
	
	<span class="tacPinterest"></span><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="red"></a>
	
	<span class="tacPinterest"></span><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="white" data-pin-height="28"></a>
	
	<span class="tacPinterest"></span><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="gray" data-pin-height="28"></a>
	
	<span class="tacPinterest"></span><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="red" data-pin-height="28"></a>
	
	<span class="tacPinterest"></span><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-shape="round"></a>
	
	<span class="tacPinterest"></span><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-shape="round" data-pin-height="32"></a>
	',
	
	'remove'=>'<a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark">
	<img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" />
	</a>
	<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>'),
	
	'Shareaholic'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.shareaholicSiteId = \'site_id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'shareaholic\');
	</script>',
	'widget'=> '
	<div class=\'shareaholic-canvas\' data-app=\'share_buttons\' data-app-id=\'app_id\'></div>',
	
	'remove'=>'<script type="text/javascript">
	(function() {
	var shr = document.createElement(\'script\');
	shr.setAttribute(\'data-cfasync\', \'false\');
	shr.src = \'//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js\';
	shr.type = \'text/javascript\';
	shr.async = \'true\';
	shr.onload = shr.onreadystatechange = function() {
	var rs = this.readyState;
	if (rs && rs != \'complete\' && rs != \'loaded\') return;
	var site_id = \'site_id\';
	try {
	Shareaholic.init(site_id);
	}
	catch (e) {}
	};
	var s = document.getElementsByTagName(\'script\')[0];
	s.parentNode.insertBefore(shr, s);
	})();
	</script>'),
	
	'ShareThis'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.sharethisPublisher = \'publisher\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'sharethis\');
	</script>',
	'widget'=> '
	<span class="tacSharethis"></span>services_list_spans',
	
	'remove'=>'<script type="text/javascript">
	var switchTo5x=true;
	</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "publisher", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>'),
	
	'ShareThis Sticky'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.sharethisStickyProperty = \'property\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'sharethissticky\');
	</script>',
	
	'remove'=>'<script type=\'text/javascript\' src=\'https://platform-api.sharethis.com/js/sharethis.js#property=property&product=sticky-share-buttons\' async=\'async\'></script>'),
	
	'X (formerly Twitter)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'twitter\');
	</script>',
	'widget'=> '
	<span class="tacTwitter"></span><a href="https://twitter.com/share" class="twitter-share-button" data-via="twitter_username" data-count="vertical" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a href="https://twitter.com/share" class="twitter-share-button" data-via="twitter_username" data-count="horizontal" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a href="https://twitter.com/share" class="twitter-share-button" data-via="twitter_username" data-count="none" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a data-size="large" href="https://twitter.com/share" class="twitter-share-button" data-via="twitter_username" data-count="vertical" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a data-size="large" href="https://twitter.com/share" class="twitter-share-button" data-via="twitter_username" data-count="horizontal" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a data-size="large" href="https://twitter.com/share" class="twitter-share-button" data-via="twitter_username" data-count="none" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a href="https://twitter.com/twitter_username" class="twitter-follow-button" data-show-count="horizontal" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a href="https://twitter.com/twitter_username" class="twitter-follow-button" data-show-count="false" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a href="https://twitter.com/twitter_username" class="twitter-follow-button" data-show-count="horizontal" data-size="large" data-dnt="true"></a>
	
	<span class="tacTwitter"></span><a href="https://twitter.com/twitter_username" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true"></a>
	',
	
	'remove'=>'<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s); js.id=id; js.src=p+\'://platform.twitter.com/widgets.js\'; fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>'),
	
	'X (formerly Twitter) cards'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'twitterembed\');
	</script>',
	'widget'=> '
	<div class="twitterembed-canvas" tweetid="tweet_id" data-width="width" theme="theme (light | dark)" cards="cards (show | hidden)" conversation="conversation (show | none)" data-align="align (left | center | right)"></div>
	',
	
	'remove'=>'<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s); js.id=id; js.src=p+\'://platform.twitter.com/widgets.js\'; fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>
	'),
	
	'X (formerly Twitter) timelines'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'twittertimeline\');
	</script>',
	'widget'=> '
	<span class="tacTwitterTimelines"></span><a class="twitter-timeline" href="twitter_url" data-tweet-limit="tweet-limit" data-dnt="dnt (true | false)" data-width="width" data-height="height" data-theme="theme (dark | light)" data-link-color="hex link-color"></a>
	',
	
	'remove'=>'<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s); js.id=id; js.src=p+\'://platform.twitter.com/widgets.js\'; fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>
	'),
	
	'Elfsight'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'elfsight\');
	</script>',
	'widget'=> '
	<div class="elfsight-app-elfsightKey"></div>',
	
	'remove'=>'<script src="https://apps.elfsight.com/p/platform.js" defer></script>'),
	
	'Intercom'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.intercomKey = \'intercomKey\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'intercomChat\');
	</script>',
	
	'remove'=>'<script>(function () {
	var w = window;
	var ic = w.Intercom;
	if (typeof ic === \'function\') {
	ic(\'reattach_activator\');
	ic(\'update\', w.intercomSettings);
	} else {
	var d = document;
	var i = function () {
	i.c(arguments);
	};
	i.q = [];
	i.c = function (args) {
	i.q.push(args);
	};
	w.Intercom = i;
	var l = function () {
	var s = d.createElement(\'script\');
	s.type = \'text/javascript\';
	s.async = true;
	s.src = \'https://widget.intercom.io/widget/intercomKey\';
	var x = d.getElementsByTagName(\'script\')[0];
	x.parentNode.insertBefore(s, x);
	};
	if (w.attachEvent) {
	w.attachEvent(\'onload\', l);
	} else {
	w.addEventListener(\'load\', l, false);
	}
	}
	})();</script>'),
	
	'PureChat'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.purechatId = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'purechat\');
	</script>',
	
	'remove'=>'<script type="text/javascript" data-cfasync="false">(function () { var done = false;var script = document.createElement(\'script\');script.async = true;script.type = \'text/javascript\';script.src = \'https://app.purechat.com/VisitorWidget/WidgetScript\';document.getElementsByTagName(\'HEAD\').item(0).appendChild(script);script.onreadystatechange = script.onload = function (e) {if (!done && (!this.readyState || this.readyState == \'loaded\' || this.readyState == \'complete\')) {var w = new PCWidget({ c: \'ID\', f: true });done = true;}};})();</script>
	'),
	
	'Smartsupp'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.smartsuppKey = \'smartsuppKey\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'smartsupp\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	var _smartsupp = _smartsupp || {};
	_smartsupp.key = \'smartsuppKey\';
	window.smartsupp||(function(d) {
	var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
	s=d.getElementsByTagName(\'script\')[0];c=d.createElement(\'script\');
	c.type=\'text/javascript\';c.charset=\'utf-8\';c.async=true;
	c.src=\'https://www.smartsuppchat.com/loader.js?\';s.parentNode.insertBefore(c,s);
	})(document);
	</script>'),
	
	'Studizz Chatbot'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.studizzToken = \'token\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'studizz\');
	</script>',
	
	'remove'=>'<script href="https://webchat.studizz.fr/webchat.js?token=token"></script>'),
	
	'Tawk.to chat'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.tawktoId = \'ID\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'tawkto\');
	</script>',
	'widget'=> '
	<script>tarteaucitron.user.tawktoWidgetId = \'WidgetID\';</script>',
	
	'remove'=>'<script type="text/javascript">var Tawk_API=Tawk_API||{};
	var Tawk_LoadStart=new Date();
	(function(){ var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/ID/WidgetID\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })();</script>
	'),
	
	'Userlike'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.userlikekey = \'userlikekey\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'userlike\');
	</script>',
	
	'remove'=>'<script type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/userlikekey"></script>'),
	
	'UserVoice'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.userVoiceApi = \'YOUR_API_KEY\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'uservoice\');
	</script>',
	'widget'=> '
	<script type="text/javascript">UserVoice=window.UserVoice||[];UserVoice.push([\'addTrigger\', {mode: \'contact\', trigger_position: \'position\', trigger_color: \'color\', trigger_background_color: \'background-color\', accent_color: \'accent_color\'}]);</script>
	
	<script type="text/javascript">UserVoice=window.UserVoice||[];UserVoice.push([\'addTrigger\', {mode: \'smartvote\', trigger_position: \'position\', trigger_color: \'color\', trigger_background_color: \'background-color\', accent_color: \'accent_color\'}]);</script>
	
	<script type="text/javascript">UserVoice=window.UserVoice||[];UserVoice.push([\'addTrigger\', {mode: \'satisfaction\', trigger_position: \'position\', trigger_color: \'color\', trigger_background_color: \'background-color\', accent_color: \'accent_color\'}]);</script>
	',
	
	'remove'=>'<script type="text/javascript">
	(function(){
	var uv=document.createElement(\'script\');
	uv.type=\'text/javascript\';
	uv.async=true;
	uv.src=\'//widget.uservoice.com/YOUR_API_KEY.js\';
	var s=document.getElementsByTagName(\'script\')[0];
	s.parentNode.insertBefore(uv,s)
	})();
	</script>'),
	
	'Zopim'=> array(
	'add'=>'        <script type="text/javascript">
	tarteaucitron.user.zopimID = \'zopim_id\';
	(tarteaucitron.job = tarteaucitron.job || []).push(\'zopim\');
	</script>',
	
	'remove'=>'<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute(\'charset\',\'utf-8\');
	$.src=\'//v2.zopim.com/?zopim_id\';z.t=+new Date;$.
	type=\'text/javascript\';e.parentNode.insertBefore($,e)})(document,\'script\');
	</script>'),
	
	'Acast'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'acast\');
	</script>',
	'widget'=> '
	<div class="acast_embed" height="height" width="width" id1="id1" id2="id2" seek="seek"></div>',
	
	'remove'=>'<iframe height="height" width="width" src="https://embed.acast.com/id1/id2?seek=seek"></iframe>'),
	
	'Arte.tv'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'artetv\');
	</script>',
	'widget'=> '
	<div class="artetv_player" json="video_json" width="width" height="height"></div>',
	
	'remove'=>'<iframe style="transition-duration: 0; transition-property: no; margin: 0 auto; position: relative; display: block; background-color: #000000;" src="https://www.arte.tv/player/v5/index.php?json_url=video_json" width="width" height="height" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
	'),
	
	'Ausha'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'ausha\');
	</script>',
	'widget'=> '
	<div class="ausha_player" data-height="data-height" data-podcast-id="data-podcast-id" data-player-id="data-player-id" data-playlist="data-playlist" data-color="data-color" data-useshowid="useshowid (0 | 1)"></div>
	',
	
	'remove'=>'<iframe frameborder="0" loading="lazy" id="ausha-Zhaw" height="data-height" style="border: none; width:100%; height:220px" src="https://player.ausha.co/index.html?podcastId=data-podcast-id&v=3&playerId=data-player-id"></iframe><script src="https://player.ausha.co/ausha-player.js"></script>
	'),
	
	
	'Bandcamp'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'bandcamp\');
	</script>',
	'widget'=> '
	<div class="bandcamp_player" albumID="album_id" size="size (small | large)" artwork="artwork (small | none)" transparent="transparent (true | false)" minimal="minimal (true | false)" tracklist="tracklist (true | false)" linkcol="linkcol" package="package" bgcol="bgcol" width="width" height="height"></div>
	',
	
	'remove'=>'<iframe src="https://bandcamp.com/EmbeddedPlayer/album=album_id/" width="width" height="height" frameborder="0" scrolling="yes" allowfullscreen="allowfullscreen"></iframe>'),
	
	
	'Calaméo'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'calameo\');
	</script>',
	'widget'=> '
	<div class="calameo-canvas" data-id="bkcode" width="width" height="height"></div>',
	
	'remove'=>'<iframe src="//v.calameo.com/?bkcode=bkcode" width="width" height="height" frameborder="0" scrolling="no" allowtransparency allowfullscreen style="margin:0 auto;"></iframe>
	'),
	
	
	'Canal-U.tv'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'canalu\');
	</script>',
	'widget'=> '
	<div class="canalu_player" videoTitle="videoTitle"></div>',
	
	'remove'=>'<iframe src="https://www.canal-u.tv/video/embed_code_plugin.1/videoTitle" frameborder="0" allowfullscreen></iframe>
	'),
	
	
	'Dailymotion'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'dailymotion\');
	</script>',
	'widget'=> '
	<div class="dailymotion_player" videoID="video_id" width="width" height="height" showinfo="showinfo (1 | 0)" autoplay="autoplay (0 | 1)" embedType="embedType (video | playlist)"></div>
	',
	
	'remove'=>'<iframe width="width" height="height" src="//www.dailymotion.com/embed/video/video_id" frameborder="0" allowfullscreen></iframe>
	'),
	
	
	'Deezer'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'deezer\');
	</script>',
	'widget'=> '
	<div class="deezer_player" deezerID="deezerID" theme="theme (auto | dark | light)" embedType="type (album | track | playlist)" radius="radius (true | false)" tracklist="tracklist (true | false)" width="width" height="height"></div>
	',
	
	'remove'=>'<iframe src="//widget.deezer.com/widget/theme (auto | dark | light)/type (album | track | playlist)/deezerID" width="width" height="height" frameborder="0" allowfullscreen></iframe>
	'),
	
	
	'France Culture'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'fculture\');
	</script>',
	'widget'=> '
	<div class="fculture_embed" id="id" height="height" width="width"></div>',
	
	'remove'=>'<iframe src="https://www.franceculture.fr/player/export-reecouter?content=id" height="height" width="width"></iframe>'),
	
	
	'Internet Archive'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'archive\');
	</script>',
	'widget'=> '
	<div class="archive_player" data-videoID="videoID" data-width="width" data-height="height"></div>',
	
	'remove'=>'<iframe src="https://archive.org/embed/videoID" width="width" height="height" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen></iframe>
	'),
	
	
	'Issuu'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'issuu\');
	</script>',
	'widget'=> '
	<div class="issuu_player" issuuID="your_issuu_id" width="width" height="height"></div>',
	
	'remove'=>'<iframe style="width:width; height:height;" src="//e.issuu.com/embed.html#your_issue_id" frameborder="0" allowfullscreen></iframe>'),
	
	
	'Mixcloud'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'mixcloud\');
	</script>',
	'widget'=> '
	<div class="mixcloud_embed" height="height" width="width" hidecover="hidecover (0 | 1)" mini="mini (0 | 1)" light="light (0 | 1)" id="id"></div>
	',
	
	'remove'=>'<iframe height="height" width="width" src="https://www.mixcloud.com/widget/iframe/?hide_cover=hidecover (0 | 1)&mini=mini (0 | 1)&light=light (0 | 1)&feed=id"></iframe>
	'),
	
	
	'PlayPlay'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'playplay\');
	</script>',
	'widget'=> '
	<div class="tac_playplay" data-id="id" width="width" height="height"></div>',
	
	'remove'=>'<iframe src="https://playplay.com/app/embed-video/id"></iframe>'),
	
	
	'podCloud'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'podcloud\');
	</script>',
	'widget'=> '
	<div class="tac_podcloud" data-url="url" width="width" height="height"></div>',
	
	'remove'=>'<iframe allowtransparency="true" scrolling="auto" src="url" style="width:width;height:height;border:none;"></iframe>'),
	
	
	'Prezi'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'prezi\');
	</script>',
	'widget'=> '
	<div class="prezi-canvas" data-id="slide_id" width="width" height="height"></div>',
	
	'remove'=>'<iframe src="https://prezi.com/embed/slide_id/?bgcolor=ffffff&amp;lock_to_path=1&amp;autoplay=0&amp;autohide_ctrls=0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" frameborder="0" height="height" width="width"></iframe>
	'),
	
	
	'SlideShare'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'slideshare\');
	</script>',
	'widget'=> '
	<div class="slideshare-canvas" data-id="slide_id" width="width" height="height"></div>',
	
	'remove'=>'<iframe src="//www.slideshare.net/slideshow/embed_code/slide_id" width="width" height="height" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen></iframe>
	'),
	
	
	'SoundCloud'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'soundcloud\');
	</script>',
	'widget'=> '
	<div class="soundcloud_player" data-playable-id="track_or_playlist_id" data-playable-type="type (playlists|sets)" data-height="iframe_height" data-color="accent_color" data-auto-play="autoplay (true|false)" data-hide-related="hide related (true|false)" data-show-comments="show comment (true|false)" data-show-user="show user (true|false)" data-show-reposts="show repost (true|false)" data-show-teaser="show teaser (true|false)" data-visual="visual (true|false)" data-artwork="artwork (true|false)"></div>
	',
	
	'remove'=>'<iframe width="100%" scrolling="no" frameborder="no" autoplay (true|false) src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/type (playlists|sets)/track_or_playlist_id&hide_related=hide related (true|false)&color=accent_color&auto_play=autoplay (true|false)&show_comments=show comment (true|false)&hide_related=hide related (true|false)&show_user=show user (true|false)&show_reposts=show repost (true|false)&show_teaser=show teaser (true|false)&visual=visual (true|false)&artwork=artwork (true|false)"></iframe>
	'),
	
	
	'Spotify'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'spotify\');
	</script>',
	'widget'=> '
	<div class="spotify_player" spotifyID="spotifyID" width="width" height="height"></div>',
	
	'remove'=>'<iframe src="//open.spotify.com/embed/spotifyID" width="width" height="height" frameborder="0" allowfullscreen></iframe>
	'),
	
	
	'Tiktok Video'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'tiktokvideo\');
	</script>',
	'widget'=> '
	<blockquote class="tiktok-embed" data-video-id="videoId" style="max-width: 605px;min-width: 325px;" ><section></section></blockquote>
	',
	
	'remove'=>'<script async src="https://www.tiktok.com/embed.js"></script>'),
	
	
	'Twitch'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'twitch\');
	</script>',
	'widget'=> '
	<div class="twitch_player" videoID="video_id" width="width" height="height" parent="parent"></div>',
	
	'remove'=>'<iframe width="width" height="height" src="https://player.twitch.tv/?video=video_id&parent=parent" frameborder="0" allowfullscreen></iframe>
	'),
	
	
	'Videas'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'videas\');
	</script>',
	'widget'=> '
	<div class="tac_videas" data-id="id" width="width" height="height"></div>',
	
	'remove'=>'<iframe width="100%" height="100%" src="https://app.videas.fr/embed/id/" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true"></iframe>
	'),
	
	
	'Vimeo'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'vimeo\');
	</script>',
	'widget'=> '
	<div class="vimeo_player" videoID="video_id" width="width" height="height"></div>',
	
	'remove'=>'<iframe width="width" height="height" src="//player.vimeo.com/video/video_id" frameborder="0" allowfullscreen></iframe>'),
	
	
	'WebTV Normandie Université'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'webtvnu\');
	</script>',
	'widget'=> '
	<div class="webtvnu_player" videoID="videoID"></div>',
	
	'remove'=>'<iframe src="https://webtv.normandie-univ.fr/permalink/videoID/iframe/" frameborder="0" allowfullscreen></iframe>
	'),
	
	
	'Youtube'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'youtube\');
	</script>',
	'widget'=> '
	<div class="youtube_player" videoID="video_id" width="width" height="height" theme="theme (dark | light)" rel="rel (1 | 0)" controls="controls (1 | 0)" showinfo="showinfo (1 | 0)" autoplay="autoplay (0 | 1)" mute="mute (0 | 1)" srcdoc="srcdoc" loop="loop (0 | 1)" loading="loading (0 | 1)" data-start="start" data-end="end"></div>
	',
	
	'remove'=>'<iframe width="width" height="height" src="//www.youtube.com/embed/video_id" frameborder="0" allowfullscreen></iframe>'),
	
	
	'Youtube (Js API)'=> array(
	'add'=>'        <script type="text/javascript">
	(tarteaucitron.job = tarteaucitron.job || []).push(\'youtubeapi\');
	</script>',
	
	'remove'=>'<script>(function(){
	var s = document.createElement("script");
	s.src = "https://www.youtube.com/player_api";
	var before = document.getElementsByTagName("script")[0];
	before.parentNode.insertBefore(s, before);
	})();</script>'),	
);