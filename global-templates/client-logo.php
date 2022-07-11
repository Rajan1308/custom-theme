<?php
/**
 * Hero setup
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$pageID = get_the_ID();
$clients_logo = get_field('clients_logo', 'options');
?>
<!-- Start Available Seciton -->
<?php if($clients_logo):?>
<div class="sec-logo-box" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-offer">
    <div class="box " >
        <div class="owl-carousel">
          <?php foreach($clients_logo as $logos):?>
            <div class="item">
                <a href="<?= $logos['clients_logo_link'] ?>"><img src="<?= $logos['clients_logo_logo']['url'] ?>" alt="<?= $logos['alt'] ?>"></a>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php endif; ?>
        