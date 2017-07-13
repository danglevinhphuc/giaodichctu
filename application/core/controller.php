<?php
if(!defined('PATH_SYSTEM')) die ('Bad requested!');
class Controller{
	public function view($viewname=null,$data= null, $correct_header =null,$correct_footer= null){
		// Header page

		/** 

			**$row dùng để gán trên thẻ head về các thông tin trong title hoặc meta 
			**$row load thong tin cho các sp 
		**/
		

		if($data){
			$row = $data;
		}
		if($correct_header){
			$header = array("header_upbai","header_view");
			for($i = 0 ; $i< count($header) ;$i++){
				if($header[$i] === $correct_header){
					require PATH_SYSTEM."/view/".$header[$i].".php";
					break;
				}
			}	
		}else{
			require PATH_SYSTEM. "/view/header_index.php";
		}
		
		// page
		if($viewname){
			require PATH_SYSTEM. "/view/". $viewname .".php";
		}
		//Footer page
		if($correct_footer){
			$footer = array("footer_upbai","footer_authen");
			for($i = 0 ; $i< count($footer) ;$i++){
				if($footer[$i] === $correct_footer){
					require PATH_SYSTEM."/view/".$footer[$i].".php";
					break;
				}
			}	
		}else{
			require PATH_SYSTEM. "/view/footer.php";
		}
		
	}
}
?>