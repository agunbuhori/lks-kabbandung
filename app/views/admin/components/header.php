<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
</head>
<body>

<nav class="navbar-admin">
	<div class="container">
		<ul>
			<li><a href="../admin/reservation">Reservations</a></li>
			<?php if ($_SESSION['level'] == 1) : ?>
			<li><a href="../admin/room">Rooms Data</a></li>
			<li><a href="../admin/user">Users Data</a></li>
			<?php endif; ?>
			<li style="float: right;"><span style="color: #fff"><?= $_SESSION['user'] ?></span><a href="../auth/logout">Logout</a></li>
		</ul>
	</div>
</nav>
