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
                             // UniversalXPConnect privilege is required in Firefox
                                     try {
                                            if (window.netscape && netscape.security) { // Firefox
                                            netscape.security.PrivilegeManager.enablePrivilege ("UniversalXPConnect");
                                      }
                                 }
                            catch (e) {
                                alert ("UniversalXPConnect privilege is required for this operation!");
                                return;
                             }

                             if ('fullScreen' in window) {
                             window.fullScreen = !window.fullScreen;
                              }
                             else {
                              alert ("Your browser does not support this example!");
                                }
                              }