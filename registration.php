<?php
session_start();
if (isset($_SESSION["user"])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>موقع عقارات مصر </title>
    <link rel="icon" href="image/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="enters.css">

</head>

<body>

    <header>
        <!-- start nav -->
        <nav>
            <div>
                <a class="enter" href="login.php">
                    <button class="enter">تسجيل الدخول</button>
                </a>
            </div>
           
            <div>
                <a class="link" href="add.php">
                    <i class="fa-solid fa-house"> إضافة عقار </i>
                </a>
            </div>
                                 
            <div>
                <a class="link" href="sale.php">
                    <i class="fa-solid fa-house-medical">للبيع</i>
                </a>
            </div>
            <div>
                <a class="link" href="rent.php">
                    <i class="fa-solid fa-tag"> للإيجار </i>
                </a>
            </div>
            <div>
                <a class="link" href="index.php">
                    <i class="fa-solid fa-house"> الرئيسية </i>
                </a>
            </div>
            <div>
                <a href="index.php">
                    <img class="logo" src="image/عقارات-مصر-2.webp" alt="">
                </a>
            </div>
        </nav>
        <!-- end nav -->
    </header>
    <div class="background" dir="rtl">
        <img class="company" src="image/company-bg.jpg" width="100%" height="120px" alt="">
        <h1 class="create">إنشاء حساب</h1>
    </div>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordreprat = $_POST["reprat_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);


            $errors = array();
            if (empty($fullname) or empty($email) or empty($password) or empty($passwordreprat)) {
                array_push($errors, "جميع الحقول مطلوبة");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "البريد الإلكتروني غير صالح");
            }
            if (strlen($password) < 8) {
                array_push($errors, "يجب أن تكون كلمة المرور 8أحرف على الأ قل");
            }
            if ($password !== $passwordreprat) {
                array_push($errors, "كلمة المرور غير متطابقة");
            }

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                array_push($errors, "البريدالإلكتروني موجود بالفعل!");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                require_once "database.php";
                $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ?) ";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>لقد تم تسجيلك بنجاح</div>";
                } else {
                    die("somegthing went wrong");
                }
            }
        }
        ?>
        <form action="registration.php" method="post">
        <h1 class="h1">حساب جديد  </h1>
            <div class="form-group" dir="rtl">
                <input type="text" class="form-control" name="fullname" placeholder="الأسم الكامل">
            </div>
            <div class="form-group" dir="rtl">
                <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني">
            </div>
            <div class="form-group" dir="rtl">
                <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
            </div>
            <div class="form-group" dir="rtl">
                <input type="password" class="form-control" name="reprat_password" placeholder="تأكيد كلمة المرور ">
            </div>
            <div class="form-group" dir="rtl">
                <input type="submit" class=" btn btn-primary" value="إنشاء الحساب" name="submit">
            </div>
        </form>
        <div>
            <p class="account"> <a href="login.php" dir="rtl"> هل لديك حساب بالفعل؟</a>تسجيل الدخول؟</p>
        </div>

    </div>


    <!-- start footer -->
    <footer>
        <!-- satrt footer_left -->
        <div class="footer_left" dir="rtl">
            <h1>تابعونا</h1>
            <div class="folow">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-square-twitter"></i>
                <i class="fa-brands fa-whatsapp"></i>
            </div>
        </div>
        <!-- end footer_left -->
        <!-- start footer_center -->
        <div class="footer_center" dir="rtl">
            <h1>عن عقارات مصر</h1>
            <a href="#">الرئيسية</a>
            <a href="#">من نحن</a>
            <a href="#">اتصل بنا</a>
            <a href="#">سياسة الخصوصية</a>
            <a href="#">خريطة الموقع</a>
        </div>
        <!-- end footer_center -->
        <!-- start footer_right -->
        <div class="footer_right" dir="rtl">
            <img src="image/عقارات-مصر-2.webp" alt="">
            <p>نقدم لك أهم الإحصائيات والنسب الاستثمارية بشكل مبسط لمساعدتك على تحديد الحي ونوع العقار الذي يحقق أعلى عائد استثماري.</p>
        </div>
        <!-- end footer_right -->
    </footer>
    <!-- end footer -->

</body>

</html>