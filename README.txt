CodeIgniter cURL Library
------------------------
Author: Jason Michels
Website: http://www.thebizztech.com

UPDATE: I have removed the need to use setArray() or setString() when doing a post().  I added logic in post() to check for an array. Examples below.

This PHP class was built to make cURL easy to use with Codeigniter.  You can use this for anything from getting the contents of a web page, to submitting data through API's.
If you have any improvement suggestions or questions please let me know on GitHub or through my blog (info below).

To stay up to date on changes to this class keep checking the Github repository, https://thebizztech@github.com/thebizztech/Simple-Codeigniter-Curl-PHP-Class.git.
Another good place to stay on top of the code I am working on is to check my blog at http://www.thebizztech.com

Requirements:

	PHP 5 or later with cURL installed. Tested with Codeigniter 2.0.2, but will most likely work with the previous version also.

Usage:

	First you must copy the library into your application/libraries folder.
	Once you have the libary you can either autoload or load the library with this line:
	$this->load->library('Curl');
	
	This example uses PHP chaining:
	echo $this->curl->setUrl('http://www.thebizztech.com')->get();
	
	The equivalent without chaining would be this:
	$this->curl->setUrl('http://www.thebizztech.com');
	$result = $this->curl->get();
	print_r($result);

	//If you would like to POST data then you just need to send an array or string of data in one of these two ways.
	$data = array("foo" => "bar", "foo_again" => "bar_again");
	$result = $this->curl->setUrl($url)->post($data);

	//Other option
	$result = $this->curl->setUrl($url)->setArray($data)->post();