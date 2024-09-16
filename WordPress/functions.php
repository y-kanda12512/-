<?php
function my_setup()
{
    //固定ページでもアイキャッチ画像を使えるようにする
    add_theme_support('post-thumbnails');
    // フィード機能を有効する
    add_theme_support("automatic-feed-links");
    // htmlのタイトルタグを生成する
    add_theme_support("title-tag");
    //ファイルをhtml形式でサポートする
    add_theme_support("html5", array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
}
add_action('after_setup_theme', 'my_setup');

function my_script_init()
{
    wp_enqueue_style("my_style", get_template_directory_uri() . "/assets/css/style.css", array(), fileatime(get_theme_file_path("assets/css/style.css")), "all");
    wp_enqueue_script("my_script", get_template_directory_uri() . "/assets/js/script.js", array(), fileatime(get_theme_file_path("assets/js/script.js")), "all");
}

add_action("wp_enqueue_scripts", "my_script_init");

function post_category_class($category_slug)
{
    $category_class = '';

    switch ($category_slug) {
        case 'new':
            $category_class = 'u-articles-card__category-new';
            break;
        case 'tips':
            $category_class = 'u-articles-card__category-tips';
            break;
        case 'interview':
            $category_class = 'u-articles-card__category-interview';
            break;
        case 'news':
            $category_class = 'u-articles-card__category-news';
            break;
        default:
            $category_class = null;
    }

    return  $category_class;
}

function get_article_change_tab_class_row($category_slug)
{
    $change_tab_class = '';

    switch ($category_slug) {
        case 'new':
            $change_tab_class = 'u-all-article__change-tab-new';
            break;
        case 'tips':
            $change_tab_class = 'u-all-article__change-tab-tips';
            break;
        case 'interview':
            $change_tab_class = 'u-all-article__change-tab-interview';
            break;
        case 'news':
            $change_tab_class = 'u-all-article__change-tab-news';
            break;
        default:
            $change_tab_class = null;
    }

    return $change_tab_class;
}

function get_article_change_tab_id_row($category_slug)
{
    $change_tab_id = '';

    switch ($category_slug) {
        case 'new':
            $change_tab_id = 'tabpage2';
            break;
        case 'tips':
            $change_tab_id = 'tabpage3';
            break;
        case 'interview':
            $change_tab_id = 'tabpage4';
            break;
        case 'news':
            $change_tab_id = 'tabpage5';
            break;
        default:
            $change_tab_id = null;
    }

    return $change_tab_id;
}

function get_article_lists_class($category_slug)
{
    $change_tab_class = '';

    switch ($category_slug) {
        case 'new':
            $change_tab_class = 'u-all-article__article-lists-new';
            break;
        case 'tips':
            $change_tab_class = 'u-all-article__article-lists-tips';
            break;
        case 'interview':
            $change_tab_class = 'u-all-article__article-lists-interview';
            break;
        case 'news':
            $change_tab_class = 'u-all-article__article-lists-news';
            break;
        default:
            $change_tab_class = null;
    }

    return $change_tab_class;
}

function get_category_class_single($category_slug)
{
    $category_class = '';

    switch ($category_slug) {
        case 'new':
            $category_class = 'u-single__category-new';
            break;
        case 'tips':
            $category_class = 'u-single__category-tips';
            break;
        case 'interview':
            $category_class = 'u-single__category-interview';
            break;
        case 'news':
            $category_class = 'u-single__category-news';
            break;
        default:
            $category_class = null;
    }

    return $category_class;
}
