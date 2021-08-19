(function($){
    $(document).ready(function(){
        $("#qr-reader").show(function() {
            // UI Style for scanner
            $("#qr-reader > div:first-of-type").attr("id", "qr-reader-banner");
            $("#qr-reader-banner > span:first-of-type").attr("id", "qr-reader-banner-span");
            $("#qr-reader-banner-span").text("Oziris QR Code Scanner");
            $("#qr-reader-banner-span > a ").remove();
            
        });
        
    });
})( jQuery );

// var resultContainer = document.getElementById("qr-reader-result");
// var lastResult, countResults = 0;

// function onScanSuccess(qrCodeMessage) {
//     var burlReg = new RegExp("\\?batch_id=[0-9]+");
//     var barReg = new RegExp("[0-9]{8,}");

//     //if it's beston url, redirect to special url
//     if ( burlReg.test(qrCodeMessage) ) {
//         var arr = qrCodeMessage.match(burlReg);
//         var url = window.location.href;
//         if (url.includes('/#scan-using-file')) {
//             var newurl = url.replace('/#scan-using-file', '-result' + arr[0]);
//         } else {
//             var newurl = url.replace('/demo', '/demo-result' + arr[0]);
//         }
        
//         window.location.href = newurl;
        
//     } else if ( barReg.test(qrCodeMessage) ) {
//         // if it's barcode, redirect to special url with different parameter
//         console.log(qrCodeMessage);
//     }
    

// }

// function onScanFailure(error) {
//     console.log(`Code scan error = ${error}`);
// }

// var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 250 });
// html5QrcodeScanner.render(onScanSuccess, onScanFailure);

