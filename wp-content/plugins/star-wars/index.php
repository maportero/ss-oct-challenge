<?php

/**
 * @package Start-Wars
 * @version 1.1
 */
/*
Plugin Name: Star Wars
Description: This plug-in is a challenge to apply for Developer Job in StickerStock. The plugin allows to randomly show in the any page top a Star Wars character from a list getting from Star Wars API https://swapi.dev/. Also you can setup a Star Wars widget to show character detail.
Author: Marco Portero
Version: 1.1
Author URI: https://www.linkedin.com/in/marcoportero/
*/



function star_wars_get_people() {

	$people = 'Nobody';
    // Get all characters from Star Wars API
	$url = 'https://swapi.dev/api/people';

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,  
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
        //Only show errors while testing
        printf( "cURL Error #: %s", $err);

      } else {
        
        $responseObj = json_decode($response);
        $people = $responseObj->results;
        
      }
    
    // Get a random position from the array
    $pos = mt_rand( 0, count( $people ) - 1 );

	// And then randomly choose a star wars character
	//return wptexturize( $people[ $pos ]->name . " | Gender: " . $people[ $pos ]->gender);
	return $people[ $pos ];
	//return wptexturize( $people );
}

// Prepare data for show it.
function star_wars() {
	$chosen = star_wars_get_people();
	
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="star-wars"><span id="span-star-wars" > Star Wars character at the moment is: %s </span></p>',
		$chosen->name
	);
	$var ='<span>
	<form class="form-style-4" action="" method="">
	<label for="name">
	<span>NAME</span><input type="text" name="name" value="'.$chosen->name.'" disabled  />
	</label>
	<label for="height">
	<span>HEIGHT</span><input type="text" name="height" value="'.$chosen->height.'"  disabled  />
	</label>
	<label for="mass">
	<span>MASS</span><input type="text" name="mass" value="'.$chosen->mass.'" disabled  />
	</label>
	<label for="hair_color">
	<span>HAIR COLOR</span><input type="text" name="hair_color" value="'.$chosen->hair_color.'" disabled  />
	</label>
	<label for="skin_color">
	<span>SKIN COLOR</span><input type="text" name="skin_color" value="'.$chosen->skin_color.'" disabled  />
	</label>
	<label for="birth_year">
	<span>BIRTH YEAR</span><input type="text" name="birth_year" value="'.$chosen->birth_year.'" disabled  />
	</label>
	<label for="gender">
	<span>GENDER</span><input type="text" name="gender" value="'.$chosen->gender.'"  disabled />
	</label>
	</form></span>';
    $_SESSION['data_starwars_widget'] = $var; 
}



// Add information into any wp page through calling for template
add_action( 'template_redirect', 'star_wars' );


// Create some custom css style
function starWars_css() {
	return "
	
	#star-wars{
		display: flex;
		flex-direction: row;
		padding: 5px 10px;
		margin-top: 10px;
		font-size: 20px;
		color: #ffe919;
		background: black;
		line-height: 1.6666;
		overflow: hidden;
	}

	#span-star-wars{
      animation-duration: 5s;
      animation-name: slidein;
    }

	@keyframes slidein {
	  from {
	    margin-left: 20%;
	    width: 100%;
	  }

	  to {
	    margin-left: 0%;
	    width: 100%;
	  }
	}

	.form-style-4{
		//width: 100%;
		font-size: 12px;
		background: black;
		padding: 15px 15px 8px 15px;
		border: 5px solid black;
	}
	.form-style-4 input[type=text],
	.form-style-4 label
	{
		
		font-size: 13px;
		color: #ffe919;

	}
	.form-style-4 label {
		display:block;
		margin-bottom: 10px;
	}
	.form-style-4 label > span{
		display: inline-block;
		float: left;
		width: 100px;
	}
	.form-style-4 input[type=text]
	{
		background: transparent;
		border: none;
		border-bottom: 1px dashed #ffe919;
		width: 120px;
		outline: none;
		padding: 0px 0px 0px 0px;
		font-style: italic;
	}
	.form-style-4 input[type=text]:focus
	{
		border-bottom: 1px dashed #ffe919;
	}	
	";
}



//Adding CSS inline style to x-blog-custom-style-css stylesheet
function wpb_add_inline_css() {
	
	wp_enqueue_style( 'x-blog-custom-style-css', get_template_directory_uri() . '/assets/css/custom_script.css' );
	
        //Add custom css style
        $x_blog_custom_style_css = starWars_css();

  //Add the above custom CSS via wp_add_inline_style
  wp_add_inline_style( 'x-blog-custom-style-css', $x_blog_custom_style_css ); //Pass the variable into the main style sheet ID

}

//Enqueue the CSS style
add_action( 'wp_enqueue_scripts', 'wpb_add_inline_css' ); 

define( 'STARWARS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( STARWARS__PLUGIN_DIR . 'class.starwars-widget.php' );
