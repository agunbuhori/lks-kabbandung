<?php

class ReservationController extends Controller
{
	public function reserve()
	{
		$data = [
			'code' => time().rand(000, 999),
			'name' => $_POST['name'],
			'check_in' => date_format(date_create($_POST['in']), 'Y-m-d'),
			'day_count' => $_POST['for'],
			'adult_count' => $_POST['adult_count'],
			'child_count' => $_POST['child_count'],
			'room_id' => $_POST['room_id']
		];

		$this->model('reservation');
		$this->reservation->create($data);

		header("location:reservation?message=success&userdata=".$data['code']);
	}

	public function confirmReservation($code)
	{
		$query = $this->prepare("UPDATE reservations SET user_id = :user_id WHERE code = :code");
		$query->execute(["user_id" => 1, "code" => $code]);

		header("location:".$_SERVER['HTTP_REFERER']);
	}

	public function deleteReservation($code)
	{
		$query = $this->prepare("DELETE FROM reservations WHERE code = :code");
		$query->execute([":code" => $code]);

		header("location:".$_SERVER['HTTP_REFERER']);
	}
}