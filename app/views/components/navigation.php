<nav id="navigation">
	<ul>
		<?php $uri = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[1] ?>
		<li><a <?= preg_match('/^\/'.$uri.'\/$/', $_SERVER['REQUEST_URI']) ? 'class="active"' : '' ?> href="./">Home</a></li>
		<li><a <?= preg_match('/\/rooms/', $_SERVER['REQUEST_URI']) ? 'class="active"' : '' ?> href="rooms">Rooms</a></li>
		<li><a <?= preg_match('/\/facilites/', $_SERVER['REQUEST_URI']) ? 'class="active"' : '' ?> href="facilites">Facilites</a></li>
		<li><a <?= preg_match('/\/reservation/', $_SERVER['REQUEST_URI']) ? 'class="active"' : '' ?> href="reservation">Reservation</a></li>
		<li><a <?= preg_match('/\/about/', $_SERVER['REQUEST_URI']) ? 'class="active"' : '' ?> href="about">About Us</a></li>
		<li id="menu-nav-collapse"><a href="about"><i class="ion-navicon-round"></i> Show Navigation</a></li>
	</ul>
</nav>