<?php  
include ("cls_tarea.php");

	$codigo_usu = $_POST['codigo_usu'];
	$nomTarea = $_POST['nomTarea'];
	$result = 0;


	$url = './usuarios/' . $codigo_usu . '.json';

	if(file_exists($url) && $nomTarea != ''){

		$datos_tarea=file_get_contents($url);
        $json_tarea=json_decode($datos_tarea,true);

        $tam = count($json_tarea) + 1;
        $tarea=new cls_tarea($tam, $nomTarea, false);

        array_push($json_tarea, $tarea);
        $jsonData = json_encode($json_tarea); 
        file_put_contents($url, $jsonData);

        echo $jsonData;
	
	}


?>
