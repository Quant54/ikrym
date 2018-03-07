<?php
function dwwp_add_custom_metabox2()
{
    global $pagenow, $typenow;
    if ($typenow != 'hrarray') return;
    add_meta_box(
        'dwwp_meta2',
        'Мета жилмассивов',
        'dwwp_meta_callback2',
        '',
        'normal',
        'core'
    );
}

function dwwp_meta_callback2()
{
    global $pagenow, $typenow;
    if ($typenow != 'hrarray') return;
    wp_nonce_field(basename(__FILE__), 'dwwp_houses_nonce2');
    $dwwp_stored_meta = get_post_meta(get_the_ID());
    // echo "<pre>";
    // var_dump($dwwp_stored_meta);
    // echo "</pre>";
    ?>
    <div>
        <h2>Описание жилмассива</h2>
    <div class="meta-row">
        <div class="meta-th2">
            <label for="house_id" class="dwwp-row-title">ID жилмассива: 10000<?php esc_html(the_ID()); ?></label>
        </div>

    </div>




        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_floor" class="dwwp-row-title">Этажей в здании:</label>
            </div>
            <div class="meta-td">
                <input type="number" min=1 max=40 name="hrarray_floor" id="hrarray_floor"
                       value="<?php if (!empty($dwwp_stored_meta['hrarray_floor'])) echo esc_attr($dwwp_stored_meta['hrarray_floor'][0]); ?>">
            </div>
        </div>


        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_price" class="dwwp-row-title">Цена от:</label>
            </div>
            <div class="meta-td">
                <input type="text" pattern="\d*" oninvalid="this.setCustomValidity('Введите стоимость в цифрах!')"
                       name="hrarray_price" id="hrarray_price"
                       value="<?php if (!empty($dwwp_stored_meta['hrarray_price'])) echo esc_attr($dwwp_stored_meta['hrarray_price'][0]); ?>">
            </div>
        </div>


        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_price_m" class="dwwp-row-title">Цена за м<sup>2</sup>:</label>
            </div>
            <div class="meta-td">
                <input type="text" pattern="\d*" oninvalid="this.setCustomValidity('Введите стоимость в цифрах!')"
                       name="hrarray_price_m" id="hrarray_price_m"
                       value="<?php if (!empty($dwwp_stored_meta['hrarray_price_m'])) echo esc_attr($dwwp_stored_meta['hrarray_price_m'][0]); ?>">
            </div>
        </div>


        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_status" class="dwwp-row-title">Статус квартиры:</label>
            </div>
            <div class="meta-td">
                <select name="hrarray_status">
                    <option value="yes">Да</option>
                    <option value="no">Нет</option>
                    <option value="both">Оба варианта</option>

                </select>
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_material" class="dwwp-row-title">Материал:</label>
            </div>
            <div class="meta-td">
                <select name="hrarray_material">
                   <?php  $terms_material = get_terms( array(
                    'taxonomy' => 'material',
                    'hide_empty' => false,
                    ) );
                   foreach ($terms_material as $material)
                       echo "<option value=\"".$material->slug."\">".$material->name."</option>";
                   ?>
                </select>
            </div>
        </div>


        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_relate" class="dwwp-row-title">Оформление отношений:</label>
            </div>
            <div class="meta-td">
                <select name="hrarray_relate">
                    <?php  $terms_relate = get_terms( array(
                        'taxonomy' => 'relationships',
                        'hide_empty' => false,
                    ) );
                    foreach ($terms_relate as $relate)
                        echo "<option value=\"".$relate->slug."\">".$relate->name."</option>";
                    ?>
                </select>
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_whose" class="dwwp-row-title">Застройщик:</label>
            </div>
            <div class="meta-td">
                <input type="text" name="hrarray_whose" id="hrarray_whose" value="<?php if (!empty($dwwp_stored_meta['hrarray_whose'])) echo esc_attr($dwwp_stored_meta['hrarray_whose'][0]); ?>">
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_deadline" class="dwwp-row-title">Срок сдачи: </label>
            </div>
            <div class="meta-td">
                <input type="text" id="datepicker" name="hrarray_deadline" value="<?php if (!empty($dwwp_stored_meta['hrarray_deadline'])) echo esc_attr($dwwp_stored_meta['hrarray_deadline'][0]); ?>">
            </div>
        </div>

    </div>
    <div>
        <h2>Расположение</h2>

        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_city" class="dwwp-row-title">Город:</label>
            </div>
            <div class="meta-td">
                <input type="text" name="hrarray_city" id="hrarray_city" value="<?php if (!empty($dwwp_stored_meta['hrarray_city'])) echo esc_attr($dwwp_stored_meta['hrarray_city'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_tosea" class="dwwp-row-title">До моря минут пишком:</label>
            </div>
            <div class="meta-td">
                <input type="text" pattern="\d*" oninvalid="this.setCustomValidity('Введите стоимость в цифрах!')"
                       name="hrarray_tosea" id="hrarray_tosea"
                       value="<?php if (!empty($dwwp_stored_meta['house_price'])) echo esc_attr($dwwp_stored_meta['hrarray_tosea'][0]); ?>">
            </div>
        </div>


        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_tosea_bycar" class="dwwp-row-title">До моря минут на транспорте:</label>
            </div>
            <div class="meta-td">
                <input type="text" pattern="\d*" oninvalid="this.setCustomValidity('Введите стоимость в цифрах!')"
                       name="hrarray_tosea_bycar" id="hrarray_tosea_bycar"
                       value="<?php if (!empty($dwwp_stored_meta['house_price'])) echo esc_attr($dwwp_stored_meta['hrarray_tosea_bycar'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_street" class="dwwp-row-title">Улица:</label>
            </div>
            <div class="meta-td">
                <input type="text" name="hrarray_street" id="hrarray_street" value="<?php if (!empty($dwwp_stored_meta['hrarray_street'])) echo esc_attr($dwwp_stored_meta['hrarray_street'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="hrarray_number" class="dwwp-row-title">Дом:</label>
            </div>
            <div class="meta-td">
                <input type="text" name="hrarray_number" id="hrarray_number" value="<?php if (!empty($dwwp_stored_meta['hrarray_number'])) echo esc_attr($dwwp_stored_meta['hrarray_number'][0]); ?>">
            </div>
        </div>


    </div>


    <?php
}

;

function dwwp_meta_save2($post_id)
{
    // $post_id = get_the_ID();

    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset ($_POST['dwwp_houses_nonce2']) && wp_verify_nonce($_POST['dwwp_houses_nonce2'], basename(__FILE__))) ? 'true' : 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }

    if (isset($_POST['hrarray_floor'])) {
        update_post_meta($post_id, 'hrarray_floor', sanitize_text_field($_POST['hrarray_floor']));
    }
    if (isset($_POST['hrarray_price'])) {
        update_post_meta($post_id, 'hrarray_price', sanitize_text_field($_POST['hrarray_price']));
    }
    if (isset($_POST['hrarray_price_m'])) {
        update_post_meta($post_id, 'hrarray_price_m', sanitize_text_field($_POST['hrarray_price_m']));
    }
    if (isset($_POST['hrarray_status'])) {
        update_post_meta($post_id, 'hrarray_status', sanitize_text_field($_POST['hrarray_status']));
    }
    if (isset($_POST['hrarray_material'])) {
        update_post_meta($post_id, 'hrarray_material', sanitize_text_field($_POST['hrarray_material']));
    }
    if (isset($_POST['hrarray_relate'])) {
        update_post_meta($post_id, 'hrarray_relate', sanitize_text_field($_POST['hrarray_relate']));
    }
    if (isset($_POST['hrarray_whose'])) {
        update_post_meta($post_id, 'hrarray_whose', sanitize_text_field($_POST['hrarray_whose']));
    }
    if (isset($_POST['hrarray_deadline'])) {
        update_post_meta($post_id, 'hrarray_deadline', sanitize_text_field($_POST['hrarray_deadline']));
    }
    if (isset($_POST['hrarray_city'])) {
        update_post_meta($post_id, 'hrarray_city', sanitize_text_field($_POST['hrarray_city']));
    }
    if (isset($_POST['hrarray_tosea'])) {
        update_post_meta($post_id, 'hrarray_tosea', sanitize_text_field($_POST['hrarray_tosea']));
    }
    if (isset($_POST['hrarray_tosea_bycar'])) {
        update_post_meta($post_id, 'hrarray_tosea_bycar', sanitize_text_field($_POST['hrarray_tosea_bycar']));
    }
    if (isset($_POST['hrarray_street'])) {
        update_post_meta($post_id, 'hrarray_street', sanitize_text_field($_POST['hrarray_street']));
    }
    if (isset($_POST['hrarray_number'])) {
        update_post_meta($post_id, 'hrarray_number', sanitize_text_field($_POST['hrarray_number']));
    }
}


add_action('save_post', 'dwwp_meta_save2');
add_action('add_meta_boxes', 'dwwp_add_custom_metabox2');