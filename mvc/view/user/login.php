    <form action="<?php echo baseuri() . '/user/login/';  ?>" method="post" class="container col-md-2">
        <img src="/notes/img/NotePad.png" alt="نوت پد" class="text-center m-auto mt-5 d-block">
        <input name="email" id="UserName" type="text" class="form-control d-block m-auto mt-1 " placeholder="نام کاربری یا ایمیل">
        <input name="password" id="Password" type="password" class="form-control d-block m-auto mt-1" placeholder="رمز عبور">
        <button id="Submit" type="submit" class="form-control btn-primary btn d-block m-auto mt-1" > ارسال</button>
        <a href="<?php echo baseuri()."/user/register/" ?>" class="text-center m-auto d-block link-primary text-decoration-underline ">حساب کاربری جدید</a>
    </form>