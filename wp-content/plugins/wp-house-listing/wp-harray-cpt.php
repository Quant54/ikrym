<?php
function dwwp_register_post_type2()
{
    $signular = 'Жилмассив';
    $plural = 'Жилмассив';
    $labels = array(
        'name' => $plural,
        'signular_name' => $signular,
        'add_new' => 'Добавить',  //+
        'add_new_item' => 'Добавить новый ' . $signular,  //+
        'edit' => 'Редактироватаь',
        'edit_item' => 'Редактировать ' . $signular,  //+
        'new_item' => 'Новый ' . $signular,
        'view' => 'Показать ' . $signular,
        'view_item' => 'Показать_ ' . $signular,
        'search_term' => 'Поиск ' . $plural,
        'parent' => 'Parent ' . $signular,
        'not_found' => 'Нет объектов', //+
        'not_found_in_trash' => 'No' . $plural . ' in trash'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_admin_bar' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-admin-home',
        'can_export' => true,
        'delete_with_user' => false,
        'hierarchical' => false,
        'has_archive' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'hr_array', 'with_front' => true, 'pages' => true, 'feeds' => true),
        'capability_type' => 'post',
        'map_meta_cap' => true,

        'supports' => array('thumbnail',
            'editor',
            'title'
        ),
    );


//	'menu_position'      => 10,
//$args=  array('label'=>'Объекты', 'public' => true, );


    register_post_type('hrarray', $args);
}

add_action('init', 'dwwp_register_post_type2');


function dwwp_register_taxonomy2()
{
    $plural = 'Характеристики';
    $singular = 'Характеристика';
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'search_items' => 'Поиск ' . $plural,
        'popular_items' => 'Популярные ' . $plural,
        'all_items' => 'Все ' . $plural,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Редактировать ' . $singular,
        'update_item' => 'Обновить ' . $singular,
        'add_new_item' => 'Добавить новую характеристику',
        'new_item_name' => 'Новый ' . $singular . ' имя',
        'add_or_remove_items' => 'Добавить или удалить' . $plural,
        'choose_from_most_used' => 'Выберете из наиболее используемых характеристик',
        'not_found' => 'Не найдены: ' . $plural,
        'menu_name' => $plural,


    );
    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => 'true',
        'rewrite' => array('slug' => 'hr_options')
    );
    register_taxonomy('hr_options', 'hrarray', $args);

    $plural = 'Материал стен';
    $singular = 'Материал стен';
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'search_items' => 'Поиск ' . $plural,
        'popular_items' => 'Популярные ' . $plural,
        'all_items' => 'Все ' . $plural,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Редактировать Материал стен',
        'update_item' => 'Обновить Материал стен',
        'add_new_item' => 'Добавить новой материал',
        'new_item_name' => 'Новый ' . $singular . ' имя',
        'add_or_remove_items' => 'Добавить или удалить' . $plural,
        'choose_from_most_used' => 'Выберете из наиболее используемых:' . $plural,
        'not_found' => 'Не найдены: ' . $plural,
        'menu_name' => $plural,


    );
    $args = array(
        'hierarchical' => false,
        'labels' => $labels,


        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => 'true',
        'rewrite' => array('slug' => 'material')
    );
    register_taxonomy('material', 'hrarray', $args);

    $plural = 'Оформление отношений';
    $singular = 'Оформление отношений';
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'search_items' => 'Поиск ' . $plural,
        'popular_items' => 'Популярные ' . $plural,
        'all_items' => 'Все ' . $plural,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Редактировать отношения',
        'update_item' => 'Обновить отношения',
        'add_new_item' => 'Добавить новые отношения',
        'new_item_name' => 'Новый ' . $singular . ' имя',
        'add_or_remove_items' => 'Добавить или удалить' . $plural,
        'choose_from_most_used' => 'Выберете из наиболее используемых:' . $plural,
        'not_found' => 'Не найдены: ' . $plural,
        'menu_name' => $plural,


    );
    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => 'true',
        'rewrite' => array('slug' => 'relationships')
    );
    register_taxonomy('relationships', 'hrarray', $args);


}


add_action('init', 'dwwp_register_taxonomy2');
