<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * CodeIgniter Curl PHP Class
 *
 * @author	Jason Michels
 * @link	https://thebizztech@github.com/thebizztech/Simple-Codeigniter-Curl-PHP-Class.git
 */

class Curl {
	
	var $url = "";
	var $headers = array(); //Headers are built in set_headers() and passed in execute()
	
	//set_url() must be set by Codeigniter controller or models
	public function set_url($url)
	{
		$this->url = $url;
		return $this;
	}
	
	//Headers can be modified depending on what you need cURL to accomplish
	private function set_headers($type = '')
	{
		$this->headers = array(
						CURLOPT_URL => $this->url,
						CURLOPT_HEADER => FALSE,
						CURLOPT_CONNECTTIMEOUT => 30,
						CURLOPT_FOLLOWLOCATION => TRUE,
						CURLOPT_RETURNTRANSFER => TRUE
		);

		if($type == 'post')
		{
			$this->headers[CURLOPT_POST] = TRUE;
		}
		return $this;
	}

	//Set the headers and process curl via a GET
    public function get()
    {
		return $this->set_headers()->execute();
    }
	
	//Set the headers and process curl via a POST
	public function post()
    {
		return $this->set_headers('post')->execute();
    }
	
	//Starts curl and sets headers and returns the data in a string
	private function execute()
	{
		$ch = curl_init();
		
		curl_setopt_array($ch, $this->headers);
		// grab URL
		$result = curl_exec($ch);
		
		curl_close($ch);
		
		return $result;
	}
}

/* End of file Curl.php */