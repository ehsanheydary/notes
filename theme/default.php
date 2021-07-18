<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود</title>
        <link rel = "stylesheet" href = "/notes/asset/style/styles.css" >
        <link rel = "stylesheet" href = "/notes/asset/style/base.css" >
        <link rel = "stylesheet" href = "/notes/asset/style/bootstrap.rtl.css" >

        <!--<script src = "asset/js/jquery-3.5.1.slim.min.js" ></script >-->
        <!--<script src = "asset/js/jquery.js" ></script >-->
        <!--<script src = "asset/js/popper.min.js" ></script >-->

</head>



<body>

<?php
if (empty($_SESSION['id'])):


endif;
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">صفحه اصلی</a>
                    </li>
                    <?php
                    if (empty($_SESSION['id'])):

                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-primary shake" href="register.php" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                ثبت نام | ورود
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="register.php">ثبت نام</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../mvc/view/user/login.php">ورود</a></li>
                            </ul>
                        </li>
                    <?php
                    else:
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="register.php" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">

                                <?php
                                echo $_SESSION['fullname'] . ' عزیز خوش آمدید ';
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout.php">خروج</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <form class="d-flex form-control">
                                <input class="form-control me-2" type="search" placeholder="جستجو" aria-label="جستجو">
                                <button class="btn btn-outline-primary" type="submit">جستجو</button>
                            </form>
                        </li>

                    <?php
                    endif;
                    ?>
                </ul>





            </div>
        </div>
    </nav>
    <div id="header" class="header"></div>
    <div id="content" class="content"><?php echo $output; ?></div>
    <div id="footeer" class="footer"></div>
<script src = "/notes/asset/js/bootstrap.bundle.js" ></script>
</body>
</html>