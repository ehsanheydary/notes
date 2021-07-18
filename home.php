<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php
    include_once 'system/loader.php';
    $counter = 0;

    ?>


<body>
<div class="">
    <div class="">

        <table class="table table-striped table-dark mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان</th>
                <th scope="col">توضیحات</th>
                <th scope="col">زمان اجرا</th>
                <th scope="col">وضعیت</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($_SESSION['id'])):
                $id = $_SESSION['id'];
                $db = DB::GetDbInstance();
                $records = $db->SelectQuery("SELECT * FROM nt_note WHERE user_id = $id");


                foreach ($records as $record):

                    $counter++;

                    if ($record['isDone']):
                        $link = "<a href='done-check.php?id=$record[note_id]' class='btn btn-primary'> انجام شده </a>";
                    else:
                        $link = "<a href='done-check.php?id=$record[note_id]' class='btn btn-danger'> انجام نشده </a>";
                    endif;


                    echo
                    "
        <tr>
            <td scope='row'>$counter</td>
            <td> $record[title] </td>
            <td> $record[description]</td>
            <td> $record[eventTime]</td>
            <td > $link </td>
            <td >  <a href='delete-check.php?id=$record[note_id]' class='btn btn-primary'> حذف </a> </td>
        </tr>
     ";


                endforeach;
            else:
                ?>
                <tr>
                    <td colspan="6" scope='row'>لطفا برای مشاهده اطلاعات خود ابتدا وارد حساب کاربرتان شوید</td>
                </tr>
            <?php
            endif;
            ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
