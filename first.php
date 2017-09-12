<!DOCTYPE html>
<html lang = "ko">
  <head>
    <title>Tap The World</title>

<!-- Add meta Tag for Responsive Design => Can control with Device's width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"  charset="utf-8">
<!-- Add Bootstrap Css, Js & jquery -->
    <link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<style>

  /*td{width:300px;}*/
  #category{
    width: 10%;
  }
  #check{
    width:1%;
  }
  /*About button */
  #btn{
    -webkit-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
    -moz-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
    -ms-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
    -o-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
    transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
    display: block;
    margin: 5px auto;
    max-width: 260px;
    text-decoration: none;
    border-radius: 4px;
    padding: 10px 10px;
    color: rgba(30, 22, 54, 0.6);
    box-shadow: rgba(30, 22, 54, 0.4) 0 0px 0px 2px inset;
    font-size:13.5pt;
  }

  #btn:hover{
    color: rgba(255, 255, 255, 0.85);
    box-shadow: rgba(30, 22, 54, 0.7) 0 0px 0px 40px inset;
  }

  #map{
    height: 400px;
  }

  .modal-body{      /* modal -body에 스크롤 추가  */
    height: 250px;
   overflow-y: auto;
  }

  /*table th{
    float:left;
  }*/

  a{
    color : #000000;
  }
</style>

<script>

  function initMap(){
    var map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(37.564749, 126.983367),  // Start Point (명동)
      zoom: 11
    });
    var infoWindow = new google.maps.InfoWindow({

      maxWidth : 600
    }); // 지도위에 콘텐츠 표시용 변수



    downloadUrl('http://localhost/for_git/name_xml.php', function(data){
      var xml = data.responseXML;
      var lists = xml.documentElement.getElementsByTagName('list');

      Array.prototype.forEach.call(lists, function(listsElem){
        var name = listsElem.getAttribute('name');

        //// Making Mark with circle ////

        // Marker Setting Point
        var point = new google.maps.LatLng(
          parseFloat(listsElem.getAttribute('lat')),
          parseFloat(listsElem.getAttribute('lng'))
        );

        var infowincontent = document.createElement('div');
        infowincontent.className = "panel panel-warning col-sm-12 col-xs-12";

        var infowin_panel_head = document.createElement('div');
        infowin_panel_head.className = "panel-heading";
        var infowin_panel_title = document.createElement('h3');
        infowin_panel_title.className = "panel-title";

        var infowin_panel_body =document.createElement('div');
        infowin_panel_body.className = "panel-body";

        infowincontent.appendChild(infowin_panel_head);
        infowin_panel_head.appendChild(infowin_panel_title);
        infowincontent.appendChild(infowin_panel_body);

        var container_dummy = document.createElement('table');
        container_dummy.border = 3;

        var button1 = document.createElement('button');
        var button2 = document.createElement('button');

        infowin_panel_title.appendChild(document.createTextNode(name));

 // Download each city's Data
          downloadUrl('http://localhost/for_git/list_xml.php', function(data2){  // Second downloadUrl
          var name2 = null;
 // Convert city name korean -> English
          if(name == "용산"){  // Table명 '용산구'이면 YoungsanGu로
            name2 = "yongsan";
          }
          else if(name == "서초"){
            name2 = "seocho";
          }
          else if(name == "마포"){
            name2 = "mapo";
          }
          else if(name == "강남"){
            name2 = "gangnam";
          }
          else if(name == "송파"){
            name2 = "songpa";
          }
          else if(name == "관악"){
            name2 = "gwanak";
          }
          else if(name == "동작"){
            name2 = "dongjak";
          }
          else if(name == "영등포"){
            name2 = "yeongdeungpo";
          }
          else if(name == "구로"){
            name2 = "guro";
          }
          else if(name == "강서"){
            name2 = "gangseo";
          }
          else if(name == "서래마을"){
            name2 = "seorae";
          }
          else if(name == "이태원"){
            name2 = "itaewon";
          }
          else if(name == "명동"){
            name2 = "myeongdong";
          }
          else if(name == "은평"){
            name2 = "eunpyeong";
          }
          else if(name == "종로"){
            name2 = "jongro";
          }
          else if(name == "대학로"){
            name2 = "daehakro";
          }
          else if(name == "삼청"){
            name2 = "samcheongdong";
          }
          else if(name == "중구"){
            name2 = "junggu";
          }
          else if(name == "건대"){
            name2 = "kondae";
          }
          else if(name == "동대문"){
            name2 = "dongdaemun";
          }
          else if(name == "강북"){
            name2 = "kangbuksungbuk";
          }
          else if(name == "강동"){
            name2 = "kangdong";
          }
          else if(name == "광진중랑"){
            name2 = "kwangjinjungrang";
          }
          else if(name == "도봉"){
            name2 = "dobong";
          }
          else if(name == "신촌"){
            name2 = "sinchon";
          }
          else if(name == "성동"){
            name2 = "sungdong";
          }
          else if(name == "인사동"){
            name2 = "insadong";
          }

          var xml2 = data2.responseXML;
          var lists2 = xml2.documentElement.getElementsByTagName(name2);

          Array.prototype.forEach.call(lists2, function(listsElem2){ // Second of []/prototype.forEach.call
            var type = listsElem2.getAttribute('type');
            var name2 = listsElem2.getAttribute('name');
            var address = listsElem2.getAttribute('address');
            var information = listsElem2.getAttribute('information');

            // var container_dummy = document.createElement('div');

            container_dummy.className = "col-sm-12";

            var dummy0 = document.createElement('tr');

            // var dummy = document.createElement('div');
            var dummy = document.createElement('th');
            dummy.className = "col-sm-3 col-xs-12";
            dummy.appendChild(document.createTextNode(name2));


            // var dummy2 = document.createElement('div');
            var dummy2 = document.createElement('th');
            dummy2.className = "col-sm-8 col-xs-12";
            dummy2.appendChild(document.createTextNode(information));
            dummy2.appendChild(document.createElement('br'));
            var a = document.createElement('a');


            a.appendChild(dummy);
            a.appendChild(dummy2);

            dummy0.appendChild(a);
            container_dummy.appendChild(dummy0);
            // container_dummy.appendChild(dummy2);

            infowin_panel_body.appendChild(container_dummy);

          });   // End of second [].prototype.forEach.call

        }); // End of Second downloadUrl

        var marker = new google.maps.Circle({   // 빨간원 = 유흥
          strokeColor: '#FF0000',
          strokeOpacity: 0.7,
          strokeWeight: 1,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map,
          position: point,  // 클릭했을 떄, 정보 나오는 좌표
          center: point,    // 원의 중심
          radius: Math.sqrt(1500) * 5 // 원의 반지름
        });

        marker.addListener('click', function(){


          infoWindow.setContent(infowincontent);
          infoWindow.open(map, marker);


        });



      }); // End of First [].prototype.forEach.call
    }); // End of First downloadUrl




  }  // End of initMap Function


/* Function that Read Xml & Download Data
  => google API offering
*/
  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
  }

  function doNothing(){}

</script>

  </head>
<body>


  <div class  = "row"> <!-- 1.row -->
    <div class = "col-sm-12">
      <nav class = "navbar navbar-default navbar-fixed-top">
      <div class = "container">
        <div class = "navbar-header">
          <button type = "button"
                  class = "navbar-toggle"
                  data-toggle = "collapse"
                  data-target = "#expand-page"
                  aria-expanded = "false">
          <span class="sr-only">toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div> <!-- End of Navbar-header -->

      <div class = "collapse navbar-collapse" id="expand-page">
        <ul class = "nav navbar-nav navbar-left">
          <li><a href = "#" class ="glyphicon glyphicon-user"> SignUp</a></li>
          <li><a href = "#" class ="glyphicon glyphicon-log-in"> LogIn</a></li>
        </ul>
        <ul class = "nav navbar-nav navbar-right">
          <li><a href ="#"> How to Use</a></li>
          <li><a href ="#"> Contact Us</a></li>
        </ul>
       </div>
      </div>
      </nav>
    </div>
  </div>  <!-- End of 1.row -->

<br><br><br><br>

  <div class = "row"> <!-- 2.row -->
    <div class = "col-sm-4 col-xs-12 col-lg-4">  <!-- Check box Part -->

    </div>
    <div class = "col-sm-8" id = map> <!-- Map Part -->

    </div>
  </div>
  </div>  <!-- End of 2.row -->






<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAwrfz2MVZoTgp-8XvRRrdSyba3_gV_4VU&callback=initMap"></script>
<!-- callback=initMap  -->
<script src = "http://malsup.github.io/jquery.cycle2.js?ver=1"></script>
</body>


</html>
