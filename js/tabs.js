/**
	* Plugin 			tarteaucitronJS
	*
	* @CMS required			PluXml 
	*
	* @version			0.0
	* @date				2023-12-11
	* @author 			G.Cyrillus/Stephane F.
**/
window.onload=function() {
	// get tab container
	var container = document.getElementById("tabContainer");
	// set current tab
	var navitem = container.querySelector(".tabs ul li");
	var isSelectedtab = container.querySelector('ul[data-current]');
	if(!isSelectedtab) {
	//store which tab we are on
	var ident = navitem.id.split("_")[1];
	navitem.parentNode.setAttribute("data-current",ident);
	//set current tab with class of activetabheader
	navitem.setAttribute("class","tabActiveHeader");
	isSelected='';
	}
	else {
	isSelected = isSelectedtab.getAttribute('data-current')	;
		}
	//hide tabs

	var pages = container.querySelectorAll(":not(#tabpage_"+isSelected+").tabpage");
	for (var i = 0; i < pages.length; i++) {
	  pages[i].style.display="none";
	}
if(!isSelectedtab) {
	 pages[0].style.display='block';
}
	//this adds click event to tabs
	var tabs = container.querySelectorAll(".tabs ul li");
	for (var i = 0; i < tabs.length; i++) {
	  tabs[i].onclick=displayPage;
	}
}

	
	

// on click of one of tabs
function displayPage() {
	var current = this.parentNode.getAttribute("data-current");
	this.parentNode.removeAttribute("data-current");
	//remove class of activetabheader and hide old contents
	document.getElementById("tabHeader_" + current).removeAttribute("class");
	document.getElementById("tabpage_" + current).style.display="none";

	var ident = this.id.split("_")[1];
	//add class of activetabheader to new active tab and show contents
	this.setAttribute("class","tabActiveHeader");
	document.getElementById("tabpage_" + ident).style.display="block";
	this.parentNode.setAttribute("data-current",ident);
}