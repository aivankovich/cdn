<?php
add_theme_support('post-thumbnails');
register_nav_menus(array('header_menu' => 'Меню в шапке',
                        'footer_menu_1' => 'Меню в подвале 1',
                        'footer_menu_2' => 'Меню в подвале 2',
                        'footer_menu_3' => 'Меню в подвале 3'));

add_action('init', 'reg_func');

function reg_func() {
    register_post_type('solutions', array(
		'label'  => 'Решения',
		'labels' => array(
			'name'               => 'Решения',
            'all_items'          => 'Все решения',
			'singular_name'      => 'Решения',
			'add_new'            => 'Добавить решение',
			'add_new_item'       => 'Добавить решение', 
			'edit_item'          => 'Редактировать решение',
			'new_item'           => 'Новое решение',
            'view_item'          => 'Смотреть решение',
            'featured_image'     => 'Изображение решения',
            'set_featured_image' => 'Установить изображение решения',
            'remove_featured_image' => 'Удалить изображение решения',
            'use_featured_image' => 'Использовать в качестве изображения решения',
			'search_items'       => 'Искать решение',
			'not_found'          => 'Ничего не найдено',
            'menu_name'          => 'Решения',
        ),
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'menu_position'       => null,
        'supports'            => array('title', 'thumbnail', 'custom-fields'),
		'has_archive'         => false,
        'rewrite'             => array('slug' => 'solutions')
	));
    
    register_post_type('industry', array(
		'label'  => 'Отрасли',
		'labels' => array(
			'name'               => 'Отрасли',
            'all_items'          => 'Все отрасли',
			'singular_name'      => 'Отрасли',
			'add_new'            => 'Добавить отрасль',
			'add_new_item'       => 'Добавить отрасль', 
			'edit_item'          => 'Редактировать отрасль',
			'new_item'           => 'Новая отрасль',
            'view_item'          => 'Смотреть отрасль',
            'featured_image'     => 'Изображение отрасли',
            'set_featured_image' => 'Установить изображение отрасли',
            'remove_featured_image' => 'Удалить изображение отрасли',
            'use_featured_image' => 'Использовать в качестве изображения отрасли',
			'search_items'       => 'Искать отрасль',
			'not_found'          => 'Ничего не найдено',
            'menu_name'          => 'Отрасли',
        ),
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'menu_position'       => null,
        'supports'            => array('title', 'thumbnail', 'custom-fields'),
		'has_archive'         => false,
        'rewrite'             => array('slug' => 'industry')
	));
    
    register_post_type('cases', array(
		'label'  => 'Кейсы',
		'labels' => array(
			'name'               => 'Кейсы',
            'all_items'          => 'Все кейсы',
			'singular_name'      => 'Кейсы',
			'add_new'            => 'Добавить кейс',
			'add_new_item'       => 'Добавить кейс', 
			'edit_item'          => 'Редактировать кейс',
			'new_item'           => 'Новый кейс',
            'view_item'          => 'Смотреть кейс',
            'featured_image'     => 'Изображение кейса',
            'set_featured_image' => 'Установить изображение кейса',
            'remove_featured_image' => 'Удалить изображение кейса',
            'use_featured_image' => 'Использовать в качестве изображения кейса',
			'search_items'       => 'Искать кейс',
			'not_found'          => 'Ничего не найдено',
            'menu_name'          => 'Кейсы',
        ),
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'menu_position'       => null,
        'supports'            => array('title', 'thumbnail', 'custom-fields'),
		'has_archive'         => 'cases',
        'rewrite'             => array('slug' => 'cases')
	));
    
    register_post_type('events', array(
		'label'  => 'Мероприятия',
		'labels' => array(
			'name'               => 'Мероприятия',
            'all_items'          => 'Все мероприятия',
			'singular_name'      => 'Мероприятия',
			'add_new'            => 'Добавить мероприятие',
			'add_new_item'       => 'Добавить мероприятие', 
			'edit_item'          => 'Редактировать мероприятие',
			'new_item'           => 'Новое мероприятие',
            'view_item'          => 'Смотреть мероприятие',
            'featured_image'     => 'Изображение мероприятия',
            'set_featured_image' => 'Установить изображение мероприятия',
            'remove_featured_image' => 'Удалить изображение мероприятия',
            'use_featured_image' => 'Использовать в качестве изображения мероприятия',
			'search_items'       => 'Искать мероприятие',
			'not_found'          => 'Ничего не найдено',
            'menu_name'          => 'Мероприятия',
        ),
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'has_archive'         => 'events',
        'rewrite'             => array('slug' => 'events')
	));
}

/* Contacts in settings */
function my_options() {
    /* Телефон */
    add_settings_field(
        'phone',
        'Телефон',
        'display_phone',
        'general'
    );
    
    register_setting(
        'general',
        'our_phone'
    );
    
    /* Телефон En */
    add_settings_field(
        'phone_en',
        'Телефон Eng',
        'display_phone_en',
        'general'
    );
    
    register_setting(
        'general',
        'our_phone_en'
    );
        
    /* Fb */
    add_settings_field(
        'facebook',
        'Facebook',
        'display_facebook',
        'general'
    );
    
    register_setting(
        'general',
        'our_facebook'
    );
    
    /* Twitter */
    add_settings_field(
        'twitter',
        'Twitter',
        'display_twitter',
        'general'
    );
    
    register_setting(
        'general',
        'our_twitter'
    );
    
    /* LinkedIn */
    add_settings_field(
        'linkedin',
        'LinkedIn',
        'display_linkedin',
        'general'
    );
    
    register_setting(
        'general',
        'our_linkedin'
    );
    
    /* Copyright  */
    add_settings_field(
        'copyright',
        'Copyright',
        'display_copyright',
        'general'
    );
    
    register_setting(
        'general',
        'copyright'
    );
    
    /* Copyright En  */
    add_settings_field(
        'copyright_en',
        'Copyright Eng',
        'display_copyright_en',
        'general'
    );
    
    register_setting(
        'general',
        'copyright_en'
    );
}

/* Подвязываем функцию выше на хук admin_init */
add_action('admin_init', 'my_options');

/* Описываем функцию обработчика */
function display_phone(){
    echo "<input type='text' class='regular-text' name='our_phone' value='" . esc_attr(get_option('our_phone')) . "'>";
}

function display_phone_en(){
    echo "<input type='text' class='regular-text' name='our_phone_en' value='" . esc_attr(get_option('our_phone_en')) . "'>";
}

function display_facebook(){
    echo "<input type='text' class='regular-text' name='our_facebook' value='" . esc_attr(get_option('our_facebook')) . "'>";
}

function display_twitter(){
    echo "<input type='text' class='regular-text' name='our_twitter' value='" . esc_attr(get_option('our_twitter')) . "'>";
}

function display_linkedin(){
    echo "<input type='text' class='regular-text' name='our_linkedin' value='" . esc_attr(get_option('our_linkedin')) . "'>";
}

function display_copyright(){
    echo "<input type='text' class='regular-text' name='copyright' value='" . esc_attr(get_option('copyright')) . "'>";
}

function display_copyright_en(){
    echo "<input type='text' class='regular-text' name='copyright_en' value='" . esc_attr(get_option('copyright_en')) . "'>";
}

function my_debug($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

show_admin_bar(false);

?>