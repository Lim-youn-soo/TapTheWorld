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

  td > input{
    float:left;
  }

</style>

<script>
  function initMap(){
    var map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(37.564749, 126.983367),  // Start Point (명동)
      zoom: 11
    });
    var infoWindow = new google.maps.InfoWindow; // 지도위에 콘텐츠 표시용 변수

    var data = downloadUrl('http://localhost/for_git/xml.php');

    var xml = data.responseXML;
    var lists = xml.documentElement.getElementsByTagName('list');

  }

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


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAwrfz2MVZoTgp-8XvRRrdSyba3_gV_4VU"></script>
<!-- callback=initMap  -->
<script src = "http://malsup.github.io/jquery.cycle2.js?ver=1"></script>
</body>


</html>
