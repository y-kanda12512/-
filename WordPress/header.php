<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- GoogleFont読み込み -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet" />

    <!-- CSS読み込み -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php wp_head(); ?>
</head>

<body>
    <header id="header" class="p-header">
        <div class="p-header__inner">
            <?php if (is_front_page() || is_404()): ?>
                <!-- スクロール前のロゴ -->
                <h1 id="js-header-logo-scroll-before" class="p-header__logo header__logo-scroll-before">
                    <a href="/" class="p-header__logo-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-logo.png" alt="ビジネスの未来を切り拓く。 DayMaga コンサルティングの専門情報メディア" class="p-header__logo-link-img" />
                    </a>
                </h1>
            <?php else: ?>
                <div id="js-header-logo-scroll-before" class="p-header__logo header__logo-scroll-before">
                    <a href="/" class="p-header__logo-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-logo.png" alt="ビジネスの未来を切り拓く。 DayMaga コンサルティングの専門情報メディア" class="p-header__logo-link-img" />
                    </a>
                </div>
            <?php endif; ?>

            <?php if (is_front_page() || is_404()): ?>
                <!-- スクロール後のロゴ -->
                <h1 id="js-header-logo-scroll-after" class="p-header__logo header__logo-scroll-after u-header__logo-scroll-hidden">
                    <a href="/" class="p-header__logo-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-3.png" alt="DayMaga" class="p-header__logo-link-img" />
                    </a>
                </h1>
            <?php else: ?>
                <!-- デフォルトで非表示クラスをつけておいて、スクロールされたらクラスを除去する -->
                <div id="js-header-logo-scroll-after" class="p-header__logo header__logo-scroll-after u-header__logo-scroll-hidden">
                    <a href="/" class="p-header__logo-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-3.png" alt="DayMaga" class="p-header__logo-link-img" />
                    </a>
                </div>
            <?php endif; ?>
            <!-- PC時に表示するナビ -->

            <nav class="p-header__nav">
                <div class="p-header__nav-inner">
                    <ul class="p-header__nav-lists">
                        <li class="p-header__nav-list">
                            <?php
                            $category = get_category_by_slug('new');
                            $category_link = get_category_link($category->term_id)
                            ?>
                            <a href="<?php echo  $category_link; ?>" class="p-header__nav-link">新着情報</a>
                        </li>
                        <li class="p-header__nav-list">
                            <?php
                            $category = get_category_by_slug('tips');
                            $category_link = get_category_link($category->term_id)
                            ?>
                            <a href="<?php echo  $category_link; ?>" class="p-header__nav-link">TIPS</a>
                        </li>
                        <li class="p-header__nav-list">
                            <?php
                            $category = get_category_by_slug('interview');
                            $category_link = get_category_link($category->term_id)
                            ?>
                            <a href="<?php echo  $category_link; ?>" class="p-header__nav-link">インタビュー</a>
                        </li>
                        <li class="p-header__nav-list">
                            <?php
                            $category = get_category_by_slug('news');
                            $category_link = get_category_link($category->term_id)
                            ?>
                            <a href="<?php echo  $category_link; ?>" class="p-header__nav-link">ニュース</a>
                        </li>
                    </ul>

                    <div class="p-header__nav-cta">
                        <a class="p-header__nav-cta-link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-cta-1.png" alt="コンサルをお探しの企業様 まずは無料相談" class="p-header__nav-cta-link-img" />
                        </a>
                        <a class="p-header__nav-cta-link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-cta-2.png" alt="コンサルタントの方 案件の紹介登録" class="p-header__nav-cta-link-img" />
                        </a>
                    </div>

                    <a href="#search" class="p-header__search-btn c-search-btn">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.png" alt="虫眼鏡" class="p-header__nav-search-btn-img c-search-btn__img" />
                    </a>
                </div>
            </nav>

            <!-- スクロール前のドロワー、サーチボタン -->
            <div id="js-header__btn-area-scroll-before" class="p-header__btn-area u-header__btn-area-column">
                <div class="p-header__btn-area-inner">
                    <button id="js-drawer-icon-1" class="p-drawer-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu.png" alt="開くボタン" class="p-drawer-icon__img" />
                        <!-- <div class="p-drawer-icon__bar"></div>
              <div class="p-drawer-icon__bar"></div>
              <div class="p-drawer-icon__bar"></div> -->
                    </button>
                    <a href="#search" class="p-header__search-btn c-search-btn">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.png" alt="虫眼鏡" class="p-header__search-btn-img c-search-btn__img" />
                    </a>
                </div>
                <!-- p-header__btn-area-inner -->
            </div>
            <!-- p-header__btn-area -->

            <!-- スクロール後のドロワー、サーチボタン -->
            <!-- デフォルトで非表示クラスをつけておいて、スクロールされたらクラスを除去する -->
            <div id="js-header__btn-area-scroll-after" class="p-header__btn-area u-header__btn-area-row u-header__btn-area-hidden">
                <div class="p-header__btn-area-inner">
                    <button id="js-drawer-icon-2" class="p-drawer-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu.png" alt="開くボタン" class="p-drawer-icon__img" />
                        <!-- <div class="p-drawer-icon__bar"></div>
              <div class="p-drawer-icon__bar"></div>
              <div class="p-drawer-icon__bar"></div> -->
                    </button>
                    <a href="#search" class="p-header__search-btn c-search-btn">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.png" alt="虫眼鏡" class="p-header__search-btn-img c-search-btn__img" />
                    </a>
                </div>
                <!-- p-header__btn-area-inner -->
            </div>
            <!-- p-header__btn-area -->
        </div>
        <!-- p-header__inner -->
    </header>

    <div id="js-drawer-content" class="p-drawer-content">
        <div class="p-drawer-content__icon-area">
            <button id="js-drawer-icon-close" class="p-drawer-content__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu-close.png" alt="閉じるボタン" class="p-drawer-content__icon-img" />
            </button>
        </div>
        <ul class="p-drawer-content__lists">
            <li class="p-drawer-content__list">
                <?php
                $category = get_category_by_slug('new');
                $category_link = get_category_link($category->term_id)
                ?>
                <a href="<?php echo $category_link; ?>" class="p-drawer-content__link">新着情報</a>
            </li>
            <li class="p-drawer-content__list">
                <?php
                $category = get_category_by_slug('tips');
                $category_link = get_category_link($category->term_id)
                ?>
                <a href="<?php echo $category_link; ?>" class="p-drawer-content__link">TIPS</a>
            </li>
            <li class="p-drawer-content__list">
                <?php
                $category = get_category_by_slug('interview');
                $category_link = get_category_link($category->term_id)
                ?>
                <a href="<?php echo $category_link; ?>" class="p-drawer-content__link">インタビュー</a>
            </li>
            <li class="p-drawer-content__list">
                <?php
                $category = get_category_by_slug('news');
                $category_link = get_category_link($category->term_id)
                ?>
                <a href="<?php echo $category_link; ?>" class="p-drawer-content__link">ニュース</a>
            </li>
            <li class="p-drawer-content__list">
                <a href="#search" class="p-drawer-content__link c-search-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.png" alt="虫眼鏡" class="p-drawer-content__search-btn-img c-search-btn__img" />
                </a>
            </li>
        </ul>
    </div>
    <!-- p-drawer-content -->

    <!-- topページの時にはis-top-pageを出力する -->
    <main id="p-main" class="p-main <?php if (is_front_page()) {
                                        echo "is-top-page";
                                    } ?> ">