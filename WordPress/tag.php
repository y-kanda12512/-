<?php get_header(); ?>
<section class="p-all-article is-archive-page">
	<div class="p-all-article__inner l-inner">
		<h2 class="c-section-title c-section-title--p-recommendation">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-1.png" alt="会社ロゴ1" class="c-section-title__img c-section-title__img-tag-page" />
			<span class="c-section-title__text">#クライアントの検索結果</span>
		</h2>
		<div class="p-all-article__content-head">
			<div id="p-all-article__change-tabs-row" class="p-all-article__change-tabs p-all-article__change-tabs-row">
				<a href="#tabpage1" class="p-all-article__change-tab u-all-article__change-tab-all">すべて</a>
			</div>
			<!-- p-all-article__change-tabs p-all-article__change-tabs-row -->
			<div class="p-all-article__sort-tabs">
				<a href="" class="p-all-article__sort-tab">新着順</a>
				<a href="" class="p-all-article__sort-tab is-checked">人気順</a>
			</div>
			<!-- p-all-article__sort-tabs -->
		</div>
		<!-- p-all-article__content-head -->

		<div class="p-all-article__content">
			<div id="p-all-article__change-tabs-vertical" class="p-all-article__change-tabs p-all-article__change-tabs-vertical">
				<a href="#tabpage1" class="p-all-article__change-tab u-all-article__change-tab-all">すべて</a>
			</div>
			<div id="p-all-article__tab-body" class="p-all-article__tab-body">
				<div id="tabpage1" class="p-all-article__article-lists u-all-article__article-lists-all">
					<div class="p-all-article__article-lists-wrapper">
						<?php
						if (have_posts()):
							while (have_posts()):
								the_post();
						?>
								<a href="<?php the_permalink(); ?>" class="c-articles-card u-articles-card-max-width">
									<div class="c-articles-card__head">
										<div class="c-articles-card__img">
											<?php the_post_thumbnail(); ?> </div>
									</div>
									<div class="c-articles-card__body">
										<time datetime="<?php the_time('c'); ?>" class="c-articles-card__date"><?php the_time('Y.m.d'); ?></time>
										<div class="c-articles-card__title"><?php the_title(); ?></div>
										<?php $categories = get_the_category();
										if (!empty($categories)):
											foreach ($categories as $category):
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
										<!-- c-articles-card__tags -->
									</div>
									<!-- c-articles-card__body -->
								</a>
								<!-- c-articles-card -->

						<?php
							endwhile;
						endif;
						?>
					</div>
					<!-- p-all-article__article-lists-wrapper -->
				</div>
				<!-- p-all-article__article-lists u-all-article__article-lists-all -->
			</div>
			<!-- p-all-article__tab-body -->
		</div>
		<!-- p-all-article__content -->
	</div>
	<!-- p-all-article__inner l-inner -->
</section>
<!-- p-all-article -->

<?php get_footer(); ?>