<?php

require PATH."system/router.php";

$route = new Router(PATH."app/controllers/");

$route->get("/", "HomeController@index");
$route->get("/rooms", "HomeController@rooms");
$route->get("/facilites", "HomeController@facilites");
$route->get("/reservation", "HomeController@reservation");
$route->get("/about", "HomeController@about");
$route->get("/admin/room", "AdminController@room");
$route->get("/admin/user", "AdminController@user");
$route->get("/admin/reservation", "AdminController@reservation");
$route->get("/admin/delete/reservation/{code}", "ReservationController@deleteReservation");
$route->get("/admin/confirm_reservation/{code}", "ReservationController@confirmReservation");
$route->get("/admin/room/edit/{code}", "AdminController@showRoom");
$route->get("/admin/room/delete/{code}", "AdminController@deleteRoom");
$route->get("/admin/deleteuser/{username}", "AdminController@deleteUser");
$route->post("/admin/addroom", "AdminController@addroom");
$route->post("/admin/adduser", "AdminController@addUser");
$route->post("/admin/editroom/{code}", "AdminController@editroom");

$route->page("/auth/login", PATH."app/views/admin/login.php");
$route->get("/auth/logout", "AuthController@logout");
$route->post("/auth/login", "AuthController@doLogin");

$route->post("/reserve", "ReservationController@reserve");