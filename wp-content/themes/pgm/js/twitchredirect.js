<script type="text/javascript">
	if (window.location.hash.indexOf('access_token') != -1) {
		var accessToken = window.location.hash.replace("#access_token=", "");
		accessToken = accessToken.substr(0, accessToken.indexOf('&scope'));
		window.opener.setAuthToken(accessToken);
		window.close();
	} else {
		// This is executed if someone blindly accesses the page.
	}
</script>