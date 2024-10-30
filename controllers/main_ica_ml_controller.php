<?php
/**
 *
 */
class MuslimeELibraryMaincontroller extends app_ica_ml_controlers {

	function __construct() {
		parent::__construct();
		add_action('admin_menu', array($this, 'mel_admin_menu'));
	}

	function mel_admin_menu() {
		add_options_page('Islamic Content Archive For Muslim e-Library', 'Islamic Content Archive For Muslim e-Library', 'manage_options',ICA_ML_Page_SLUG, array($this, 'melsettings_page'));
	}

	function melsettings_page() {
		if(isset($_GET['tab'])){
			$tab = strip_tags($_GET['tab']);
		}else{
			$tab = '';
		}
		switch ($tab) {
			case 'options':
				$this->loadController('options');
				break;
			case 'language':
				$this->loadController('language');
				break;
			case 'categories':
				echo $this->loadController('categories');
				break;
			default:
				$this->loadController('language');
				break;
		}
	}

}
new MuslimeELibraryMaincontroller();
?>