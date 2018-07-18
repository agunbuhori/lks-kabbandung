<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<style type="text/css">
	body {
		background: #ededed;
	}
</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form class="card" style="margin-top: 100px" method="post" action="../auth/login">
					<div class="card-header text-center">
						<h5>Login</h5>
					</div>

					<div class="card-block p-4">
						<?php if (isset($_SESSION['status'])) : ?>
						<div class="alert alert-danger">Login gagal</div>
						<?php endif ?>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username">
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>

						<div class="form-group">
							<button class="btn btn-primary">Login Now</button>
						</div>
					</div>
				</form>

				<p class="text-center"><small class="text-muted">Copyright &copy; 2016 - Laoetan Api Hotel</small></p>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>