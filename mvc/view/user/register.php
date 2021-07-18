
    <form action="<?php echo baseuri()."/user/register/" ?>" method="post" class="container col-md-2 input-group-prepend">
        <img src="../../../img/NotePad.png" alt="نوت پد" class="text-center m-auto mt-5 d-block">
        <input name="email" id="email" type="text" class="form-control d-block m-auto mt-1 " placeholder="ایمیل">
        <input name="fullname" id="fullname" type="text" class="form-control d-block m-auto mt-1 " placeholder="نام و نام خانوادگی">
        <input name="username" id="username" type="text" class="form-control d-block m-auto mt-1 " placeholder="نام کاربری">
        <input name="password" id="password" type="password" class="form-control d-block m-auto mt-1" placeholder="رمز عبور">
        <input name="confirmpassword" id="confirmpassword" type="password" class="form-control d-block m-auto mt-1" placeholder="تکرار رمز عبور">
        <button type="submit" class="form-control btn-primary btn center d-block m-auto mt-1" > ارسال</button>
        <a href="<?php echo baseuri()."/user/login/" ?>" class="text-center m-auto d-block link-primary text-decoration-underline pointer-event">قبلا ثبت نام کردید وارد شوید</a>
    </form>