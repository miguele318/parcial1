<?php  

	$codigo_usu = $_POST['codigo_usu'];
	$codigo_tar = $_POST['codigo_tar'];
	$result = 0;

	$url = 'usuarios/' . $codigo_usu . '.json';
	$datos_usu = '';

	if(file_exists($url) && $codigo_tar != ''){
		$datos_usu = json_decode(file_get_contents($url));

		$tam = count($datos_usu);
		for($i = 0; $i < $tam; $i++){
			if(strcmp ($codigo_tar, $datos_usu[$i]->{'id'}) == 0){

				if($datos_usu[$i]->{'terminada'}){
					$datos_usu[$i]->{'terminada'} = false;
				}else{
					$datos_usu[$i]->{'terminada'} = true;
				}
				file_put_contents($url, json_encode($datos_usu));

				$result = 1;
				$i = $tam + 1;
			}
		}
	}	

	echo $result;


?>