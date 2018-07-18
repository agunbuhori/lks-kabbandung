<?php $this->view('admin/components/header') ?>

<div class="container-fluid mt-4">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<?php foreach ($rooms as $room) : ?>
				<div class="col-md-4 col-sm-12">
					<div class="card mb-2">
						<img class="card-img-top" src="../assets/img/rooms/<?= $room->code ?>.jpg" alt="Card image cap">
						<div class="card-block p-4">
							<h5 class="card-title"><?= $room->name ?></h5>
							<h6>Rp <?= number_format($room->price) ?><small> /night</small></h6>
							<p>Capacity : <strong><?= $room->capacity ?></strong></p>
							<p>Amount : <strong><?= $room->amount ?> Room</strong></p>
							<a href="../admin/room/edit/<?= $room->code ?>" onclick="showRoom(event, this)" class="btn btn-sm btn-primary">Edit Room</a>
							<a href="../admin/room/delete/<?= $room->code ?>" onclick="deleteRoom(event, this)" class="btn btn-sm btn-danger">Delete</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="col-md-4">
			<form class="card mb-4" method="post" action="../admin/addroom" enctype="multipart/form-data" onsubmit="addRoom(event, this)">
				<div class="card-header">
					<strong>ADD NEW ROOM</strong>
				</div>
				
				<div class="card-block p-4">
					<div class="form-group">
						<label>Room Name</label>
						<input type="text" class="form-control" name="name" required="">
					</div>
					
					<div class="form-group">
						<label>Room Code</label>
						<input type="text" class="form-control" name="code" required="">
					</div>
					
					<div class="form-group">
						<label>Price per night</label>
						<input type="number" min="10000" class="form-control" name="price" value="100000">
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Capacity</label>
								<input type="number" min="1" class="form-control" name="capacity" value="1">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Amount</label>
								<input type="number" min="1" class="form-control" name="amount" value="20">
							</div>
						</div>

					</div>

					<div class="form-group">
						<label>Picture</label>
						<input type="file" class="form-control" name="picture">
					</div>

					<div class="alert alert-warning" style="display: none;" id="progress">Menyimpan</div>

				</div>

				<div class="card-footer">
					<button class="btn btn-primary">Save Room</button>
					<button style="display: none;" id="btn-cancel" type="button" class="btn btn-warning">CANCEL</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->view('admin/components/footer') ?>