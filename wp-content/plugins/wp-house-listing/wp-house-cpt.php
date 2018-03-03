<?php
function dwwp_register_post_type(){
$signular = 'Объект';
$plural = 'Обьекты';
$labels = array(
'name'		=>		$plural,
'signular_name'=> $signular,
'add_new'=>'Добавить',  //+
'add_new_item'=>'Добавить новый '. $signular,  //+
'edit'=>'Редактироватаь',
'edit_item'=>'Редактировать '.$signular,  //+
'new_item'=>'Новый '.$signular,
'view' => 'Показать '.$signular,
'view_item'=>'Показать_ '.$signular,
'search_term'=>'Поиск '.$plural,
'parent'=>'Parent '.$signular,
'not_found' => 'Нет объектов', //+
'not_found_in_trash' => 'No'.$plural.' in trash'
);
$args =  array(
'labels'=>$labels,
'public'             => true,
'publicly_queryable'=> true,
'exclude_from_search'=>false,
'show_in_nav_menus'=>true,
'show_ui'            => true,
'show_in_menu'       => true,
'show_admin_bar'=>true,
'menu_position'=>6,
'menu_icon'=>'dashicons-admin-home',
'can_export'=>true,
'delete_with_user'=>false,
'hierarchical'       => false,
'has_archive'        => true,
'query_var'          => true,
'rewrite'            => array( 'slug' => 'House', 'with_front'=>true,'pages'=>true,'feeds'=>true ),
'capability_type'    => 'post',
'map_meta_cap'=>true,

'supports'=>array('thumbnail',

'title'
),
);



//	'menu_position'      => 10,
//$args=  array('label'=>'Объекты', 'public' => true, );


register_post_type( 'house', $args );
}
add_action('init','dwwp_register_post_type');


function dwwp_register_taxonomy() {
$plural = 'Характеристики';
$singular = 'Характеристика';
$labels = array(
'name'              => $plural,
'singular_name'     => $singular,
'search_items'      => 'Поиск '.$plural,
'popular_items'     => 'Популярные '.$plural,
'all_items'         => 'Все '.$plural,
'parent_item'       => null,
'parent_item_colon' => null,
'edit_item'         => 'Редактировать '.$singular,
'update_item'       => 'Обновить '.$singular,
'add_new_item'      => 'Добавить новую характеристику',
'new_item_name'     => 'Новый '.$singular. ' имя',
'add_or_remove_items'=>'Добавить или удалить'.$plural,
'choose_from_most_used'=>'Выберете из наиболее используемых характеристик',
'not_found'         => 'Не найдены: '.$plural,
'menu_name'         => $plural,


);
$args =array(
'hierarchical'       => false,
'labels'=>$labels,
'show_ui'            => true,
'show_admin_column'     =>true,
'update_count_callback' => '_update_post_term_count',
'query_var'             =>  'true',
'rewrite'               => array('slug'=>'location')
);
register_taxonomy('floor','house',$args);

$plural = 'Расположение';
$singular = 'Расположения';
$labels = array(
'name'              => $plural,
'singular_name'     => $singular,
'search_items'      => 'Поиск '.$plural,
'popular_items'     => 'Популярные '.$plural,
'all_items'         => 'Все '.$plural,
'parent_item'       => null,
'parent_item_colon' => null,
'edit_item'         => 'Редактировать расположение',
'update_item'       => 'Обновить расположение',
'add_new_item'      => 'Добавить новое расположение',
'new_item_name'     => 'Новый '.$singular. ' имя',
'add_or_remove_items'=>'Добавить или удалить'.$plural,
'choose_from_most_used'=>'Выберете из наиболее используемых:'.$plural,
'not_found'         => 'Не найдены: '.$plural,
'menu_name'         => $plural,


);
$args =array(
'hierarchical'       => true,
'labels'=>$labels,
'show_ui'            => true,
'show_admin_column'     =>true,
'update_count_callback' => '_update_post_term_count',
'query_var'             =>  'true',
'rewrite'               => array('slug'=>'location')
);
register_taxonomy('floor1','house',$args);

$plural = 'Тип объекта';
$singular = 'Тип объекта';
$labels = array(
'name'              => $plural,
'singular_name'     => $singular,
'search_items'      => 'Поиск '.$plural,
'popular_items'     => 'Популярные '.$plural,
'all_items'         => 'Все '.$plural,
'parent_item'       => null,
'parent_item_colon' => null,
'edit_item'         => 'Редактировать категорию',
'update_item'       => 'Обновить категорию',
'add_new_item'      => 'Добавить новую категорию',
'new_item_name'     => 'Новый '.$singular. ' имя',
'add_or_remove_items'=>'Добавить или удалить'.$plural,
'choose_from_most_used'=>'Выберете из наиболее используемых:'.$plural,
'not_found'         => 'Не найдены: '.$plural,
'menu_name'         => $plural,


);
$args =array(
'hierarchical'       => false,
'labels'=>$labels,
'show_ui'            => true,
'show_admin_column'     =>true,
'update_count_callback' => '_update_post_term_count',
'query_var'             =>  'true',
'rewrite'               => array('slug'=>'location')
);
register_taxonomy('type_object','house',$args);

$plural = 'Тип недвижимости';
$singular = 'Тип недвижимости';
$labels = array(
'name'              => $plural,
'singular_name'     => $singular,
'search_items'      => 'Поиск '.$plural,
'popular_items'     => 'Популярные '.$plural,
'all_items'         => 'Все '.$plural,
'parent_item'       => null,
'parent_item_colon' => null,
'edit_item'         => 'Редактировать категорию',
'update_item'       => 'Обновить категорию',
'add_new_item'      => 'Добавить новую категорию',
'new_item_name'     => 'Новый '.$singular. ' имя',
'add_or_remove_items'=>'Добавить или удалить'.$plural,
'choose_from_most_used'=>'Выберете из наиболее используемых:'.$plural,
'not_found'         => 'Не найдены: '.$plural,
'menu_name'         => $plural,


);
$args =array(
'hierarchical'       => false,
'labels'=>$labels,
'show_ui'            => true,
'show_admin_column'     =>true,
'update_count_callback' => '_update_post_term_count',
'query_var'             =>  'true',
'rewrite'               => array('slug'=>'location')
);
register_taxonomy('type_house','house',$args);



}


add_action('init','dwwp_register_taxonomy');
