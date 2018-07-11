<?php
/**
 * @package express
 */
/*
Plugin Name: PayPal Express Checkout
Plugin URI: https://example.com
Description: PayPal Express Checkout
Version: 0.0.0
Author: echizenya
Author URI: https://e-yota.com
License: GPLv2 or later
Text Domain: paypal_expresscheckout
*/

 class PayPal_ExpressCheckout {
   // プロパティ（フィールドコールバックで使用される値を保持）
   private $options;

   // コンストラクタ
  public function __construct() {
    add_action( 'admin_menu', array($this, 'paypalexpresscheckout_add_admin_menu') );
    add_action( 'admin_init', array($this, 'paypal_init') );
  }

  // 管理画面にサブメニューを表示する
  public function paypalexpresscheckout_add_admin_menu() {
    add_options_page(
        'Settings Admin',
        'PayPal ExpressCheckout Settings Page',
        'manage_options',
        'my-setting-admin',
        array( $this, 'create_admin_page' )
    );
  }

  // 設定ページの表示
  public function create_admin_page() {

    // my_option_nameをoptionsのプロパティとする
   $this->options = get_option( 'my_option_name' );
   ?>
   <div class="wrap">
      <h2>PayPal ExpressCheckout Settings Page</h2>
      <form method="post" action="options.php">
        <?php settings_fields( 'paypal-settings-group' ); ?>
        <?php do_settings_sections( 'paypal-settings-group' ); ?>
        <table class="form-table">
          <tr>
            <th scope="row">Develop Enviroment</th>
            <td>
              <p>
                <select name="env" size="1">
                  <option value="sandbox" <?php selected( get_option( 'env' ), 'sandbox' ); ?>>sandbox</option>
                  <option value="production" <?php selected( get_option( 'env' ), 'production' ); ?>>production</option>
                </select>
              </p>
            </td>
          </tr>
          <tr valign="top">
          <th scope="row">Client ID</th>
          <td><input type="text" name="client" size="90" value="<?php echo esc_attr( get_option('client') ); ?>" /></td>
          </tr>
        </table>
        <?php submit_button(); ?>
      </form>

   <?php

  }

  // 設定ページの初期化
  public function paypal_init() {

  }




 }

 require(__DIR__ . '/PayPal_ExpressCheckout_admin.php');
