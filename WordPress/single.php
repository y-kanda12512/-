<?php get_header(); ?>
<div class="p-single">
	<div class="p-single__inner">
		<div class="p-single__head">
			<div class="p-single__date">
				<span class="p-single__date-title">公開日　</span>
				<time datetime="<?php the_time('c'); ?>" class="p-single__date-number"><?php the_time('Y.m.d'); ?></time>
			</div>
			<!-- p-single__date -->

			<?php
			$categories = get_the_category();
			if ($categories):
				foreach ($categories as $category):
					$category_class = get_category_class_single($category->slug);
			?>
					<div class="p-single__category <?php echo $category_class; ?>"><?php echo $category->cat_name ?></div>
			<?php
				endforeach;
			endif;
			?>
			<h1 class="p-single__title"><?php the_title(); ?></h1>
		</div>
		<!-- p-single__head -->

		<div class="p-single__img">
			<?php the_post_thumbnail(); ?> </div>
		<div class="p-single__content">
			<?php the_content(); ?>
			<!-- p-single__content -->

			<div class="p-single__tag-content">
				<p class="p-single__tag-content-title">この記事のタグ</p>
				<div class="p-single__tag-list">
					<?php
					$tags = get_the_tags();
					if ($tags):
						foreach ($tags  as $tag):
					?>
							<a href="<?php echo get_tag_link($tag->term_id); ?>" class="p-single__tag">
								#
								<span class="p-single__tag-text"><?php echo esc_html($tag->name); ?></span>
							</a>
					<?php
						endforeach;
					endif;
					?>
				</div>
				<!-- p-single__tag-list -->
			</div>
			<!-- p-single__tag-content -->
		</div>
		<!-- p-single__tag-content -->
	</div>
	<!-- p-single__inner -->
</div>
<!-- p-single -->

<section class="p-recommendation is-single-page">
	<div class="p-recommendation__inner">
		<h2 class="c-section-title c-section-title--p-recommendation">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-1.png" alt="会社ロゴ1" class="c-section-title__img is-single-page" />
			<span class="c-section-title__text is-single-page">おすすめ記事</span>
		</h2>

		<div class="p-recommendation__swiper-container">
			<!-- Slider main container -->
			<div class="swiper p-recommendation__swiper">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper p-recommendation__swiper-wrapper">
					<?php
					$args = array(
						'post_type' => 'post',
						'tag' => 'pickup',
						'posts_per_page' => 5,
						'orderby' => 'date',
						'order' => 'DESC',
					);
					$pickup_posts = new WP_Query($args);

					if ($pickup_posts->have_posts()):
						while ($pickup_posts->have_posts()):
							$pickup_posts->the_post();
					?>
							<!-- Slides -->
							<div class="swiper-slide p-recommendation__swiper-slide">
								<a href="<?php the_permalink(); ?>" class="c-articles-card">
									<div class="c-articles-card__head">
										<div class="c-articles-card__img">
											<?php the_post_thumbnail(); ?>
										</div>
									</div>
									<div class="c-articles-card__body">
										<time datetime="<?php the_time('c'); ?>" class="c-articles-card__date"><?php the_time('Y.m.d') ?></time>
										<div class="c-articles-card__title"><?php the_title(); ?></div>
										<?php $categories = get_the_category();
										if (!empty($categories)):
											foreach ($categories as $category):
												// カテゴリのスラッグ名をからクラス名を判断する関数を作成
												$category_class = post_category_class($category->slug)
										?>
												<div class="c-articles-card__category <?php echo $category_class; ?>"><?php echo esc_html($category->name); ?></div>
										<?php
											endforeach;
										endif; ?>

										<div class="c-articles-card__tags">
											<?php $tags = get_the_tags();
											if (!empty($tags)):
												foreach ($tags as $tag):
											?>
													<div class="c-articles-card__tag">
														#
														<span class="c-articles-card__tag-text"><?php echo esc_html($tag->name); ?></span>
													</div>
													<!-- c-articles-card__tag -->
											<?php endforeach;
											endif; ?>
										</div>
									</div>
									<!-- c-articles-card__body -->
								</a>
								<!-- c-articles-card -->
							</div>
							<!-- swiper-slide p-recommendation__swiper-slide -->
					<?php
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>
				<!-- swiper-wrapper p-recommendation__swiper-wrapper -->

				<!-- If we need pagination -->
				<div class="swiper-pagination p-recommendation__swiper-pagination"></div>
			</div>
			<!-- swiper p-recommendation__swiper -->

			<!-- If we need navigation buttons -->
			<div class="swiper-button-prev p-recommendation__swiper-button-prev"></div>
			<div class="swiper-button-next p-recommendation__swiper-button-next"></div>

			<!-- If we need scrollbar -->
			<div class="swiper-scrollbar p-recommendation__swiper-scrollbar"></div>
		</div>
		<!-- p-recommendation__swiper-container -->
	</div>
	<!-- p-recommendation__inner -->
</section>
<!-- p-recommendation -->

<?php get_footer(); ?>