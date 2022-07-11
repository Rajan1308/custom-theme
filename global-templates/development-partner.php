<?php
/**
 * Hero setup
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$pageID = get_the_ID();
$background_image = get_field('background_image', 'options');
$interested_cta_logo = get_field('interested_cta_logo', 'options');
$interested_cta_content = get_field('interested_cta_content', 'options');
$interested_cta_cta = get_field('interested_cta_cta', 'options');

?>
<!-- Start Interested  Section -->
<section class="section sec-interested" style="background-image: url(<?= $background_image['url'] ?>)">
    <div class="top-circle circle"><img src="<?= get_template_directory_uri();?>/ui/images/cirecle1.png" alt="image"></div>
    <div class="bottom-circle circle"><img src="<?= get_template_directory_uri();?>/ui/images/circle2.png " alt="image"></div>
    <div class="container" >
        <div class="text-center" data-aos="fade-up" data-aos-offset="300" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor="footer">
            <img src="<?= $interested_cta_logo['url']?>" class="img-fluid" alt="image">
            <h2><?= $interested_cta_content ?></h2>
            <?php if($interested_cta_cta):?>
            <div class="links">
              <?php foreach($interested_cta_cta as $ctsButton):?>
                <a href="<?= $ctsButton['button_link']?>" class="btn <?php if($ctsButton['button_color']=='btn-info'):?>btn-info<?php elseif($ctsButton['button_color']=='btn-light'):?>btn-light<?php else:?>btn-info<?php endif; ?>"><?= $ctsButton['button_label']?></a>
                <?php endforeach; ?>
                
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>