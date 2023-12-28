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
	
	
	$var['selection'] = $plxPlugin->getParam('selection') == '' ? '' : 	$plxPlugin->getParam('selection');
	# initialisation services custom
	$var['custom_name'] = $plxPlugin->getParam('custom_name') == '' ? '' : 	$plxPlugin->getParam('custom_name');
	$var['custom_consent'] = $plxPlugin->getParam('custom_consent') == '' ? 'true' : 	$plxPlugin->getParam('custom_consent');
	$var['custom_type'] = $plxPlugin->getParam('custom_type') == '' ? '' : 	$plxPlugin->getParam('custom_type');
	$var['custom_cookie'] = $plxPlugin->getParam('custom_cookie') == '' ? '' : 	$plxPlugin->getParam('custom_cookie');
	$var['custom_uri'] = $plxPlugin->getParam('custom_uri') == '' ? '' : 	$plxPlugin->getParam('custom_uri');
	$var['custom_readmorelink'] = $plxPlugin->getParam('custom_readmorelink') == '' ? '' : 	$plxPlugin->getParam('custom_readmorelink');
	$var['custom_js_fire'] = $plxPlugin->getParam('custom_js_fire') == '' ? '' : 	$plxPlugin->getParam('custom_js_fire');
	$var['custom_js'] = $plxPlugin->getParam('custom_js') == '' ? '' : 	$plxPlugin->getParam('custom_js');
	$var['custom_widget']= $plxPlugin->getParam('custom_widget') == '' ? '' : 	$plxPlugin->getParam('custom_widget');
	
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
	
	if(isset($_POST['validCustomService']) && $_POST['custom_name'] != '') {
		
		#sauvegarde du tableau des nouveaux services
		if(!file_exists(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json')) {
			$customService = array();
			if (!touch(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json')) {
				echo "erreur à la création de: ".PLX_PLUGINS.basename(__DIR__)."/assets/custom.json";
				} else {
				file_put_contents(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json', json_encode($customService,true));
			}
		}
		$customService = json_decode(file_get_contents(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json'),true);
		$customService[$_POST['custom_name']]=array();
		$customService[$_POST['custom_name']]['add'] = $_POST['custom_js_fire'] ;
		$customService[$_POST['custom_name']]['widget'] = $_POST['custom_widget'] ;
		$customService[$_POST['custom_name']]['remove'] ='';
		file_put_contents(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json', json_encode($customService,true));
		
		#Ajout des services au scripts de tarteaucitron
		if(!file_exists(PLX_PLUGINS.basename(__DIR__).'/js/tarteaucitronCustom.js')) {
			if (!touch(PLX_PLUGINS.basename(__DIR__).'/js/tarteaucitronCustom.js')) {
				echo "erreur à la création de: ".PLX_PLUGINS.basename(__DIR__)."/js/tarteaucitronCustom.js";
			} 
		}			
		$customJS = file_get_contents(PLX_PLUGINS.basename(__DIR__).'/js/tarteaucitronCustom.js');
		
		$serviceKey =  preg_replace('/[^a-zA-Z0-9_-]/s', '', strtolower($_POST['custom_name']));
		
		$buildService= '
		tarteaucitron.services.'.$serviceKey.' = {
		"key": "'.$serviceKey.'",
		"type": "'.$_POST['custom_type'].'",
		"name": "'.$_POST['custom_name'].'",
		"uri": "'.$_POST['custom_uri'].'",
		"readmoreLink": "'.$_POST['custom_readmorelink'].'",
		"needConsent": '.$_POST['custom_consent'].',
		"cookies": ['.$_POST['custom_cookie'].'],
		"js": function () {
		'.$_POST['custom_js'].'
		}
		};
		';
		$customJS .=$buildService;
		file_put_contents(PLX_PLUGINS.basename(__DIR__).'/js/tarteaucitronCustom.js',$customJS );
		
		#on vide les champs d'edition
		$plxPlugin->setParam('custom_name', '', 'string');		
		$plxPlugin->setParam('custom_consent','', 'string');		
		$plxPlugin->setParam('custom_type','', 'string');		
		$plxPlugin->setParam('custom_cookie','', 'string');		
		$plxPlugin->setParam('custom_uri','', 'string');		
		$plxPlugin->setParam('custom_readmorelink','', 'string');		
		$plxPlugin->setParam('custom_js_fire','', 'cdata');						
		$plxPlugin->setParam('custom_js','', 'cdata');					
		$plxPlugin->setParam('custom_widget','', 'cdata');
		$plxPlugin->saveParams();		
		header("Location: plugin.php?p=".basename(__DIR__));
		exit;
	}
	
	
	if(isset($_POST['saveCustomService'])) {
		$plxPlugin->setParam('custom_name', $_POST['custom_name'], 'string');		
		$plxPlugin->setParam('custom_consent', $_POST['custom_consent'], 'string');		
		$plxPlugin->setParam('custom_type', $_POST['custom_type'], 'string');		
		$plxPlugin->setParam('custom_cookie', $_POST['custom_cookie'], 'string');		
		$plxPlugin->setParam('custom_uri', $_POST['custom_uri'], 'string');		
		$plxPlugin->setParam('custom_readmorelink', $_POST['custom_readmorelink'], 'string');		
		$plxPlugin->setParam('custom_js_fire', $_POST['custom_js_fire'], 'cdata');						
		$plxPlugin->setParam('custom_js', $_POST['custom_js'], 'cdata');					
		$plxPlugin->setParam('custom_widget', $_POST['custom_widget'], 'cdata');
		$plxPlugin->saveParams();		
		header("Location: plugin.php?p=".basename(__DIR__)."&tab=tabHeader_Custom");
		exit;		
	}
	
	if(isset($_POST['update'])) {
		$name= trim($_POST['update']);
		$starter = $_POST['push_'.$name];
		$plxPlugin->initTarteaucitron[$name]['push']=$starter;
		$printer = $_POST['widget_'.$name];
		if($printer !== null) $plxPlugin->initTarteaucitron[$name]['printer']=$printer;
		file_put_contents(PLX_PLUGINS.basename(__DIR__).'/assets/fire.json', json_encode($plxPlugin->initTarteaucitron, JSON_PRETTY_PRINT | true));
		header("Location: plugin.php?p=".basename(__DIR__)."&tab=tabHeader_Installed");
		exit;
	}
	
	if(!empty($_POST)) {
	$customsID = array();
		if(file_exists(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json')) {
		$customsID = json_decode(file_get_contents(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json'),true);
		}
		
		if(isset($_POST['selection']) && count($_POST['selection'])>0 ) {
			$sel= explode(',',$var['selection']);
			$newSel = array_merge($sel, $_POST['selection']);
			$newSel= array_unique($newSel);
			
			foreach($newSel as $k => $v ) {
				if(!isset($plxPlugin->service[$v]) && !isset($customsID[$v])) { 
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
			if(isset($plxPlugin->service[$serviceSelected]['widget']))  {
				$plxPlugin->initTarteaucitron[$formId]['printer'] = $plxPlugin->service[$serviceSelected]['widget'];
			}
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
		if(isset($plxPlugin->initTarteaucitron[$formId]['printer'])) {
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
	
	if(file_exists(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json')) {
		$customInstalled = json_decode(file_get_contents(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json'),true);
		
		foreach($installed as $serviceSelected ) {
			$unset='';
			if(!isset($customInstalled[$serviceSelected]['add'])) {
				continue;
			}
			$formId=  preg_replace('/[^a-zA-Z0-9_-]/s', '', strtolower($serviceSelected));
			if(!isset($plxPlugin->initTarteaucitron[$formId]) && !isset($customInstalled[$serviceSelected])) continue;
			if(!isset($plxPlugin->initTarteaucitron[$formId])) {
				//$plxPlugin->initTarteaucitron[$formId] = $formId;
				$plxPlugin->initTarteaucitron[$formId]['push'] = $customInstalled[$serviceSelected]['add'];
				if(isset($customInstalled[$serviceSelected]['widget']))  {
					$plxPlugin->initTarteaucitron[$formId]['printer'] = $customInstalled[$serviceSelected]['widget'];
				}
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
			if(isset($plxPlugin->initTarteaucitron[$formId]['printer'])) {
				$list .='
				<li>'.PHP_EOL.
				'<label for="widget_'.$formId.'">widget, code à mettre à jour et à inserer</label>
				<textarea id="widget_'.$formId.'" name="widget_'.$formId.'">'.trim($plxPlugin->initTarteaucitron[$formId]['printer']).'</textarea>
				</li>'.PHP_EOL;
			}
			$list .='
			<li> <b>Code à retirer de vos pages ou de votre thème</b><small> (survoler pour dérouler)</small>
			<pre>'.trim(htmlentities($customInstalled[$serviceSelected]['remove'])).'</pre>
			</li>'.PHP_EOL;
			$list .='
			</ul>'.PHP_EOL.'</li>';
			unset($customInstalled[$serviceSelected]);
			
			#prepare update list
			$configList .='<option selected value="'.$serviceSelected.'">'.$serviceSelected.'</option>'.PHP_EOL;
			
			
			
		}
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
	
	if(isset($_GET['tab'])) {
		$class = ' class="tabActiveHeader"';
		$current =' data-current="Installed"';
		$block =' style="display:block;"';
		if($_GET['tab']=='tabHeader_Installed') $current =' data-current="Installed"';
		if($_GET['tab']=='tabHeader_Custom') $current =' data-current="Custom"';
	}
	
?>
<link rel="stylesheet" href="<?php echo PLX_PLUGINS."tarteaucitronJS/css/tabs.css" ?>" media="all" />
<p>Embarque le script tarteaucitron.js | version:20230203 | <?= count($plxPlugin->service) ?> services</p>	
<h2 class="ib">🍪 <?php $plxPlugin->lang("L_ADMIN") ?></h2>
<a href="plugin.php?p=<?= basename(__DIR__) ?>&wizard" class="aWizard" style="display:inline;padding:0 0.15em"><img src="<?= PLX_PLUGINS.basename(__DIR__)?>/img/wizard.png" style="height:2em;vertical-align:middle" alt="Wizard"> Wizard</a>
| <a href="parametres_plugin.php?p=<?= basename(__DIR__) ?>"> Config </a>
<div id="tabContainer">
	<form action="plugin.php?p=<?= basename(__DIR__) ?>" method="post" >
		<div class="tabs">
			<ul <?= $current ?>>
				<li id="tabHeader_Aservice"><?php $plxPlugin->lang('L_ADD_SERVICE') ?> tarteaucitron</li>
				<li id="tabHeader_Installed" <?php if(isset($_GET['tab']) && $_GET['tab']=='tabHeader_Installed') echo $class ?> ><?php $plxPlugin->lang('L_ADDED_SERVICE') ?></li>
				<li id="tabHeader_Custom" <?php if(isset($_GET['tab']) && $_GET['tab']=='tabHeader_Custom') echo  $class ?> ><?php $plxPlugin->lang('L_ADD_CUSTOM') ?></li>
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
							
							<?php
							# custom
							if(file_exists(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json')) {
								$customInstalled = json_decode(file_get_contents(PLX_PLUGINS.basename(__DIR__).'/assets/custom.json'),true);
								foreach($customInstalled as $key => $value) {
									$scriptCommand =  $value['add'];
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
			<div class="tabpage" id="tabpage_Installed" <?php if(isset($_GET['tab']) && $_GET['tab']=='tabHeader_Installed') echo  $block ?>>
				<ul>
					<?= $list ?>
				</ul>
				<select id="configList" name="configList[]" multiple><?= $configList ?></select>
			</div>
			
			<div class="tabpage" id="tabpage_Custom"  <?php if(isset($_GET['tab']) && $_GET['tab']=='tabHeader_Custom') echo  $block ?>>
				<p><b class="alert red"><?php $plxPlugin->lang('L_CUSTOM_ADVANCED') ?></b> | <b><?php $plxPlugin->lang('L_CUSTOM_SUPPORT') ?></b> <a href="https://tarteaucitron.io" target="_blank">https://tarteaucitron.io</a></p>
				<fieldset>
					<legend>Custom Service</legend>
					<p>
						<label for="custom_name"><?php $plxPlugin->lang('L_CUSTOM_NAME') ?></label>
						<?php plxUtils::printInput('custom_name',$var['custom_name'],'text','20-20') // + nettoyageminuscule pour le champ key et nom?>
					</p>
					<p>
						<label for="custom_consent"><?php $plxPlugin->lang('L_CUSTOM_CONSENT') ?></label>
						<?php plxUtils::printSelect('custom_consent',array('false'=>L_NO,'true'=>L_YES),$var['custom_consent']); ?>	
					</p>					
					<p>
						<label for="custom_type"><?php $plxPlugin->lang('L_CUSTOM_TYPE') ?></label>
						<?php plxUtils::printSelect('custom_type',array( 
							'ads'		=> $plxPlugin->getLang('L_CUSTOM_TYPE_ADS'), 
							'analytic'	=> $plxPlugin->getLang('L_CUSTOM_TYPE_ANALYTIC'),
							'api'		=> $plxPlugin->getLang('L_CUSTOM_TYPE_API'), 
							'comment'	=> $plxPlugin->getLang('L_CUSTOM_TYPE_COMMENT'), 
							'social'	=> $plxPlugin->getLang('L_CUSTOM_TYPE_SOCIAL') , 
							'support'	=> $plxPlugin->getLang('L_CUSTOM_TYPE_SUPPORT'), 
							'video'		=> $plxPlugin->getLang('L_CUSTOM_TYPE_VIDEO'),
							'other' 	=> $plxPlugin->getLang('L_CUSTOM_TYPE_OTHER')
						),$var['custom_type']); ?>
					</p>
					<p>
						<label for="custom_cookie"><?php $plxPlugin->lang('L_CUSTOM_COOKIE') ?></label>
						<?php plxUtils::printInput('custom_cookie',$var['custom_cookie'],'text','20-40') ?>
					</p>		
					<p>
						<label for="custom_uri"><?php $plxPlugin->lang('L_CUSTOM_URI') ?></label>
						<?php plxUtils::printInput('custom_uri',$var['custom_uri'],'text','20-40') ?>
					</p>			
					<p>
						<label for="custom_readmoreLink"><?php $plxPlugin->lang('L_CUSTOM_READMORELINK') ?></label>
						<?php plxUtils::printInput('custom_readmoreLink',$var['custom_readmorelink'],'text','20-40') ?>
					</p>		
					<p>
						<label for="custom_js_fire"><?php $plxPlugin->lang('L_CUSTOM_JS_FIRE') ?></label>	
						<?php plxUtils::printArea('custom_js_fire', $var['custom_js_fire'], 0, 1,'','','placeholder="(tarteaucitron.job = tarteaucitron.job || []).push(\'###service###\');"') ?>
					</p>			
					<p>
						<label for="custom_js_on"><?php $plxPlugin->lang('L_CUSTOM_JS') ?></label>	
						<?php plxUtils::printArea('custom_js', $var['custom_js'], 0, 8,'','','placeholder="// '.$plxPlugin->getLang('L_CUSTOM_JS_CODE').'"') ?>
					</p>			
					<p>
						<label for="custom_widget"><?php $plxPlugin->lang('L_CUSTOM_WIDGET') ?></label>	
						<?php plxUtils::printArea('custom_widget', $var['custom_widget'], 0, 3,'','','placeholder="// '.$plxPlugin->getLang('L_CUSTOM_WIDGET_CODE').'"') ?>
					</p>		
					<p>
						<button class="btn blue" name="saveCustomService"><?= $plxPlugin->getLang('L_SAVE') ?></button> |
						<button class="btn red" name="validCustomService"><?php $plxPlugin->lang('L_CUSTOM_VALID') ?></button>
					</p>
					
				</fieldset>
				
			</div>			
			
			<p class="in-action-bar">
				<?php echo plxToken::getTokenPostMethod() ?><br>
				<input type="submit" name="submit" value="<?= $plxPlugin->getLang('L_SAVE') ?>"/>
			</p>
		</fieldset>
	</form>
</div>
<script type="text/javascript" src="<?php echo PLX_PLUGINS."tarteaucitronJS/js/tabs.js" ?>"></script>

