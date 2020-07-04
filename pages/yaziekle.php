<?php
require('./connection.php');
require('./header.php');
if($_SESSION){
?>

<?php
if (isset($_POST['yaziSubmit'])) {
    $titleInput = @$_POST['titleInput'];
    $textInput = @$_POST['textInput'];
    $resimInput = @$_POST['resimInput'];
    if (!empty($titleInput) && !empty($textInput) && !empty($resimInput)) {
        $query = $db->prepare("INSERT INTO postblog SET
        post_title = ?,
        post_text = ?,
        post_photo = ?,
        post_pin=?");
        $insert = $query->execute(array(
            $titleInput, $textInput, $resimInput, 0 
        ));
        if ($insert) {
            $last_id = $db->lastInsertId();
            print "insert işlemi başarılı!";
        } else {
            echo "insert olmadı";
        }
    } else {
        header("Location: http://localhost/blog/pages/yaziekle.php?hata=1");
    }
}
?>
<div class="sectionDiv">
    <div class="sectionPost sectionAddPost">
        <form method="POST" action="yaziekle.php">

            <input name="titleInput" placeholder="Başlık" type="text">
            <!--<input class="sectionTextInput" name="textInput" placeholder="Yazı" type="text">-->
            <textarea name="textInput" placeholder="Metini girin"></textarea>
            <input name="resimInput" placeholder="resim" type="text">
            <input name="yaziSubmit" type="submit" value="OLUŞTUR">
            <?php
            if (isset($_GET['hata'])) {
                $hata = $_GET['hata'];
                if ($hata == 1) {
            ?>
                    <p>Boş bırakmayın.</p>
            <?php
                }
            }
            ?>
        </form>

    </div>
</div>
<?php } else {
     header("Location: http://localhost/blog/");
}  ?>