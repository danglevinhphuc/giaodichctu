<?php
	if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	class _404 extends controller{
		function __construct(){}

		public function Index(){
			$this->view("404");
		}
	}

?>