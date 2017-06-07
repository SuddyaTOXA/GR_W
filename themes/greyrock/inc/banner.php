<?php 
    $title = get_field('banner_heading');
    $content = get_field('banner_content');
    $anchors = get_field('anchors');
    $color = get_field('banner_color') ? get_field('banner_color') : '';
    if ($url = esc_url(get_field('banner_btn_link'))) {
        $btn_label = get_field('banner_btn_label') ? get_field('banner_btn_label') : 'Find out more';
    }
    $bg_img = get_field('banner_bg') ? 'background-image: url('.get_field('banner_bg').');' : '';
?>

<section class="section-page-banner" style="<?= $bg_img; ?>">
    <div class="container">
        <div class="banner-wrap">
            <?php
                if ($title) echo "<h2 class='banner-page-title' style='$color'>$title</h2>";
                if ($content) echo "<div class='content' style='$color'>$content</div>";
                if ($anchors) {
                    echo "<div class='banner-list-wrap'>
                            <ul class='banner-list'>";
                            foreach ($anchors as $anchor) {
                                echo "<li><a href='{$anchor['url']}' class='banner-link smooth-scroll' style='$color'>{$anchor['label']}</a></li>";
                            }
                    echo   "</ul>
                        </div>";
                }
                if ($url) echo "<a href='$url' class='btn btn-more'>$btn_label</a>"; 
            ?>
        </div>
    </div>
</section>
