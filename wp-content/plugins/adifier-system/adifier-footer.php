<?php if( !is_author() || ( is_author() && !adifier_is_own_account() ) ): ?>
<footer>
	<?php
	$show_subscription_form = adifier_get_option( 'show_subscription_form' );
	if( $show_subscription_form == 'yes' ){
		?>
		<div class="subscription-footer">
			<div class="container">
				<div class="flex-wrap">
					<div class="flex-left flex-wrap">
						<i class="aficon-paper-plane"></i>
						<div class="subscribe-title">
							<h4><?php esc_html_e( 'Subscribe To Newsletter', 'adifier' ) ?></h4>
							<p><?php esc_html_e( 'and receive new ads in inbox', 'adifier' ) ?></p>
						</div>
					</div>
					<div class="flex-right">
						<form class="ajax-form" autocomplete="off">
							<div class="adifier-form">
								<input type="text" name="email" placeholder="<?php esc_attr_e( 'Input your email address', 'adifier' ); ?>">
								<a href="javascript:void(0)" class="submit-ajax-form" data-callbacktrigger="subscribeCallback"><?php esc_html_e( 'Subscribe', 'adifier' ) ?></a>						
							</div>
							<input type="hidden" name="action" value="subscribe">
							<?php adifier_gdpr_checkbox(); ?>
                            <div class="subscibe-response"></div>
							<?php wp_nonce_field( 'adifier_nonce', 'adifier_nonce' ); ?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>

	<?php get_sidebar( 'footer' ) ?>

	<?php if( adifier_get_option( 'show_footer' ) == 'yes' ): ?>
		<div class="copyrights">
			<div class="container">
				<div class="flex-wrap">
					<?php
					$copyrights = adifier_get_option( 'copyrights' );
					if( !empty( $copyrights ) ){
						?>
						<div class="flex-left">
							<?php echo $copyrights ?>
						</div>
						<?php
					}
					?>
					<div class="flex-center">
						<ul class="list-unstyled list-inline social-links">		
							<?php
							$tb_facebook_link = adifier_get_option( 'tb_facebook_link' );
							if( !empty( $tb_facebook_link ) ):
							?> 
							<li>
								<a href="<?php echo esc_url( $tb_facebook_link ) ?>" target="_blank">
									<i class="aficon-facebook"></i>
								</a>
							</li>
							<?php endif; ?>

							<?php
							$tb_twitter_link = adifier_get_option( 'tb_twitter_link' );
							if( !empty( $tb_twitter_link ) ):
							?> 
							<li>
								<a href="<?php echo esc_url( $tb_twitter_link ) ?>" target="_blank">
									<i class="aficon-twitter"></i>
								</a>
							</li>
							<?php endif; ?>
				

							<?php
							$tb_instagram_link = adifier_get_option( 'tb_instagram_link' );
							if( !empty( $tb_instagram_link ) ):
							?> 
							<li>
								<a href="<?php echo esc_url( $tb_instagram_link ) ?>" target="_blank">
									<i class="aficon-instagram"></i>
								</a>
							</li>
							<?php endif; ?>

							<?php
							$tb_youtube_link = adifier_get_option( 'tb_youtube_link' );
							if( !empty( $tb_youtube_link ) ):
							?> 
							<li>
								<a href="<?php echo esc_url( $tb_youtube_link ) ?>" target="_blank">
									<i class="aficon-youtube"></i>
								</a>
							</li>
							<?php endif; ?>

							<?php
							$tb_pinterest_link = adifier_get_option( 'tb_pinterest_link' );
							if( !empty( $tb_pinterest_link ) ):
							?> 
							<li>
								<a href="<?php echo esc_url( $tb_pinterest_link ) ?>" target="_blank">
									<i class="aficon-pinterest"></i>
								</a>
							</li>
							<?php endif; ?>

							<?php
							$tb_linkedin_link = adifier_get_option( 'tb_linkedin_link' );
							if( !empty( $tb_linkedin_link ) ):
							?> 
							<li>
								<a href="<?php echo esc_url( $tb_linkedin_link ) ?>" target="_blank">
									<i class="aficon-linkedin"></i>
								</a>
							</li>
							<?php endif; ?>							

							<?php
							$tb_rss_link = adifier_get_option( 'tb_rss_link' );
							if( !empty( $tb_rss_link ) ):
							?> 
							<li>
								<a href="<?php echo esc_url( $tb_rss_link ) ?>" target="_blank">
									<i class="aficon-rss"></i>
								</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
					
					<?php if( has_nav_menu( 'bottom-navigation' ) ):  ?>
						<div class="flex-right">
							<div class="flex-wrap">								
								<ul class="list-inline list-unstyled bottom-menu-wrap">
									<?php
										wp_nav_menu( array(
											'theme_location'  	=> 'bottom-navigation',
											'container'			=> false,
											'echo'          	=> true,
											'items_wrap'        => '%3$s',
											'walker' 			=> new adifier_walker
										) );
									?>
								</ul>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</footer>
<?php endif; ?>