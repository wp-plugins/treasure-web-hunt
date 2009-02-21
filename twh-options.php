<div class="wrap">
<h2>Treasure Web Hunt</h2>

<p>Welcome to the Treasure Web Hunt configuration page. Until you insert a valid <em>Treasurewebhunt.com Code</em>, you cannot see any treasure on your website.</p>
<p><a href="http://www.treasurewebhunt.com/get-a-code/?w=<?=get_option('siteurl')?>">Get your free <em>Treasurewebhunt.com Code</em> now!</a></p>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Treasurewebhunt.com Code</th>
<td><input type="text" name="twh_wp_code" value="<?php if($_GET['thw_code']) { echo $_GET['thw_code']; } else { echo get_option('twh_wp_code'); } ?>" /></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="twh_wp_code" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>