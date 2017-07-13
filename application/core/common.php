<?php
if(!defined("PATH_SYSTEM")) die ('Bad requested!');
function Load_File(){
	$config = include PATH_SYSTEM."/config/init.php";

	$controller = empty($_GET['c']) ? $config["default_controller"] : $_GET['c'];

	$action = empty($_GET["a"]) ? $config["default_action"] : $_GET["a"];

		 // Kiểm tra file controller có tồn tại hay không
	if (!file_exists(PATH_SYSTEM  . '/controller/' . $controller . '.php')){
		die ('Không tìm thấy controller');
	}
	// Include controller chính để các controller con nó kế thừa
	include_once PATH_SYSTEM . '/core/controller.php';

	require_once PATH_SYSTEM . '/controller/' . $controller . '.php';

    // Kiểm tra class controller có tồn tại hay không
	if (!class_exists($controller)){
		die ('Không tìm thấy controller');
	}
 // Khởi tạo controller
	$controllerObject = new $controller();

    // Kiểm tra action có tồn tại hay không
	if ( !method_exists($controllerObject, $action)){
		die ('Không tìm thấy action');
	}
      // Chạy ứng dụng
	$controllerObject->$action();
}
?>