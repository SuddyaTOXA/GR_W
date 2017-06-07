<?php get_header(); ?>

    <section class="section-banner-slider">

        <div class="swiper-container gallery-top">

            <?php if ( $slider = get_field('slider') ) : ?>
                <div class="swiper-wrapper video-slider">

                    <?php $s = 1;
                        foreach ( $slider as $slide ) { ?>
                        <div class="swiper-slide">
                            <?php if ($slide['video']) { ?>
                                <video class="slider-video" width="100%" preload="auto" muted="muted" poster="" loop="" <?php if (1 === $s) echo 'autoplay="true"'; ?> style="visibility: visible; width: 100%;">
                                    <?php
                                        if ($slide['video'][0]['mp4']) echo '<source src="'.$slide['video'][0]['mp4']['url'].'" type="video/mp4">';
                                        if ($slide['video'][0]['webm']) echo '<source src="'.$slide['video'][0]['webm']['url'].'" type="video/webm">';
                                    ?>
                                </video>
                            <?php } ?>

                            <?php if ($slide['vimeo']) {
                                echo '<div class="vimeo-block" id="vimeo-'.$slide['vimeo'].'" data-vimeo-id="'.$slide['vimeo'].'" data-vimeo-title="false" data-vimeo-byline="false"></div>';
                            } ?>
                            
                            <div class="container">
                                <div class="container-wrap">
                                    <div class="container-info">
                                        <?php 
                                            if ($slide['title']) {
                                                $title_color = ($slide['color'] != '#40464b') ? 'color: '.$slide['color'].';' : '';
                                                echo '<h2 class="banner-title" style="'.$title_color.'">'.$slide['title'].'</h2>';
                                            }

                                            if ($slide['video']) {
                                                $btn_label = $slide['button'] ? $slide['button'] : 'Watch our video';
                                                echo '<a href="#" class="btn btn-play play-vimeo">'.$btn_label.'</a>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $s++; } ?>

                </div>
            <?php endif; ?>

        </div>


        <? /*
        <?php if ( $boxes = get_field('boxes') ) : ?>
            <div class="gallery-thumbs">
                <ul class="gallery-thumbs-list">

                    <?php foreach ($boxes as $box) { ?>
                        <li>
                            <div class="zoom" style="<?php if ($box['image']) echo "background-image:url({$box['image']});"; ?>"></div>
                            <div class="thumbs-container">
                                <?php
                                    if ($box['title']) echo "<span class='thumbs-watch'>{$box['title']}</span>";
                                    if ($box['subtitle']) echo "<h3 class='thumbs-title'>{$box['subtitle']}</h3>";
                                    if ($box['link']) echo "<a href='{$box['link']}' class='btn btn-only-play'></a>";
                                ?>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        <?php endif; ?>
        */?>

    </section>

    <?php if ( $boxes = get_field('boxes') ) : ?>
        <section class="section section-watch-block">
            <div class="container">
                <ul class="watch-block-list">
                     <?php foreach ($boxes as $box) { ?>
                        <li>
                            <div class="watch-block">
                                <?php if ($box['title']) echo "<div class='watch-title-wrap'><h3 class='watch-block-title'>{$box['title']}</h3></div>"; ?>
                                <span class='watch-block-bg' style="<?php if ($box['image']) echo "background-image:url({$box['image']});"; ?>"></span>
                                <?php
                                    if ($box['choose']) {
                                        if ($box['button']) echo "<a href='{$box['video'][0]['webm']['url']}' class='btn popup-vimeo'>{$box['button']}</a>";
                                    } else {
                                        if ($box['button']) echo "<a href='{$box['link']}' class='btn'>{$box['button']}</a>";
                                    }
                                ?>
                            </div>
                        </li>
                     <?php } ?>
<!--                    <li>-->
<!--                        <div class="watch-block">-->
<!--                            <div class="watch-title-wrap">-->
<!--                                <h3 class="watch-block-title">Direct Fuel Production™ - <br>How It Works</h3>-->
<!--                            </div>-->
<!--                            <span class="watch-block-bg" style="background-image: url(img/watch_bg_2.png)"></span>-->
<!--                            <a  href="video/What_is_Greyrock_HD.webm" class="btn popup-vimeo">Watch Video</a>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <div class="watch-block">-->
<!--                            <div class="watch-title-wrap">-->
<!--                                <h3 class="watch-block-title">Local Midstream, Marketing and Sales Affiliate</h3>-->
<!--                            </div>-->
<!--                            <span class="watch-block-bg" style="background-image: url(img/watch_bg_3.png)"></span>-->
<!--                            <a href="#" class="btn">Coming Soon</a>-->
<!--                        </div>-->
<!--                    </li>-->
                </ul>
            </div>
        </section>
    <?php endif; ?>

<?php get_footer(); ?>