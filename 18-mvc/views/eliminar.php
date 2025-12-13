<?php
require_once "../application/model.php";
$model = new Model;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $model->deletePokemon($_POST["id"]);
}

header("Location: ../index.php");
exit;
