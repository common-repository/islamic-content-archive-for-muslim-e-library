<form method="post" action="<?php admin_url( 'options-general.php?page='.ICA_ML_Page_SLUG ); ?>">
<?php
	echo wp_nonce_field( "edc-settings-page" ); 
	
	$MELHtmlHelper = new html_ica_ml_helper();
	$MELHtmlHelper->opic_admin_tabs();
	$MELHtmlHelper->MainContent($mainViewFile);
?>
   <p class="submit" style="clear: both;">
      <input type="submit" name="Submit"  class="button-primary" value="<?php echo $MELHtmlHelper->getLang('btn-updatesetting') ?>" />
      <input type="hidden" name="ilc-settings-submit" value="Y" />
   </p>
</form>