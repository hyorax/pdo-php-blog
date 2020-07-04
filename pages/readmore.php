<?php require('./header.php');
require('./connection.php');
/* 
Sayfalama+,
Admin,+
footer,+
Doldurulacak,
----
Github,
Link
*/
?>
<div class="sectionDiv">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $getQuery = $db->query('Select * FROM postblog where post_id = ' . $id . '')->fetch(PDO::FETCH_ASSOC);
        if ($getQuery) {
    ?>
            <div class="sectionPost">
                <img src="<?php echo $getQuery['post_photo'] ?>" alt="sdafas">
                <a class="sectionLink" href="">
                    <div class="sectionAbout">
                        <h1><?php echo $getQuery['post_title'] ?></h1>
                    </div>
                </a>
                <!-- buraya limit lazım > -->
                <p><?php echo $getQuery['post_text'] ?></p>
                <pre><?php echo $getQuery['post_date'] ?></pre>
            </div>
    <?php
        }
    }
    ?>

</div>
<?php require('./footer.php') ?>