<?php

class UserModel
{
public static function insert($fullname , $username , $email , $password){
    $db = DB::GetDbInstance();
    $db->InsertQuery("INSERT INTO nt_user (fullname , username , email , password) values ('$fullname' , '$username' , '$email' , '$password')");
}
    public static function fetch_by_email_password($email , $password)
    {

        $db = DB::GetDbInstance();
        $record = $db->SelectQuery("SELECT user_id , email , password , fullname FROM nt_user where email='$email' AND password='$password'");
        return $record;
    }
    public static function fetch_by_email($email)
    {
        $db = DB::GetDbInstance();
        $record = $db->FirstSelect("SELECT * FROM nt_user WHERE email = '$email'");
        return $record;
    }
}