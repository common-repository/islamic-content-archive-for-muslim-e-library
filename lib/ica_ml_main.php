<?php
$ica_ml_categories_lang = array();



// ======================   Titles ==============================
$melcategories["muslimelibrary"] 				= array(
													'title'=>"Muslim e-Library",
													'url'=>"http://www.muslim-library.com",
													'logo'=>"muslimelibrary.png",
												);	
												
// =================== Arabic ===========================
$ica_ml_categories_lang['ara']['muslimelibrary']['url'] 				= $melcategories["muslimelibrary"]['url'];
$ica_ml_categories_lang['ara']['muslimelibrary']['cat'] 				= $melcategories["muslimelibrary"]['url'].'/api/get_sub_category_by_id/?id=2';
$ica_ml_categories_lang['ara']['muslimelibrary']['importurl'] 			= $melcategories["muslimelibrary"]['url'].'/api/get_category_posts/?slug=';
// =================== English ===========================

$ica_ml_categories_lang['eng']['muslimelibrary']['url'] 				=  $melcategories["muslimelibrary"]['url'];
$ica_ml_categories_lang['eng']['muslimelibrary']['cat'] 	    		=  $melcategories["muslimelibrary"]['url'].'/api/get_sub_category_by_id/?id=3';
$ica_ml_categories_lang['eng']['muslimelibrary']['importurl'] 			=  $melcategories["muslimelibrary"]['url'].'/api/get_category_posts/?slug=';


?>