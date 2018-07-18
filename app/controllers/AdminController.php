<?php

class AdminController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		if (! $_SESSION['user']) {
			header('location:../auth/login');
		}
	}

	public function isManager()
	{
		if ($_SESSION['level'] != 1) {
			header('location:'.$_SERVER['HTTP_REFERER']);
		}		
	}

	public function reservation()
	{
		$this->model('reservation');
		$data = $this->reservation->getForAdmin();
		$links = $this->reservation->count();

		if (! isset($_GET['page'])) {
			header('location:../admin/reservation?page=1&q='.$_GET['q']);
		}

		$this->view('admin/reservation', ['reservations' => $data, 'links' => ceil($links/20)]);
	}

	public function user()
	{
		$this->view('admin/users', ['users' => $this->get("users")->result()]);
	}

	public function room()
	{
		$this->isManager();

		$this->view('admin/rooms', ['rooms' => $this->get("rooms")->result()]);
	}

	public function addroom()
	{
		$this->isManager();

		$data = [
			'code' => $_POST['code'],
			'name' => $_POST['name'],
			'capacity' => $_POST['capacity'],
			'amount' => $_POST['amount'],
			'price' => $_POST['price']
		];

		if ($_FILES['picture']) {
			$file = $_FILES['picture']['tmp_name'];

			move_uploaded_file($file, PATH."/assets/img/rooms/".$data['code'].".jpg");
		}

		$this->insert("rooms", $data);

		header("Content-Type:application/json");

		return json_encode(['name' => $data['name']]);
	}

	public function showRoom($code = null)
	{
		$this->isManager();

		$query = $this->prepare("SELECT * FROM rooms WHERE code = :code");
		$query->execute([":code" => $code]);

		header('Content-Type:application/json');
		return json_encode($query->fetchAll()[0]);
	}

	public function editRoom($code = null)
	{
		$this->isManager();

		$data = [
			':code' => $_POST['code'],
			':name' => $_POST['name'],
			':capacity' => $_POST['capacity'],
			':amount' => $_POST['amount'],
			':price' => $_POST['price']
		];

		if ($_FILES['picture']) {
			$file = $_FILES['picture']['tmp_name'];

			unlink(PATH."/assets/img/rooms/".$data[':code'].".jpg");

			move_uploaded_file($file, PATH."/assets/img/rooms/".$data[':code'].".jpg");
		}

		$query = $this->prepare("UPDATE rooms 
						SET code = :code, name = :name, capacity = :capacity, amount = :amount, price = :price
						WHERE code = :room_code");

		$query->execute(array_merge($data, [":room_code" => $code]));

	}

	public function deleteRoom($code)
	{
		$this->isManager();

		$query = $this->prepare("DELETE FROM rooms WHERE code = :code");
		$query->execute([":code" => $code]);
	}

	public function addUser()
	{
		$this->isManager();

		$data = [
			'username' => $_POST['username'],
			'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
			'level' => $_POST['level'],
			'name' => $_POST['name']
		];

		$this->insert("users", $data);

		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	public function deleteUser($username)
	{
		$this->isManager();

		$query = $this->prepare("DELETE FROM users WHERE username=:username");
		$query->execute([":username" => $username]);
		
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}