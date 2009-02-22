<div class="wrap">
<h2>Treasure Web Hunt</h2>

<p>Welcome to the Treasure Web Hunt configuration page. Until you insert a valid <em>Treasurewebhunt.com Code</em>, you cannot see any treasure on your website.</p>
<p><a href="http://www.treasurewebhunt.com/get-a-code/?w=<?=get_option('siteurl')?>">Get your free <em>Treasurewebhunt.com Code</em> now!</a></p>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Treasurewebhunt.com Code</th>
<td><input type="text" name="twh_wp_code" value="<?php if($_GET['thw_code']) { echo $_GET['thw_code']; } else { echo get_option('twh_wp_code'); } ?>" /><br/><img src="http://www.treasurewebhunt.com/checkvalidation.php?t=<?=md5(get_option('twh_wp_code').$_SERVER['REMOTE_ADDR'])?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Treasure Style</th>
<td>
	<label><input type="radio" name="twh_treasure_image" value="treasure.gif" <? if(get_option('twh_treasure_image')=='treasure.gif' or !get_option('twh_treasure_image')) { echo 'checked="checked"';} ?>><img src="http://www.treasurewebhunt.com/treasures_icons/treasure.gif" /></label>
	<label><input type="radio" name="twh_treasure_image" value="feast.png" <? if(get_option('twh_treasure_image')=='feast.png') { echo 'checked="checked"';} ?>><img src="http://www.treasurewebhunt.com/treasures_icons/feast.png" /></label>
	<label><input type="radio" name="twh_treasure_image" value="pirate-treasure-map.gif" <? if(get_option('twh_treasure_image')=='pirate-treasure-map.gif') { echo 'checked="checked"';} ?>><img src="http://www.treasurewebhunt.com/treasures_icons/pirate-treasure-map.gif" /></label>
</td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="twh_wp_code,twh_treasure_image" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>