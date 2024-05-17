<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع عقارات مصر | احدث وافضل</title>
    <link rel="icon" href="image/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">

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
                <a class="active" href="index.php">
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
        <div>
            <img class="background" src="image/background.jpg" alt="">
        </div>
    </header>
    
    <main>
        <h1 class="main">أحدث العقارات للبيع</h1>
    </main>
    <?php
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM card");
    while ($row = mysqli_fetch_array($result)) {
        echo "
         <div class='card'>
            <a href='details.php'>
                <img class='img' src='image/$row[image]' width='100%' height='100%'> 
            </a>
            <div class='inf'>
                <h1>$row[price]</h1>
            </div>
            <p>$row[details]</p>
            <p>$row[place]<i class='icon fa-solid fa-location-dot'></i></p>
         </div> 

    ";
    }

    ?>

    <section class="rent">
    <main>
        <h1 class="main">أحدث العقارات للإيجار</h1>
    </main>
    <?php
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM rent");
    while ($rows = mysqli_fetch_array($result)) {
        echo "
    
         <div class='card'>
            <a href='detailsrent.php'>
                <img class='img' src='image/$rows[image]' width='100%' height='100%'> 
            </a>
            <div class='inf'>
                <h1>$rows[price]</h1>
            </div>
            <p>$rows[details]</p>
            <p>$rows[place]<i class='icon fa-solid fa-location-dot'></i></p>
         </div> 

    ";
    }

    ?>
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