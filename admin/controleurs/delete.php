<?php

require_once "modeles/user.php";
require_once "modeles/type.php";
require_once "modeles/reservation.php";
require_once "modeles/colloque.php";

if (isset($_GET["cat"]) && $_GET["cat"] == "user") {
    $u = new user();
    $u->deleteUser($_GET["id"]);
    header("Location: index.php?page=user");
} else if (isset($_GET["cat"]) && $_GET["cat"] == "type") {
    $u = new Type();
    $u->deleteType($_GET["id"]);
    header("Location: index.php?page=type");
} else if (isset($_GET["cat"]) && $_GET["cat"] == "reservation") {
    $u = new Reservation();
    $u->deleteReservation($_GET["id"]);
    header("Location: index.php?page=reservation");
} else if (isset($_GET["cat"]) && $_GET["cat"] == "colloque") {
    $u = new colloque();
    $u->deleteColloque($_GET["id"]);
    header("Location: index.php?page=colloque");
}

