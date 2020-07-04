<?php
require('./connection.php');
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/style.css">
    <title>sametpalitci & developer</title>
</head>

<body>
    <header>
        <div class="headerDiv">
            <div class="headerImage">
                <a href="http://localhost/blog/">
                <?php 
                        $headerQuery = $db->query('SELECT * FROM postgenel')->fetch(PDO::FETCH_ASSOC);
                        if ($headerQuery) {
                            ?>
                            <img src="<?php echo $headerQuery['genel_resim']; ?>" />
                            <p><?php echo $headerQuery['genel_adi']; ?></p>
                            <pre><?php echo $headerQuery['genel_aciklama']; ?> <a href="https://github.com/hyorax">github</a> ❤️.</pre>
                            <?php
                        }
                    ?>
                </a>
                
            </div>
            <div class="headerRanking">
                <a href="http://localhost/blog/pages/home.php">ANA SAYFA</a>
                <?php if ($_SESSION) {
                ?>
                    <a href="http://localhost/blog/pages/yaziekle.php">YAZİ EKLE</a>
                    <a href="http://localhost/blog/pages/genelayar.php">GENEL & HAKKIMDA & İLETİŞİM DUZENLE</a>
                <?php
                } else {
                ?>
                    <a href="http://localhost/blog/pages/home.php">BLOG</a>
                <a href="http://localhost/blog/pages/aboutme.php">HAKKIMDA</a>
                <a href="http://localhost/blog/pages/contact.php">ILETISIM</a>
                <?php
                } ?>
            </div>
        </div>
    </header>