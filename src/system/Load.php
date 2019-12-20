<?php
/**
* 
*/
class Load
{
	function __construct(){
		
	}

	function view($view, $data=null){
		include 'system/Header.php';
		include "app/views/".$view.".php";
	}

	function controller($con){
		include "app/controllers/".$con.".php";
	}
	
	function model($mod){
		if(!class_exists($mod)){
			include "app/models/".$mod.".php";
		}
	}

}