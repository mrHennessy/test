<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>elFinder 2.1.x source version with PHP connector</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/elfinder.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}">

		<!-- elFinder JS (REQUIRED) -->
		<script src="{{asset('js/elfinder.min.js')}}"></script>

		<!-- GoogleDocs Quicklook plugin for GoogleDrive Volume (OPTIONAL) -->
		<!--<script src="{{asset('js/i18n/elfinder.ru.js')}}"></script>-->

		<!-- elFinder translation (OPTIONAL) -->
		<!--<script src="js/i18n/elfinder.ru.js"></script>-->

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			$(document).ready(function() {
				$('#elfinder').elfinder({
					url : 'php/connector.minimal.php',  // connector URL (REQUIRED),
					customData: {
						_token: '{{csrf_token()}}'
					}
					// , lang: 'ru'                    // language (OPTIONAL)
				});
			});
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
        <? print_r($_SERVER['DOCUMENT_ROOT']. '/images/');?>
		<div id="elfinder"></div>

	</body>
</html>
