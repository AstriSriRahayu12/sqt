<?php
session_start();

include '../../../webpages/db-connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Management System(L.M.S) is simple Library system that is used by librarian for managing records of books and perform some operations on it.">
    <meta name="keywords" content="LMS, library management system, library software, library management" />
    <title>Dashboard Anggota | Ruang Baca</title>

    <!-- Font and Icon CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../../css/index.css">
</head>

<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="nav-left">
            <div class="logo">
                <img src="../../../images/logo.svg" alt="Library Management System Logo">
            </div>
            <a href="../dashboard_user.php">Beranda</a>
            <a href="cari-buku.php" class="active">Jelajahi Buku</a>
            <a href="diskusi.php">Ruang Diskusi</a>
        </div>
        <div class="nav-right">
            <a href="user-pages/langganan.php">Coba Premium</a>
            <div class="profile" id="profileMenu">
                <i class="fa-solid fa-user profile-icon"></i>
                <img src="../../../images/arrow2.svg" alt="User Profile">
                <div class="dropdown-menu">
                    <a href="#">Profil</a>
                    <a href="#">Pengaturan</a>
                    <a href="../../../webpages/logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content of User Dashboard -->
    <section class="explore-book-content">
        <div class="title">
            <h2>Jelajahi Buku</h2>
            <form class="search-book" method="get">
                <input type="text" class="search-input" name="search-query" placeholder="Cari nama buku atau nama pengarang.." />
                <button type="submit" class="subimg">
                    <img src="../../../images/search.svg" alt="buttonpng" />
                </button>
            </form>
        </div>

        <div class="book-wrapper">
            <?php
            if (isset($_GET['search-query'])) {
                $query = mysqli_real_escape_string($con, $_GET['search-query']);
                $bookdata = "SELECT * FROM book WHERE title LIKE '%$query%' OR author LIKE '%$query%' OR publisher LIKE '%$query$'";
                $result = mysqli_query($con, $bookdata);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="book-card">
                            <div>
                                <img style="book-cover" src="../../img-store/book-images/<?php echo $row['cover']; ?>" alt="Cover buku">
                            </div>
                            <div class="book-details">
                                <div class="top">
                                    <span>
                                        <h3 class="book-title"><?php echo $row['title']; ?></h3>
                                        <table>
                                            <tr>
                                                <td class="head">Pengarang</td>
                                                <td class="content"><?php echo $row['author']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="head">Penerbit</td>
                                                <td class="content"><?php echo $row['publisher']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="head">ISBN</td>
                                                <td class="content"><?php echo $row['isbn']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="head">Sinopsis</td>
                                                <td class="content book-synopsis"><?php echo $row['description']; ?></td>
                                            </tr>
                                        </table>
                                    </span>
                                    <a href="">
                                        <img src="../../../images/Bookmark.svg" alt="">
                                    </a>
                                </div>
                                <button class="button-pinjam">Pinjam<img src="../../../images/Arrow.svg" alt=""></button>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <p>Buku tidak ditemukan!</p>
            <?php
                }
            } else {
                ?>
                <p>Cari buku yuk!</p>
                <?php
            }
            ?>
        </div>
        <!-- Buat beranda -->
        <!-- <div class="book-card">
            <div>
                <img src="../../img-store/book-images/book-1.jpg" alt="Cover buku">
            </div>
            <div class="book-details">
                <h3 class="book-title">Test</h3>
                <p class="book-author">Putri</p>
                <b>Sinopsis</b>
                <p class="book-synopsis">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium reprehenderit aut ad qui mollitia praesentium odio ipsam, perspiciatis, expedita quaerat natus inventore quia eius nisi veniam? Quos eveniet iste nobis.</p>
                <div style="display: flex; gap: 24px;">
                    <div class="issue-book">
                        <b>Tanggal Pinjam</b>
                        <div style="display: flex; gap: 8px;">
                            <img src="../../../images/calendar.svg" alt="">
                            <p>Kemaren meren</p>
                        </div>
                    </div>
                    <div class="return-book">
                        <b>Tanggal Kembali</b>
                        <div style="display: flex; gap: 8px;">
                            <img src="../../../images/calendar.svg" alt="">
                            <p>Kayanya besok tapi gatau</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="logo-description">
                <div class="logo">
                    <div class="img">
                        <img class="imgft" src="../../../images/logo.svg" alt="Logo Ruang Baca">
                    </div>
                </div>
                <div class="logo-body">
                    <p>
                        Ruang Baca hadir untuk membuka gerbang dunia penuh pengetahuan dan imajinasi. Jelajahi ribuan buku digital dengan mudah, kapanpun, dan dimanapun Anda berada. </p>
                </div>
            </div>
            <div class="categories list">
                <h4>Jelajahi</h4>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Jelajahi Buku</a></li>
                    <li><a href="#">Ruang Diskusi</a></li>
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
                    <img src="../../../images/email.svg" alt="buttonpng" />
                </button>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript for dropdown menu toggle
        const profileMenu = document.getElementById('profileMenu');
        profileMenu.addEventListener('click', () => {
            profileMenu.classList.toggle('active');
        });

        // Optional: Close the dropdown if clicked outside
        window.addEventListener('click', (e) => {
            if (!profileMenu.contains(e.target)) {
                profileMenu.classList.remove('active');
            }
        });

        // Hamburger menu functionality for smaller screens
        const hamburgerbtn = document.querySelector(".hamburger");
        const nav_list = document.querySelector(".nav-list");
        const closebtn = document.querySelector(".close");
        hamburgerbtn.addEventListener("click", () => {
            nav_list.classList.add("active");
        });
        closebtn.addEventListener("click", () => {
            nav_list.classList.remove("active");
        });
    </script>
</body>

</html>