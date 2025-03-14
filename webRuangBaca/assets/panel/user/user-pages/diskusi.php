<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Library Management System(L.M.S) is simple Library system that is used by librarian for managing records of books and perform some operations on it.">
  <meta name="keywords" content="LMS, library management system, library software, library management" />
  <title>Ruang Diskusi | Ruang Baca</title>

  <!-- Font and Icon CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="stylesheet" href="../../css/chat.css">
</head>

<body>
  <!-- Navbar -->
  <header class="navbar">
    <div class="nav-left">
      <div class="logo">
        <img src="../../images/logo.svg" alt="Library Management System Logo">
      </div>
      <a href="dashboard_user.php">Beranda</a>
      <a href="cari-buku.php">Jelajahi Buku</a>
      <a href="diskusi.php" class="active">Ruang Diskusi</a>
    </div>
    <div class="nav-right">
      <a href="langganan.php">Coba Premium</a>
      <div class="profile" id="profileMenu">
        <i class="fa-solid fa-user profile-icon"></i>
        <img src="../../images/arrow2.svg" alt="User Profile">
        <div class="dropdown-menu">
          <a href="#">Profil</a>
          <a href="#">Pengaturan</a>
          <a href="../../webpages/logout.php">Keluar</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main-content">
    <aside class="recommendation-sidebar">
      <h2>Saran buku lain buat kamu!</h2>
      <div class="recommendation-list" id="recommendationList">
        <!-- Book recommendations will be dynamically inserted here -->
      </div>
    </aside>
    <section class="discussion">
      <h1>Ruang Diskusi</h1>
      <div class="chat-container">
        <div class="chat-box" id="chatBox">
          <!-- Chat messages will appear here -->
        </div>
        <div class="chat-input">
          <input type="text" id="chatMessage" placeholder="Tulis pesan anda...">
          <button id="sendMessage"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
      </div>
    </section>
  </main>
  
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="logo-description">
        <div class="logo">
          <div class="img">
            <img class="imgft" src="../../images/logo.svg" alt="Logo Ruang Baca">
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
          <img src="../../images/email.svg" alt="buttonpng" />
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

    // JavaScript for chat functionality
    const chatBox = document.getElementById('chatBox');
    const chatMessage = document.getElementById('chatMessage');
    const sendMessage = document.getElementById('sendMessage');

    sendMessage.addEventListener('click', () => {
      const message = chatMessage.value.trim();
      if (message) {
        const messageElement = document.createElement('div');
        messageElement.className = 'chat-message';
        messageElement.textContent = message;
        chatBox.appendChild(messageElement);
        chatMessage.value = '';
        chatBox.scrollTop = chatBox.scrollHeight; // Scroll to the bottom
      }
    });

    // Optional: Send message on Enter key press
    chatMessage.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') {
        sendMessage.click();
      }
    });

    // Fetch random book recommendations from the database
    document.addEventListener('DOMContentLoaded', () => {
      fetch('../fetch_random_recommendations.php')
        .then(response => response.json())
        .then(data => {
          const recommendationList = document.getElementById('recommendationList');
          data.forEach(book => {
            const bookItem = document.createElement('div');
            bookItem.className = 'book-item';
            bookItem.innerHTML = `
              <img src="${book.image}" alt="${book.title}">
              <div class="book-info">
                <h3>${book.title}</h3>
                <p>${book.author}</p>
              </div>
            `;
            recommendationList.appendChild(bookItem);
          });
        });
    });
  </script>
</body>
</html>
