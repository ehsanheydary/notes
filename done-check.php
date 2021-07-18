<?php

require_once('system/loader.php');
$id = $_GET['id'];


if (empty($_SESSION['id'])):
header("location: login.php");
exit();
endif;

$userid = $_SESSION['id'];
$db = DB::GetDbInstance();

$db->UpdateQuery("UPDATE nt_note SET isDone =NOT isDone WHERE note_id = $id AND user_id = $userid");

header('Location: home.php');
exit();

?>