<?php get_header();
$current_category = get_queried_object();
$category_name = $current_category->name;
$category_slug = $current_category->slug;
$change_tab_class = get_article_change_tab_class_row($category_slug);
$change_tab_id = get_article_change_tab_id_row($category_slug);
$article_lists_class = get_article_lists_class($category_slug);
?>

<section class="p-all-article is-archive-page">
	<div class="p-all-article__inner l-inner">
		<h2 class="c-section-title c-section-title--p-recommendation">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-1.png" alt="会社ロゴ1" class="c-section-title__img" />
			<span class="c-section-title__text"><span><?php echo $category_name; ?></span>の記事</span>
		</h2>
		<div class="p-all-article__content-head">
			<div id="p-all-article__change-tabs-row" class="p-all-article__change-tabs p-all-article__change-tabs-row">
				<a href="#<?php echo $change_tab_id; ?>" class="p-all-article__change-tab <?php echo $change_tab_class; ?>"><?php echo $category_name; ?></a>
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
				<a href="#<?php echo $change_tab_id; ?>" class="p-all-article__change-tab <?php echo $change_tab_class; ?>"><?php echo $category_name; ?></a>
			</div>
			<div id="p-all-article__tab-body" class="p-all-article__tab-body">
				<div id="<?php echo $change_tab_id; ?>" class="p-all-article__article-lists <?php echo $article_lists_class; ?>">
					<div class="p-all-article__article-lists-wrapper">
						<?php
						if (have_posts()):
							while (have_posts()):
								the_post();
						?>
								<a class="c-articles-card u-articles-card-max-width">
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