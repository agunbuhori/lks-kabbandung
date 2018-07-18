<?php $this->view('partials/head') ?>
<?php $this->view('components/header') ?>

<div id="reservation">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-4 text-center">
				<h2 style="color: #fff; text-shadow: 0px 2px 2px #000; font-family: times new roman">RESERVATION</h2>
				<img src="assets/img/divider.png" style="width: 200px;">

				<p style="color: #fff">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
			</div>

			<div class="col-md-6">
				<?php if (isset($_GET['message']) && $_GET['message'] == 'success') : ?>
				<div class="card">
					<div class="card-block p-4">
						<h4 class="text-center" style="font-family: times new roman">ROOM HAS BEEN BOOKED</h4>
						<div class="alert alert-warning text-center">
							<p>YOUR BOOKING CODE : </p>
							<h5><strong><?= $_GET['userdata'] ?></strong></h5>
						</div>
						<table class="table">
							<tr>
								<td width="30%">Name</td>
								<td><strong><?= ucwords($order_detail->guest) ?></strong></td>
							</tr>
							<tr>
								<td>Check In</td>
								<td><strong><?= date_format(date_create($order_detail->check_in), "d F Y") ?></strong></td>
							</tr>
							<tr>
								<td>Check Out</td>
								<td><strong><?= date('d F Y', strtotime($order_detail->check_in . " +".$order_detail->day_count." days")) ?></strong></td>
							</tr>
							<tr>
								<td>Room Type</td>
								<td><strong><?= $order_detail->room_name ?></strong></td>
							</tr>
							<tr>
								<td>Price<small>/night</small></td>
								<td><strong>Rp<?= number_format($order_detail->price) ?></strong></td>
							</tr>
							<tr>
								<td>Adult</small></td>
								<td><strong><?= $order_detail->adult_count ?> * (<?= $order_detail->price ?>) person</strong></td>
							</tr>
							<tr>
								<td>Child</td>
								<td><strong><?= $order_detail->child_count ?> * (<?= $order_detail->price ?>/2) person</strong></td>
							</tr>
							<tr>
								<td>Day Count</small></td>
								<td><strong><?= $order_detail->day_count ?> night</strong></td>
							</tr>
							<tr class="table-success">
								<td>Total</td>
								<td><strong>Rp<?= $order_detail->total ?></td>
							</tr>
							<tr>
								<td>Payment Status</td>
								<?php if ($order_detail->admin != null) : ?>
								<td><span class="badge badge-success">CONFIRMED</span></td>
								<?php else : ?>
								<td><span class="badge badge-danger">UNCONFIRMED</span></td>
								<?php endif; ?>
							</tr>

						</table>

						<div class="form-group text-center">
							<a href="reservation" class="btn btn-success btn-lg"><i class="ion-bookmark"></i> BOOK NEW ROOM</a>
						</div>
					</div>
				</div>
				<?php else : ?>
				<form class="card" method="post" action="reserve">
					<div class="card-block p-4">
						<div class="form-group text-center">
							<h4>NEW RESERVATION</h4>
							<img src="assets/img/divider.png" style="width: 200px">
						</div>
						
						<div class="form-group">
							<label>Name :</label>
							<input class="form-control" name="name" placeholder="What is your name?" required="on" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>">
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Check In</label>
										<input type="date" class="form-control" name="in" value="<?= isset($_GET['in']) ? $_GET['in'] : date('Y-m-d') ?>">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label>For</label>
										<select class="form-control" name="for">
											<?php for ($i = 1; $i <= 30; $i++) : ?>
											<option <?= isset($_GET['in']) && $_GET['for'] == $i ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?> Night</option>	
											<?php endfor; ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Adult</label>
										<input type="number" min="1" max="2" class="form-control" name="adult_count" value="1">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label>Childern</label>
										<input type="number" min="0" max="2" type="date" class="form-control" name="child_count" value="0">
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Room Type :</label>
							<select class="form-control" name="room_id">
								<?php foreach ($rooms as $room) : ?>
								<option <?= isset($_GET['room_type_code']) && $_GET['room_type_code'] == $room->code ? 'selected' : '' ?> value="<?= $room->id ?>"><?= $room->name." (Rp".number_format($room->price)." /night)" ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group text-center">
							<button class="btn btn-success btn-lg"><i class="ion-bookmark"></i> BOOKING NOW</button>
						</div>

						<div class="text-center">
							<img src="assets/img/divider.png" style="width: 200px">
						</div>
					</div>
				</form>
				<?php endif; ?>
			</div>

			<div class="col-md-6">
				<form class="card" method="get" action="reservation">
					<div class="card-block p-4">
						<input type="hidden" name="message" value="success">
						<div class="text-center">
							<h4>CHECK MY BOOKED ROOM</h4>
							<img src="assets/img/divider.png" style="width: 200px">
						</div>
						
						<div class="form-group">
							<label>Write your booking code :</label>
							<input type="text" class="form-control" name="userdata" value="<?= isset($_GET['userdata']) ? $_GET['userdata'] : '' ?> ">
						</div>
						
						<div class="form-group text-center">
							<button class="btn btn-success btn-lg"><i class="ion-check"></i> CHECK NOW</button>
						</div>

						<div class="text-center">
							<img src="assets/img/divider.png" style="width: 200px">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $this->view('components/aside') ?>
<?php $this->view('components/footer') ?>
<?php $this->view('partials/foot') ?>