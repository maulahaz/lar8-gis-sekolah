<?php
namespace App\Helpers;
 
class MHzHelper 
{
    public static function json($data, $kill_script=null) 
    {
	    echo '<pre>'.json_encode($data, JSON_PRETTY_PRINT).'</pre>';
	    if (isset($kill_script)) {
	        die();
	    }
	}

	public static function jsondd($data)
    {
        $json = json_decode(json_encode($data));
        dd($json);
    } 

    public static function checkEmpty($data)
    {
        echo ($data==null) ? "-" : $data; 
    }

}