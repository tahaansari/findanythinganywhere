<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>

      <!-- restaurants -->

      <title>Best Places Around Me | Railway Station Near Me | Find Nearby Atm</title>
      <meta name="description" content="This Website Is For People Who Mostly Search For Places Around Me, Railway Station, Atm Nearby, Find Petrol Pump, Medical Store In My Location.">

      <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no/>
      <meta property="og:image" content="https://findanythinganywhere.com/assets/website_assets/img/facebookshare.png"/>
      <link rel="icon" type="image/png" href="<?= base_url('assets/website_assets/img/favicon.png');?>" sizes="32x32"/>
      <link href="<?= base_url('assets/website_assets/css/bootstrap.min.css')?>" rel="stylesheet">
      <link href="<?= base_url('assets/website_assets/css/bootstrap-slider.min.css')?>" rel="stylesheet" media="screen">

      <link href="<?= base_url('assets/website_assets/css/hover-min.css')?>" rel="stylesheet" media="screen">


      <link rel="stylesheet" href="<?= base_url('assets/website_assets/css/owl.carousel.min.css')?>" />
      <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all"> -->
      <link rel="stylesheet" href="<?= base_url('assets/website_assets/css/jquery.fancybox.min.css')?>" />
      <link href="<?= base_url('assets/website_assets/fonts/font.css')?>" rel="stylesheet" media="screen">
      <link href="<?= base_url('assets/website_assets/css/styles.css')?>" rel="stylesheet" media="screen">
      <link href="<?= base_url('assets/website_assets/css/media.css')?>" rel="stylesheet" media="screen">



       <style type="text/css">
          .keywords{

            display: none;
          }
       </style>

   

   </head>
   <body>
      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
         
         ga('create', 'UA-102274533-1', 'auto');
         ga('send', 'pageview');
         
      </script>


      <img class="listening" src="<?= base_url('assets/website_assets/img/speak3.png');?>">

      <div class="opened-popup location-popup-container">
         <div class="location-popup">
            <img class="img-responsive close-popup" src="<?= base_url('assets/website_assets/img/cross.png');?>">
            <h4 class="popup-up-heading">Change Location</h4>
               <div class="location-container">
                     <input id="change_location" placeholder="E.g. Lokhandwala, Andheri, Mumbai, Maharashtra, India" class="change-location" type="text" name="change-location">
                     <p style="padding: 3%;">OR</p>
                     <button class="right-marker right-location">Use My Current Location</button>
               </div>
               <p class="browser-location-error"></p>

         </div>
      </div>
  
      <div class="btn-fixed-container">
         <div class="row resolve-row fixed-routes">
            <div class="col-lg-6 col-xs-6 pad0">
               <button data-id='WALKING' class="direction-btn direction-active">WALKING</button>
            </div>
            <div class="col-lg-6 col-xs-6 pad0">
               <button data-id='DRIVING' class="direction-btn">DRIVING</button>
            </div>
         </div>
      </div>

      <button class="hideshowbtn">HIDE</button>


      <div class="landscape">
         <img class="img-responsive" src="<?= base_url('assets/website_assets/img/landscape.png');?>">
      </div>
      <div class="enable-location">
         <img class="img-responsive" src="<?= base_url('assets/website_assets/img/locationdisabled.png');?>">
         <h2>your location is disabled please enable it and try again</h2>
      </div>
      <div class="disable-screen">
         <img class="img-responsive" style="margin: auto;margin-top: 30%;" src="<?= base_url('assets/website_assets/img/preloader.gif');?>">
      </div>
      <div class="preloader">
      
      <!-- https://www.vesselfinder.com/images/loading-text.gif -->
<!-- http://bestanimations.com/Earth&Space/Earth/earthglobeanimation/globe-earth-animation-8-6.gif -->
         <img class="img-responsive" src="<?= base_url('assets/website_assets/img/preloader.gif');?>">
      </div>
  

      <div class="features">
         <img id='category' class="img-responsive make-icon pull-left hvr-grow" src="<?= base_url('assets/website_assets/img/category.png');?>">
         <img id='filter' class="img-responsive make-icon pull-left hvr-grow" src="<?= base_url('assets/website_assets/img/filter.png');?>">
         <!-- <img id='share' class="img-responsive make-icon pull-right" src="<?= base_url('assets/website_assets/img/share.png');?>">   -->

         <img id='' class="img-responsive make-icon pull-right open-location-popup hvr-grow" src="<?= base_url('assets/website_assets/img/location.png');?>">  

         <img id='feedback' class="img-responsive make-icon pull-right hvr-grow" src="<?= base_url('assets/website_assets/img/report.png');?>">
      </div>
      <div id="open-details">
         <div class="cross-container">
            <h4 class="details-header">PLACE DETAILS</h4>
            <img class="img-responsive close-details" src="<?= base_url('assets/website_assets/img/cross.png');?>">
         </div>
         <div id="dynamic-details">
         </div>
      </div>
      <div id="open-filter">
         <div class="cross-container">
            <img class="img-responsive close-filter" src="<?= base_url('assets/website_assets/img/cross.png');?>">
            <h4 class="details-header">MAP FILTERS</h4>
         </div>
         <div class="filter-content">
            <br>
            <h4 class="filter-header">Show Places</h4>
            <input class="filter-change" type="radio" name="showStatus" id="both" value="false" checked="">
            <label for="both">Both</label>
            <br>
            <input class="filter-change" type="radio" name="showStatus" id="currently_opened" value="true">
            <label for="currently_opened">Currently Opened</label>
            <br>
            <br>
            <h4 class="filter-header">Set Radius</h4>
            <input class="filter-change" type="radio" name="radius" id="fivehundred" value="500">
            <label for="fivehundred">0.5 Km</label>
            <br>
            <input class="filter-change" type="radio" name="radius" id="onethousand" value="1000" checked="">
            <label for="onethousand">1 Km</label>
            <br>
            <input class="filter-change" type="radio" name="radius" id="twothousand" value="2000">
            <label for="twothousand">2 Km</label>
            <br>
            <input class="filter-change" type="radio" name="radius" id="threethousand" value="3000">
            <label for="threethousand">3 Km</label>
            <br>
            <input class="filter-change" type="radio" name="radius" id="fourthousand" value="4000">
            <label for="fourthousand">4 Km</label>
            <br>
            <input class="filter-change" type="radio" name="radius" id="fivethousand" value="5000">
            <label for="fivethousand">5 Km</label>
         </div>
      </div>
      <div class="opened-popup category-popup-container">
         <div class="category-popup">
            <h1 class="popup-up-heading">FIND PLACES NEAR ME</h1>
            <img class="img-responsive close-popup" src="<?= base_url('assets/website_assets/img/cross.png');?>">
            
            <div class="row resolve-row icons">

               <a href="<?= base_url('atm');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='atm' data-name='Atm'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/atm.png');?>">
                     <h5>Atm</h5>
                  </div>
               </a>

               <a href="<?= base_url('restaurant');?>">
                  <div class="col-lg-3 col-xs-6" data-id='restaurant' data-name='Restaurant'>
                        <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/restaurant.png');?>">
                        <h5>Restaurant</h5>
                  </div>
               </a>

               <a href="<?= base_url('hotels');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='lodging' data-name='Hotels'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/hotels.png');?>">
                     <h5>Hotels</h5>
                  </div>
               </a>

               <a href="<?= base_url('medical');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='pharmacy' data-name='Medical'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/medical.png');?>">
                     <h5>Medical</h5>
                  </div>
               </a>

               <a href="<?= base_url('hardware_store');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='hardware_store' data-name='Hardware Store'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/tools.png');?>">
                     <h5>Hardware Store</h5>
                  </div>
               </a>

               <a href="<?= base_url('movie_theater');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='movie_theater' data-name='Movie Theater'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/theater.png');?>">
                     <h5>Movie Theater</h5>
                  </div>
               </a>

               <a href="<?= base_url('petrol_pump');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='gas_station' data-name='Petrol/Gas'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/fuel.png');?>">
                     <h5>Petrol/Gas</h5>
                  </div>
               </a>

               <a href="<?= base_url('railway_station');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='train_station' data-name='Railway Station'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/railway.png');?>">
                     <h5>Railway Station</h5>
                  </div>
               </a>

               <a href="<?= base_url('doctor');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='doctor' data-name='Doctor'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/doctor.png');?>">
                     <h5>Doctor</h5>
                  </div>
               </a>

               <a href="<?= base_url('parking');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='parking' data-name='Parking'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/parking.png');?>">
                     <h5>Parking</h5>
                  </div>
               </a>
               
               <a href="<?= base_url('animal_store');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='pet_store' data-name='Animal Stores'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/pet_store.png');?>">
                     <h5>Animal Store</h5>
                  </div>
               </a>

               <a href="<?= base_url('animal_hospital');?>">
                  <div class="col-lg-3 col-xs-6 find" data-id='veterinary_care' data-name='Animal Hospitals'>
                     <img class="img-responsive hvr-grow" src="<?= base_url('assets/website_assets/img/bigicons/pet_hospital.png');?>">
                     <h5>Animal Hospital</h5>
                  </div>
               </a>

            </div>
         </div>
      </div>
      <div class="opened-popup setting-popup-container">
         <div class="setting-popup">
            <h4 class="popup-up-heading">MAP SETTING</h4>
            <img class="img-responsive close-popup" src="<?= base_url('assets/website_assets/img/cross.png');?>">
            <div class="setting-container">
               <div class="radius-container">
                  <input type="text" id="radius" class="radius"  data-slider-id="radius-range" data-slider-min="200" data-slider-max="5000" data-slider-step="200" data-slider-value="600" data-slider-tooltip="hide">
                  <p>Radius  <span id='slider_value'>600</span> Meters</p>
               </div>
            </div>
         </div>
      </div>
      <div class="opened-popup feedback-popup-container">
         <div class="feedback-popup">
            <h4 class="popup-up-heading">Feedback/Report Errors</h4>
            <img class="img-responsive close-popup" src="<?= base_url('assets/website_assets/img/cross.png');?>">
            <div class="form">
               <textarea name="description" id='description' placeholder="*Description" style="height: 70px;"></textarea>
               <!-- <input style="border:none;font-size: 12px;" type="file" name="file" placeholder="Screenshot"> -->
               <input id='feedback_submit' class="form-submit" type="submit" name="submit" value="Submit">
               <div id='feedback_error' class="errors"></div>
            </div>
         </div>
      </div>
      <div id="main_map">
      </div>


      <div class="header-container text-search-container">

         <input id="text_search" class="text-search" type="text" placeholder="Search anything Eg: Restaurants In Andheri">
         <img class="voice hvr-grow"  id="start_button" onclick="startDictation(event)" src="<?= base_url('assets/website_assets/img/voice.png');?>">
         <button id="search" class="search-icon">Search</button>

         <div id="results">
           <span id="final_span" class="final"></span>
           <span id="interim_span" class="interim"></span>
         </div>

      </div>

      <div class="right-panel-container">
         <div id="right-panel"></div>
      </div>


      <div id="logout" class="logout">
         <img class="img-responsive" src="<?php echo $this->session->userdata('profile_url'); ?>">
         <!-- <p id="name"><?php # echo $this->session->userdata('name'); ?></p> -->
            <div id='logout_div'>
               <a href="<?php echo base_url('home/logout')?>">
                  <p>Logout</p>
               </a>
            </div>
      </div>

      <div id="result_found_container">
      </div>


      

<!--       <div class="footer">
         <p>Developed By <a target="_blank" href="https://tahamehmoodansari.com/"> Taha Mehmood Ansari </a> </p>
      </div> -->
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpDbp2CweJU5jQy-j0w5tM-cLWRA_H0AY&libraries=places"></script>
      
      <script src="<?= base_url('assets/website_assets/js/jquery-1.10.2.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/lockr.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/bootstrap.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/bootstrap-slider.min.js')?>"></script>

      
      <script src="<?= base_url('assets/website_assets/js/owl.carousel.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/jquery.fancybox.min.js')?>"></script>


      <!-- removed map.js -->
      <!-- removed api-client.js -->
      <script src="<?= base_url('assets/website_assets/js/script.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/common.js')?>"></script>

      <script type="text/javascript">

            var base_url = "http://localhost/findanythinganywhere";

            var map, geocoder, service, directionsService, directionsDisplay;
            var infowindow, cl_marker, multiple_marker;
            var current_position, place_id, location;
            var lastaction, find, find_text, search;
            var filter_currently, filter_radius;
            var multiple_markers = [];
            var slider = "";

            var start, end;
            var resultfound;
            var src;
            var near = "";

           function initMap() {

               map = new google.maps.Map(document.getElementById('main_map'), {

                   zoom: 16,
                   zoomControl: true,
                   streetViewControl: false,
                   zoomControlOptions: {
                       position: google.maps.ControlPosition.RIGHT_CENTER
                   },
                   mapTypeControl: false,
                   fullscreenControl: false,
                   styles: [

                       // {
                       //     featureType: 'all',
                       //     elementType: 'all',
                       //     stylers: [{
                       //             invert_lightness: 'true'
                       //         },
                       //         {
                       //             saturation: -100
                       //         }
                       //     ]
                       // },

                       {
                           featureType: 'all',
                           elementType: 'labels.icon',
                           stylers: [{
                               visibility: 'off',

                           }]
                       },
                       {
                           featureType: 'all',
                           elementType: 'labels.text',
                           stylers: [{
                               visibility: 'on',
                           }]
                       },
                       {
                           featureType: 'road.arterial',
                           elementType: 'labels',
                           stylers: [{
                               visibility: 'on',

                           }]
                       },

                   ]

               });

               current_position = <?php echo $this->session->userdata('current_position'); ?>

               map.setCenter(current_position);

               cl_marker = new google.maps.Marker({
                   position: current_position,
                   map: map,
                   animation: google.maps.Animation.DROP,
                   icon: base_url + 'assets/website_assets/img/man1.png'
               });

               infowindow = new google.maps.InfoWindow();
               infowindow.setContent("<div><h5 class='labelcss_success'><b>YOU ARE HERE</b></h5></div>");
               infowindow.open(map, cl_marker);
           }
           

          $(document).ready(function() {
              initMap();
          })


      </script>


   </body>
</html>