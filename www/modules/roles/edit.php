<?php 

$title = "Редактировать категорию";

//Из таблицы users загружаем нужную запись по id
$user = R::load('users', $_GET['id']);

//Находим доступные роли и сортируем по id по возрастанию
$allRoles = R::find('roles', 'ORDER BY id ASC');

if (isset($_POST['roleEdit'])) {

	//Меняем название категории
	$user->role = $_POST['selectedRole'];
	R::store($user);
	header("Location: " . HOST . "roles?result=roleUpdated");
	exit();

}

//Готовим контент для центральной части
//ob_start() - буферизированный вывод.
ob_start();
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/roles/edit.tpl";
//ob_get_contents() - получает контент записанный между функциями ob_start и ob_get_contans из буфера.
$content = ob_get_contents();
ob_end_clean();

//Выводим шаблоны
include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/template.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>