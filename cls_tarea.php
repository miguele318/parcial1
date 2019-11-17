<?php
	class cls_tarea{
		public $id =''; 
		public $name='';
		public $terminada = '';

		function __construct($id, $name, $terminada){
			$this->id = $id;
			$this->name = $name;
			$this->terminada = $terminada;
		}
	}
 ?>