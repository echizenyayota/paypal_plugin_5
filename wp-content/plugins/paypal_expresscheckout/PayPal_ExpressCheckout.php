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
  }

  // 管理画面にサブメニューを表示する
  public function paypalexpresscheckout_add_admin_menu() {

  }

  // 設定ページの表示
  public function create_admin_page() {


  }


 }

 require(__DIR__ . '/PayPal_ExpressCheckout_admin.php');
