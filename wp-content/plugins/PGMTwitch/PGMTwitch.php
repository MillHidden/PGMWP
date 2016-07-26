<?php

/**
  * Plugin Name: Plugin Twitch PGM
  * Description: Plugin pour l'intégration des données live et chat Twitch PGM
  * Version: 1.0
  * Author: Hidden
  */

  class PGMTwitch_plugin
  {
  	protected $client_id;
  	protected $client_secret;
  		

  	public function __construct()
  	{
  		add_action('widgets_init', function()
			{register_widget('PGM_live_twitch_widget');}
		);		
  	}

  	public function embed_live_twitch($atts)
  	{
		extract(shortcode_atts(array(
		    'username' => "puregamemedia",
		    'width' => "100%",
		    'height' => "450",
		  ), $atts));
			  
		$output = 
					'<iframe 
		        src="http://player.twitch.tv/?channel='.$username.'" 
		        height="'.$height.'" 
		        width="'.$width.'" 
		        frameborder="0" 
		        scrolling="no"
		        allowfullscreen="true">
		    </iframe>';

		return $output;
  	}

  	public function embed_chat_twitch($atts)
  	{
  		extract(shortcode_atts(array(
		    'username' => "puregamemedia",
		    'width' => "100%",
		    'height' => "450",
		  ), $atts));		
		
		$output = '<iframe frameborder="0" 
		        scrolling="no" 
		        id="chat_embed" 
		        src="http://www.twitch.tv/'.$username.'/chat" 
		        height="'.$height.'" 
		        width="'.$width.'">
			</iframe>';

		return $output;
  	}  	

  	public function get_url_contents($url) {
		$crl = curl_init();
		$timeout = 5;

		curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($crl, CURLOPT_URL, $url);
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);		
		
		$ret = curl_exec($crl);
		curl_close($crl);

		return $ret;
	}

	public function post_url_contents($url, $fields)
	{
		foreach($fields as $key => $value)
		{
			$fileds_string = $key.'='.urlencode($value).'&';
		}
		rtrim($fields_string, '&');

		$crl = curl_init();
		$timeout = 5;

		curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($crl, CURLOPT_URL,$url);
	    curl_setopt($crl, CURLOPT_POST, count($fields));
	    curl_setopt($crl, CURLOPT_POSTFIELDS, $fields_string);

	    curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);

	    $ret = curl_exec($crl);
	    curl_close($crl);

	    return $ret;

	}
	
 	
  }

add_shortcode('embedTwitch', array('PGMTwitch_plugin', 'embed_live_twitch'));
add_shortcode('embedChat', array('PGMTwitch_plugin', 'embed_chat_twitch'));

