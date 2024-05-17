
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع عقارات مصر </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="details.css">
    

</head>
<body>
    <header>
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
            <a href="index.php"><img class="logo" src="image/عقارات-مصر-2.webp" alt=""></a>
        </div>
        </nav>
    </header>
    <?php
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM card");
    while ($row = mysqli_fetch_array($result)) {
        echo "
    <section class='main'>
      <div>      
        
      <img src='image/$row[image]'  width='500px' height='600px'>
      <p dir='rtl'>شقة للبيع 172م + 24م جاردن في دمياط الجديدة المنطقة الاكثر تميز اول نمرة من البحر</p>
      <p>$row[details]</p>
      <h1>$row[price]</h1>
      <h1>$row[place]</h1>

    </div>
  </section>
  <div class='title'>
    <h1>تفاصيل العقار</h1>
  </div>
  <section class='information'>
    <div class='details'>
      <div class='box'>
        <h1>نوع العقار</h1>
        <h3>$row[kind_drug]</h3>
      </div>
      <div class='box'>
        <h1> الغرف</h1>
        <h3>$row[rooms]</h3>
      </div>
    
    <div class='box'>
      <h1> المساحة </h1>
      <h3>$row[space]</h3>
    </div>

      <div class='box'>
        <h1>الدور</h1>
        <h3>$row[roles]</h3>
      </div>

    </div>
    <div class='details1'>
    <div class='boxs' id='box1'>
      <h1> نوع التشطيب</h1>
      <h3>$row[finishing]</h3>
    </div>
  
  <div class='boxs' id='box'> 
    <h1> العرض</h1>
    <h3>$row[the_offer]</h3>
  </div>

    <div class='boxs'>
      <h1>الحمامات</h1>
      <h3>$row[bathrooms] </h3>
    </div>
  </div>
  </section>  
  
  <div class='title'>
    <h1>الوصف </h1>
  </div>
  <section class='seystem'>
    <div> 
      <p class='size'> $row[descriptions]  </p>
    </div>
  </section>
  <section class='seystem'>
  <div> 
    <p class='size'> $row[distincts] </p>
  </div>
</section>

  ";
}

?>
  
  <footer>
    <div class="footer_left" dir="rtl">
        <h1 class="hf">تابعونا</h1>
        <div class="folow">
        <i class="fa-brands ico fa-facebook"></i>
        <i class="fa-brands ico fa-instagram"></i>
        <i class="fa-brands ico fa-square-twitter"></i>
        <i class="fa-brands ico fa-whatsapp"></i>
        </div>

    </div>
    <div class="footer_center"  dir="rtl">
        <h1 class="hc">عن عقارات مصر</h1>
        <a class="a" href="#">الرئيسية</a>
        <a class="a" href="#">من نحن</a>
        <a class="a" href="#">اتصل بنا</a>
        <a class="a" href="#">سياسة الخصوصية</a>
        <a class="a" href="#">خريطة الموقع</a>

    </div>
    <div class="footer_right" dir="rtl">
        <img src="image/عقارات-مصر-2.webp" alt="">
        <p>نقدم لك أهم الإحصائيات والنسب الاستثمارية بشكل مبسط لمساعدتك على تحديد الحي ونوع العقار الذي يحقق أعلى عائد استثماري.</p>
        

    </div>
    

</footer>
</body>
</html>