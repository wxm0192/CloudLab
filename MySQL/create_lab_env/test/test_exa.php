<?php

function cURLcheckBasicFunctions()
{
  if( !function_exists("curl_init") &&
      !function_exists("curl_setopt") &&
      !function_exists("curl_exec") &&
      !function_exists("curl_close") ) return false;
  else return true;
}

/*
* Returns string status information.
* Can be changed to int or bool return types.
*/
function cURLdownload($url, $file)
{
  	if( !cURLcheckBasicFunctions() ) 
		return "UNAVAILABLE: cURL Basic Functions";
	else
		echo "Function check ok ";

  $ch = curl_init();
  if($ch)
  {
    $fp = fopen($file, "w");
 	echo "open a file ";
    if($fp)
    {
	echo "open a file :ok\n ";
      if( !curl_setopt($ch, CURLOPT_URL, $url) )
	      {
		fclose($fp); // to match fopen()
		curl_close($ch); // to match curl_init()
		return "FAIL: curl_setopt(CURLOPT_URL)";
	      }
      if( !curl_setopt($ch, CURLOPT_FILE, $fp) ) 
		return "FAIL: curl_setopt(CURLOPT_FILE)";
      if( !curl_setopt($ch, CURLOPT_HEADER, 0) ) 
		return "FAIL: curl_setopt(CURLOPT_HEADER)";
      if( !curl_exec($ch) ) 
		return "FAIL: curl_exec()";
	else
		echo " file write ok " ;

      curl_close($ch);
      fclose($fp);
      return "SUCCESS: $file [$url]";
    }
    else return "FAIL: fopen()";
  }
  else return "FAIL: curl_init()";

}


echo cURLdownload("http://www.example.com", "./example.txt");
?>
