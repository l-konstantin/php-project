<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title>Главная страница</title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head(); ?>
  </head>
  <body>
    <div class="wrapper">
      <header class="main-header">
        <div class="top-header">
          <div class="top-header__wrap">
            <div class="logotype-block">
              <div class="logo-wrap"><a href="<?php echo home_url('/') ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.svg" alt="Логотип" class="logo-wrap__logo-img"></a></div>
            </div>
            <nav class="main-navigation">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header_menu',
                    ));
                ?>
              <!-- <ul class="nav-list">
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">Главная</a></li>
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">Полезная информация</a></li>
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">Последние акции</a></li>
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">О сервисе</a></li>
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">Новости</a></li>
              </ul> -->
            </nav>
          </div>
        </div>
        <div class="bottom-header">
          <div class="search-form-wrap">
            <form class="search-form">
              <input type="text" placeholder="Поиск..." class="search-form__input">
              <button class="search-form__btn-search"><i class="icon icon-search"></i></button>
            </form>
          </div>
        </div>
      </header>
      <!-- header_end-->