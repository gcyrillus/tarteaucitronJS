<?php if(!defined('PLX_ROOT')) exit;
	/**
		* Plugin 			tarteaucitronJS
		*
		* @CMS required			PluXml 
		*
		* @version			1.0
		* @date				2023-12-11
		* @author 			G.Cyrillus
		**/
		class tarteaucitronJS extends plxPlugin {
		
		
		
		const BEGIN_CODE = '<?php' . PHP_EOL;
		const END_CODE = PHP_EOL . '?>';
		public $lang = ''; 
		
		
		# declaration variables
		/* Privacy policy url */
		public $privacyUrl;
		/* dom position */
		public $bodyPosition ;
		
		/* Open the panel with this hashtag */
		public $hashtag;
		/* Cookie name */
		public $cookieName;
		
		/* Banner position (top - bottom) */
		public $orientation ;
		
		/* Group services by category */
		public $groupServices;
		/* Click to expand the description */
		public $showDetailsOnClick;
		/* Default state (true - wait - false) */
		public $serviceDefaultState;
		
		/* Show the small banner on bottom right */
		public $showAlertSmall;
		/* Show the cookie list */
		public $cookieslist;
		/* Show a close X on the banner */
		public $closePopup;
		/* Show cookie icon to manage cookies */
		public $showIcon;
		/* Optionnal =>  URL or base64 encoded image */
		public $iconSrc;
		/* BottomRight, BottomLeft, TopRight and TopLeft */
		public $iconPosition;
		
		/* Show a Warning if an adblocker is detected */
		public $adblocker;
		
		/* Show the deny all button */
		public $DenyAllCta;
		/* Show the accept all button when highPrivacy on */
		public $AcceptAllCta;
		
		/* HIGHLY RECOMMANDED Disable auto consent */
		public $highPrivacy ;
		/* If Do Not Track == 1, disallow all */
		public $handleBrowserDNTRequest;
		
		/* Remove credit link */
		public $removeCredit;
		/* Show more info link */
		public $moreInfoLink;
		
		/* If false, the tarteaucitron.css file will be loaded */
		public $useExternalCss;
		/* If false, the tarteaucitron.js file will be loaded */
		public $useExternalJs;
		
		/* Shared cookie for multisite */ # UNUSED
		public $cookieDomain;
		
		/* Change the default readmore link */
		public $readmoreLink;
		
		/* Show a message about mandatory cookies */
		public $mandatory;
		/* Show the disabled accept button when mandatory on */
		public $mandatoryCta;
		
		# tableau initialisation service tarteaucitron
		public $initTarteaucitron;
		
		# services
		public $service = array();
		
		private $url = ''; # parametre de l'url pour accèder à la page static		
		
			
		public function __construct($default_lang) {
		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);
		
		# droits pour accèder à la page admin.php du plugin
		$this->setAdminProfil(PROFIL_ADMIN, PROFIL_MANAGER);		
		
		
		# droits pour accèder à la page config.php du plugin
		$this->setConfigProfil(PROFIL_ADMIN, PROFIL_MANAGER);		
			// url Page static
		$this->url = $this->getParam('url')=='' ? strtolower(basename(__DIR__)) : $this->getParam('url');	
		

		
		
		# init config
		/* Privacy policy url */
		$this->privacyUrl = $this->getParam('url')									==''   ?   $this->getParam('url')						: $this->getParam('url') ;
		/* dom position */
		$this->bodyPosition = $this->getParam('bodyPosition') 						==''   ?   'bottom' 									: $this->getParam('bodyPosition') ;
		
		/* Open the panel with this hashtag */
		$this->hashtag = $this->getParam('hashtag') 								==''   ?   '#tarteaucitron'								: $this->getParam('hashtag') ;
		 /* Cookie name */
		$this->cookieName = $this->getParam('cookieName') 							==''   ?   'tarteaucitron' 								: $this->getParam('cookieName') ;
		
		/* Banner position (top - bottom) */
		$this->orientation = $this->getParam('orientation') 						==''   ?   'bottom'		 								: $this->getParam('orientation') ;
		
		/* Group services by category */
		$this->groupServices = $this->getParam('groupServices') 					==''   ?   'false'		 								: $this->getParam('groupServices') ;
		/* Click to expand the description */
		$this->showDetailsOnClick = $this->getParam('showDetailsOnClick') 			==''   ?   'false'		 								: $this->getParam('showDetailsOnClick') ;
		/* Default state (true - wait - false) */
		$this->serviceDefaultState=$this->getParam('serviceDefaultState') 			==''   ?   'wait'		 								: $this->getParam('serviceDefaultState') ;
		
		/* Show the small banner on bottom right */
		$this->showAlertSmall = $this->getParam('showAlertSmall') 					==''   ?   'false'		 								: $this->getParam('showAlertSmall') ;
		 /* Show the cookie list */
		$this->cookieslist = $this->getParam('cookieslist') 						==''   ?   'false'		 								: $this->getParam('cookieslist') ;
		/* Show a close X on the banner */
		$this->closePopup = $this->getParam('closePopup') 							==''   ?   'false'		 								: $this->getParam('closePopup') ;
		
		/* Show cookie icon to manage cookies */
		$this->showIcon = $this->getParam('showIcon') 								==''   ?   'false'		 								: $this->getParam('showIcon') ;
		/* Optionnal =>  URL or base64 encoded image */
		$this->iconSrc = $this->getParam('iconSrc') 								==''   ?   PLX_PLUGINS.basename(__DIR__).'/icon.png'	: $this->getParam('iconSrc') ;
		 /* BottomRight, BottomLeft, TopRight and TopLeft */
		$this->iconPosition = $this->getParam('iconPosition') 						==''   ?   'BottomLeft'		 							: $this->getParam('iconPosition') ;
		
		/* Show a Warning if an adblocker is detected */
		$this->adblocker = $this->getParam('adblocker') 							==''   ?   'false'		 								: $this->getParam('adblocker') ;
		
		/* Show the deny all button */
		$this->DenyAllCta = $this->getParam('DenyAllCta') 							==''   ?   'true'		 								: $this->getParam('DenyAllCta') ;
		/* Show the accept all button when highPrivacy on */
		$this->AcceptAllCta = $this->getParam('AcceptAllCta') 						==''   ?   'true'		 								: $this->getParam('AcceptAllCta') ;
		
		/* HIGHLY RECOMMANDED Disable auto consent */
		$this->highPrivacy = $this->getParam('highPrivacy') 						==''   ?   'true'		 								: $this->getParam('highPrivacy') ;
		/* If Do Not Track == 1, disallow all */
		$this->handleBrowserDNTRequest = $this->getParam('handleBrowserDNTRequest') ==''   ?   'false'		 								: $this->getParam('handleBrowserDNTRequest') ;
		
		/* Remove credit link */
		$this->removeCredit = $this->getParam('removeCredit') 						==''   ?   'false'		 								: $this->getParam('removeCredit') ;
		/* Show more info link */
		$this->moreInfoLink = $this->getParam('moreInfoLink') 						==''   ?   'true'		 								: $this->getParam('moreInfoLink') ;
		
		/* If false, the tarteaucitron.css file will be loaded */
		$this->useExternalCss = $this->getParam('useExternalCss') 					==''   ?   'false'		 								: $this->getParam('useExternalCss') ;
		/* If false, the tarteaucitron.js file will be loaded */
		$this->useExternalJs = $this->getParam('useExternalJs') 					==''   ?   'false'		 								: $this->getParam('useExternalJs') ;
		
		/* Shared cookie for multisite */ # UNUSED
		$this->cookieDomain = $this->getParam('cookieDomain') 						==''   ?   ''		 									: $this->getParam('cookieDomain') ;
		
		/* Change the default readmore link */
		$this->readmoreLink = $this->getParam('readmoreLink') 						==''   ?   ''		 									: $this->getParam('readmoreLink') ;
		
		/* Show a message about mandatory cookies */
		$this->mandatory = $this->getParam('mandatory') 							==''   ?   'true'		 								: $this->getParam('mandatory') ;
		/* Show the disabled accept button when mandatory on */
		$this->mandatoryCta = $this->getParam('mandatoryCta') 						==''   ?   'true'		 								: $this->getParam('mandatoryCta') ;


		include('assets/trackers.php');

		
		if(!file_exists(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json')) {
		$this->initTarteaucitron=array();
			if (!touch(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json')) {
					echo "erreur à la création de: ".PLX_PLUGINS.basename(__DIR__)."/assets/fire.json";
					} else {
					file_put_contents(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json', json_encode($this->initTarteaucitron,true));
				}
			}
			
		$this->initTarteaucitron = json_decode(file_get_contents(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json'),true);
		
		
		
		
		
		
		# Declaration des hooks		
		$this->addHook('AdminTopBottom', 'AdminTopBottom');
		$this->addHook('ThemeEndHead', 'ThemeEndHead');
		$this->addHook('plxShowConstruct', 'plxShowConstruct');
		$this->addHook('plxMotorPreChauffageBegin', 'plxMotorPreChauffageBegin');
		$this->addHook('plxShowStaticListEnd', 'plxShowStaticListEnd');
		$this->addHook('plxShowPageTitle', 'plxShowPageTitle');
		$this->addHook('SitemapStatics', 'SitemapStatics');
		$this->addHook('wizard', 'wizard');
		$this->addHook('AdminTopEndHead', 'AdminTopEndHead');
		$this->addHook('ThemeEndBody', 'ThemeEndBody');

		
		}
		
		# Activation / desactivation
		
		public function OnActivate() {


		# activation du wizard
		$_SESSION['justactivated'.basename(__DIR__)] = true;
		}
		
		public function OnDeactivate() {
		# code à executer à la désactivation du plugin
		}	


		public function ThemeEndHead() {
			#gestion multilingue
			if(defined('PLX_MYMULTILINGUE')) {		
				$plxMML = is_array(PLX_MYMULTILINGUE) ? PLX_MYMULTILINGUE : unserialize(PLX_MYMULTILINGUE);
				$langues = empty($plxMML['langs']) ? array() : explode(',', $plxMML['langs']);
				$string = '';
				foreach($langues as $k=>$v)	{
					$url_lang="";
					if($_SESSION['default_lang'] != $v) $url_lang = $v.'/';
					$string .= 'echo "\\t<link rel=\\"alternate\\" hreflang=\\"'.$v.'\\" href=\\"".$plxMotor->urlRewrite("?'.$url_lang.$this->getParam('url').'")."\" />\\n";';
				}
				echo '<?php if($plxMotor->mode=="'.$this->getParam('url').'") { '.$string.'} ?>';

			}
			
			# preload service
			$servicesToFilter='';
			$this->initTarteaucitron = json_decode(file_get_contents(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json'),true);
			foreach($this->initTarteaucitron as $kservice => $arVal) {
				$servicesToFilter .='
				'.$arVal['push'].'
				';
				}
			echo ' 		<link href="'.PLX_PLUGINS.basename(__DIR__).'/css/static.css" rel="stylesheet" type="text/css" />'."\n";		
			echo ' 		<script type="text/javascript" src="'.PLX_PLUGINS.basename(__DIR__).'/js/tarteaucitron.js" ></script>'."\n";
			echo ' 		<script type="text/javascript" src="'.PLX_PLUGINS.basename(__DIR__).'/js/tarteaucitron.services.js" ></script>'."\n";
			// ajouter ici vos propre codes (insertion balises link, script , ou autre)
			echo '
		<script type="text/javascript">
			tarteaucitron.init({
			  "privacyUrl": "/index.php?'.$this->privacyUrl.'", /* Privacy policy url */
			  "bodyPosition": "'.$this->bodyPosition.'", /* or top to bring it as first element for accessibility */

			  "hashtag": "'.$this->hashtag.'", /* Open the panel with this hashtag */
			  "cookieName": "'.$this->cookieName.'", /* Cookie name */
		
			  "orientation": "'.$this->orientation.'", /* Banner position (top - bottom) */
		   
			  "groupServices": '.$this->groupServices.', /* Group services by category */
			  "showDetailsOnClick": '.$this->showDetailsOnClick.', /* Click to expand the description */
			  "serviceDefaultState": "'.$this->serviceDefaultState.'", /* Default state (true - wait - false) */
							   
			  "showAlertSmall": '.$this->showAlertSmall.', /* Show the small banner on bottom right */
			  "cookieslist": '.$this->cookieslist.', /* Show the cookie list */
							   
			  "closePopup": '.$this->closePopup.', /* Show a close X on the banner */

			  "showIcon": true, /* Show cookie icon to manage cookies */
			  "iconSrc": "'.$this->iconSrc.'", /* Optionnal: URL or base64 encoded image */
			  "iconPosition": "'.$this->iconPosition.'", /* BottomRight, BottomLeft, TopRight and TopLeft */

			  "adblocker": '.$this->adblocker.', /* Show a Warning if an adblocker is detected */
							   
			  "DenyAllCta" : '.$this->DenyAllCta.', /* Show the deny all button */
			  "AcceptAllCta" : '.$this->AcceptAllCta.', /* Show the accept all button when highPrivacy on */
			  "highPrivacy": '.$this->highPrivacy.', /* HIGHLY RECOMMANDED Disable auto consent */
							   
			  "handleBrowserDNTRequest": '.$this->handleBrowserDNTRequest.', /* If Do Not Track == 1, disallow all */

			  "removeCredit": '.$this->removeCredit.', /* Remove credit link */
			  "moreInfoLink": '.$this->moreInfoLink.', /* Show more info link */

			  "useExternalCss": '.$this->useExternalCss.', /* If false, the tarteaucitron.css file will be loaded */
			  "useExternalJs": '.$this->useExternalJs.', /* If false, the tarteaucitron.js file will be loaded */

			  //"cookieDomain": "'.$this->cookieDomain.'", /* Shared cookie for multisite */
							  
			  "readmoreLink": "'.$this->readmoreLink.'", /* Change the default readmore link */

			  "mandatory": '.$this->mandatory.', /* Show a message about mandatory cookies */
			  "mandatoryCta": '.$this->mandatoryCta.', /* Show the disabled accept button when mandatory on */
		
			  //"customCloserId": "" /* Optional a11y: Custom element ID used to open the panel */
			});
			'.$servicesToFilter.'
        </script>
		';
		}
		
		/**
		 * Méthode qui affiche un message si le plugin n'a pas la langue du site dans sa traduction
		 * Ajout gestion du wizard si inclus au plugin
		 * @return	stdio
		 * @author	Stephane F
		 **/
		public function AdminTopBottom() {

			echo '<?php
			$file = PLX_PLUGINS."'.$this->plug['name'].'/lang/".$plxAdmin->aConf["default_lang"].".php";
			if(!file_exists($file)) {
				echo "<p class=\\"warning\\">'.basename(__DIR__).'<br />".sprintf("'.$this->getLang('L_LANG_UNAVAILABLE').'", $file)."</p>";
				plxMsg::Display();
			}
			?>';
				if (isset($_SESSION['justactivated'.basename(__DIR__)])) {$this->wizard();}

		}
		
		/** 
		* Méthode wizard
		* 
		* Descrition	:
		* @author		: '.$_POST['title'].'
		* 
		**/
		# insertion du wizard
		public function wizard() {
		# uniquement dans les page d'administration du plugin.
			if(basename(
			$_SERVER['SCRIPT_FILENAME']) 			=='parametres_plugins.php' || 
			basename($_SERVER['SCRIPT_FILENAME']) 	=='parametres_plugin.php' || 
			basename($_SERVER['SCRIPT_FILENAME']) 	=='plugin.php'
			) 	{	
				include(PLX_PLUGINS.__CLASS__.'/lang/'.$this->default_lang.'-wizard.php');
			}
		}

		/**
		* Méthode de traitement du hook plxShowConstruct
		*
		* @return	stdio
		* @author	Stephane F
		**/
		public function plxShowConstruct() {
		
		# infos sur la page statique
		$string  = "if(\$this->plxMotor->mode=='".$this->url."') {";
		$string .= "	\$array = array();";
		$string .= "	\$array[\$this->plxMotor->cible] = array(
		'name'		=> '".$this->getParam('mnuName_'.$this->default_lang)."',
		'menu'		=> '',
		'url'		=>  '".basename(__DIR__)."',
		'readable'	=> 1,
		'active'	=> 1,
		'group'		=> ''
		);";
		$string .= "	\$this->plxMotor->aStats = array_merge(\$this->plxMotor->aStats, \$array);";
		$string .= "}";
		echo "<?php ".$string." ?>";
		}
		
		/**
		* Méthode de traitement du hook plxMotorPreChauffageBegin
		*
		* @return	stdio
		* @author	Stephane F
		**/
		public function plxMotorPreChauffageBegin() {				
		$template = $this->getParam('template')==''?'static.php':$this->getParam('template');
		
		$string = "
		if(\$this->get && preg_match('/^".$this->url."\/?/',\$this->get)) {
		\$this->mode = '".$this->url."';
		\$prefix = str_repeat('../', substr_count(trim(PLX_ROOT.\$this->aConf['racine_statiques'], '/'), '/'));
		\$this->cible = \$prefix.\$this->aConf['racine_plugins'].'".basename(__DIR__)."/static';
		\$this->template = '".$template."';
		return true;
		}
		";
		
		echo "<?php ".$string." ?>";
		}

		
		/**
		* Méthode de traitement du hook plxShowStaticListEnd
		*
		* @return	stdio
		* @author	Stephane F
		**/
		public function plxShowStaticListEnd() {
		
		# ajout du menu pour accèder à la page de recherche
		if($this->getParam('mnuDisplay')) {
		echo "<?php \$status = \$this->plxMotor->mode=='".$this->url."'?'active':'noactive'; ?>";
		echo "<?php array_splice(\$menus, ".($this->getParam('mnuPos')-1).", 0, '<li class=\"static menu '.\$status.'\" id=\"static-".basename(__DIR__)."\"><a href=\"'.\$this->plxMotor->urlRewrite('?".$this->lang.$this->url."').'\" title=\"".$this->getParam('mnuName_'.$this->default_lang)."\">".$this->getParam('mnuName_'.$this->default_lang)."</a></li>'); ?>";
		}
		}
		
		/**
		* Méthode qui renseigne le titre de la page dans la balise html <title>
		*
		* @return	stdio
		* @author	Stephane F
		**/
		public function plxShowPageTitle() {
		echo '<?php
		if($this->plxMotor->mode == "'.$this->url.'") {
		$this->plxMotor->plxPlugins->aPlugins["'.basename(__DIR__).'"]->lang("L_PAGE_TITLE");
		return true;
		}
		?>';
		}
		
		/**
		* Méthode qui référence la page statique dans le sitemap
		*
		* @return	stdio
		* @author	Stephane F
		**/
		public function SitemapStatics() {
		echo '<?php
		echo "\n";
		echo "\t<url>\n";
		echo "\t\t<loc>".$plxMotor->urlRewrite("?'.$this->lang.$this->url.'")."</loc>\n";
		echo "\t\t<changefreq>monthly</changefreq>\n";
		echo "\t\t<priority>0.8</priority>\n";
		echo "\t</url>\n";
		?>';
		}
		
	
		
		/** 
		* Méthode AdminTopEndHead
		* 
		* Descrition	:
		* @author		: TheCrok
		* 
		**/
		public function AdminTopEndHead() {
		# code à executer
		
			
	
		}
		

		/** 
		* Méthode ThemeEndBody
		* 
		* Descrition	:
		* @author		: TheCrok
		* 
		**/
		public function ThemeEndBody() {
		# code à executer
		
			
	
		}
		
					
		}