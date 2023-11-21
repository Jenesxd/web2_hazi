<?php

session_start();
if (!isset($_SESSION['userid']))
	$_SESSION['userid'] = 0;
if (!isset($_SESSION['userfirstname']))
	$_SESSION['userfirstname'] = "";
if (!isset($_SESSION['userlastname']))
	$_SESSION['userlastname'] = "";
if (!isset($_SESSION['userlevel']))
	$_SESSION['userlevel'] = "1__";

include(SERVER_ROOT . 'includes/database.inc.php');
include(SERVER_ROOT . 'includes/menu.inc.php');


$page = "home"; 
$subpage = "";
$vars = array();

$request = $_SERVER['QUERY_STRING'];

if ($request != "") {
	$params = explode('&', $request); 
	$page = array_shift($params); 

	if (array_key_exists($page, Menu::$menu) && count($params) > 0) 
	{
		$subpage = array_shift($params); 
		if (!(array_key_exists($subpage, Menu::$menu) && Menu::$menu[$subpage][1] == $page)) 
		{
			list($name, $value) = explode("=", $subpage);
			$vars[$name] = $value; 
			$subpage = ""; 		}

	}
	foreach ($params as $p) 
	{
		list($name, $value) = explode("=", $p);
		$vars[$name] = $value;
	}

	$vars += $_POST;
}

$controllerfile = $page . ($subpage != "" ? "_" . $subpage : "");
$target = SERVER_ROOT . 'controllers/' . $controllerfile . '.php';
if (!file_exists($target)) {
	$target = SERVER_ROOT . 'controllers/error.php';
	$vars[0] = "A vezérlő nem található";
	$vars[1] = "Hiányzó oldal <strong>" . $controllerfile . "</strong>";
	$controllerfile = "error";
}

include_once($target);
$class = ucfirst($controllerfile) . '_Controller';
if (!class_exists($class)) {
	include_once(SERVER_ROOT . 'controllers/error.php');
	$vars[0] = "A vezérlő főosztálya nem található";
	$vars[1] = "Hiányos oldal megadása <strong>" . $controllerfile . "</strong>";
	$class = 'Error_Controller';
}


include_once(SERVER_ROOT . 'models/view_loader.php');

$controller = new $class;
$controller->main($vars);
