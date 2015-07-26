var j = jQuery.noConflict();
var textError = "";
var username = "";
j(document).ready(function() {
  //j('#happythem-view').show('slow');
  openFB.init({appId: '977899118936808'});


});
// capture callback
var captureSuccess = function(mediaFiles) {
    var i, path, len, name;
    for (i = 0, len = mediaFiles.length; i < len; i += 1) {
        path = mediaFiles[i].fullPath;
        name = mediaFiles[i].name;
        // do something interesting with the file
        //j('#textoError').text('Texto de prueba');
        j('#textoError').text('subiendo');
        uploadVideo(path, name);

    }
};

// capture error callback
var captureError = function(error) {
    navigator.notification.alert('Error code: ' + error.code, null, 'Capture Error');
};

var uploadVideo = function(fileDIR, name_file) {
  var ft = new FileTransfer();
  var options = new FileUploadOptions();
  options.fileKey="archivo";
  options.fileName = name_file;
  options.mimeType="video/mp4";
  var params ={};
  params.user = "Andres Jiménez";
  params.sender = "David Illánez";
  options.params = params;

  ft.upload(fileDIR, encodeURI("http://172.17.31.132/happy/aws/aws_upload.php"), win, fail, options);
  //ft.upload(fileDIR, encodeURI("http://desarrollo.atiko7.com/happyme/aws/aws_upload.php"), win, fail, options);
  //ft.upload(fileDIR, encodeURI("http://desarrollo.atiko7.com/happyme/aws/aws_upload.php"), win, fail, options);
}

function win(r) {
    console.log("Code = " + r.responseCode);
    console.log("Response = " + r.response);
    console.log("Sent = " + r.bytesSent);
    textError = "<br>archivo subido."
    textError += "<br>Code = " + r.responseCode
    textError += "<br>Response = " + r.response
    textError += "<br>Sent = " + r.bytesSent
    j('#textoError').text(textError);
    //spinnerplugin.hide();
}

function fail(error) {
    alert("An error has occurred: Code = " + error.code);
    console.log("upload error source " + error.source);
    console.log("upload error target " + error.target);
    textError = "<br>error en la subida.";
    textError += "<br>An error has occurred: Code = " + error.code;
    textError += "<br>upload error source " + error.source;
    textError += "<br>upload error target " + error.target;
    j('#textoError').text(textError);
}

(function (window, $) {

  $(function() {


    $('.ripple').on('click', function (event) {
      event.preventDefault();

      var $div = $('<div/>'),
          btnOffset = $(this).offset(),
      		xPos = event.pageX - btnOffset.left,
      		yPos = event.pageY - btnOffset.top;



      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");

      $ripple.css("height", $(this).height());
      $ripple.css("width", $(this).height());
      $div
        .css({
          top: yPos - ($ripple.height()/2),
          left: xPos - ($ripple.width()/2),
          background: $(this).data("ripple-color")
        })
        .appendTo($(this));

      window.setTimeout(function(){
        $div.remove();
      }, 2000);
    });

  });

})(window, jQuery);

// start video capture
