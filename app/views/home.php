<?php $this->view('partials/head') ?>
<?php $this->view('components/header') ?>

<div class="container mt-4 mb-4" style="padding: 90px 0">
	<h1 class="text-center" style="color: #fff; text-shadow: 0px 2px 2px #000; font-family: times new roman">VISIT OUR LUXURY HOTEL</h1>
	<p class="text-center" style="color: #eee; text-shadow: 0px 3px 5px #000">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
	</p>
</div>

<div class="orange">
	<div class="container">
		<form method="get" class="row" action="reservation">
			<div class="col-md-3">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Your name">
			</div>

			<div class="col-md-2">
				<label>Check In</label>
				<input type="date" class="form-control" name="in" placeholder="Check in" value="<?= date('Y-m-d') ?>">
			</div>

			<div class="col-md-2">
				<label>For</label>
				<select class="form-control" name="for">
					<?php for ($i = 1; $i <= 30; $i++) : ?>
					<option value="<?= $i ?>"><?= $i ?> Day</option>	
					<?php endfor; ?>
				</select>
			</div>

			<div class="col-md-2">
				<label>Select Room</label>
				<select class="form-control" name="room_type_code">
					<?php foreach ($rooms as $room) : ?>
						<option value="<?= $room->code ?>"><?= $room->name." (Rp.".number_format($room->price)."/night)" ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="col-md-2">
				<label>Reserve</label>
				<button class="btn btn-primary btn-block"><i class="ion-calendar"></i> Reserve Now</button>
			</div>
		</form>
	</div>
</div>

<div class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center mb-4">
				<h3>Our Services</h3>
				<img src="assets/img/divider.png" style="height: 20px">
			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="col-md-3 text-center">
						<span class="step size-96">
							<i class="icon ion-android-contact" style="font-size: 800%"></i>
						</span>
					</div>

					<div class="col-md-9">
						<h4>Best Service</h4>
						<p class="text-muted text-justify">
							<small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small>
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="col-md-3 text-center">
						<span class="step size-96">
							<i class="icon ion-help-buoy" style="font-size: 800%"></i>
						</span>
					</div>

					<div class="col-md-9">
						<h4>Best Facilites</h4>
						<p class="text-muted text-justify">
							<small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small> </p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php $this->view('components/carousel') ?>
<?php $this->view('components/aside') ?>
<?php $this->view('components/footer') ?>
<?php $this->view('partials/foot') ?>