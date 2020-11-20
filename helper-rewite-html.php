/*************** YouTube Video Block ***************/

function rocket_helper_lazyload_exclude_pattern( array $pattern ) {
    
    $pattern[] = 'youtube';    
    return $pattern;
}

add_filter( 'rocket_lazyload_iframe_excluded_patterns', 'rocket_helper_lazyload_exclude_pattern' );

---------------------------------------------------------

foreach ($newHtml->find('iframe[src*="https://www.youtube.com/embed/MU0Yp0qmYEs?rel=0"]') as $iframe) {
	$iframe->setAttribute("data-type", "wprocket-youtube-video");
	$iframe->setAttribute("data-src", $iframe->src);
	$iframe->removeAttribute("src");
}

---------------------------------------------------------

var helperYoutubeVideoTimer=setTimeout(helperYoutubeVideo, helper_youtube_delay);
helperUserInteractionEvents.forEach(function(event){window.addEventListener(event,helperYoutubeVideoEvent,{passive:!0})});

function helperYoutubeVideoEvent(){
if(helper_youtube_video){helperYoutubeVideo();}
clearTimeout(helperYoutubeVideoTimer);
helperUserInteractionEvents.forEach(function(event){window.removeEventListener(event,helperYoutubeVideoEvent,{passive:!0})});
}

function helperYoutubeVideo(){
document.querySelectorAll("iframe[data-type='wprocket-youtube-video']").forEach(
function(elem){elem.setAttribute("src",elem.getAttribute("data-src"));
elem.removeAttribute("data-src")})
helper_youtube_video=false;
}

/*************** YouTube Video Block ***************/

/*************** Vimeo Video Block ***************/

foreach ($newHtml->find('iframe[src*="https://player.vimeo.com/video/416158069?autoplay=1&title=0&byline=0&portrait=0"]') as $iframe) {
	$iframe->setAttribute("data-type", "wprocket-vimeo-video");
	$iframe->setAttribute("data-src", $iframe->src);
	$iframe->removeAttribute("src");
}

---------------------------------------------------------

var helperVimeoVideoTimer=setTimeout(helperVimeoVideo, helper_vimeo_delay);
helperUserInteractionEvents.forEach(function(event){window.addEventListener(event,helperVimeoVideoEvent,{passive:!0})});

function helperVimeoVideoEvent(){
if(helper_vimeo_video){helperVimeoVideo();}
clearTimeout(helperVimeoVideoTimer);
helperUserInteractionEvents.forEach(function(event){window.removeEventListener(event,helperVimeoVideoEvent,{passive:!0})});
}

function helperVimeoVideo(){
document.querySelectorAll("iframe[data-type='wprocket-vimeo-video']").forEach(
function(elem){elem.setAttribute("src",elem.getAttribute("data-src"));
elem.removeAttribute("data-src")})
helper_vimeo_video=false;
}

/*************** Vimeo Video Block ***************/

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

