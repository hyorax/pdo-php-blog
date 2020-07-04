<?php
require('./connection.php');
require('./header.php');
if ($_SESSION) {
?>
    <?php
    if (isset($_POST['genelSubmit'])) {
        $hakkimdaInput = @$_POST['hakkimdaInput'];
        $iletisimInput = @$_POST['iletisimInput'];
        $resimInput = @$_POST['resimInput'];
        $aciklamaInput = @$_POST['aciklamaInput'];
        if (!empty($hakkimdaInput) && !empty($hakkimdaInput) && !empty($hakkimdaInput) && !empty($hakkimdaInput)) {
            $queryUpdate = $db->prepare('UPDATE postgenel SET 
            genel_hakkimda = :yeni_hakkimda, 
            genel_iletisim = :yeni_iletisim,
            genel_aciklama = :yeni_aciklama,
            genel_resim = :yeni_resim
             WHERE 
            genel_id ="1" ');
            $update = $queryUpdate->execute(array(
                "yeni_hakkimda" => $_POST['hakkimdaInput'],
                "yeni_iletisim" => $_POST['iletisimInput'],
                "yeni_aciklama" => $_POST['aciklamaInput'],
                "yeni_resim" => $_POST['resimInput']
            ));
            if ($update) {
                header("Location: ./home.php");
            }
        } else {
            header("Location: ./genelayar.php?hata=1");
        }
    }

    ?>
    <div class="sectionDiv">
        <div class="sectionPost sectionAddPost sectionGenel">

            <?php
            $queryGenel = $db->query('SELECT * FROM postgenel')->fetch(PDO::FETCH_ASSOC);
            if ($queryGenel) {
            ?>

                <form method="POST" action="">
                    <?php
                    if (isset($_GET['hata'])) {
                        $hata = $_GET['hata'];
                        if ($hata == 1) {
                    ?>
                            <p>Boş bırakmayın.</p>
                    <?php
                        }
                    } ?>
                    <p>Hakkımda</p>
                    <!--<input class="sectionTextInput" name="textInput" placeholder="Yazı" type="text">-->
                    <textarea name="hakkimdaInput" placeholder="Metini girin"><?php echo $queryGenel['genel_hakkimda'] ?></textarea>
                    <p>İletişim</p>
                    <textarea name="iletisimInput" placeholder="Metini girin"><?php echo $queryGenel['genel_iletisim'] ?></textarea>
                    <p>Resim</p>
                    <input name="resimInput" placeholder="Metini girin" type="text" value="<?php echo $queryGenel['genel_resim'] ?>">
                    <p>Açıklama</p>
                    <input name="aciklamaInput" placeholder="Metini girin" type="text" value="<?php echo $queryGenel['genel_aciklama'] ?>">
                    <input name="genelSubmit" type="submit" value="KAYDET">
                </form>
            <?php
            }
            ?>


        </div>
    </div>
<?php } else {
    header("Location: ./home.php");
}  ?>