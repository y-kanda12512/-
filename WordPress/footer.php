<div id="search" class="p-keywords">
    <?php if (is_404() || is_single() || is_home()) : ?>
        <div class="p-keywords__inner l-inner">
        <?php else: ?>
            <div class="l-inner">
            <?php endif ?>
            <div class="p-keywords__head">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.png" alt="虫眼鏡" class="p-keywords__head-img" />
                <span class="p-keywords__head-text">キーワードで絞り込む</span>
            </div>
            <div class="p-keywords__content">
                <?php $tags = get_tags();
                if ($tags):
                    foreach ($tags as $tag):
                ?>
                        <a href="<?php echo get_tag_link($tag->term_id); ?>" class="p-keywords__tag">
                            #
                            <span class="p-keywords__tag-text"><?php echo esc_html($tag->name) ?></span>
                        </a>
                        <!-- p-keywords__tag -->
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <!-- p-keywords__content -->
            </div>
            <!-- l-inner -->
        </div>
        <!-- p-keywords -->
        </main>

        <div class="p-cta">
            <div class="p-cta__inner">
                <div class="p-cta__links">
                    <a href="#" class="p-cta__link p-cta-link">
                        <span class="p-cta-link__head">コンサルタントをお探しの企業様へ</span>
                        <span class="p-cta-link__body">プロジェクトの相談をする</span>
                    </a>
                    <a href="#" class="p-cta__link p-cta-link">
                        <span class="p-cta-link__head">コンサルタントの方へ</span>
                        <span class="p-cta-link__body">案件の紹介を受ける</span>
                    </a>
                </div>
                <!-- p-cta__links -->
            </div>
            <!-- p-cta__inner -->
        </div>
        <!-- p-cta -->

        <div class="p-footer">
            <div class="l-inner">
                <div class="p-footer__content">
                    <div class="p-footer__logo">
                        <a href="" class="p-footer__logo-link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-4.png" alt="ロゴ4" class="p-footer__logo-img" />
                        </a>
                    </div>
                    <div class="p-footer__links">
                        <?php
                        $category = get_category_by_slug('new');
                        $category_link = get_category_link($category->term_id)
                        ?>
                        <a href="<?php echo $category_link; ?>" class="p-footer__link">新着情報</a>
                        <a href="" class="p-footer__link">DayMagaについて</a>
                        <?php
                        $category = get_category_by_slug('tips');
                        $category_link = get_category_link($category->term_id)
                        ?>
                        <a href="<?php echo $category_link; ?>" class="p-footer__link">TIPS</a>
                        <a href="" class="p-footer__link">運営会社</a>
                        <?php
                        $category = get_category_by_slug('interview');
                        $category_link = get_category_link($category->term_id)
                        ?>
                        <a href="<?php echo $category_link; ?>" class="p-footer__link">インタビュー</a>
                        <a href="" class="p-footer__link">サイト利用規約</a>
                        <?php
                        $category = get_category_by_slug('news');
                        $category_link = get_category_link($category->term_id)
                        ?>
                        <a href="<?php echo $category_link; ?>" class="p-footer__link">ニュース</a>
                    </div>
                    <!-- p-footer__links -->
                </div>
                <!-- p-footer__content -->
                <p class="p-footer__copyright">&copy;2024 Daytra Consul</p>
                <p class="p-footer__note">このサイトはCrown Cat株式会社様のご協力のもと作成したコーディング用の練習課題です。実在の人物・団体とは関係ありません。</p>
            </div>
            <!-- p-footer__inner -->
        </div>
        <!-- p-footer -->

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <?php wp_footer(); ?>
        </body>

        </html>