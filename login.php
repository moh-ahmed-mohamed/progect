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
    <title>موقع عقارات مصر </title>
    <link rel="icon" href="image/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="logins.css">
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
        <h1 class="create"> تسجيل الدخول</h1>
    </div>


    <section class="main">

        <div class="your_entry">
            <?php
            if (isset($_POST["login"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                require_once "database.php";
                $sql = "SELECT * FROM users WHERE email ='$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        session_start();
                        $_SESSION["user"] = "yes";

                        header("location: index.php");
                        die();
                    } else {
                        echo "<div class='alert alert-danger'>كلمة المرور غير صحيحة</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>البريد الألكتروني غير صحيح</div>";
                }
            }
            ?>
            <form action="login.php" method="POST">
                <h1 class="h1">تسجيل الدخول </h1>
                <div class="form" dir="rtl">
                    <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني ">
                </div>
                <div class="form" dir="rtl">
                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                    <input id="submit" name="login" class="btn btn-primary " type="submit" value="تسجيل الدخول">
                </div>
            </form>
            <div>
                <p class="account"><a href="registration.php">سجل الأن</a>لا تمتلك حساب؟</p>
            </div>
        </div>
    </section>
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