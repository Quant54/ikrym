<?php
function dwwp_add_custom_metabox() {
global $pagenow, $typenow; 
if ($typenow!='house') return; 
add_meta_box(
    'dwwp_meta',
    'Мета домов',
'dwwp_meta_callback',
    '',
    'normal',
    'core'
);
}
function dwwp_meta_callback(){
    global $pagenow, $typenow; 
    if ($typenow!='house') return; 
  wp_nonce_field(basename( __FILE__ ),'dwwp_houses_nonce');
  $dwwp_stored_meta=get_post_meta(get_the_ID());
      // echo "<pre>";
      // var_dump($dwwp_stored_meta);
      // echo "</pre>";
    ?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="house_id" class="dwwp-row-title">ID дома</label>
            </div>
            <div class="meta-td">
                10000<?php esc_html(the_ID()); ?>
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="house_price" class="dwwp-row-title">Стоимость</label>
            </div>
            <div class="meta-td">
                <input  type="text" pattern="\d*"  oninvalid="this.setCustomValidity('Введите стоимость в цифрах!')" name="house_price" id="house_price" value="<?php if (!empty($dwwp_stored_meta['house_price'])) echo esc_attr ( $dwwp_stored_meta['house_price'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="house_room" class="dwwp-row-title">Количество комнат</label>
            </div>
            <div class="meta-td">
                <input type="number" min=1 max=10 name="house_room" id="house_room" value="<?php if (!empty($dwwp_stored_meta['house_room'])) echo esc_attr ( $dwwp_stored_meta['house_room'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="house_floor" class="dwwp-row-title">Этаж/Этажность</label>
            </div>
            <div class="meta-td">
                <input type="number" min=1 max=40 name="house_floor" id="house_floor" value="<?php if (!empty($dwwp_stored_meta['house_floor'])) echo esc_attr ( $dwwp_stored_meta['house_floor'][0]); ?>">/<input type="number" min=1 max=40 name="house_max_floor" id="house_max_floor" value="<?php if (!empty($dwwp_stored_meta['house_max_floor'])) echo esc_attr ( $dwwp_stored_meta['house_max_floor'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="house_squre" class="dwwp-row-title">Площадь</label>
            </div>
            <div class="meta-td">
                <input type="text" name="house_squre" id="house_squre" value="<?php if (!empty($dwwp_stored_meta['house_squre'])) echo esc_attr ( $dwwp_stored_meta['house_squre'][0]); ?>">
            </div>
        </div>

        <div class="meta">
            <div class="meta-th">
                <span>Описание объекта</span>
            </div>
        </div>
        <div class="meta-editor">
            <?php
			
            $content = get_post_meta(get_the_ID(),'house_description',true);
            $editor = 'house_description';
            $settings = array(
                'textarea_rows'=>10,
                'media_buttons'=>false, 
            );
            wp_editor($content,$editor,$settings);
            ?>
        </div>
    </div>
<?php
};

function dwwp_meta_save($post_id){
   // $post_id = get_the_ID();

    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset ($_POST['dwwp_houses_nonce']) && wp_verify_nonce ($_POST['dwwp_houses_nonce'],basename(__FILE__))) ? 'true': 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce){return;}

    if (isset($_POST['house_id'])){
        update_post_meta($post_id,'house_id',sanitize_text_field($_POST['house_id']));
    }
    if (isset($_POST['house_price'])){
        update_post_meta($post_id,'house_price',sanitize_text_field($_POST['house_price']));
    }
    if (isset($_POST['house_room'])){
        update_post_meta($post_id,'house_room',sanitize_text_field($_POST['house_room']));
    }
    if (isset($_POST['house_squre'])){
        update_post_meta($post_id,'house_squre',sanitize_text_field($_POST['house_squre']));
    }
    if (isset($_POST['house_floor'])){
        update_post_meta($post_id,'house_floor',sanitize_text_field($_POST['house_floor']));
    }
      if (isset($_POST['house_max_floor'])){
        update_post_meta($post_id,'house_max_floor',sanitize_text_field($_POST['house_max_floor']));
    }
    if (isset($_POST['house_description'])){
        update_post_meta($post_id,'house_description',sanitize_text_field($_POST['house_description']));
    }
}


add_action('save_post','dwwp_meta_save');
add_action('add_meta_boxes','dwwp_add_custom_metabox');