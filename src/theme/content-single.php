<article class="single">
	<h1 class="single-title"><?php the_title(); ?></h1>

	<?php if (!is_single()) : ?>
	<p class="post-info">
		<span class="date">
			<?php the_time( 'F j, Y g:i a' ); ?>
		</span>

		<span class="tags">
			<?php
				$categories = get_the_category();
				$separator  = ', ';
				$output     = '';

			if ( $categories ) {
				foreach ( $categories as $category ) {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $separator;
				}

				echo trim( $output, $separator );
			}
			?>
		</span>
	</p>

		<?php endif;?>

	<div class="post-inner-content">
		<?php the_content(); ?>
	</div>

</article>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-553cf09b285f970a"></script>
<div class="addthis_inline_share_toolbox"></div>


<div class="container subscribe">
	<div class="row">
		<div class="col-6">
			<h4><span style="color: rgb(255, 255, 255);">Prenumerera på <strong>Investerarbrevet</strong>:</span></h4>
			<p><span style=""><span style="color: rgb(255, 255, 255);">Som prenumerant får du varje månad Investerarbrevet samt inbjudningar till våra event och erbjudanden från våra samarbetspartners. Investerarbrevet produceras av Laika Consulting.&nbsp; </span><span style=""><span style=""><span style=""><span style=""><span style="color: rgb(255, 255, 255);"><a href="https://www.laika.se/integritetspolicy" class="sitesmart-external-link" target="new" title="Laika Consulting integritetspolicy"><span style="color: rgb(255, 255, 255);">Läs om hur Laika Consulting behandlar&nbsp; personuppgifter&nbsp;här</span></a>!</span></span></span></span></span></span></p>
		</div>
		<div class="col-6">
			<h4><span style="color: rgb(255, 255, 255);">Fyll i din e-post nedan</span></h4>
			<form id="newsletter-subscribe" method="post" action="https://www.investerarbrevet.se/@/MailManager/">
				<input type="hidden" name="action" value="subscribe">
				<input type="hidden" name="urlId" value="686">
				<input type="hidden" name="redirectPageId" value="66">
				<input type="hidden" name="groupId" value="1">
				<fieldset>
					<input type="text" name="email" id="email" placeholder="E-post">
					<button type="submit">Prenumerera</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<?php echo wpb_rand_posts(6); ?>
            
