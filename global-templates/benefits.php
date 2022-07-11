<?php
/**
 * Hero setup
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$pageID = get_the_ID();
$heading = get_field('heading', 'options');
$sub_heading = get_field('sub_heading', 'options');
$content_block = get_field('content_block', 'options');
$featured_block = get_field('featured_block', 'options');

?>
<!-- Start Available Seciton -->
<div class="title text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-benefits">
      <h2><?= $heading ?></h2>
      <h4><?= $sub_heading ?></h4>
      <?php echo $content_block; ?>
  </div>
  <div class="row">
    <?php foreach($featured_block as $fblock):?>
      <div class="col-lg-3 col-md-6 col-12" data-aos="fade-in" data-aos-offset="300" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" data-aos-anchor=".sec-benefits">
          <div class="box">
              <?php if($fblock['featured_block_icon']):?><img src="<?=$fblock['featured_block_icon']['url']?>" alt="<?=$fblock['featured_block_icon']['alt']?>"><?php endif; ?>
              <h3><?=$fblock['featured_block_title'] ?></h3>
              <p><?=$fblock['featured_block_content'] ?></p>
          </div>
      </div>
      <?php endforeach; ?>
  </div>