<?php
	if(!defined('PLX_ROOT')) exit;
	/**
		* Plugin 			tarteaucitronJS
		*
		* @CMS required		PluXml 
		* @page				admin.php
		* @version			1.0
		* @date				2023-12-11
		* @author 			G.Cyrillus
	**/	
	# Control du token du formulaire
	plxToken::validateFormToken($_POST);
	
	# Liste des langues disponibles et prises en charge par le plugin
	$aLangs = array($plxAdmin->aConf['default_lang']);	
	
	# initialisation des variables propres à chaque lanque
	$langs = array();
	foreach($aLangs as $lang) {
		# chargement de chaque fichier de langue
		$langs[$lang] = $plxPlugin->loadLang(PLX_PLUGINS.'tarteaucitronJS/lang/'.$lang.'.php');
		$var[$lang]['mnuName'] =  $plxPlugin->getParam('mnuName_'.$lang)=='' ? $plxPlugin->getLang('L_DEFAULT_MENU_NAME') : $plxPlugin->getParam('mnuName_'.$lang);
	}
	
	
	# initialisation services enregistrés
	$var['selection'] = $plxPlugin->getParam('selection') == '' ? '' : 	$plxPlugin->getParam('selection');
	
	$plxPlugin->initTarteaucitron = json_decode(file_get_contents(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json'),true);
	
	if(isset($_GET['delete'])) {
		$sel= explode(',',$var['selection']);
		foreach($sel as $k => $v ) {
			if($v == $_GET['sel']) { 
				unset($sel[$k]);
			}
		}		
		$save= implode(",", $sel);				
		$plxPlugin->setParam('selection', trim($save,','), 'string');
		$plxPlugin->saveParams();
		$name= trim($_GET['delete']);
		unset($plxPlugin->initTarteaucitron[$name]);
		file_put_contents(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json', json_encode($plxPlugin->initTarteaucitron, JSON_PRETTY_PRINT | true));
		header("Location: plugin.php?p=".basename(__DIR__)."&tab=tabHeader_Installed");
		exit;
	}
	
	
	if(isset($_POST['update'])) {
		$name= trim($_POST['update']);
		$starter = $_POST['push_'.$name];
		$printer = $_POST['widget_'.$name];
		$plxPlugin->initTarteaucitron[$name]['push']=$starter;
		if($printer != null) $plxPlugin->initTarteaucitron[$name]['printer']=$printer;
		file_put_contents(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json', json_encode($plxPlugin->initTarteaucitron, JSON_PRETTY_PRINT | true));
		header("Location: plugin.php?p=".basename(__DIR__)."&tab=tabHeader_Installed");
		exit;
	}
	
	if(!empty($_POST)) {
		
		if(isset($_POST['selection']) && count($_POST['selection'])>0 ) {
			$sel= explode(',',$var['selection']);
			$newSel = array_merge($sel, $_POST['selection']);
			$newSel= array_unique($newSel);
			
			foreach($newSel as $k => $v ) {
				if(!isset($plxPlugin->service[$v])) { 
					unset($newSel[$k]);
				}
			}
			$save= implode(",", $newSel);				
			$plxPlugin->setParam('selection', trim($save,','), 'string');
		}
		
		
		
		$plxPlugin->saveParams();
		
		header("Location: plugin.php?p=".basename(__DIR__));
		exit;
	}
	
	#preparation list services activés
	$class='';
	$current='';
	$block='';
	$list='';
	$formId='';
	$configList=''.PHP_EOL;
	$installed = explode(',',$var['selection']);
	foreach($installed as $serviceSelected ) {
		$unset='';
		if(!isset($plxPlugin->service[$serviceSelected]['add'])) {
			continue;
		}
		$formId=  preg_replace('/[^a-zA-Z0-9_-]/s', '', strtolower($serviceSelected));
		if(!isset($plxPlugin->initTarteaucitron[$formId]) && !isset($plxPlugin->service[$serviceSelected])) continue;
		if(!isset($plxPlugin->initTarteaucitron[$formId])) {
			//$plxPlugin->initTarteaucitron[$formId] = $formId;
			$plxPlugin->initTarteaucitron[$formId]['push'] = $plxPlugin->service[$serviceSelected]['add'];
			if(isset($plxPlugin->service[$formId]['widget'])) $plxPlugin->initTarteaucitron[$serviceSelected]['printer'] = $plxPlugin->service[$serviceSelected]['widget'];		
			$unset="data-unset";
		}
		$list .= '<li '.$unset.'>'.$serviceSelected.' 
		<a href="?p=tarteaucitronJS&delete='.$formId.'&tab=tabHeader_Installed&sel='.$serviceSelected.'">DELETE</a> 
		<button name="update" value="'.$formId.'"  >ENREGISTRER</button> 
		<em class="configServiceCaption">survolez pour configurer et afficher les infos</em>
		<ul>';
		$list.= '
		<li>'.PHP_EOL.
		'<label for="push_'.$formId.'">demarrage <b class="red">*</b></label> (mettre à jour sans copier dans vos pages)
		<input type="text" id="push_'.$formId.'" name="push_'.$formId.'" value="'.trim(preg_replace('#<script(.*?)>(.*?)</script>#is', '$2' ,$plxPlugin->initTarteaucitron[$formId]['push'])).'">
		</li>';
		if(isset($plxPlugin->initTarteaucitron[$serviceSelected]['printer'])) {
			$list .='
			<li>'.PHP_EOL.
			'<label for="widget_'.$formId.'">widget, code à mettre à jour et à inserer</label>
			<textarea id="widget_'.$formId.'" name="widget_'.$formId.'">'.trim($plxPlugin->initTarteaucitron[$formId]['printer']).'</textarea>
			</li>'.PHP_EOL;
		}
		$list .='
		<li> <b>Code à retirer de vos pages ou de votre thème</b><small> (survoler pour dérouler)</small>
		<pre>'.trim(htmlentities($plxPlugin->service[$serviceSelected]['remove'])).'</pre>
		</li>'.PHP_EOL;
		$list .='
		</ul>'.PHP_EOL.'</li>';
		unset($plxPlugin->service[$serviceSelected]);
		
		#prepare update list
		$configList .='<option selected value="'.$serviceSelected.'">'.$serviceSelected.'</option>'.PHP_EOL;		
	}
	
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
	
	if(isset($_GET['tab']) && $_GET['tab']=='tabHeader_Installed') {
		$class = ' class="tabActiveHeader"';
		$current =' data-current="Installed"';
		$block =' style="display:block;"';
	}
	
?>
<link rel="stylesheet" href="<?php echo PLX_PLUGINS."tarteaucitronJS/css/tabs.css" ?>" media="all" />
<p>Embarque le script tarteaucitron.js | version:20230203 | <?= count($plxPlugin->service) ?> services</p>	
<h2 class="ib">🍪 <?php $plxPlugin->lang("L_ADMIN") ?></h2>
<a href="parametres_plugin.php?p=<?= basename(__DIR__) ?>&wizard" class="aWizard" style="display:inline;padding:0 0.15em"><img src="<?= PLX_PLUGINS.basename(__DIR__)?>/img/wizard.png" style="height:2em;vertical-align:middle" alt="Wizard"> Wizard</a>
| <a href="parametres_plugin.php?p=<?= basename(__DIR__) ?>"> Config </a>
<div id="tabContainer">
	<form action="plugin.php?p=<?= basename(__DIR__) ?>" method="post" >
		<div class="tabs">
			<ul <?= $current ?>>
				<li id="tabHeader_Aservice"><?php $plxPlugin->lang('L_ADD_SERVICE') ?> tarteaucitron</li>
				<li id="tabHeader_Installed" <?= $class ?> ><?php $plxPlugin->lang('L_ADDED_SERVICE') ?></li>
			</ul>
		</div>
		<div class="tabscontent">
			<div class="tabpage" id="tabpage_Aservice">	
				<fieldset>
					<?php
						$fire='';
						$widget='';
					?>
					<div class="form-grid">
						<label tabindex="-1" for="cookie-service">Rechercher un service:</label>
						<input list="cookie-service-choice" id="cookie-service" name="cookie-service" />
						<b data-service>+</b>
						<datalist id="cookie-service-choice">';
							<?php
								foreach($plxPlugin->service as $key => $value) {
									$scriptCommand =  preg_replace('#<script(.*?)>(.*?)</script>#is', '$2' , $value['add'] );
									//$idKey = preg_replace('/\s+/', '_', $key);
									$idKey = preg_replace('/[^a-zA-Z0-9_-]/s', '', strtolower($key));
									$fire .='<li id="'.$idKey.'">
									<label for="add'.$idKey.'">code d\'activation, inserer vos identifiants ou clé si necessaire:</label>
									<textarea rows="5" name="add'.$idKey.'" id="add'.$idKey.'" disabled>'.$scriptCommand.'</textarea>
									';
									if(isset($value['widget'])) {
										$fire .='<label for="widget'.$idKey.'">Modele de script ou widget à inserer dans votre thème, page statique ou article par vos soins en mettant à jours les codes avec les identifiants correspondant </label>
										<textarea rows="5" name="widget'.$idKey.'" id="widget'.$idKey.'" disabled>'.$value['widget'].'</textarea>
										';		 
									}
									if(isset($value['remove'])) {
										$fire .='<label> Portion de code à retirer de votre théme si vous l\'aviez ajouté</label>
										<textarea rows="5" disabled>'.$value['remove'].'</textarea>';		 
									}
									$fire .='</li>
									';
									echo '
									<option value="'.$key.'">'.$key.'</option>';	 
								}
							?>							
						</datalist>
						
						<ul id="selected"></ul>
						<ul id="settings"></ul>
						<ul id="settingsToGet" style="display:none"><?php echo $fire?></ul>
						<select id="selection" name="selection[]" multiple></select>
						<script>
							const dataservice = document.querySelector("#cookie-service");
							const dataSettings = document.querySelector("#settingsToGet");
							const adddataservice = document.querySelector("#selected");
							const getServiceDetails = document.querySelector("#settings");
							const getSelection = document.querySelector('#selection');
							const listService = new Array();
							let resetinputService = document.querySelector("[data-service]");
							
							
							resetinputService.addEventListener("click", function () {
								dataservice.value = "";
							});
							
							dataservice.addEventListener("change", function () {
								let newdataService = dataservice.value;
								listService.push(newdataService);
								updateChoices();
							});
							
							function updateChoices() {
								adddataservice.innerHTML = "";
								getSelection.innerHTML="";
								let newlistService = [...new Set(listService)];
								newlistService.sort();
								newlistService.forEach(function (item) {
									let idSetting = item.toLowerCase().replace(/[\W]/g, "");
									let addItem = document.createElement("li");
									addItem.dataset.settings = idSetting;
									addItem.textContent = item;
									addItem.addEventListener("click", function () {
										showDetails(this.dataset.settings);
									});
									adddataservice.append(addItem);
									let addOption = document.createElement('option');
									addOption.setAttribute('selected','selected');
									addOption.setAttribute('value',item);
									addOption.textContent=idSetting;
									getSelection.append(addOption);
									
									if (
									typeof document.getElementById(idSetting) === 'object' &&
									document.getElementById(idSetting) !== null
									) {
										document
										.getElementById("settings")
										.appendChild(document.getElementById(idSetting));
										document
										.getElementById(idSetting).dataset.id = idSetting;
									}
								});
								showDetails("none");
							}
							function showDetails(id) {
								console.log(id);
								let myShow=document.getElementById(id);
								let lis = getServiceDetails.querySelectorAll("li");
								lis.forEach(function (liItem) {
									liItem.style.display = "none";
									liItem.setAttribute('id', liItem.dataset.id);
								});
								if(myShow != null) {
									myShow.style.display="revert";
									myShow.setAttribute('id', 'view'); // because of addblockers apps, else some won't be seen
								}
								
							}
							
						</script>
						
					</div>
				</fieldset>
				
			</div>
			<div class="tabpage" id="tabpage_Installed" <?= $block ?>>
				<ul>
					<?= $list ?>
				</ul>
				<select id="configList" name="configList[]" multiple><?= $configList ?></select>
			</div>
			
			
			
			<p class="in-action-bar">
				<?php echo plxToken::getTokenPostMethod() ?><br>
				<input type="submit" name="submit" value="<?= $plxPlugin->getLang('L_SAVE') ?>"/>
			</p>
		</fieldset>
	</form>
</div>
<script type="text/javascript" src="<?php echo PLX_PLUGINS."tarteaucitronJS/js/tabs.js" ?>"></script>

