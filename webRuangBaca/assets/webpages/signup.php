<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db-connect.php';

if (isset($_POST['register'])) {
    $nama = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    // $telp = mysqli_real_escape_string($con, $_POST['mobile']);
    $error = [];

    // Check if email already exists in the anggota table
    $emailquery = "SELECT * FROM pemilik WHERE email_pemilik='$email'";
    $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
        $error['lib-msg'] = 'Email sudah ada';
    } else {
        if ($nama == "") {
            $error['nama'] = "Nama tidak boleh kosong";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error['nama'] = "Hanya diperbolehkan huruf dan spasi";
        }
        if ($password == "") {
            $error['password'] = "Password tidak boleh kosong";
        } else if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $password)) {
            $error['password'] = "Password harus minimal 8 karakter dan hanya mengandung huruf dan angka";
        }
        if ($email == "") {
            $error['email'] = "Email tidak boleh kosong";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Masukkan alamat email yang valid";
        }
        // if ($telp == "") {
        //     $error['no_telp'] = "Nomor telepon tidak boleh kosong";
        // } else if (!preg_match("/^[0-9]{10,12}$/", $telp)) {
        //     $error['no_telp'] = "Masukkan nomor telepon yang valid (10-12 digit)";
        // }

        if (empty($error)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'pemilik'; // Set role as 'anggota'
            $insertquery = "INSERT INTO pemilik (nama_pemilik, pass_pemilik, email_pemilik, role) VALUES ('$nama', '$hashed_password', '$email', '$role')";
            
            $query = mysqli_query($con, $insertquery);

            if ($query) {
                $success_msg = "Anda telah berhasil mendaftar. Silakan login dengan akun Anda.";
                ?>
                <script>
                    setTimeout(() => {
                        location.replace("login.php");
                    }, 2000);
                </script>
                <?php
            } else {
                // Debugging
                echo "Error: " . mysqli_error($con);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan || Form Pendaftaran</title>
    <link rel="stylesheet" href="../css/index.css">
    <!--- google font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>

<body onload="preloader()">
    <style>
        .input-field .error {
            color: #FF3333;
            font-size: 14px;
        }
    </style>
    <?php include '../loader/loader.php' ?>

    <section class="registration">
        <div class="registration-form">
            <h4>Daftar</h4>
            <p>Silakan isi data berikut dengan sebaik baiknya!</p>
            <form class="input-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <?php
                if (isset($success_msg)) {
                    echo "<p class='success'>$success_msg</p>";
                }
                if (isset($error['lib-msg'])) {
                    echo "<p class='error'>{$error['lib-msg']}</p>";
                }
                ?>
                <div class="input-field">
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" name="name" id="name" placeholder="Nama Anda" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    <?php
                    if (isset($error['nama'])) {
                        echo "<p class='error'>{$error['nama']}</p>";
                    }
                    ?>
                </div>
                <div class="input-field">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" placeholder="Email Anda" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    <?php
                    if (isset($error['email'])) {
                        echo "<p class='error'>{$error['email']}</p>";
                    }
                    ?>
                </div>
                <div class="input-field">
                    <label for="password">Password *</label>
                    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                    <?php
                    if (isset($error['password'])) {
                        echo "<p class='error'>{$error['password']}</p>";
                    }
                    ?>
                </div>
                <div class="input-field">
                    <label for="mobile">Nomor Telepon *</label>
                    <input type="text" maxlength="12" name="mobile" id="mobile" placeholder="Nomor Telepon" value="<?php echo isset($_POST['mobile']) ? htmlspecialchars($_POST['mobile']) : ''; ?>">
                    <?php
                    if (isset($error['no_telp'])) {
                        echo "<p class='error'>{$error['no_telp']}</p>";
                    }   
                    ?>
                </div>
                <input type="submit" name="register" id="signup" value="Daftar">
                <p>Sudah punya akun? <a href="login.php">Masuk sekarang</a></p>
            </form>
        </div>
    </section>
</body>

</html>
