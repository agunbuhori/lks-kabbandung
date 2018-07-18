<?php $this->view('admin/components/header') ?>

<div class="container-fluid mt-4">
	<div class="card">
		<div class="card-header"><h5 class="text-center">RESERVATIONS DATA</h5></div>
		<div class="card-block p-4">
			<div class="row">
				<form class="col-md-6" method="get" action="<?= str_replace('index.php/', '', $_SERVER['PHP_SELF']) ?>">
					<input type="text" name="q" class="form-control mb-2" placeholder="Search by code">
				</form>
			</div>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>NO</th>
						<th>CODE</th>
						<th>NAME</th>
						<th>ROOM TYPE</th>
						<th>ADULT</th>
						<th>CHILDERN</th>
						<th>CHECK IN</th>
						<th>CHECK OUT</th>
						<th>CONFIRM</th>
						<th>TOTAL</th>
						<th width="10%">OPTIONS</th>
					</tr>
				</thead>

				<tbody>
					<?php $loopIndex = 1; ?>
					<?php foreach ($reservations as $reservation) : ?>
						<tr>
							<td><?= $loopIndex++ ?></td>
							<td><?= $reservation->resi ?></td>
							<td><?= $reservation->guest_name ?></td>
							<td><?= $reservation->room_name ?></td>
							<td><?= $reservation->adult_count ?> Adult</td>
							<td><?= $reservation->child_count ?> Childern</td>
							<td><?= date_format(date_create($reservation->check_in) , 'd F Y') ?></td>
							<td><?= date('d F Y', strtotime($reservation->check_in . " +".$reservation->day_count." days")) ?></td>
							<?php if ($reservation->admin != null) : ?>
								<td><span class="badge badge-pill badge-success">Confirmed</span></td>
							<?php else : ?>
								<td class="cfr"><span class="badge badge-pill badge-danger">Not Confirmed</span></td>
							<?php endif; ?>
							<td class="text-right">Rp<?= number_format($reservation->total) ?>,-</td>
							<td class="text-center">
								<?php if ($reservation->admin == null) : ?>
									<a href="../admin/confirm_reservation/<?= $reservation->resi ?>" onclick="confirmResv(event, this)">
										<small>Confirm</small>
									</a>
								<?php endif; ?>
								<a class="text-danger" href="../admin/delete/reservation/<?= $reservation->resi ?>" onclick="deleteResv(event, this)">
									<small>Delete</small>
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>

			<ul class="pagination">
				<li class="page-item"><a class="page-link" href="../admin/reservation?page=<?= $_GET['page']-1 ?>">Prev</a></li>
				<?php for ($i = 1; $i <= $links; $i++) : ?>
				<li class="page-item"><a class="page-link" href="../admin/reservation?page=<?= $i ?>"><?= $i ?></a></li>
				<?php endfor; ?>
				<li class="page-item"><a class="page-link" href="../admin/reservation?page=<?= $_GET['page']+1 ?>">Next</a></li>
			</ul>
		</div>
	</div>
</div>

<?php $this->view('admin/components/footer') ?>