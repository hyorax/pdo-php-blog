<?php
require('./header.php');
require('./connection.php');


if (isset($_GET['sil'])) {
    echo $sil;
    $query = $db->prepare("DELETE FROM postblog WHERE post_id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['sil']
    ));
    if ($delete) {
        header("Location: http://localhost/blog/");
    }
}
if (isset($_GET['onecikar'])) {
    $onecikar = $_GET['onecikar'];
    $pin = $_GET['pin'];
    echo $_GET['pin'];
    if ($pin == 1) {
        $queryUpdate = $db->prepare('UPDATE postblog SET 
        post_pin = :yeni_pin WHERE 
        post_id ="' . $onecikar . '" ');
        $update = $queryUpdate->execute(array(
            "yeni_pin" => 0
        ));
        if ($update) {
            header("Location: http://localhost/blog/");
        }
    } else {
        $queryUpdate = $db->prepare('UPDATE postblog SET 
        post_pin = :yeni_pin WHERE 
        post_id ="' . $onecikar . '" ');
        $update = $queryUpdate->execute(array(
            "yeni_pin" => 1
        ));
        if ($update) {
            header("Location: http://localhost/blog/");
        }
    }
}
?>

<section>
    <div class="sectionDiv">
        <?php
        if (!isset($_GET['page']) || $_GET['page'] == 1) {
            $queryPin = $db->query('Select * from postblog where post_pin = 1')->fetch(PDO::FETCH_ASSOC);
            if ($queryPin) {
        ?>
                <div class="sectionPost">
                    <a class="sectionLink" href="readmore.php?id=<?php echo $queryPin['post_id'] ?>">
                        <div class="sectionPinPost">
                            <p>Başa tuturulan gönderi 📌</p>
                        </div>
                        <div class="sectionBackground" style="background-image: url(<?php echo $queryPin['post_photo']; ?>)">
                            <h1><?php echo $queryPin['post_title'] ?></h1>
                        </div>
                    </a>
                    <p><?php echo substr_replace($queryPin['post_text'], "...", 150);  ?></p>
                    <pre><?php echo $queryPin['post_date'];  ?></pre>
                    <a class="sectionLearnMore" href="readmore.php?id=<?php echo $queryPin['post_id'] ?>">DEVAMINI OKU</a>
                    <?php if ($_SESSION) { ?>
                    <span>
                        <a href="yaziduzen.php?id=<?php echo $queryPin['post_id'] ?>">DÜZENLE</a>
                        <a href="home.php?sil=<?php echo $queryPin['post_id']; ?>">SİL</a>
                        <a href="home.php?onecikar=<?php echo $queryPin['post_id']; ?>&pin=<?php echo $queryPin['post_pin'] ?>">
                            <?php if ($queryPin['post_pin'] == 1) {
                            ?>
                                ÖNE ÇIKARMA
                            <?php
                            } else {
                            ?>
                                ÖNE ÇIKAR
                            <?php
                            } ?>
                        </a>
                    </span>
                        <?php }?>
                </div>
        <?php
            }
        }
        ?>
        <?php
        $limit = 3;
        $queryLimit = $db->query('Select * from postblog');
        $row_count = $queryLimit->rowCount();
        $total_pages = ceil($row_count / $limit);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $starting_limit = ($page - 1) * $limit;
        $query = $db->query("Select * FROM postblog where post_pin = 0 ORDER BY post_id DESC limit  3 OFFSET " . $starting_limit . "", PDO::FETCH_ASSOC);

        if ($query->rowCount()) {
            $query->execute([$starting_limit, $limit]);
            foreach ($query as $row) {
        ?>
                <div class="sectionPost">

                    <a class="sectionLink" href="readmore.php?id=<?php echo $row['post_id'] ?>">
                        <div class="sectionBackground" style="background-image: url(<?php echo $row['post_photo']; ?>)">
                            <h1><?php echo $row['post_title'] ?></h1>
                        </div>
                    </a>
                    <p><?php echo substr_replace($row['post_text'], "...", 150);  ?></p>
                    <pre><?php echo $row['post_date'];  ?></pre>
                    <a class="sectionLearnMore" href="readmore.php?id=<?php echo $row['post_id'] ?>">DEVAMINI OKU</a>
                    <?php if ($_SESSION) { ?>
                    <span>
                        <a href="yaziduzen.php?id=<?php echo $row['post_id'] ?>">DÜZENLE</a>
                        <a href="home.php?sil=<?php echo $row['post_id']; ?>">SİL</a>
                        <a href="home.php?onecikar=<?php echo $row['post_id']; ?>&pin=<?php echo $row['post_pin'] ?>">ÖNE ÇIKAR</a>
                    </span>
                    <?php }?>
                </div>
        <?php
            }
        }
        ?>

        <div class="sectionPagination">
            <div class="sectionPaginationList">
                <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
                    <a href="<?php echo "?page=$page"; ?>"><?php echo $page; ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>
<?php require('./footer.php') ?>