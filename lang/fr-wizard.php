<?php
	if(!defined('PLX_ROOT')) exit; 
	/**
		* Plugin 			tarteaucitronJS
		*
		* @CMS required		PluXml 
		* @page				-wizard.php
		* @version			0.0
		* @date				2023-12-11
		* @author 			G.Cyrillus
	**/		
	
	# pas d'affichage dans un autre plugin !	
	if(isset($_GET['p'])&& $_GET['p'] !== 'tarteaucitronJS' ) {goto end;}
	
	# on charge la class du plugin pour y accéder
	$plxMotor = plxMotor::getInstance();
	$plxPlugin = $plxMotor->plxPlugins->getInstance( 'tarteaucitronJS'); 
	
	# On vide la valeur de session qui affiche le Wizard maintenant qu'il est visible.
	if (isset($_SESSION['justactivatedtarteaucitronJS'])) {unset($_SESSION['justactivatedtarteaucitronJS']);}
	
	
	# Liste des langues disponibles et prises en charge par le plugin
	# on charge la class du plugin pour y accéder
	$plxAdmin = plxAdmin::getInstance();
	$aLangs = array($plxAdmin->aConf['default_lang']);
	
	# Si le plugin plxMyMultiLingue est installé on filtre sur les langues utilisées
	# On garde par défaut le fr si aucune langue sélectionnée dans plxMyMultiLingue
	if(defined('PLX_MYMULTILINGUE')) {
		$langs = plxMyMultiLingue::_Langs();
		$multiLangs = empty($langs) ? array() : explode(',', $langs);
		$aLangs = $multiLangs;
	}
	# initialisation des variables propres à chaque lanque
	$langs = array();
	foreach($aLangs as $lang) {
		# chargement de chaque fichier de langue
		$langs[$lang] = $plxPlugin->loadLang(PLX_PLUGINS.basename(__dir__).'/lang/'.$lang.'.php');
		$var[$lang]['mnuName'] =  $plxPlugin->getParam('mnuName_'.$lang)=='' ? $plxPlugin->getLang('L_DEFAULT_MENU_NAME') : $plxPlugin->getParam('mnuName_'.$lang);
	}
	# initialisation des variables communes à chaque langue
	$var['mnuDisplay'] =  $plxPlugin->getParam('mnuDisplay')=='' ? 1 : $plxPlugin->getParam('mnuDisplay');
	$var['mnuPos'] =  $plxPlugin->getParam('mnuPos')=='' ? 5 : $plxPlugin->getParam('mnuPos');
	$var['template'] = $plxPlugin->getParam('template')=='' ? 'static.php' : $plxPlugin->getParam('template');
	$var['url'] = $plxPlugin->getParam('url')=='' ? 'search' : $plxPlugin->getParam('url');
	
	
	
	# initialisation des variables
	$var = array();
	
	
	
	#affichage
?>
<link rel="stylesheet" href="<?= PLX_PLUGINS ?>tarteaucitronJS/css/wizard.css" media="all" />
<input id="closeWizard" type="checkbox">
<div class="wizard">	
	<div class="container">	
		<div class='title-wizard'>
			<h2><?= $plxPlugin->aInfos['title']?><br><?= $plxPlugin->aInfos['version']?></h2>
			<img src="<?php echo PLX_PLUGINS. 'tarteaucitronJS'?>/icon.png">
			<div><q> Made in <?= $plxPlugin->aInfos['author']?> </q></div>
		</div>
		<p></p>
		
		<div id="tab-status">
			<span class="tab active">1</span>
		</div>		
		<form action="parametres_plugin.php?p=<?php echo 'tarteaucitronJS' ?>"  method="post">
			<div role="tab-list">		
				<div role="tabpanel" id="tab1" class="tabpanel">
					<h2>Bienvenue dans l’extension <b style="font-family:cursive;color:crimson;font-variant:small-caps;font-size:2em;vertical-align:-.5rem;display:block;"><?= $plxPlugin->aInfos['title']?></b></h2>
					<p>Ces quelques pages vont vous aider à prendre en main ce plugin qui embarque le celebre  <a href="https://tarteaucitron.io/<?= $lang ?>/">tarteauciron.js</a></p>
					<br>
					<blockquote><q>script open source qui permet de se mettre en conformité vis-à-vis de la législation sur les cookies (RGPD)</q> <br> 
						<cite>Amauri Champeaux</cite>.
					</blockquote>
					<br><p class="alert green">Il est conseillé de désactiver le plugin pendant sa configuration afin de ne pas perturber vos visiteurs du moment.</p>
				</div>	
				
				<div role="tabpanel" id="tab2" class="tabpanel hidden title">
					<h2>CONFIGURATION</h2>
				</div>	
				
				<div role="tabpanel" id="tab3" class="tabpanel hidden">
					<h2>La configuration</h2>				
					<p>elle se decline en 3 onglets et peut-être effectuée en désactivant le plugin.</p>
					<ol>
						<li>Les paramétres de demarrage du script tarteaucitron.js avec ses options par défaut.<br><small>correspond à 
						<a href="https://tarteaucitron.io/fr/install/" target="_blank">l'étape 2</a> d'installation du script sur tarteaucitron.io</small></li>
						<li>Les paramètres concernant l'affichage d'une page confidentialité en front.
							<b class="red alert">Un modele de la CNIL est fourni et éditable.</b></li>
						<li>Le nom de la page dans les langues disponible du plugin.</li>
					</ol>
					<p style="margin:1em;font-weight:bold">La configuration par défaut est tout à fait classique et fonctionnelle, </p>
					<p class="alert blue"><b>Notez</b> que le bandeau de configuration des cookies pour le visiteur ne s'affiche que<br> 
						si vous avez installer au moins un service installé. <sub>(voir pages suivantes)</sub></p>
				</div>	
				
				<div role="tabpanel" id="tab4" class="tabpanel hidden title">
					<h2>ADMINISTRATION</h2>
				</div>	
				
				<div role="tabpanel" id="tab5" class="tabpanel hidden">
					<h2>L'administration</h2>
					<p>En deux parties, elle reprend  </p>
					<ol>
						<li>la premiere vous permet d'ajouter l'un des 200 services que tarteaucitron gere dans sa version gratuite.<small>(etape 3 sur tarteaucitron.io)</small></li>
						<li>la deuxieme vous permet de mettre à jour les codes des differents services en y inserant vos identifiant, clé des applications, 
						ainsi que les portions de codes  à inserer dans vos pages ou thèmes. </li>
					</ol>
				</div>						
				
				<div role="tabpanel" id="tabEnd" class="tabpanel hidden">
					<h2>Yapuka</h2>
					<p class="alert orange">Une fois vos services sélectionnés et configurés et les codes à ajouter dans vos pages ou votre thème,<br>
						n'oubliez pas de réactiver le plugin.</p>

				</div>		
				<div class="pagination">
					<a class="btn hidden" id="prev"><?php $plxPlugin->lang('L_PREVIOUS') ?></a>
					<a class="btn" id="next"><?php $plxPlugin->lang('L_NEXT') ?></a>
					<?php echo plxToken::getTokenPostMethod().PHP_EOL ?>
					<button class="btn btn-submit hidden" id="submit"><?php $plxPlugin->lang('L_CLOSE') ?></button>
				</div>
			</div>		
		</form>			
		<p class="idConfig">
			<?php
				if(file_exists(PLX_PLUGINS. 'tarteaucitronJS/admin.php')) {echo ' 
				<a href="/core/admin/plugin.php?p= tarteaucitronJS">Page d\'administration '. basename(__DIR__ ).'</a>';}
				if(file_exists(PLX_PLUGINS. 'tarteaucitronJS/config.php')) {echo ' 	<a href="/core/admin/parametres_plugin.php?p=tarteaucitronJS">Page de configuration  tarteaucitronJS</a>';}
				?>
		<label for="closeWizard"> Fermer </label>
		</p>	
	</div>	
	<script src="<?= PLX_PLUGINS ?>tarteaucitronJS/js/wizard.js"></script>
</div>
<?php end: // FIN! ?>				
