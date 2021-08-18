<?php 
/**
 * Plugin Name: QR Code Scanner (BT)
 * Plugin URI: https://oziris.com.au
 * Description: Simple Web QR code and barcode scanner reader for Wordpress
 * Version: 1.0.0
 * Author: Beston Technologies
 * Author URI: https://oziris.com.au
 * Developer: Beston Technologies
 * License: GPL v3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 **/


$QR_Barcode_Scanner_Reader = new QRCodeBarcodeScanner();

class QRCodeBarcodeScanner {
  protected $mwidth;
  protected $mheight;

  public function __construct() {
    add_action( 'wp_enqueue_scripts', array($this, 'qrcodescanner_scripts'), 10, 0  );
    // add_action( 'wp_enqueue_scripts', array($this, 'qrcodescanner_fscript'));
    add_shortcode('qrcodescanner', array($this, 'qrcodescanner_shortcode'));
  }


  public function qrcodescanner_scripts() {
    wp_register_script('html5_qrcode', plugins_url('html5-qrcode.min.js', __FILE__), array( 'jquery'), null);
    wp_enqueue_script('html5_qrcode');
    wp_enqueue_script('scanner_js',  plugin_dir_url( __FILE__ ) . 'scanner.js', array('jquery'), '1.3', true );
  }
 
  public function qrcodescanner_shortcode( $atts ) {
    extract( 
      shortcode_atts( 
        array('width' => '320px', 'height' => '320px'), 
        $atts, 'qrcodescanner' 
      ) 
    );

    $this->mwidth = $width;
    $this->mheight = $height;

    $v = '<div id="qr-reader" style="width:'.$width.';height:'.$height.'"></div>
          <div id="qr-reader-result"></div>';
    return $v;
  }
}