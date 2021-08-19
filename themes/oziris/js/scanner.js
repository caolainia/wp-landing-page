var resultContainer = document.getElementById("qr-reader-result");
var lastResult, countResults = 0;

(function($){
    $(document).ready(function(){
        // write code here
      
    });
})( jQuery );

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }


async function onScanSuccess(qrCodeMessage) {
    //if it's beston url, send request to special url and embed html
    if (qrCodeMessage.includes("batch_id")) {
        var rx = new RegExp("\\?batch_id=[0-9]+");
        var arr = qrCodeMessage.match(rx);
        qrCodeMessage = url + arr[0];

        // https://localhost/wordpress/demo/#scan-using-file
        var url = window.location.href;
        url = url.replace('/#scan-using-file', '-result' + arr[0]);
        window.location.href = url;
        
    } else {

        // if (qrCodeMessage !== lastResult) {
        //     ++countResults;
        //     lastResult = qrCodeMessage;
        //     resultContainer.innerHTML 
        //         += `<div id="">[${countResults}] - ${qrCodeMessage}</div>`;
        // }
        resultContainer.innerHTML += '<div>Cannot Find Related Product</div>';
    }
    

}

function onScanFailure(error) {
    alert(`Code scan error = ${error}`);
}

var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
