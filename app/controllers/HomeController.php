<?php

class HomeController extends Controller
{
	/**
	 * Get index page
	 *
	 * @return void
	 */
	public function index()
	{
		$this->view('home', ['rooms' => $this->get("rooms")->result()]);
	}

	/**
	 * Get rooms page
	 *
	 * @return void
	 */
	public function rooms()
	{
		$this->view('rooms', ['rooms' => $this->get("rooms")->result()]);
	}

	/**
	 * Get reservation page
	 *
	 * @return void
	 */
	public function reservation()
	{
		$data['rooms'] = $this->get("rooms")->result();
		$data['order_detail'] = [];

		if (isset($_GET['message']) && $_GET['message'] === "success") {
			$data['order_detail'] = $this->prepare("SELECT *, adult_count, reservations.name AS guest, day_count,
			((reservations.adult_count*rooms.price)+(reservations.child_count*(rooms.price/2)))*day_count AS total, rooms.name AS room_name,
					users.name AS admin
					FROM reservations 
					JOIN rooms ON rooms.id = reservations.room_id
					LEFT JOIN users ON users.id = reservations.user_id
					WHERE reservations.code = :code");

			$data['order_detail']->execute([":code" => str_replace(" ", "", $_GET['userdata'])]);
			$data['order_detail'] = $data['order_detail']->fetchAll()[0];

			if (count($data['order_detail']) == 0) {
				header('location:reservation');
			}
		}

		$data['order_detail']->total = number_format($data['order_detail']->total);

		$this->view('reservation', $data);
	}

	/**
	 * Get facilites page
	 *
	 * @return void
	 */
	public function facilites()
	{
		$this->view('facilites');
	}

	/**
	 * Get about page
	 *
	 * @return void
	 */
	public function about()
	{
		$this->view('about');
	}
}