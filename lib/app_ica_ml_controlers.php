<?php
/**
 * APP Controllers
 */
class app_ica_ml_controlers {
	
	var $Controller;
	var $Model;
	var $layout = 'default';
	var $fileview;
	var $NewCrontime;

	function __construct() {
		$this->UpdateOptions();
	}
	
	public function UpdateOptions()
	{
		if(!empty($_POST)){
			foreach ($_POST as $key => $value) {
				// if post name start wthi OPIC_
				
				if(substr($key, 0, strlen(ICA_ML_Input_SLUG) ) === ICA_ML_Input_SLUG){
					 
					$this->_UpdateOptions($key,$value);
				}
			}
		}
	}
	
	private function _UpdateOptions($key,$value = null)
	{
		if($key){
			$old_option = get_option($key);
			if($old_option !== false){
				// update
				update_option($key,$value,true);
			}else{
				// add
				add_option($key,$value); 
			}
		}
	}
	public function loadModel($modelname='')
	{
		$modelname = $this->preloadfilename($modelname,'model');
		$this->Model = str_replace('.php','',$modelname);
		$path = ICA_ML_MODELS_path.$modelname;
		if (file_exists($path)) {
			include_once $path;
			$this->Model = new $this->Model();
		} else {
			echo sprintf("Model <b>%s</b> not found in path <b>%s</b>",$modelname,ICA_ML_MODELS_path);
		}
	}
	
	public function loadController($controllername='')
	{
		
		$controllername = $this->preloadfilename($controllername);
		$this->Controller = str_replace('.php','',$controllername);
		$path = ICA_ML_Controlers_path.$controllername;
		if (file_exists($path)) {
			include_once $path;
			 $this->Controller = new $this->Controller();
		} else {
			echo sprintf("Controller <b>%s</b> not found in path <b>%s</b>",$controllername,ICA_ML_Controlers_path);
		}
	}
	public function loadView($filename='')
	{
		$ICA_ML_Layout_path = ICA_ML_Layout_path.ICA_ML_DS.str_replace('.php','',$this->layout).'.php';
		if(file_exists($ICA_ML_Layout_path)){
			$this->fileview = str_replace('.php','',$filename);
			$mainViewFile = $this->inziliation_view_file($filename);
			if(!file_exists($mainViewFile)){
				echo sprintf("View File <b>%s</b> not found in path <b>%s</b>",$filename.'.php',ICA_ML_Views_path);
			}else{
				
				include_once $ICA_ML_Layout_path;
			}
		}else{
			echo sprintf("Layout <b>%s</b> not found in path <b>%s</b>",$this->layout,ICA_ML_Layout_path);
		}

	}
    public function inziliation_view_file($fileview='')
	{
		if($fileview){
			$fileview = str_replace('.php','',$fileview).'.php';
			$path = ICA_ML_Views_path.$fileview;
			return $path;
		}
		return ;
	}	
	private function preloadfilename($name='',$type='controller')
	{
		return  str_replace('.php','',$name).'_ica_ml_'.$type.'.php';
	}

}

?>