<?
function get_browser_info ($agent) 
{
	// Get the name the browser calls itself and what version
	$browser_info['Name'] = strtok($agent, "/");
	$browser_info['Version'] = strtok(" ");
	
	// MSIE lies about its name
	if(ereg("MSIE", $agent))
	{
		$browser_info['Name'] = "MSIE";
		$browser_info['Version'] = strtok("MSIE");
		$browser_info['Version'] = strtok(" ");
		$browser_info['Version'] = strtok(";");
	}
	return $browser_info;
}
$browser=get_browser_info(getenv("HTTP_USER_AGENT"));
if ($browser["Name"]!='MSIE') 
{
	echo "<img src='img/index/vip.gif' border=0>Внимание! Для входа в игру ваш браузер должен быть Internet Explorer 6.0 v. или выше.<br><br>";
	include ("counter.php");
	die();
}
else if ($browser["Version"]<6.0)
{
	echo "<img src='img/index/vip.gif' border=0>Внимание! Для входа в игру ваш браузер должен быть Internet Explorer 6.0 v. или выше.<br><br>";
	include ("counter.php");
	die();	
}
?>