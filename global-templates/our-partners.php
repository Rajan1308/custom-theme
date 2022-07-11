<?php
/**
 * Hero setup
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$pageID = get_the_ID();
$our_partners_heading = get_field('our_partners_heading', 'options');
$our_partners_partcontent = get_field('our_partners_partcontent', 'options');

$our_partners = get_field('our_partners', 'options');
?>
<div class="title text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
    <h2><?= $our_partners_heading ?></h2>
    <p><?= $our_partners_partcontent ?></p>
</div>
<?php if($our_partners): ?>
<div class="partners-slider" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom">
    <div class="owl-carousel">
    <?php foreach($our_partners as $logos):?>
      <div class="item">
          <a href="<?= $logos['our_partners_link'] ?>"><img src="<?= $logos['our_partners_logo']['url'] ?>" alt="<?= $logos['alt'] ?>"></a>
      </div>
      <?php endforeach;?>
    </div>
</div>
<?php endif; ?>