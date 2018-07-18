<?php $this->view('partials/head') ?>
<?php $this->view('components/header') ?>
<?php $this->view('components/carousel') ?>

<div id="rooms">
	<div class="container">
		<div class="row">
			<?php foreach ($rooms as $room) : ?>
			<div class="col-md-4 col-sm-12">
				<div class="card">
					<img class="card-img-top" src="assets/img/rooms/<?= $room->code ?>.jpg" alt="Card image cap">
					<div class="card-block p-4">
						<h4 class="card-title"><?= $room->name ?></h4>
						<h5>Rp <?= number_format($room->price) ?><small> /night</small></h5>
						<p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<a href="reservation?room_type_code=<?= $room->code ?>" class="btn btn-primary"><i class="ion-bookmark"></i> Book Now</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?php $this->view('components/aside') ?>
<?php $this->view('components/footer') ?>
<?php $this->view('partials/foot') ?>