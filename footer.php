<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package beco
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$footer_quick_links = get_field('footer_quick_links', 'options');
$pageID = get_the_ID();
$popup_display = get_field('popup_display', 'options');
$register_to_popup_popup_content = get_field('register_to_popup_popup_content', 'options');
$register_to_popup_button_label = get_field('register_to_popup_button_label', 'options');
$register_to_popup_button_link = get_field('register_to_popup_button_link', 'options');



?>


<!-- Start Footer -->
<footer>
	<div class="container">
			<div class="row">
					<div class="col-lg-3 col-12">
						<?php if(get_field('footer_logo', 'options')):?>
							<div class="logo">
									<img src="<?= get_field('footer_logo', 'options')['url']?>" alt="logo">
							</div>
							<?php endif;  if(get_field('footer_address', 'options')): ?>
							<div class="links">
								<?= get_field('footer_address', 'options')?>
							</div>
							<?php endif; ?>
							<div class="follow">
									<span><?php _e('Follow us:', 'beco');?></span>
									<?php if(get_field('arc_options_fb', 'options')):?><a href="<?= get_field('arc_options_fb', 'options')['url']?>"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
									<?php if(get_field('arc_options_ft', 'options')):?><a href="<?= get_field('arc_options_ft', 'options')['url']?>"><i class="fab fa-twitter"></i></a><?php endif; ?>
									<?php if(get_field('arc_options_insta', 'options')):?><a href="<?= get_field('arc_options_insta', 'options')['url']?>"><i class="fab fa-instagram"></i></a><?php endif; ?>
									<?php if(get_field('arc_options_youtube', 'options')):?><a href="<?= get_field('arc_options_youtube', 'options')['url']?>"><i class="fab fa-youtube"></i></a><?php endif; ?>
									<?php if(get_field('arc_options_linkedIN', 'options')):?><a href="<?= get_field('arc_options_linkedIN', 'options')['url']?>"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
							</div>
					</div>
					<div class="col-lg-5 col-md-7 col-12">
							<h3><?php _e('Quick Links', 'beco');?></h3>
							<div class="row">
								<?php if($footer_quick_links):
									$first_column = $footer_quick_links['footer_quick_link'];	
									$second_column = $footer_quick_links['footer_quick_second_link'];
									if($first_column):	
								?>
									<div class="col-6">
											<ul class="list-unstyled">
												<?php foreach($first_column as $firstColumnData):?>
													<li><a href="<?= $firstColumnData['footer_quick_link'];?>"><?= $firstColumnData['footer_quick_label'];?></a></li>
													<?php endforeach; ?>
											</ul> 
									</div>
									<?php endif;  	if($second_column): ?>
									<div class="col-6">
											<ul class="list-unstyled">
											<?php foreach($second_column as $secondColumnData):?>
													<li><a href="<?= $secondColumnData['footer_quick_second_link'];?>"><?= $secondColumnData['footer_quick_second_label'];?></a></li>
													<?php endforeach; ?>
											</ul>   
									</div>
									<?php endif; endif; ?>

							</div>
					</div>
					<?php if(get_field('subscribe_newsletter', 'options')):?>
					<div class="col-lg-4 col-md-5 col-12">
							<h3><?php _e('Subscribe Newsletter', 'beco');?></h3>
							<div class="form-content">
									<?=  do_shortcode(get_field('subscribe_newsletter', 'options')); ?>
							</div>
					</div>
					<?php endif; ?>
			</div>
	</div>
	<?php if(get_field('liv_options_footer_copyrigt', 'options')):?>
	<div class="footer-bottom">
			<p><?= get_field('liv_options_footer_copyrigt', 'options')?></p>
	</div>
	<?php endif; ?>
</footer>
<!-- Register Modal -->
<div class="modal fade register-modal" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-body">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<div class="register-body">
							<h3>Register For <span>Free</span></h3>
							<?php echo do_shortcode( '[contact-form-7 id="170" title="Register For Free"]' ); ?>
					</div>
			</div>
	</div>
	</div>
</div>

<!-- Cost Modal -->
<div class="modal fade cost-modal" id="costModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
				<div class="modal-body">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="cost-body">
								
								<div class="row">
										<div class="col-md-9 col-12 left-side">
												<h3><?php _e('Find Out The Approximate Cost  Of Delivery Of Your Shipments', 'beco');?></h3>
												<?php echo do_shortcode('[contact-form-7 id="171" title="Find out the approximate cost"]');?>
										</div>
										<div class="col-md-3 col-12 right-side">
												<img src="<?= get_stylesheet_directory_uri() ?>/ui/images/modal-img1.png" class="img-fluid" alt="image">
										</div>
								</div>
						</div>
				</div>
		</div>
		</div>
</div>
<!-- Register To Modal -->
<?php if(is_front_page() && $popup_display == true):?>
<div class="modal fade registerto-modal" id="registertoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
				<div class="modal-body">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="content">
								<h3><?php _e('Register to', 'beco');?> </h3>
								<div class="circle">
										<span><img src="<?= get_stylesheet_directory_uri() ?>/ui/images/modal-img2.png" alt=""></span>
										<span><?php _e('Claim Your Coupon', 'beco');?></span>
								</div>
								<p><?= $register_to_popup_popup_content ?></p>
								<?php if($register_to_popup_button_link && $register_to_popup_button_label !==''): ?><a href="<?= $register_to_popup_button_link ?>" class="btn btn-light"><?= $register_to_popup_button_label ?></a><?php endif; ?>
						</div>
				</div>
		</div>
		</div>
</div>
<?php endif; ?>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<?php if(is_front_page() || is_home()): ?>
	<script>
		// Register 
		var myModal = new bootstrap.Modal(document.getElementById("registertoModal"), {});
        document.onreadystatechange = function () {
        myModal.show();
        };
	</script>
	<?php endif; ?>
</body>

</html>

