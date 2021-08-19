<?php 
/**
 * Plugin Name: QR Code and Barcode Scanner Reader
 * Plugin URI: https://4wp.it/contatti
 * Description: Simple Web QR code and barcode scanner reader for Wordpress
 * Version: 1.0.0
 * Author: 4wpbari
 * Author URI: https://4wp.it/roberto-bottalico/
 * Developer: Roberto Bottalico
 * License: GPL v3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 **/


$QR_Barcode_Scanner_Reader = new QRCodeBarcodeScanner();

class QRCodeBarcodeScanner {
  protected $mwidth;
  protected $mheight;
  public function __construct() {
    add_action( 'wp_enqueue_scripts', array($this, 'qrcodescanner_scripts'), 10, 0  );
    add_action( 'wp_footer', array($this, 'qrcodescanner_fscript'));
    add_shortcode('qrcodescanner', array($this, 'qrcodescanner_shortcode'));
  }
  public function qrcodescanner_scripts() {
    wp_register_script('html5_qrcode', plugins_url('html5-qrcode.min.js', __FILE__), array( 'jquery'),null);

    wp_enqueue_script('html5_qrcode');
  }
public function strLength($str,$len){ 
      $length = strlen($str); 
      if($length > $len){ 
          return substr($str,0,$len).'...'; 
      }else{ 
          return $str; 
      } 
  } 
public function qrcodescanner_shortcode( $atts ) {
  extract( shortcode_atts( array(
    'width' => '320px',
    'height' => '320px'
  ), $atts, 'qrcodescanner' ) );

  $this->mwidth = $width;
  $this->mheight = $height;

  $v = '<div id="qr-reader" style="width:'.$width.';height:'.$height.'"></div>
<div id="qr-reader-result"></div>';
  return $v;
	
  
}
public function qrcodescanner_fscript() {
	?>
        <script>
var resultContainer = document.getElementById("qr-reader-result");
var lastResult, countResults = 0;

function onScanSuccess(qrCodeMessage) {
    var burlReg = new RegExp("\\?batch_id=[0-9]+");
    var barReg = new RegExp("[0-9]{8,}");

    //if it's beston url, redirect to special url
    if ( burlReg.test(qrCodeMessage) ) {
        var arr = qrCodeMessage.match(burlReg);
        var url = window.location.href;
        if (url.includes('/#scan-using-file')) {
            var newurl = url.replace('/#scan-using-file', '-result' + arr[0]);
        } else {
            var newurl = url.replace('/demo', '/demo-result' + arr[0]);
        }
        
        window.location.href = newurl;
        
        // if (qrCodeMessage !== lastResult) {
        //     ++countResults;
        //     lastResult = qrCodeMessage;
        //     resultContainer.innerHTML 
        //         += `<div id="">[${countResults}] - ${qrCodeMessage}</div>`;
        // }
        // resultContainer.innerHTML += '<div>Cannot Find Related Product</div>';
    } else if ( barReg.test(qrCodeMessage) ) {
        // if it's barcode, redirect to special url with different parameter
        console.log(qrCodeMessage);
    }
    

}

function onScanFailure(error) {
    console.log(`Code scan error = ${error}`);
}

var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
  </script>
  <?php
  
}
}