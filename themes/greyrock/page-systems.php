<?php
/**
 * Template Name: Systems
 */
get_header(); 

    $prebanner_title = get_field('prebanner_title');
    $prebanner_content = get_field('prebanner_content');
    $prebanner_sublist = get_field('prebanner_sublist');

    $video_title = get_field('video_title');
    $video_color = get_field('video_color') ? 'color: '.get_field('video_color').';' : '';
    $video_url = esc_url(get_field('video_vimeo'));
    $video_bg = get_field('video_bg') ? 'background-image: url('.get_field('video_bg').');' : '';

    $m_class_title = get_field('m_class_title');
    $m_class_tabs = get_field('m_class_tabs');

    $p_class_title = get_field('p_class_title');
    $p_class_tabs = get_field('p_class_tabs');
?>


    <?php get_template_part('inc/banner'); ?>
    

    <?php if ($prebanner_title || $prebanner_content || $prebanner_sublist) { ?>
        <section class="section section-movable-systems" id="maincontent">
            <div class="container">
                <?php
                    if ($prebanner_title) echo "<h2 class='section-title'>$prebanner_title</h2>";

                    if ($prebanner_content) echo "<div class='section-description content'>$prebanner_content</div>";

                    if ($prebanner_sublist) {
                        echo "<ul class='movable-list'>";
                        foreach ($prebanner_sublist as $item) { ?>
                            <li>
                                <div class="movable-box">
                                    <div class="movable-img-wrap">
                                        <?php if ($item['image']) echo "<img src='{$item['image']}' alt='{$item['title']}'>"; ?>
                                    </div>
                                    <?php if ($item['title']) echo "<h3 class='movable-title'>{$item['title']}</h3>"; ?>
                                    <?php if ($item['content']) echo "<div class='content'>{$item['content']}</div>"; ?>
                                </div>
                            </li>
                <?php   }
                        echo "</ul>";
                    }
                ?>
            </div>
        </section>
    <?php } ?>
    

    <?php if ($video_title || $video_url || $video_bg) { ?>
        <section class="section-watch" style="<?= $video_bg; ?>">
            <div class="container">
                <div class="watch-wrap">
                    <?php
                        if ($video_title) echo "<h3 class='watch-title' style='$video_color'>$video_title</h3>";
                        if ($video_url) echo "<a href='$video_url' class='btn btn-only-play popup-vimeo'></a>";
                    ?>
                </div>
            </div>
        </section>
    <?php } ?>
    

    <?php if ($m_class_title || $m_class_tabs) { ?>
        <section class="section section-m-class">
            <div class="container">
                <?php
                    if ($m_class_title) echo "<h2 class='section-title'>$m_class_title</h2>";
                    if ($m_class_tabs) {
                ?>
                <div class="tab-block">
                    <ul class="tab-name-list">
                        <?php $t = 1;
                            foreach ($m_class_tabs as $tab) {
                                $tab_class = (1 === $t) ? 'active' : '';
                                echo "<li id='{$tab['tab'][0]['id']}' class='$tab_class'>{$tab['tab'][0]['title']}</li>";
                                $t++;
                            }
                        ?>
                    </ul>

                    <ul class="tab-content-list">
                        <?php $t = 1;
                            foreach ($m_class_tabs as $tab) :
                                $show_class = (1 === $t) ? 'show' : '';
                        ?>
                            <li data-tab-id="<?= $tab['tab'][0]['id']; ?>" class="<?= $show_class; ?>">

                                <?php if (2 == $tab['template']) { ?>

                                    <div class="tab-left-block">
                                        <?php if ($tab['image']) echo "<img src='{$tab['image']}' alt='{$tab['tab'][0]['title']}'>"; ?>
                                    </div>
                                    <div class="tab-right-block content">
                                        <?php echo $tab['content']; ?>
                                    </div>

                                <?php } else { ?>

                                    <div class="tab-center-block">
                                        <div class="tab-center-img-wrap">
                                            <?php if ($tab['image']) echo "<img src='{$tab['image']}' alt='{$tab['tab'][0]['title']}'>"; ?>
                                        </div>
                                        <div class="content">
                                            <?php echo $tab['content']; ?>
                                        </div>
                                    </div>

                                <?php } ?>
                                
                            </li>
                        <?php 
                            $t++; endforeach; 
                        ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>


    <?php if ($p_class_title || $p_class_tabs) { ?>
        <section class="section section-p-class">
            <div class="container">
                <?php
                    if ($p_class_title) echo "<h2 class='section-title'>$p_class_title</h2>";
                    if ($p_class_tabs) {
                ?>
                <div class="tab-block">
                    <ul class="tab-name-list">
                        <?php $t = 1;
                            foreach ($p_class_tabs as $tab) {
                                $tab_class = (1 === $t) ? 'active' : '';
                                echo "<li id='{$tab['tab'][0]['id']}' class='$tab_class'>{$tab['tab'][0]['title']}</li>";
                                $t++;
                            }
                        ?>
                    </ul>

                    <ul class="tab-content-list">
                        <?php $t = 1;
                            foreach ($p_class_tabs as $tab) :
                                $show_class = (1 === $t) ? 'show' : '';
                        ?>
                            <li data-tab-id="<?= $tab['tab'][0]['id']; ?>" class="<?= $show_class; ?>">

                                <?php if (2 == $tab['template']) { ?>

                                    <div class="tab-left-block">
                                        <?php if ($tab['image']) echo "<img src='{$tab['image']}' alt='{$tab['tab'][0]['title']}'>"; ?>
                                    </div>
                                    <div class="tab-right-block content">
                                        <?php echo $tab['content']; ?>
                                    </div>

                                <?php } else { ?>

                                    <div class="tab-center-block">
                                        <div class="tab-center-img-wrap">
                                            <?php if ($tab['image']) echo "<img src='{$tab['image']}' alt='{$tab['tab'][0]['title']}'>"; ?>
                                        </div>
                                        <div class="content">
                                            <?php echo $tab['content']; ?>
                                        </div>
                                    </div>

                                <?php } ?>
                                
                            </li>
                        <?php 
                            $t++; endforeach; 
                        ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>


<?php get_footer(); ?>