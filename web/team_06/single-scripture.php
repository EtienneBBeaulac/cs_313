<div class="">
    <span class=""><?php echo $s['book'] ?></span>
    <span class=""><?php echo $s['chapter'] ?></span>
    <span class=""><?php echo $s['verse'] ?></span>
    <span class=""><?php echo $s['content'] ?></span>
    <?php
    foreach ($s['name'] as $topic) {
        echo "<span class=''>" . $topic . "</span>";
    }
    ?>
</div>