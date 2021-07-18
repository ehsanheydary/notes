<?php
require_once 'system/loader.php';


if (empty($_SESSION['id'])):
    header("location: login.php");
    die();
elseif(empty($_GET['id'])):
    header("location: login.php");
    die();
endif;


$id = $_SESSION['id'];
$note_id = $_GET['id'];

$db = DB::GetDbInstance();

$db->DeleteQuery("DELETE FROM nt_note where note_id = '$note_id' AND nt_note.user_id = '$id' ");

header("Location: home.php");