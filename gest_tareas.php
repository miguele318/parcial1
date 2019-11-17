<?php  

	$codigo_usu = $_POST['codigo_usu'];

	$url = 'usuarios/' . $codigo_usu . '.json';

	$result = 'Codigo incorrecto';

	if($codigo_usu != '' && $codigo_usu != 'default'){
		if(file_exists($url)){
			$result = file_get_contents($url);;		
		}else{
			$result = file_get_contents('usuarios/default.json');
			file_put_contents($url, $result);
		}
	}
	echo $result;

?>