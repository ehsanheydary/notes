<?php
class UserController
{
    public function __construct()
    {

    }
    public function logout(){
        session_destroy();
        $road = baseuri() . '/page/home/';
        header("location: $road");
    }
    public function profile($p1 = 1, $p2 = 1, $p3 = 1, $p4 = 1)
    {
        echo $p1 * $p2 + $p3 - $p4;
    }

    public function login()
    {
        if (!empty($_POST['email'])):
            $this->LoginCheck();
        else:
            $this->LoginView();
        endif;
    }

    private function LoginCheck()
    {
        if (isset($_SESSION['id']) || isset($_SESSION['email'])):
            $message = $_SESSION['fullname'] . ' عزیز خوش آمدید ' . '<a href="logout.php"> برای خروج اینجا کلیک کنید </a>';
            message('success', $message, true);
        endif;

        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = GetHashPassword($password);

        $record = UserModel::fetch_by_email_password($email, $password);

        if (empty($record)):
            $message = 'نام کاربری یا رمز عبورتان اشتباه است';
            message('fail', $message, true);
//    echo $message = 'نام کاربری یا رمز عبورتان اشتباه است';
//    header("Location: login-fail.php");
        else:
            $message = ' شما با موفقیت وارد سیستم شدید برای رفتن به صفحه اصلی ' . '<a href="page/home/"> اینجا </a>' . ' کلیک کنید ';
            message('success', $message);
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $record[0]['user_id'];
            $_SESSION['fullname'] = $record[0]['fullname'];
            $road = baseuri() . '/page/home/';
            header("location: $road");
//    echo "<span class='text-center m-auto d-block'> $message </span>";
//    header("Location: home.php");
        endif;
    }

    private function LoginView()
    {
        $data = array();
        $data['content'] = 'Hello world';
        View::render('user/login.php', $data);
    }

    public function register()
    {
        if (!empty($_POST['email'])) :
            $this->RegisterCheck();
        else:
            $this->RegisterView();
        endif;
    }

    private function RegisterCheck()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ConfirmPassword = $_POST['confirmpassword'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];

        $db = DB::GetDbInstance();
        $record = UserModel::fetch_by_email($email);

        if (!empty($record)) {
            $message = 'کاربری با این اطلاعات قبلا در سایت ثبت نام کرده است';
            message('fail', $message, true);;
        }
        if ($password !== $ConfirmPassword) {
            $message = 'رمزهای عبور با هم برابر نیستند';
            message('fail', $message, true);;
        }
        if (empty($password) || $password == ' ' || strlen($password) < 6 || $email == $password) {
            $message = 'لطفا رمز عبور قوی تری انتخاب کنید';
            message('fail', $message, true);;
        }

        $password = GetHashPassword($password);

        UserModel::insert($fullname , $username , $email , $password);
        $message = 'ثبت نام شما با موفقیت انجام شد';
        message('success', $message, true);;
    }

    private function RegisterView()
    {
        View::render("user/register.php");
    }

}