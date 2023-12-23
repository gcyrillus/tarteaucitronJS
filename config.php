<?php
	if(!defined('PLX_ROOT')) exit;
	/**
		* Plugin 			tarteaucitronJS
		*
		* @CMS required		PluXml 
		* @page				config.php
		* @version			1.0
		* @date				2023-12-11
		* @author 			G.Cyrillus
	**/	
	# Control du token du formulaire
	plxToken::validateFormToken($_POST);
	
	# Liste des langues disponibles et prises en charge par le plugin
	$aLangs = array($plxAdmin->aConf['default_lang']);	
	
	if(!empty($_POST)) {
		
		# update config tarteaucitron.js
		//$plxPlugin->setParam('privacyUrl', $_POST['privacyUrl'], 'string');
		$plxPlugin->setParam('bodyPosition', $_POST['bodyPosition'], 'string');
		$plxPlugin->setParam('hashtag', $_POST['hashtag'], 'string');
		$plxPlugin->setParam('cookieName', $_POST['cookieName'], 'string');
		$plxPlugin->setParam('orientation', $_POST['orientation'], 'string');
		$plxPlugin->setParam('groupServices', $_POST['groupServices'], 'string');
		$plxPlugin->setParam('showDetailsOnClick', $_POST['showDetailsOnClick'], 'string');
		$plxPlugin->setParam('serviceDefaultState', $_POST['serviceDefaultState'], 'string');
		$plxPlugin->setParam('showAlertSmall', $_POST['showAlertSmall'], 'string');
		$plxPlugin->setParam('cookieslist', $_POST['cookieslist'], 'string');
		$plxPlugin->setParam('closePopup', $_POST['closePopup'], 'string');
		$plxPlugin->setParam('showIcon', $_POST['showIcon'], 'string');
		$plxPlugin->setParam('iconSrc', $_POST['iconSrc'], 'string');
		$plxPlugin->setParam('iconPosition', $_POST['iconPosition'], 'string');
		$plxPlugin->setParam('adblocker', $_POST['adblocker'], 'string');
		$plxPlugin->setParam('DenyAllCta', $_POST['DenyAllCta'], 'string');
		$plxPlugin->setParam('AcceptAllCta', $_POST['AcceptAllCta'], 'string');
		$plxPlugin->setParam('highPrivacy', $_POST['highPrivacy'], 'string');
		$plxPlugin->setParam('handleBrowserDNTRequest', $_POST['handleBrowserDNTRequest'], 'string');
		$plxPlugin->setParam('removeCredit', $_POST['removeCredit'], 'string');
		$plxPlugin->setParam('moreInfoLink', $_POST['moreInfoLink'], 'string');
		$plxPlugin->setParam('useExternalCss', $_POST['useExternalCss'], 'string');
		$plxPlugin->setParam('useExternalJs', $_POST['useExternalJs'], 'string');
		$plxPlugin->setParam('cookieDomain', $_POST['cookieDomain'], 'string');
		$plxPlugin->setParam('readmoreLink', $_POST['readmoreLink'], 'string');
		$plxPlugin->setParam('mandatory', $_POST['mandatory'], 'string');
		$plxPlugin->setParam('mandatoryCta', $_POST['mandatoryCta'], 'string');
		
		#multilingue
		$plxPlugin->setParam('mnuDisplay', $_POST['mnuDisplay'], 'numeric');
		$plxPlugin->setParam('mnuPos', $_POST['mnuPos'], 'numeric');
		$plxPlugin->setParam('template', $_POST['template'], 'string');
		$plxPlugin->setParam('url', plxUtils::title2url($_POST['url']), 'string');
		foreach($aLangs as $lang) {
			$plxPlugin->setParam('mnuName_'.$lang, $_POST['mnuName_'.$lang], 'string');
		}
		file_put_contents(PLX_PLUGINS.basename(__dir__).'/assets/privacy.html', $_POST['htmlPrivacy']);
		$plxPlugin->saveParams();	
		header("Location: parametres_plugin.php?p=".basename(__DIR__));
		exit;
	}
	
	
	#initialisation des variables de configuration de tarteaucitron
	// variables initialisées dans le constructeur de class
	
	
	# initialisation des variables propres à chaque lanque
	$langs = array();
	foreach($aLangs as $lang) {
		# chargement de chaque fichier de langue
		$langs[$lang] = $plxPlugin->loadLang(PLX_PLUGINS.'tarteaucitronJS/lang/'.$lang.'.php');
		$var[$lang]['mnuName'] =  $plxPlugin->getParam('mnuName_'.$lang)=='' ? $plxPlugin->getLang('L_DEFAULT_MENU_NAME') : $plxPlugin->getParam('mnuName_'.$lang);
	}
	# initialisation des variables page statique
	$var['mnuDisplay'] =  	$plxPlugin->getParam('mnuDisplay')	=='' ? 	1 								: $plxPlugin->getParam('mnuDisplay');
	$var['mnuPos'] =  		$plxPlugin->getParam('mnuPos')		=='' ? 	5	  							: $plxPlugin->getParam('mnuPos');
	$var['template'] = 		$plxPlugin->getParam('template')	=='' ? 	'static.php' 					: $plxPlugin->getParam('template');
	$var['url'] = 			$plxPlugin->getParam('url')			=='' ? 	strtolower(basename(__DIR__)) 	: $plxPlugin->getParam('url');
	
	# On récupère les templates des pages statiques
	$glob = plxGlob::getInstance(PLX_ROOT . $plxAdmin->aConf['racine_themes'] . $plxAdmin->aConf['style'], false, true, '#^^static(?:-[\\w-]+)?\\.php$#');
	if (!empty($glob->aFiles)) {
		$aTemplates = array();
		foreach($glob->aFiles as $v)
		$aTemplates[$v] = basename($v, '.php');
		} else {
		$aTemplates = array('' => L_NONE1);
	}
	/* end template */
	
	# fermeture du wizard
	if (isset($_SESSION['justactivated'.basename(__DIR__)])) {unset($_SESSION['justactivated'.basename(__DIR__)]);}
	# affichage du wizard à la demande
	if(isset($_GET['wizard'])) {$_SESSION['justactivated'.basename(__DIR__)] = true;}
?>
<link rel="stylesheet" href="<?php echo PLX_PLUGINS."tarteaucitronJS/css/tabs.css" ?>" media="all" />
<p>Embarque le script tarteaucitron.js | version:20230203 | <?= count($plxPlugin->service) ?> services</p>	
<h2 class="ib">🍪 <?php $plxPlugin->lang("L_CONFIG") ?></h2>
<a href="parametres_plugin.php?p=<?= basename(__DIR__) ?>&wizard" class="aWizard" style="display:inline;padding:0 0.15em"><img src="<?= PLX_PLUGINS.basename(__DIR__)?>/img/wizard.png" style="height:2em;vertical-align:middle" alt="Wizard"> Wizard</a>
| <a href="plugin.php?p=<?= basename(__DIR__) ?>"> Admin</a>
<div id="tabContainer">
	<form action="parametres_plugin.php?p=<?= basename(__DIR__) ?>" method="post" >
		<div class="tabs">
			<ul>
				<li id="tabHeader_Param"><?php $plxPlugin->lang('L_PARAMS') ?> tarteaucitron</li>
				<li id="tabHeader_main"><?php $plxPlugin->lang('L_PAGE_PRIVACY') ?></li>
				<?php
					foreach($aLangs as $lang) {
						echo '<li id="tabHeader_'.$lang.'">'.strtoupper($lang).'</li>';
					} ?>
			</ul>
		</div>
		<div class="tabscontent">
			<div class="tabpage" id="tabpage_Param">	
				<fieldset class="repeat-grid-300"><legend><?= $plxPlugin->getLang('L_CONFIG') ?></legend>
					
					<p class="transparentInput">
						<label for="privacyUrl">Nom de la page "Politique de confidentialité"</label> 
						<?php plxUtils::printInput('mnuName_'.$lang,$var[$lang]['mnuName'],'text','20-20') ?>		
					</p>
					
					<p>
						<label for="bodyPosition">Position dans LE DOM</label>
						<?php plxUtils::printSelect('bodyPosition',array('top'=>'top','bottom'=>'bottom'),$plxPlugin->bodyPosition); ?>
					</p>	
					<p>
						<label for="hashtag">ID du Panel</label>
						<?php plxUtils::printInput('hashtag',$plxPlugin->hashtag,'text','20-20') ?>	
					</p>	
					<p>
						<label for="cookieName">Nom du cookie</label>
						<?php plxUtils::printInput('cookieName',$plxPlugin->cookieName,'text','20-20',true) ?>
					</p>	
					<p>
						<label for="orientation">Position à l'écran</label>
						<?php plxUtils::printSelect('orientation',array('top'=>'top','middle'=>'middle','bottom'=>'bottom'),$plxPlugin->orientation); ?>	
					</p>	
					<p>
						<label for="groupServices">Grouper les services par catégories</label>
						<?php plxUtils::printSelect('groupServices',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->groupServices); ?>	
					</p>	
					<p>
						<label for="showDetailsOnClick">cliquer pour dérouler la description</label>
						<?php plxUtils::printSelect('showDetailsOnClick',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->showDetailsOnClick); ?>	
					</p>	
					<p>
						<label for="serviceDefaultState">Etat des services par défaut (true - wait - false)</label>
						<?php plxUtils::printSelect('serviceDefaultState',array('true'=>'true','wait'=>'wait','false'=>'false'),$plxPlugin->serviceDefaultState); ?>	
					</p>	
					<p>
						<label for="showAlertSmall">Affiche une petite banniere au bas à droite</label>
						<?php plxUtils::printSelect('showAlertSmall',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->showAlertSmall); ?>	
					</p>	
					<p>
						<label for="cookieslist">Afficher la liste des cookies</label>
						<?php plxUtils::printSelect('cookieslist',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->cookieslist); ?>
					</p>	
					<p>
						<label for="closePopup">Affiche un X de fermeture sur la banniere</label>
						<?php plxUtils::printSelect('closePopup',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->closePopup); ?>
					</p>	
					<p>
						<label for="showIcon">Afficher l'icone</label>
						<?php plxUtils::printSelect('showIcon',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->showIcon); ?>	
					</p>	
					<p>
						<label for="iconSrc">URL de l'icone</label>
						<?php plxUtils::printInput('iconSrc',$plxPlugin->iconSrc,'text','33-100') ?>
					</p>	
					<p>
						<label for="iconPosition">Position de l'icône.</label>
						<?php plxUtils::printSelect('iconPosition',array('BottomRight'=>'bottom right','BottomLeft'=> 'bottom left','TopRight'=> 'top right','TopLeft'=> 'top left'),$plxPlugin->iconPosition); ?>	
					</p>	
					<p>
						<label for="adblocker">Affiche une alert si adblock est actif</label>
						<?php plxUtils::printSelect('adblocker',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->adblocker); ?>	
					</p>	
					<p>
						<label for="DenyAllCta">Affiche le bouton "refuser tout""</label>
						<?php plxUtils::printSelect('DenyAllCta',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->DenyAllCta); ?>
					</p>	
					<p>
						<label for="AcceptAllCta">Afficher le bouton "accepter tout""</label>
						<?php plxUtils::printSelect('AcceptAllCta',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->AcceptAllCta); ?>
					</p>	
					<p>
						<label for="highPrivacy">Désactive l'auto consentement(fortement recommandé))</label>
						<?php plxUtils::printSelect('highPrivacy',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->highPrivacy); ?>
					</p>	
					<p>
						<label for="handleBrowserDNTRequest">Suivre la Protection renforcé de Pistage du navigateur</label>
						<?php plxUtils::printSelect('handleBrowserDNTRequest',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->handleBrowserDNTRequest); ?>
					</p>	
					<p>
						<label for="removeCredit">cache le liens "Crédits"</label>
						<?php plxUtils::printSelect('removeCredit',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->removeCredit); ?>
					</p>	
					<p>
						<label for="moreInfoLink">affiche le lien "Plus d'infos"</label>
						<?php plxUtils::printSelect('moreInfoLink',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->moreInfoLink); ?>
					</p>	
					<p>
						<label for="useExternalCss">Utiliser la feuille de style externe(cdn)</label>
						<?php plxUtils::printSelect('useExternalCss',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->useExternalCss); ?>
					</p>	
					<p>
						<label for="useExternalJs">Utiliser le script externe(cdn)</label>
						<?php plxUtils::printSelect('useExternalJs',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->useExternalJs); ?>
					</p>	
					<p>
						<label for="cookieDomain">cookie Multi-domaine (non utilisé)</label>
						<?php plxUtils::printInput('cookieDomain',$plxPlugin->cookieDomain,'text" placeholder="option non disponible','20-20') ?>
					</p>	
					<p>
						<label for="readmoreLink">Modification de l'intitulé du lien "Plus d'infos"</label>
						<?php plxUtils::printInput('readmoreLink',$plxPlugin->readmoreLink,'text" placeholder="Laisser vide par défaut','20-20') ?>
					</p>	
					<p>
						<label for="mandatory">Affiche un message à propos des cookies obligatoires</label>
						<?php plxUtils::printSelect('mandatory',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->mandatory); ?>
					</p>	
					<p>
						<label for="mandatoryCta">Montrer et désactivé le bouton si cookies obligatoires.</label>
						<?php plxUtils::printSelect('mandatoryCta',array('false'=>L_NO,'true'=>L_YES),$plxPlugin->mandatoryCta); ?>
					</p>
				</fieldset>
				
			</div>
			
			<div class="tabpage" id="tabpage_main">
				<fieldset  class="repeat-grid-300">
					<p>
						<label for="id_url"><?php $plxPlugin->lang('L_PARAM_URL') ?>&nbsp;:</label>
						<?php plxUtils::printInput('url',$var['url'],'text','20-20') ?>
					</p>
					<p>
						<label for="id_mnuDisplay"><?php echo $plxPlugin->lang('L_MENU_DISPLAY') ?>&nbsp;:</label>
						<?php plxUtils::printSelect('mnuDisplay',array('1'=>L_YES,'0'=>L_NO),$var['mnuDisplay']); ?>
					</p>
					<p>
						<label for="id_mnuPos"><?php $plxPlugin->lang('L_MENU_POS') ?>&nbsp;:</label>
						<?php plxUtils::printInput('mnuPos',$var['mnuPos'] , 'text' , '2-5' ) ?>
					</p>
					<p>
						<label for="id_template"><?php $plxPlugin->lang('L_TEMPLATE') ?>&nbsp;:</label>
						<?php plxUtils::printSelect('template', $aTemplates, $var['template']) ?>
					</p>
					<div style="grid-column:1/-1">
						<textarea id="htmlPrivacy" name="htmlPrivacy" style="width:100%;resize: block;" ><?= file_get_contents(PLX_PLUGINS.basename(__dir__).'/assets/privacy.html')?></textarea>
					</div>
				</fieldset>
			</div>
			<?php foreach($aLangs as $lang) : ?>
			<div class="tabpage" id="tabpage_<?php echo $lang ?>">
				<?php if(!file_exists(PLX_PLUGINS.basename(__DIR__).'/lang/'.$lang.'.php')) : ?>
				<p><?php printf($plxPlugin->getLang('L_LANG_UNAVAILABLE'), PLX_PLUGINS.basename(__DIR__).'/lang/'.$lang.'.php') ?></p>
				<?php else : ?>
				<fieldset>
					<p>
						<label for="id_mnuName_<?php echo $lang ?>"><?php $plxPlugin->lang('L_MENU_TITLE') ?>&nbsp;:</label>
						<?php plxUtils::printInput('mnuName_'.$lang,$var[$lang]['mnuName'],'text','20-20') ?>
					</p>
				</fieldset>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<fieldset>
			<p class="in-action-bar">
				<?php echo plxToken::getTokenPostMethod() ?><br>
				<input type="submit" name="submit" value="<?= $plxPlugin->getLang('L_SAVE') ?>"/>
			</p>
		</fieldset>
	</form>
</div>
<script type="text/javascript" src="<?php echo PLX_PLUGINS."tarteaucitronJS/js/tabs.js" ?>"></script>
<script type="text/javascript" src="<?php echo PLX_PLUGINS."tarteaucitronJS/tinymce/js/tinymce/tinymce.min.js" ?>"></script>
<script>
	tinymce.init({
		selector: 'textarea#htmlPrivacy',
		 valid_children : '+body[style]',
		 plugins: [
      'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
      'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
      'media', 'table', 'emoticons', 'template', 'help'
    ],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'
	});
</script>
<style>
	/* do not disturb editing */
	.tox-promotion-link,a[href="https://www.tiny.cloud/powered-by-tiny?utm_campaign=editor_referral&utm_medium=poweredby&utm_source=tinymce&utm_content=v6"] {
	display: none !important;
	}
	/* end disturbing */
	.repeat-grid-300 {
	display: grid;
	grid-template-columns: repeat(auto-fill,minmax(300px,1fr));
	gap: 1em;
	}
	.repeat-grid-300 p{
    padding:5px;
	margin:0;
	border:solid 1px silver;
    border-radius:3px;
	background:pink;
	}
	.repeat-grid-300 p:nth-child(3n){
	background:#bee
	}
	.repeat-grid-300 p:nth-child(3n -1){
	background:#eeb
	}
	.repeat-grid-300 input[readonly] {
	all:revert;
	border:none;
	display:block;
	width:100%;
	text-align:center;
	font-size:1.3em;
	}
	a.aWizard {
	background: gold;
	box-shadow: 0 0 1em;
	padding-inline-end: 0.5em;
	border-radius: 10%/100%;
	border: solid 1px;
	font-weight: bold;
	letter-spacing: 1px;
	text-decoration-color: transparent;
	margin-inline:1.75em;
	}
	h2.ib {
	display:inline-block;
	margin-inline:1.75em;
	}
</style>