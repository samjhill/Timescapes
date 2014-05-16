<?php
    echo '
    <script type="text/javascript" src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    
    <script>
        //hide all info items
	$("[id^=info-]").hide();
	
	//except the first
	$("#info-0").show();
	
	//back button hidden initially
	$("#back-button").hide();
	
	//time to preload images
	if(urls){
	 $(urls).preload();
	}
    </script>
    
   
    ';
    
    
?>