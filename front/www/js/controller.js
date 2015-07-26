angular.module('starter.controllers', [])
.controller('MainController', ['$scope', '$http', function($scope,$http) {
$http
  $scope.recordVideo = function(username_value) {
    // start video captureval
    //spinnerplugin.show();
    navigator.device.capture.captureVideo(captureSuccess, captureError, {limit:1});
    username = username_value;
    //alert(username_value);
  };
  $scope.openHappyThem = function() {
    j('#happythem-view').css({top:383,position:'absolute'});
    j('#happythem-view').css('display', 'block');
    j('#happythem-view').animate({ opacity: 0 }, 0);
    j('#happythem-view').animate({top:0, opacity:1}, 'slow', function() {
        //callback
        j('#happythem-view').css({position:'relative'});
    });
    j('#home-view').fadeOut('slow');

  };
  $scope.closeHappyThem = function() {
    j('#happythem-view').css({top:0,position:'absolute'});
    j('#happythem-view').css('display', 'block');
    j('#happythem-view').animate({ opacity: 1 }, 0);
    j('#happythem-view').animate({top:383, opacity:0}, 'slow', function() {
        //callback
        j('#happythem-view').css({position:'relative'});
    });
    j('#home-view').fadeIn('slow');

  };
  $scope.openHistory = function() {
    j('#history-view').css({top:383,position:'absolute'});
    j('#history-view').css('display', 'block');
    j('#history-view').animate({ opacity: 0 }, 0);
    j('#history-view').animate({top:0, opacity:1}, 'slow', function() {
        //callback
        j('#history-view').css({position:'relative'});
    });
    j('#home-view').fadeOut('slow');

  };
  $scope.closeHistory = function() {
    j('#history-view').css({top:0,position:'absolute'});
    j('#history-view').css('display', 'block');
    j('#history-view').animate({ opacity: 1 }, 0);
    j('#history-view').animate({top:383, opacity:0}, 'slow', function() {
        //callback
        j('#history-view').css({position:'relative'});
    });
    j('#home-view').fadeIn('slow');

  };
  $scope.login = function() {

        openFB.login(
                function(response) {
                    if(response.status === 'connected') {
                        alert('Facebook login succeeded, got access token: ' + response.authResponse.accessToken);
                    } else {
                        alert('Facebook login failed: ' + response.error);
                    }
                }, {scope: 'email,read_stream,publish_actions'});
    };

    $scope.friends = [
      {name:'Andrés Jiménez', param2: 'param2'},
      {name:'Dani Carvajal', param2: 'param2'},
      {name:'Tomás Aguirre', param2: 'param2'}
    ];

    $scope.retrieveVideo = function() {
      // $http.post('http://172.17.31.132/happy/index.php?mensaje_randomico&mensaje_randomico_usuario=panchito').
      // success(function(data, status, headers, config) {
      //   // this callback will be called asynchronously
      //   // when the response is available
      //   console.log(data);
      //   VideoPlayer.play(
      //     data.url,
      //     {
      //         volume: 0.5,
      //         scalingMode: VideoPlayer.SCALING_MODE.SCALE_TO_FIT_WITH_CROPPING
      //     },
      //     function () {
      //         console.log("video completed");
      //     },
      //     function (err) {
      //         console.log(err);
      //     }
      // );
      // }).
      // error(function(data, status, headers, config) {
      //   // called asynchronously if an error occurs
      //   // or server returns response with an error status.
      //   console.log('error retrieving video')
      // });
  //     j.ajax({
  //       url: 'http://172.17.31.132/happy/index.php',
  //       data: 'mensaje_randomico=0&mensaje_randomico_usuario=panchito',
  //       type: 'GET',
  //       crossDomain: true, // enable this
  //       dataType: 'jsonp',
  //       success: function() { alert("Success"); },
  //       error: function(e) { alert(e.data); }
  //   }).done(function( data ) {
  //
  //     console.log( "Sample of data:", data.slice( 0, 100 ) );
  // });
      // var fileTransfer = new FileTransfer();
      // var uri = encodeURI("http://172.17.31.132/happy/index.php?mensaje_randomico&mensaje_randomico_usuario=panchito");
      //
      // fileTransfer.download(
      //     uri,
      //     filePath,
      //     function(entry) {
      //         console.log("download complete: " + entry.fullPath);
      //     },
      //     function(error) {
      //         console.log("download error source " + error.source);
      //         console.log("download error target " + error.target);
      //         console.log("upload error code" + error.code);
      //     },
      //     false,
      //     {
      //         headers: {
      //             "Authorization": "Basic dGVzdHVzZXJuYW1lOnRlc3RwYXNzd29yZA=="
      //         }
      //     }
      // );



      VideoPlayer.play(
        "https://s3-us-west-2.amazonaws.com/happyme/20150726_162439.mp4",
        {
            volume: 0.5,
            scalingMode: VideoPlayer.SCALING_MODE.SCALE_TO_FIT_WITH_CROPPING
        },
        function () {
            console.log("video completed");
        },
        function (err) {
            console.log(err);
        }
    );

    };

}]);
