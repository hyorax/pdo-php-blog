<?php require('./connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/style.css">
    <title>Login</title>
</head>
<?php
if (isset($_POST['submit'])) {
    $username = @$_POST['userInput'];
    $password = @$_POST['passwordInput'];
    if (!empty($_POST['userInput']) && !empty($_POST['passwordInput'])) {

        $queryLogin = $db->query('Select * FROM postuser where user_username = "' . $username . '"')->fetch(PDO::FETCH_ASSOC);
        if ($queryLogin) {
            if ($password === $queryLogin['user_password']) {
                
                session_start();
                $_SESSION['username'] = $queryLogin['user_username'];
                $_SESSION['password'] = $queryLogin['user_password'];
                $_SESSION['id'] = $queryLogin['user_id'];
                header("Location: ./home.php");
            } else {
                header("Location: ./login.php?hata=2");
            }
        } else {
            header("Location: ./login.php?hata=2");
        }
    } else {
        header("Location: ./login.php?hata=1");
    }
}


?>

<body>
    <div class="sectionDiv">
        <div class="sectionPost sectionLoginPost">
            <a class="sectionLink" href="">
                <div class="sectionAbout">
                    <h1>Admin Panel Giriş</h1>
                </div>
            </a>
            <hr>
            <form method="POST" action="login.php">
                <?php if (isset($_GET['hata'])) {
                    $hata = $_GET['hata'];
                    if ($hata == 1) {
                ?>
                        <p>Kullanıcı adı ve parola boş bırakılmaz.</p>
                    <?php
                    } elseif ($hata == 2) {
                    ?>
                        <p>Kullanıcı adı veya parola yanlış.</p>
                <?php
                    }
                } ?>
                <input name="userInput" placeholder="Kullanıcı Adı" type="text">
                <input name="passwordInput" placeholder="Parola" type="password">
                <input name="submit" type="submit" value="GİRİŞ YAP">
                <p>ana sayfaya dönmek için <a href="home.php">tıklayın</a></p>
            </form>

        </div>
    </div>

</body>

</html>