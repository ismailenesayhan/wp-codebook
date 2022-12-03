``` php
add_action( 'login_head', 'iea_replace_login_logo' );
function iea_replace_login_logo() {
	$site_icon_url = "https://api.ismailenesayhan.com/wp-content/uploads/2022/12/logo-dark.svg"; // returns thumbnail size
	echo '<style>
	.login h1 a {
		background-image: url(' . $site_icon_url . ') !important;
		background-size: contain;
		width: auto;
		}
	</style>';
}
```
