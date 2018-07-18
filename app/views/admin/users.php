<?php $this->view('admin/components/header') ?>

<div class="container-fluid mt-4">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><h5 class="text-center">USERS DATA</h5></div>
				<div class="card-block p-4">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAME</th>
								<th>USERNAME</th>
								<th>LEVEL</th>
								<th>DELETE</th>
							</tr>
						</thead>

						<tbody>
							<?php $loopIndex = 1; ?>
							<?php foreach ($users as $user) : ?>
							<tr>
								<td><?= $loopIndex++ ?></td>
								<td><?= $user->name ?></td>
								<td><?= $user->username ?></td>
								<td><?= $user->level == 1 ? 'Admin' : 'Confirmator' ?></td>
								<td><a class="text-danger" href="../admin/deleteuser/<?= $user->username ?>" onclick="return confirm('Are you sure ?')">Delete</a></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<form class="card" method="post" action="../admin/adduser">
				<div class="card-block p-4">
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name="username">
					</div>
					
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="form-group">
						<label>Name</label>
						<input class="form-control" name="name">
					</div>

					<div class="form-group">
						<label>Level</label>
						<select class="form-control" name="level">
							<option value="1">Admin</option>
							<option value="0">Confirmator</option>
						</select>
					</div>

					<div class="form-group">
						<button class="btn btn-primary">Save User</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->view('admin/components/footer') ?>