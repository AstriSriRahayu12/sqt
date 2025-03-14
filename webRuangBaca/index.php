<?php
session_start();
error_reporting(0);
include 'assets/webpages/db-connect.php';

$bookdata = "SELECT * FROM book ORDER BY id DESC LIMIT 8";
$result = mysqli_query($con, $bookdata);

?>
<?php

if (isset($_POST['contact'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $message = mysqli_real_escape_string($con, $_POST['message']);

  if ($name == "") {
    $error['name'] = "Name should not be empty";
  } else if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
    $error['name'] = "Only alphabets are allowed";
  }
  if ($email == "") {
    $error['email'] = "Please Enter Email Address";
  } else if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
    $error['email'] = "Please Enter Valid Email Address";
  }
  if ($mobile == "") {
    $error['mobile'] = "Please Enter Mobile Number";
  } else if (!preg_match("/^[0-9]{10}+$/", $mobile)) {
    $error['mobile'] = "Please Enter Valid Mobile Number";
  }
  if ($message == "") {
    $error['message'] = "Message should not be empty";
  } else if (!preg_match("/^[a-zA-Z0-9.,\s]*$/", $message)) {
    $error['message'] = "Only alphabets are allowed";
  } else {
    if (!isset($error)) {
      $insertdata = "INSERT INTO contacttable(name,email,mobile,message) VALUES('$name','$email','$mobile','$message')";
      $runquery = mysqli_query($con, $insertdata);
      if ($runquery) {
        $reciever_email = $email;
        $subject = "Thank you for reaching out | Library Management System";
        $body = "Hi " . $name . ",


Admin Of Library Management System";
        $sender = "From: librarymanagementwebsite@gmail.com";
        if (mail($reciever_email, $subject, $body, $sender)) {
          echo '<div class="modal" id="popup">
          <div class="modal-main">
            <div class="modal-content">
              <div class="modal-header">
                <span><i class="bx bx-x" id="close-btn"></i></span>
              </div>
              <div class="modal-body">
                <figure>
                  <img src="https://www.skoolbeep.com/blog/wp-content/uploads/2020/12/WHAT-IS-THE-PURPOSE-OF-A-LIBRARY-MANAGEMENT-SYSTEM-min.png" alt="Library Management System Illustration png">
                </figure>
                <h5>Form Submitted Successfully</h5>
                <p>Thank You for Contacting Us. We will contact you soon.</p>
              </div>
            </div>
          </div>
        </div>';
          ?>
            <script>
              document.getElementById("popup").style.display = "flex";
              let btn = document.getElementById("close-btn");


              btn.addEventListener("click", () => {
                document.getElementById("popup").style.display = "none";
              })
            </script>
          <?php
        } else {
          echo "error while contacting us";
        }
      } else {
        echo "error while running the query";
      }
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Library Management System(L.M.S) is simple Library system that is used by librarian for manageing records of books and perform some operations on it.">
  <meta name="keywords" content="LMS,lms,library management system,library software,library management" />
  <title>Library Management System || Make Easy to Manage Records of Books</title>
  <link rel="stylesheet" href="assets/css/index.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!--- google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <!-- Fontawesome Link for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<!--- INI DITAMBAHANNYA GUYS -->
<body onload="preloader()">
  <?php include 'assets/loader/loader.php' ?>
  <header>
    <nav class="navbar">
      <div class="logo">
        <div class="icon">
          <!-- <i class='bx bx-book-reader'></i> -->
          <img src="assets/images/logo.svg" alt="Library Management System Logo">
        </div>
      </div>
      <ul class="nav-list">
        <div class="logo">
          <div class="title">
            <div class="icon">
              <img src="assets/images/logo.svg" alt="Library Management System Logo">
            </div>
            <div class="logo-header">
              <h4>Ruang Baca</h4>
              <small>Library System</small>
            </div>
          </div>
          <button class="close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <li><a href="assets/webpages/login.php">Masuk</a></li>
        <div class="login">
          <?php
          if (isset($_SESSION['loggedin'])) {
            ?>
            <a href="assets/webpages/signup.php" type="button" class="loginbtn">Daftar</a>
            <?php
          } else if (isset($_SESSION['stdloggedin'])) {
            ?>
              <a href="assets/webpages/signup.php">Daftar</a>

            <?php
          } else {
            ?>
              <a href="assets/webpages/login.php" type="button" class="loginbtn">Daftar</a>
            <?php
          }
          ?>
        </div>
      </ul>
      <div class="stack">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </nav>
  </header>

  <div class="twoColumns">
    <div class="right" class="responsive">
      <h4>Selamat Datang Di Web Ruang Baca</h4>
      <h4>di <span>Ruang Baca</span>!</h4>
      <p>Ruang Baca hadir untuk membuka gerbang dunia penuh pengetahuan dan imajinasi. Jelajahi ribuan buku digital
        dengan mudah, kapanpun, dan dimanapun Anda berada. </p>
      <section class="home">
        <div class="btns">
          <?php
          if (isset($_SESSION['loggedin'])) {
            ?>
            <button><a href="assets/webpages/login.php.php">Mulai</a></button>
            <?php
          } else if (isset($_SESSION['stdloggedin'])) {
            ?>
              <button><a href="assets/webpages/login.php">Mulai</a></button>

            <?php
          } else {
            ?>
              <button><a href="assets/webpages/login.php">Mulai</a></button>

            <?php
          }
          ?>
        </div>
      </section>
    </div>
    <div>
      <img src="assets/images/ilustrasi.svg" class="responsive" width="500">
    </div>
  </div>

  <section class="books-showcase" id="book">
    <div class="title">
      <h4>Buku Paling Populer</h4>
    </div>
    <div class="books-container">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="book">
            <div class="img">
              <img src="assets/panel/img-store/book-images/<?php echo $row['cover'] ?>" alt="Book Cover Image">
            </div>
            <div class="book-detail">
              <h5><?php echo $row['title'] ?></h5>
              <small><?php echo $row['author'] ?></small>
              <div class="footer-btn">
                <!-- harusnya kalo udah pake link gausah pake button lagi, tinggal link nya style ala ala button -->
                <a href="assets/webpages/book-details.php?id=<?php echo $row['id'] ?>">
                  <button>
                    <span style="color: white;">Baca</span>
                    <img class="arrowbtn" width="20px" src="assets/images/Arrow.svg" alt="arrow" />
                  </button>
                </a>
              </div>
            </div>
          </div>
          <?php
        }
      }
      ?>

    </div>
  </section>

  <section class="about-us" id="about">
    <div class="main">
      <div class="img">
        <img src="assets\images\diskusi.svg" alt="About Us Image">
      </div>
      <div class="about-content">
        <h4>Ruang Diskusi</h4>
        <h1>Ruang Baca bukan cuma perpustakaan digital, tapi juga tempat ngobrol seru tentang buku! </h1>
        <p>Di Ruang Diskusi, Anda bisa ngobrolin buku favorit, dapatkan rekomendasi baru, ikutan diskusi seru, kenalan
          dengan sesama pembaca, dan masih banyak lagi. Yuk, gabung dan rasakan keseruan ngobrol buku bareng di Ruang
          Baca!</p>
      </div>
    </div>
  </section>


  <section class="premium">
    <div class="title-premium">
      <h4>Media Partner Ruang Baca</h4>
    </div>
    <div class="flex-container">
      <div class="cell">
        <img src="assets\images\gramed.svg" alt="">
      </div>
      <div class="cell">
        <img src="assets\images\erlangga.svg" alt="">
      </div>
      <div class="cell">
        <img src="assets\images\grasindo2.png" alt="">
      </div>
    </div>
    <div class="flex-container">
      <div>
        <img src="assets\images\dee.svg" alt="">
      </div>
      <div>
        <img src="assets\images\mizan.svg" alt="">
      </div>
      <div>
        <img src="assets\images\gagasmedia.svg" alt="">
      </div>
    </div>
  </section>

  <section>
    <div class="titleprem">
      <h4>Jelajahi Premium</h4>
    </div>
    <div class="flex-container-premium">
      <div class="boxprem">
        <div class="text">Coba
          <div class="price">GRATIS</div>
          <div class="lamanya">3 hari</div>
          <div class="benefit">
            <ul>
              <li>Coba gratis dengan pengalaman premium
                <br> yang menyenangkan
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="boxprem">
        <div class="text">Premium
          <div class="price">Rp. 30.000</div>
          <div class="lamanya">per bulan</div>
          <div class="benefit">
            <ul>
              <li>Koleksi Premium: Jelajahi ribuan ebook premium
                <br>dari berbagai genre dan penulis ternama yang
                <br>tidak tersedia di versi gratis.
              </li>
              <li>Early Access: Dapatkan akses lebih awal ke
                <br>buku-buku terbaru sebelum dirilis ke publik.
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <footer>
    <div class="container">
      <div class="logo-description">
        <div class="logo">
          <div class="img">
            <img class="imgft" src="assets/images/logo.svg" alt="Logo Ruang Baca">
          </div>
        </div>
        <div class="logo-body">
          <p>
            Ruang Baca hadir untuk membuka gerbang dunia penuh pengetahuan dan imajinasi. Jelajahi ribuan buku digital
            dengan mudah, kapanpun, dan dimanapun Anda berada. </p>
        </div>

      </div>
      <div class="categories list">
        <h4>Jelajahi</h4>
        <ul>
          <li><a href="#">Beranda</a></li>
          <li><a href="#">Masuk/daftar</a></li>
        </ul>
      </div>
      <div class="quick-links list">
        <h4>Social Media</h4>
        <ul>
          <li><a href="index.php">Instagram</a></li>
          <li><a href="#contact">Facebook</a></li>
          <li><a href="#about">Twitter</a></li>
        </ul>
      </div>
      <div class="subscribe-email">

        <input type="email" class="footer-email" placeholder="Masukkan email anda" />
        <button type="submit" class="subimg">
          <img src="assets\images\email.svg" alt="buttonpng" />
        </button>
      </div>
    </div>

    </div>
  </footer>
  <script>
    let hamburgerbtn = document.querySelector(".hamburger");
    let nav_list = document.querySelector(".nav-list");
    let closebtn = document.querySelector(".close");
    hamburgerbtn.addEventListener("click", () => {
      nav_list.classList.add("active");
    });
    closebtn.addEventListener("click", () => {
      nav_list.classList.remove("active");
    });
  </script>
</body>

</html>