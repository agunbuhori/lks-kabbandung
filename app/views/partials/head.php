<!DOCTYPE html>
<html>
<head>
	<?php switch (explode('/', $_SERVER['REQUEST_URI'])[2]) {
		case 'facilites':
			$title = "Facilites";
			break;
		
		case 'rooms':
			$title = "Rooms";
			break;

		case 'about':
			$title = "About Us";
			break;
		
		case 'facilites':
			$title = "Facilites";
			break;

		case 'reservation':
			$title = "Reservation";
			break;
		
		default:
			$title = "Home";
			break;
	}
	?>
	<title><?= $title ?> - Laoetan Api Hotel</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>