<?php
function view($viewPath, $data = [])
{
	extract($data);
	include __DIR__ . '/../views/'. $viewPath .'.php';
}

?>