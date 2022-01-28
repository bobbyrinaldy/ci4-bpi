<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hotel Hebat</title>
  <!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
  <!-- load stylesheets -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="assets/template/font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/template/css/bootstrap.min.css"> <!-- Bootstrap style -->
  <link rel="stylesheet" type="text/css" href="assets/template/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="assets/template/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="assets/template/slick/slick-theme.css" />
  <link rel="stylesheet" href="assets/template/css/templatemo-style.css"> <!-- Templatemo style -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

  <style>
    .select2.select2-container.select2-container--default {
      width: 100% !important;
    }
  </style>
</head>

<body>
  <div class="tm-main-content" id="top">
    <div class="tm-top-bar-bg"></div>
    <div class="tm-top-bar" id="tm-top-bar">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg narbar-light">
            <a class="navbar-brand mr-auto" href="<?= route_to('home') ?>">
              Hotel Hebat
            </a>
            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link <?php if (url_is('/')) {
                                        echo "active";
                                      } ?>"" href=" <?= route_to('home') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if (url_is('rooms*')) {
                                        echo "active";
                                      } ?>" href=" <?= route_to('guess.room') ?>">Kamar</a>
                </li>
                <li class="nav-item <?php if (url_is('hotel_facilities*')) {
                                      echo "active";
                                    } ?>">
                  <a class="nav-link" href=" <?= route_to('guess.hotel') ?>">Fasilitas</a>
                </li>

                <li class="nav-item">
                  <?php if (!session('isLoggedIn')) : ?>
                    <a class="nav-link" href="<?= route_to('login.index') ?>">Login</a>
                  <?php else : ?>
                    <a class="nav-link" href="<?= route_to('dashboard.index') ?>">Admin</a>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </nav>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- .tm-top-bar -->

    <div class="tm-page-wrap mx-auto">
      <?= $this->renderSection('content') ?>
      <footer class="tm-container-outer">
        <p class="mb-0">Copyright © <span class="tm-current-year">2022</span> CI 4</p>
      </footer>
    </div>


  </div> <!-- .main-content -->

  <!-- load JS files -->
  <script src="assets/template/js/jquery-1.11.3.min.js"></script> <!-- jQuery (https://jquery.com/download/) -->
  <script src="assets/template/js/popper.min.js"></script> <!-- https://popper.js.org/ -->
  <script src="assets/template/js/bootstrap.min.js"></script> <!-- https://getbootstrap.com/ -->
  <script src="assets/template/js/datepicker.min.js"></script> <!-- https://github.com/qodesmith/datepicker -->
  <script src="assets/template/js/jquery.singlePageNav.min.js"></script> <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
  <script src="assets/template/slick/slick.min.js"></script> <!-- http://kenwheeler.github.io/slick/ -->
  <script src="assets/template/js/jquery.scrollTo.min.js"></script> <!-- https://github.com/flesler/jquery.scrollTo -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    /* Google Maps
        ------------------------------------------------*/
    var map = '';
    var center;

    function initialize() {
      var mapOptions = {
        zoom: 16,
        center: new google.maps.LatLng(37.769725, -122.462154),
        scrollwheel: false
      };

      map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

      google.maps.event.addDomListener(map, 'idle', function() {
        calculateCenter();
      });

      google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(center);
      });
    }

    function calculateCenter() {
      center = map.getCenter();
    }

    function loadGoogleMap() {
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
      document.body.appendChild(script);
    }

    /* DOM is ready
    ------------------------------------------------*/
    $(function() {

      // Change top navbar on scroll
      $(window).on("scroll", function() {
        if ($(window).scrollTop() > 100) {
          $(".tm-top-bar").addClass("active");
        } else {
          $(".tm-top-bar").removeClass("active");
        }
      });
    });
  </script>

  <?= $this->renderSection('script') ?>

</body>

</html>