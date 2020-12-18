<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', 'as_theme_options', 'Настройки темы' )
    ->add_tab('Главная', array(
      Field::make( 'image', 'as_logo', 'Логотип')
        ->set_width(50),
      Field::make( 'image', 'as_logo_white', 'Логотип белый')
        ->set_width(50),
      Field::make('text', 'au_banner_title', 'Заголовок баннера')
        ->set_width(30),
      Field::make('text', 'au_disc_banner', 'Скидка')
        ->set_width(30),
      Field::make('text', 'au_text_banner', 'Текст')
        ->set_width(30),
    ))
    ->add_tab('Мобильное меню', array(
      Field::make('image', 'menu_logo', 'Логотип')
        ->set_width(30),
      Field::make('complex', 'complex_menu', 'Пункты меню')
        ->add_fields(array(
          Field::make('image', 'complex_menu_icon', 'Иконка')
            ->set_width(30),
          Field::make('text', 'complex_menu_title', 'Заголовок')
            ->set_width(30),
          Field::make('text', 'complex_menu_link', 'Ссылка')
            ->set_width(30),
        )),
    ))
    ->add_tab('Блок Запчасти для иномарок...', array(
      Field::make('image', 'block_img_1', 'Фото')
        ->set_width(30),
      Field::make('text', 'block_title_1', 'Заголовок')
        ->set_width(30),
      Field::make('text', 'block_link_1', 'Ссылка')
        ->set_width(30),
      Field::make('image', 'block_img_2', 'Фото')
        ->set_width(30),
      Field::make('text', 'block_title_2', 'Заголовок')
        ->set_width(30),
      Field::make('text', 'block_link_2', 'Ссылка')
        ->set_width(30),
      Field::make('image', 'block_img_3', 'Фото')
        ->set_width(30),
      Field::make('text', 'block_title_3', 'Заголовок')
        ->set_width(30),
      Field::make('text', 'block_link_3', 'Ссылка')
        ->set_width(30),
    ))
    ->add_tab('Контакты', array(
        Field::make( 'text', 'as_phone', __( 'Телефон' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email', __( 'Email' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email_send', __( 'Email для отправки' ) )
          ->set_width(50),
        Field::make( 'text', 'as_inn', __( 'ИНН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_orgn', __( 'ОРГН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_address', __( 'Адрес' ) )
          ->set_width(50),
        Field::make( 'text', 'as_address_map', __( 'Ссылка на Яндекс карты' ) )
          ->set_width(50),
        Field::make( 'text', 'as_tele', __( 'Телеграм' ) )
          ->set_width(50),
        Field::make( 'text', 'as_whatsapp', __( 'WhatsApp' ) )
          ->set_width(50),
        Field::make( 'text', 'as_vk', __( 'Телеграм' ) )
          ->set_width(50),
        Field::make( 'text', 'as_facebook', __( 'Телеграм' ) )
          ->set_width(50),
        Field::make( 'text', 'as_insta', __( 'WhatsApp' ) )
          ->set_width(50),
        Field::make( 'text', 'mkad_map_point', __( 'Центр карты' ) )
          ->set_width(50),
    ) );
Container::make('user_meta', 'user_settings', 'Дополнительные поля')
  ->add_fields(array(
    Field::make('text', 'user_card_number', 'Номер карты'),
    Field::make('text', 'user_card_type', 'Тип карты'),
    Field::make('text', 'user_discount', 'Персональная скидка'),
    Field::make('text', 'user_brand_auto', 'Марка авто'),
    Field::make('text', 'user_model_auto', 'Модель авто'),
  ));
Container::make('post_meta', 'ca_product', 'Доп поля')
	->where('post_template', '=', 'page-product.php')
	->add_fields(array(
		Field::make('text', 'ca_product_price', 'Цена'),
	));
Container::make('post_meta', 'as_product_cr', 'Характеристики товара')
  ->show_on_post_type(array( 'asgproduct'))
	//->where( 'post_template', '=', 'single-product.php' )
	->add_fields(array(
		 Field::make('text', 'offer_group_id', 'Группа товара')
			->set_width(50),
		Field::make( 'checkbox', 'offer_type', 'Собственный оффер')
		  ->set_width(50),
    Field::make( 'checkbox', 'hit', 'Хит')
      ->set_width(50),
    Field::make( 'checkbox', 'new_prod', 'Новый')
      ->set_width(50),
		Field::make('text', 'as_product_price', 'Цена')
			->set_width(50),
		Field::make('text', 'as_product_old_price', 'Старая цена')
			->set_width(50),
		Field::make('text', 'as_size', 'Размер')
			->set_width(50),
		Field::make('text', 'as_age', 'Возраст')
			->set_width(50),
		Field::make('text', 'as_product_weight', 'Вес (г)')
			->set_width(50),
		Field::make('text', 'as_product_package', 'Кол-во в упаковке (шт)')
			->set_width(50),
		Field::make( 'text', 'as_sku', 'Артикул')
        	->set_width(50),
		Field::make( 'rich_text', 'as_short_derscr', __( 'Описание' ) ),
        Field::make('image', 'as_gallery_img_1', 'Фото 1')
          ->set_width(20),
        Field::make('image', 'as_gallery_img_2', 'Фото 2')
          ->set_width(20),
        Field::make('image', 'as_gallery_img_3', 'Фото 3')
          ->set_width(20),
        Field::make('image', 'as_gallery_img_4', 'Фото 4')
          ->set_width(20),
	));

Container::make('term_meta', 'as_term_product', 'Дополнительные поля')
	->where('term_taxonomy', '=', 'asgproductcat')
	->add_fields(array(
		Field::make('text', 'term_product_taste', 'Псевдоним'),
    Field::make('image', 'term_product_image', 'Фото'),
  ) );
  
  Container::make('post_meta', 'all_post', 'Общие поля')
	->add_fields(array(
		Field::make('image', 'post_thumb', 'Изображение записи')->set_value_type( 'url' ),
	));