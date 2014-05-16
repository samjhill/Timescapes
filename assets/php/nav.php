<?php
     
    //Get the user's IP address
    $user_ip = $_SERVER['REMOTE_ADDR'];
    //The Data Science Toolkit URL
    $url = 'http://www.datasciencetoolkit.org/ip2coordinates/';
    //Find the user's location from their IP. 
    //*** You need the get_data function from the sample code
    $raw_geocode = json_decode( get_data( $url . $user_ip) );
    //Check if the user is in the US
    if ('US' === $raw_geocode->$user_ip->country_code) {
      //If yes, store their zip code in a variable, and print it
      $zip_code = $raw_geocode->$user_ip->postal_code;
      //printf('<p>Your zip code is: %s</p>', $raw_geocode->$user_ip->postal_code);
    } else {
      //If the user isn't in the US, set a sip code that will work.
      $zip_code = '14623';
    }
    if($zip_code == null){
	$zip_code = 14623;
    }
    //Print the raw data for debugging.
    //printf('<pre>%s</pre>', print_r($raw_geocode, true));
    //$data = get_data("http://weather.yahooapis.com/forecastrss?p=14623&u=f");
    
    $data = get_data("http://weather.yahooapis.com/forecastrss?p={$zip_code}&u=f");
    //printf($data);
    $location = format_result(get_match('/<yweather:location city="(.*)"/isU',$data));
    $weather_condition = format_result(get_match('/<yweather:condition  text="(.*)"/isU',$data));
    $temperature = format_result(get_match('/<yweather:wind chill="(.*)"/isU',$data));
    
    /* debug to see what we got back */
    //echo '<pre style="background:#fff;font-size:12px;">['; print_r($data); echo ']</pre>';
    
    function get_data($url)
    {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$xml = curl_exec($ch);
	curl_close($ch);
	return $xml;
    }
    
    /* format the result */
    function format_result($input)
    {
	    return strtolower(str_replace(array(' ', '(', ')'), array('-', '-', ''), $input));
    }
    
    /* helper:  does regex */  
    function get_match($regex,$content)  
    {  
	    preg_match($regex,$content,$matches);  
	    return $matches[1];  
    }
	
    
    echo '
    
    <div id="weather" class="pull-right">
	<div id="location">' . $location . '</div>
	<div id="condition">' . $weather_condition . '</div>
	<div id="temperature">' . $temperature . ' &deg;</div>
    </div>
    
    <ul id="nav" class="visible-md visible-lg">
        <li id="nav-home"><a href="index.php"><i class="fa fa-home"></i> home</a></li>
        <li id="nav-waterfalls"><a href="waterfall.php"><i class="fa fa-anchor"></i> waterfalls</a></li>
        <li id="nav-trees"><a href="tree.php"><i class="fa fa-leaf"></i> trees</a></li>
	<li id="nav-paths"><a href="paths.php"><i class="fa fa-road"></i> paths</a></li>
	<li id="nav-urban"><a href="urban.php"><i class="fa fa-building-o"></i> urban</a></li>
        <li id="nav-tips"><a href="tips.php"><i class="fa fa-pencil-square-o"></i> tips</a></li>
	<li id="nav-comments"><a href="comments.php"><i class="fa fa-comments"></i> comments</a></li>
        <li id="nav-about"><a href="about.php"><i class="fa fa-info-circle"></i> about</a></li>
    </ul>
    
    
    
    
    <ul id="nav-phone" class="visible-xs visible-sm nav nav-pills">
        <li id="nav-home"><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li id="nav-waterfalls"><a href="waterfall.php"><i class="fa fa-anchor"></i></a></li>
        <li id="nav-trees"><a href="tree.php"><i class="fa fa-leaf"></i></a></li>
	<li id="nav-paths"><a href="paths.php"><i class="fa fa-road"></i></a></li>
	<li id="nav-urban"><a href="urban.php"><i class="fa fa-building-o"></i></a></li>
        <li id="nav-tips"><a href="tips.php"><i class="fa fa-pencil-square-o"></i></a></li>
	<li id="nav-comments"><a href="comments.php"><i class="fa fa-comments"></i></a></li>
        <li id="nav-about"><a href="about.php"><i class="fa fa-info-circle"></i></a></li>
    </ul>';
?>