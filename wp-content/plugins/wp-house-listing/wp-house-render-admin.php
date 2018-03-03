<?php 
function settings_admin_houses_callback() {?>
	<div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="house_id" class="dwwp-row-title">Старт нумерации домов</label>
            </div>
            <div class="meta-td">
                <input  type="text" pattern="\d*"  oninvalid="this.setCustomValidity('Введите ID дома в цифрах!')"  name="house_id" id="house_id" value="<?php echo get_option('house_number'); ?>">
            </div>
        </div>
   </div><?php



$args = array( 
	'post_type' => 'house' ,
	'orderby'=>'menu_order',
	'order'=>'ASC',
	'post_status'=>'publish',
	'no_found_rows'=>true,
	'update_post_term_cache'=>false,
	'posts_per_page' => 3,
);
$houses = new WP_Query( $args  );

$the_query = new WP_Query( $args );
 
// The Loop

?>
<div id="job-sort" class="wrap">
<div id="icon-house-admin" class="icon32"><br /></div>
<h2><?php _e('Списки всех домов [ИСПОЛЬЗУЮТ ДЛЯ РАЗРАБОТКИ, ОГРАНИЧЕННЫЙ ФУНКЦИОНАЛ]','wp-house-listing')?></h2><img src="<?php echo esc_url( admin_url() . '/images/loading.gif'); ?>" id="loading-animation"  alt="fe">
<?php 

if ($houses->have_posts() ): ?>

<p><?php _e('<strong>Замечание:</strong> используются только с вызовом шорткода ','wp-house-listing')  ?></p>
<ul id="custom-type-list">
	<?php 
while ($houses->have_posts()): $houses->the_post();?>

	<li id="<?php the_id(); ?>"> <?php the_title(); ?> 
	</li>
	<?php endwhile; ?>
</ul>
<?php else: ?>
	<p><?php
	 _e('Нет объектов','wp-house-listing');
		?></p>
<?php endif; ?>
</div>

<?php

}

function dwwp_save_settings(){
//AJAX не работает будет время разобраться необходимо
	if (!check_ajax_referer('wp-house-order','security')) {
		return wp_send_json_error('Не верный формат');
	}
	if (! current_user_can('manage_options')){
				return wp_send_json_error('Извините, не хватает прав');
	}
	$order = $_POST['order'];
	$aorder=explode(",",$order);

	$counter=0;
	var_dump($aorder);
	foreach ($aorder as $item_id) {
echo"sdf";
		$post = array(
			'ID'=>(int)$item_id,
			'menu_oder'=>$counter,

		);
var_dump($post);
$post_id = wp_update_post($post,true);
if (is_wp_error($post_id)) {
	$errors = $post_id->get_error_messages();
	foreach ($errors as $error) {
		echo $error;
	}
}

$counter++;
	}
wp_send_json_success(	"Good");
}
add_action('wp_ajax_save_sort','dwwp_save_settings');