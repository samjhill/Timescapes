var count = 0;
var images = new Array();

function advancePage(urls){
    var path = urls[count];
    console.log("Count: " + count);
    if(count == urls.length)
    {
        count = 0;
        location.reload();
    }
    else{count++;}
    
    //change the background!
	
	
    document.body.style.backgroundImage = 'url('+ path +')';
	console.log('background changed to ' + path);
    
    //unhide back button
    if ($('back-button').is(":visible") == false) {
	$('#back-button').show();
    }
    
    
}

function backPage(urls){
	if(count <= 1){
	    location.reload();
	    return;
	}
    count = count - 1;
    var path = urls[count];
    
    //change the background!
    document.body.style.backgroundImage = 'url('+ path +')';
    console.log('background changed to ' + path);
    
    
}

function preload() {
    for (i = 0; i < preload.arguments.length; i++) {
	images[i] = new Image();
	images[i].src = preload.arguments[i];
    }
}

function getComments() {
    //code
}

function ToggleFullScreen () {
   var el = document.documentElement
	, rfs = // for newer Webkit and Firefox
	       el.requestFullScreen
	    || el.webkitRequestFullScreen
	    || el.mozRequestFullScreen
	    || el.msRequestFullScreen
    ;
    if(typeof rfs!="undefined" && rfs){
      rfs.call(el);
    } else if(typeof window.ActiveXObject!="undefined"){
      // for Internet Explorer
      var wscript = new ActiveXObject("WScript.Shell");
      if (wscript!=null) {
	 wscript.SendKeys("{F11}");
      }
    }
}