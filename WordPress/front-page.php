<?php get_header(); ?>
<div class="p-pickup-articles">
	<div class="p-pickup-articles___inner">
		<!-- Slider main container -->
		<div class="swiper p-pickup-articles__swiper">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper p-pickup-articles__swiper-wrapper">
				<?php $args = array(
					'post_type' => 'post',
					'tag' => 'pickup',
					'posts_per_page' => 5,
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$pickup_posts = new WP_Query($args);
				?>
				<?php if ($pickup_posts->have_posts()): ?>
					<?php while ($pickup_posts->have_posts()): ?>
						<?php $pickup_posts->the_post(); ?>
						<!-- Slides -->
						<div class="swiper-slide p-pickup-articles__slide">
							<a href="<?php the_permalink(); ?>" class="c-articles-card">
								<div class="c-articles-card__head">
									<div class="c-articles-card__img">
										<?php the_post_thumbnail(); ?>
									</div>
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
						</div>
						<!-- swiper-slide p-pickup-articles__slide -->
				<?php endwhile;
				endif;
				wp_reset_postdata(); ?>
			</div>
			<!-- swiper-wrapper p-pickup-articles__swiper-wrapper -->

			<!-- If we need navigation buttons -->
			<div class="swiper-button-prev p-pickup-articles__swiper-button-prev"></div>
			<div class="swiper-button-next p-pickup-articles__swiper-button-next"></div>
		</div>
		<!-- swiper p-pickup-articles__swiper -->
	</div>
	<!-- p-pickup-articles___inner -->
</div>
<!-- p-pickup-articles -->

<section class="p-new-articles">
	<div class="p-new-articles__inner">
		<h2 class="c-section-title c-section-title--p-new-articles">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-1.png" alt="会社ロゴ1" class="c-section-title__img" />
			<span class="c-section-title__text">新着情報</span>
		</h2>

		<div class="p-new-articles__content">
			<div class="p-new-articles__links">
				<?php
				$args = array(
					'post_type' => 'post',
					'category_name' => 'new',
					'posts_per_page' => 3,
					'orderby' => 'date',
					'order' => 'DESC',
				);

				$new_posts = new WP_Query($args);

				if ($new_posts->have_posts()):
					while ($new_posts->have_posts()):
						$new_posts->the_post();
				?>
						<a href="<?php the_permalink(); ?>" class="c-articles-card">
							<div class="c-articles-card__head">
								<div class="c-articles-card__img">
									<?php the_post_thumbnail(); ?>
								</div>
							</div>
							<div class="c-articles-card__body">
								<time datetime="<?php the_time('c') ?>" class="c-articles-card__date"><?php the_time('Y.m.d') ?></time>
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
								<!-- c-articles-card__tags -->
							</div>
							<!-- c-articles-card__body -->
						</a>
						<!-- c-articles-card -->
				<?php endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div>
			<!-- p-new-articles__links -->
			<a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="c-new-articles__archive-link u-new-articles__archive-link-new-article">もっと見る</a>
		</div>
		<!-- p-new-articles__content -->
	</div>
	<!-- p-new-articles__inner -->
</section>

<section class="p-recommendation">
	<div class="p-recommendation__inner">
		<h2 class="c-section-title c-section-title--p-recommendation">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-2.png" alt="会社ロゴ2" class="c-section-title__img" />
			<span class="c-section-title__text c-section-title__text--white">おすすめ記事</span>
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

<section class="p-all-article">
	<div class="p-all-article__inner l-inner">
		<h2 class="c-section-title c-section-title--p-recommendation">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-1.png" alt="会社ロゴ1" class="c-section-title__img" />
			<span class="c-section-title__text">すべての記事</span>
		</h2>
		<div class="p-all-article__content-head is-top-page-category">
			<div id="p-all-article__change-tabs-row" class="p-all-article__change-tabs p-all-article__change-tabs-row">
				<a href="#tabpage1" class="p-all-article__change-tab u-all-article__change-tab-all" data-category="all">すべて</a>
				<a href="#tabpage2" class="p-all-article__change-tab u-all-article__change-tab-new" data-category="new">新着情報</a>
				<a href="#tabpage3" class="p-all-article__change-tab u-all-article__change-tab-tips" data-category="tips">TIPS</a>
				<a href="#tabpage4" class="p-all-article__change-tab u-all-article__change-tab-interview" data-category="interview">インタビュー</a>
				<a href="#tabpage5" class="p-all-article__change-tab u-all-article__change-tab-news" data-category="news">ニュース</a>
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
				<a href="#tabpage1" class="p-all-article__change-tab u-all-article__change-tab-all" data-category="all">すべて</a>
				<a href="#tabpage2" class="p-all-article__change-tab u-all-article__change-tab-new" data-category="new">新着情報</a>
				<a href="#tabpage3" class="p-all-article__change-tab u-all-article__change-tab-tips" data-category="tips">TIPS</a>
				<a href="#tabpage4" class="p-all-article__change-tab u-all-article__change-tab-interview" data-category="interview">インタビュー</a>
				<a href="#tabpage5" class="p-all-article__change-tab u-all-article__change-tab-news" data-category="news">ニュース</a>
			</div>
			<div id="p-all-article__tab-body" class="p-all-article__tab-body">
				<!-- すべて -->
				<div id="tabpage1" class="p-all-article__article-lists u-all-article__article-lists-all">
					<div class="p-all-article__article-lists-wrapper">
						<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 9,
							'orderby' => 'date',
							'order' => 'DESC',
						);
						$pickup_posts = new WP_Query($args);

						if ($pickup_posts->have_posts()):
							while ($pickup_posts->have_posts()):
								$pickup_posts->the_post();
						?>
								<a href="<?php the_permalink(); ?>" class="c-articles-card u-articles-card-max-width">
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
							<?php endwhile; ?>
						<?php else: ?>
							<p class="p-all-article__article-no-content">投稿の準備中です。</p>
						<?php endif;
						wp_reset_postdata();
						?>
					</div>
					<!-- p-all-article__article-lists-wrapper -->
				</div>
				<!-- p-all-article__article-lists u-all-article__article-lists-all -->

				<!-- 新着情報 -->
				<div id="tabpage2" class="p-all-article__article-lists u-all-article__article-lists-new">
					<div class="p-all-article__article-lists-wrapper">
						<?php
						$args = array(
							'post_type' => 'post',
							'category_name' => 'new',
							'posts_per_page' => 9,
							'orderby' => 'date',
							'order' => 'DESC',
						);
						$new_posts = new WP_Query($args);

						if ($new_posts->have_posts()):
							while ($new_posts->have_posts()):
								$new_posts->the_post();
						?>
								<a href="<?php the_permalink(); ?>" class="c-articles-card u-articles-card-max-width">
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
							<?php endwhile; ?>
						<?php else: ?>
							<p class="p-all-article__article-no-content">投稿の準備中です。</p>
						<?php endif;
						wp_reset_postdata();
						?>
					</div>
					<!-- p-all-article__article-lists-wrapper -->
				</div>
				<!-- p-all-article__article-lists u-all-article__article-lists-new -->

				<!-- TIPS -->
				<div id="tabpage3" class="p-all-article__article-lists u-all-article__article-lists-tips">
					<div class="p-all-article__article-lists-wrapper">
						<?php
						$args = array(
							'post_type' => 'post',
							'category_name' => 'tips',
							'posts_per_page' => 9,
							'orderby' => 'date',
							'order' => 'DESC',
						);
						$tips_posts = new WP_Query($args);

						if ($tips_posts->have_posts()):
							while ($tips_posts->have_posts()):
								$tips_posts->the_post();
						?>
								<a href="<?php the_permalink(); ?>" class="c-articles-card u-articles-card-max-width">
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
							<?php endwhile; ?>
						<?php else: ?>
							<p class="p-all-article__article-no-content">投稿の準備中です。</p>
						<?php endif;
						wp_reset_postdata();
						?>
					</div>
					<!-- p-all-article__article-lists-wrapper -->
				</div>
				<!-- p-all-article__article-lists u-all-article__article-lists-tips -->

				<!-- インタビュー -->
				<div id="tabpage4" class="p-all-article__article-lists u-all-article__article-lists-interview">
					<div class="p-all-article__article-lists-wrapper">
						<?php
						$args = array(
							'post_type' => 'post',
							'category_name' => 'interview',
							'posts_per_page' => 9,
							'orderby' => 'date',
							'order' => 'DESC',
						);
						$interview_posts = new WP_Query($args);

						if ($interview_posts->have_posts()):
							while ($interview_posts->have_posts()):
								$interview_posts->the_post();
						?>
								<a href="<?php the_permalink(); ?>" class="c-articles-card u-articles-card-max-width">
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

							<?php endwhile; ?>
						<?php else: ?>
							<p class="p-all-article__article-no-content">投稿の準備中です。</p>
						<?php endif;
						wp_reset_postdata();
						?>
					</div>
					<!-- p-all-article__article-lists-wrapper -->
				</div>
				<!-- p-all-article__article-lists u-all-article__article-lists-interview -->

				<!-- ニュース -->
				<div id="tabpage5" class="p-all-article__article-lists p-all-article__article-lists-news">
					<div class="p-all-article__article-lists-wrapper">
						<?php
						$args = array(
							'post_type' => 'post',
							'category_name' => 'news',
							'posts_per_page' => 9,
							'orderby' => 'date',
							'order' => 'DESC',
						);
						$news_posts = new WP_Query($args);

						if ($news_posts->have_posts()):
							while ($news_posts->have_posts()):
								$news_posts->the_post();
						?>
								<a href="<?php the_permalink(); ?>" class="c-articles-card u-articles-card-max-width">
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
							<?php endwhile; ?>
						<?php else: ?>
							<p class="p-all-article__article-no-content">投稿の準備中です。</p>
						<?php endif;
						wp_reset_postdata();
						?>
					</div>
					<!-- p-all-article__article-lists-wrapper -->
				</div>
				<!-- p-all-article__article-lists p-all-article__article-lists-news -->
			</div>
			<!-- p-all-article__tab-body -->
		</div>
		<!-- p-all-article__content -->
		<a href="" class="c-new-articles__archive-link u-new-articles__archive-link-all-article">もっと見る</a>
	</div>
	<!-- p-all-article__inner l-inner -->
</section>
<!-- p-all-article -->

<?php get_footer(); ?>