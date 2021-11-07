<?php

/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

update_option('flatsome_wup_purchase_code', '8f85cd51-2412-4505-1902-9a4137e6ec12');
update_option('flatsome_wup_supported_until', '01.01.2050');
update_option('flatsome_wup_buyer', 'KhoTaiNguyen');

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */
function wooc_extra_register_fields()
{ ?>
  <p class="form-row form-row-wide">
    <label for="reg_billing_phone"><?php _e('Phone', 'woocommerce'); ?></label>
    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e($_POST['billing_phone']); ?>" />
  </p>
  <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
  </p>
  <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e('Last name', 'woocommerce'); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
  </p>
  <div class="clear"></div>
<?php
}
add_action('woocommerce_register_form_start', 'wooc_extra_register_fields');

function auto_redirect_after_logout()
{
  wp_redirect(home_url());
  exit();
}
add_action('wp_logout', 'auto_redirect_after_logout');
