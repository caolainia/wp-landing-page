var resultContainer = document.getElementById("qr-reader-result");
var lastResult, countResults = 0;

function onScanSuccess(qrCodeMessage) {
    var url = "https://oziris.com.au/OzirisBackend/web/admin/product-mobile/view";
    //if it's beston url, send request to special url and embed html
    if (qrCodeMessage.includes("batch_id")) {
        var rx = new RegExp("\\?batch_id=[0-9]+");
        var arr = qrCodeMessage.match(rx);
        qrCodeMessage = url + arr[0];
        
        var button = '<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Show Scan Result</button>';

        var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">' + 
        '<div class="modal-dialog">' + 
            '<div class="modal-content">' +
            '<div class="modal-header">' +
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                '<h4 class="modal-title" id="myModalLabel">Scan Result</h4>' +
            '</div>' +
            '<div class="modal-body">' +
                '<iframe src=" ' + qrCodeMessage + ' width="380" height="1200" frameborder="0" allowtransparency="true"></iframe>' + 
            '</div>' +
            '<div class="modal-footer">' +
                '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                '<button type="button" class="btn btn-primary">OK</button>' +
            '</div></div></div></div>';

            var bmodal = button + modal;

            resultContainer.innerHTML += button;
            resultContainer.innerHTML += modal;
        
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
    alert(`Code scan error = ${error}`);ssss
}

var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanFailure);