``` php
/// Login Logo
add_action( 'login_head', 'iea_replace_login_logo' );
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

/// Admin Theme Logo
add_action('us_theme_icon', 'us_theme_icon', 10);
function us_theme_icon()
{
	$icon_url = "https://api.ismailenesayhan.com/wp-content/uploads/2022/12/logo-light.svg"; // returns thumbnail size
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
```
