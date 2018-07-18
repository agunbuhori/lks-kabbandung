<?php

class Reservation extends Database
{
	private $fillable = ['code', 'name', 'adult_count', 'child_count'];

	public function create($input)
	{
		$this->insert("reservations", $input);	
	}

	public function getForAdmin()
	{
		$page = isset($_GET['page']) ? $_GET['page']-1 : 0;
		$perPage = 20;
		$offset = $perPage*$page;

		$search = '';

		if (isset($_GET['q'])) {
			$search = "WHERE reservations.code LIKE '%".$_GET['q']."%'";
		}

		$query = "SELECT reservations.code AS resi, reservations.name AS guest_name, rooms.name AS room_name, adult_count, child_count, check_in, day_count,
					rooms.price, rooms.capacity, ((price*adult_count)+(price*adult_count))*day_count AS total,
					users.id AS admin
					FROM reservations
					JOIN rooms ON reservations.room_id = rooms.id
					LEFT JOIN users ON reservations.user_id = users.id
					{$search}
					LIMIT {$offset}, {$perPage}";

		return $this->run($query)->result();
	}

	public function count()
	{
		$query = $this->prepare("SELECT COUNT(*) AS total FROM reservations");
		$query->execute();

		return $query->fetchAll()[0]->total;
	}
}