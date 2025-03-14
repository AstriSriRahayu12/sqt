<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db-connect.php';

$error = array(); // Initialize the $error array

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    error_log($email);

    if (empty($email)) {
        $error['email'] = "Email tidak boleh kosong";
    }
    if (empty($password)) {
        $error['password'] = "Kata sandi tidak boleh kosong";
    }

    if (empty($error)) {
        $emailquery = "SELECT * FROM anggota WHERE email_anggota = '$email'";
        $check_email = mysqli_query($con, $emailquery);
        $fetch = mysqli_fetch_assoc($check_email);
        $fetch_password = $fetch['pass_anggota'];
        $nama_anggota = $fetch['nama_anggota'];
        $_SESSION['name'] = $nama_anggota;

        if (mysqli_num_rows($check_email) <= 0) {
            $emailquery = "SELECT * FROM pustakawan WHERE email_pus = '$email'";
            $check_email = mysqli_query($con, $emailquery);
            $fetch = mysqli_fetch_assoc($check_email);
            $fetch_password = $fetch['pass_pus'];

            if (mysqli_num_rows($check_email) <= 0) {
                $emailquery = "SELECT * FROM pemilik WHERE email_pemilik = '$email'";
                $check_email = mysqli_query($con, $emailquery);
                $fetch = mysqli_fetch_assoc($check_email);
                $fetch_password = $fetch['pass_pemilik'];

                if (mysqli_num_rows($check_email) <= 0) {
                    $error['email'] = 'Email tidak terdaftar';
                    $_SESSION['loggedin'] = false;
                }
            }
        }

        $fetch_role = $fetch['role'];

        if (password_verify($password, $fetch_password)) {
            $_SESSION['loggedin'] = true;

            error_log($fetch_role);
            // Debugging output
            echo "Password verified.<br>";

            if ($fetch_role == 'anggota') {
                header('Location: ../panel/user/dashboard_user.php');
            } else if ($fetch_role == 'pustakawan') {
                $_SESSION['lib-name'] = true;
                header('Location: ../panel/admin/dashboard.php');
            } else if ($fetch_role == 'pemilik') {
                header('Location: ../panel/pemilik/dashboard_pemilik.php');
            }
            exit();
        } else {
            $error['password'] = 'Kata sandi tidak valid';
            $_SESSION['loggedin'] = false;
        }

    }

    // Store the errors in the session to be displayed on the login page
    $_SESSION['error'] = $error;
    header('Location: login.php'); // Redirect back to login page to show errors
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan || Form Login</title>
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

        p a[href="forgot-password.php"],
        p a[href="signup.php"] {
            color: #9B0101;
        }
    </style>
    <?php include '../loader/loader.php' ?>

    <section class="login">
        <form class="login-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <h4>Masuk</h4>
            <?php
            if (isset($_SESSION['error'])) {
                foreach ($_SESSION['error'] as $error_message) {
                    echo "<p class='error'>$error_message</p>";
                }
                unset($_SESSION['error']);
            }
            ?>

            <div class="input-form">
                <div class="input-field-email">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan email anda" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
                <div class="input-field">
                    <label for="password">Kata Sandi *</label>
                    <input type="password" maxlength="20" name="password" id="password" placeholder="Masukkan kata sandi anda" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                </div>
                <p>Lupa Password? <a href="forgot-password.php">Klik Disini</a></p>
                <input type="submit" name="login" value="Masuk">
                <p>Belum punya akun? <a href="signup.php">Daftar Disini</a></p>
            </div>
        </form>
    </section>
</body>

</html>