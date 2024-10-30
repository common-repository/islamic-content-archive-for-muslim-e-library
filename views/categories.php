<?php
$MELHtml = new html_ica_ml_helper();
global $melcategories,$ica_ml_categories_lang;
 
$category_slug = esc_attr($_GET['cat_slug']);

$ica_ml_lang = get_option(ICA_ML_Input_SLUG.'language');
$link = $ica_ml_categories_lang[$ica_ml_lang][$category_slug]['url'];
$jsoncaturl = $ica_ml_categories_lang[$ica_ml_lang][$category_slug]['cat'];
$slug = $category_slug.'_'.$ica_ml_lang;
$cat_options = $MELHtml->categoryFromTransient($jsoncaturl,$slug);
?>
<div class="category-head">
	<table width="100%">
		<tr>
			<td width="80px"><span class="category-logo"><?php echo ica_ml_cat_logo($category_slug,array('width'=>'80px','class'=>$category_slug)) ?></span></td>
			<td><h1 class="category-title"><a target="_blank" href="<?php echo $link; ?>"><?php echo $this->getLang($category_slug); ?></a></h1></td>
		</tr>
	</table>

</div>
<hr />
<?php
	echo $MELHtml->Input('checkbox',array('name'=>'category_'.$ica_ml_lang.'_'.$category_slug.'[]','options'=>$cat_options));
?>
