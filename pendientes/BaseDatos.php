<?php
	class BaseDatos extends Mysqli{
		public function __construct(){
			parent::__construct('localhost','root','atmel3233','bd_chiles_mysql');
		}
		public function __destruct() {
			$this->close();
		}
	}
 ?>