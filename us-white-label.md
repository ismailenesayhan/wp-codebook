``` php
/// Login Logo
function iea_replace_login_logo() {
	$icon_url = "https://api.ismailenesayhan.com/wp-content/uploads/2022/12/logo-dark.svg";
	echo '<style>
	.login h1 a {
		background-image: url(' . $icon_url . ') !important;
		background-size: contain;
		width: auto;
		}
	</style>';
}
add_action( 'login_head', 'iea_replace_login_logo' );

/// Admin Theme Logo
function us_theme_icon(){
	$icon_url = "https://api.ismailenesayhan.com/wp-content/uploads/2022/12/logo-light.svg";
?>
	<style>
		.menu-icon-generic.toplevel_page_us-theme-options .wp-menu-image,
		.menu-icon-generic.toplevel_page_us-home .wp-menu-image {
			background: url(<?php echo esc_url($icon_url) ?>) no-repeat center 6px / 19px auto !important;
		}

		.menu-icon-generic.toplevel_page_us-theme-options .wp-menu-image:before,
		.menu-icon-generic.toplevel_page_us-home .wp-menu-image:before {
			display: none;
		}
	</style>
<?php
}
add_action('us_theme_icon', 'us_theme_icon', 10);

/// Change Theme Name
function us_theme_name_white_label($theme_name){
	$theme_name = wp_strip_all_tags('IEA Theme', TRUE);
	return $theme_name;
}
add_filter('us_theme_name', 'us_theme_name_white_label');


/// Change Theme Image
function iea_wp_prepare_themes_for_js($themes){
	$themes[US_THEMENAME]['screenshot'] = ['https://api.ismailenesayhan.com/wp-content/uploads/2022/12/theme.png'];
	return $themes;
}
add_filter('wp_prepare_themes_for_js', 'iea_wp_prepare_themes_for_js', 10);
```
