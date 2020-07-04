<?php
require('./connection.php');
require('./header.php');
if ($_SESSION) {
?>

    <?php
    if (isset($_POST['yaziSubmit'])) {
        $titleInput = @$_POST['titleInput'];
        $textInput = @$_POST['textInput'];
        $resimInput = @$_POST['resimInput'];
        $id = $_GET['id'];
        if (!empty($titleInput) && !empty($textInput) && !empty($resimInput)) {
            $queryUpdate = $db->prepare('UPDATE postblog SET 
            post_text = :yeni_text, 
            post_title = :yeni_title,
            post_photo = :yeni_photo
             WHERE 
            post_id ="' . $id . '" ');
            $update = $queryUpdate->execute(array(
                "yeni_text" => $_POST['textInput'],
                "yeni_title" => $_POST['titleInput'],
                "yeni_photo" => $_POST['resimInput']
            ));
            if ($update) {
                header("Location: ./home.php");
            }
        } else {
            header("Location: ./yaziekle.php?hata=1");
        }
    }
    ?>
    <div class="sectionDiv">
        <div class="sectionPost sectionAddPost">
            <form method="POST" action="">
                <?php
                if (isset($_GET['id'])) {
                    # code...
                    $id = $_GET['id'];
                    $queryDuzen = $db->query('SELECT * from postblog where post_id = ' . $id . '')->fetch(PDO::FETCH_ASSOC);
                    if ($queryDuzen) {
                ?>
                        <input maxlength="250" name="titleInput" placeholder="Başlık" type="text" value="<?php echo $queryDuzen['post_title']; ?>">
                        <!--<input class="sectionTextInput" name="textInput" placeholder="Yazı" type="text">-->
                        <textarea maxlength="1500" name="textInput" placeholder="Metini girin"><?php echo $queryDuzen['post_text'] ?></textarea>
                        <input maxlength="500" name="resimInput" placeholder="resim" type="text" value="<?php echo $queryDuzen['post_photo'] ?>">
                        <input name="yaziSubmit" type="submit" value="KAYDET">
                        <?php
                        if (isset($_GET['hata'])) {
                            $hata = $_GET['hata'];
                            if ($hata == 1) {
                        ?>
                                <p>Boş bırakmayın.</p>
                        <?php
                            }
                        } ?>

                    <?php
                    }
                    ?>

                <?php } ?>
            </form>

        </div>
    </div>
<?php } else {
    header("Location: ./home.php");
}  ?>