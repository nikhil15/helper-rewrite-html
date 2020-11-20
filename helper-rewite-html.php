/*************** External CSS Block ***************/

if(preg_match("/cdn.jsdelivr.net\/fontawesome\/4.7.0\/css\/font-awesome.min/i", $stylesheet->href)) {
	rocket_helper_create_external_css_tag($stylesheet);
}

function rocket_helper_create_external_css_tag($stylesheet) {
	$stylesheet->setAttribute("data-type","wprocket-external-css");
	$stylesheet->setAttribute("data-href", $stylesheet->href);
	$stylesheet->removeAttribute("href");
        $stylesheet->removeAttribute("rel");
	$stylesheet->removeAttribute("onload");
	$stylesheet->removeAttribute("as");
}

---------------------------------------------------------

var helperLoadExternalCSSTimer=setTimeout(helperTimerExternalCSS, helper_external_css_delay);
helperUserInteractionEvents.forEach(function(event){window.addEventListener(event,helperEventsExternalCSS,{passive:!0})});

function helperEventsExternalCSS(){
if(helper_external_css){helperTimerExternalCSS();}
clearTimeout(helperLoadExternalCSSTimer);
helperUserInteractionEvents.forEach(function(event){window.removeEventListener(event,helperEventsExternalCSS,{passive:!0})})
}

function helperTimerExternalCSS(){  
document.querySelectorAll("link[data-type='wprocket-external-css']").forEach(
function(elem){elem.setAttribute("rel","stylesheet");elem.setAttribute("href",elem.getAttribute("data-href"));
elem.removeAttribute("data-href")})
helper_external_css=false;
}

/*************** External CSS Block ***************/
