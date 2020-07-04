<?php require('./header.php') ?>

<div class="sectionDiv">
    <div class="sectionPost">
    <a class="sectionLink" href="">
                    <div class="sectionAbout">
                        <h1>İletişim</h1>
                    </div>
                </a>
                <hr>
        <!-- buraya limit lazım > -->
    <?php
    $aboutQuery = $db->query('SELECT * FROM postgenel')->fetch(PDO::FETCH_ASSOC); 
    if ($aboutQuery) {
        ?>
            <p><?php echo $aboutQuery['genel_iletisim'] ?></p>
        <?php
    } 
    ?>
        
    </div>
</div>