<?php

######################################################
#
#	© T.Ismayil (2017)
#       © tehmezovismayil@gmail.com
#
######################################################

class gooGl
{
	public $key;
	
	function __construct( $key )
	{
		$this->jsonDecode = 1;
		$this->projection = "FULL";
		$this->Akey = $key;
		$this->ApiUrl = "https://www.googleapis.com/urlshortener/v1/url?key={$this->Akey}";
		return $this;
	}
	
	public function json( $trueOrfalse = 1 )
	{
		$this->jsonDecode = $trueOrfalse;
		return $this;
	}
	
	public function projection( $action = "FULL" )
	{
		$this->projection = $action;
		return $this;
	}
	
	public function url( $url )
	{
		$this->url = $url;
		return $this;
	}
	
	public function get( $a )
	{
		if( $a == "short" )
		{
			$this->a_rray = array( "longUrl" => $this->url );
		}
		elseif( $a == "info" )
		{
			$this->ApiUrl = $this->ApiUrl."&shortUrl={$this->url}&projection={$this->projection}";
			$this->a_rray = array(  );
		}
		
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $this->ApiUrl );
		if( $a == "short" )
		{
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode( $this->a_rray ));
		}
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-Type: application/json'));                                                                                                                   
		$result = curl_exec($ch);
		curl_close($ch);
		
		if( $this->jsonDecode == 1 )
		{
			$result = json_decode( $result );
		}
		
		return $result;
	
	}
	

	
}
		




