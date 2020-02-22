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

      <div class="footer">
         <p>Developed By <a target="_blank" href="https://tahamehmoodansari.com/"> Taha Mehmood Ansari </a> </p>
      </div>

      <script src="<?= base_url('assets/website_assets/js/jquery-1.10.2.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/lockr.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/bootstrap.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/bootstrap-slider.min.js')?>"></script>
      <!-- old AIzaSyBXRUgPPo8LBZACZZCWAlCDfiXVoEu8-mI -->
      <!-- AIzaSyBpDbp2CweJU5jQy-j0w5tM-cLWRA_H0AY -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXRUgPPo8LBZACZZCWAlCDfiXVoEu8-mI&libraries=places" ></script>
      <script src="<?= base_url('assets/website_assets/js/owl.carousel.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/jquery.fancybox.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/api-client.js')?>"></script>

      <script type="text/javascript">

          var base_url = "https://findanythinganywhere.com/";

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

      <script src="<?= base_url('assets/website_assets/js/maps.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/script.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/common.js')?>"></script>


      <script type="text/javascript">

          $(document).ready(function() {
              get_restaurant();
          })


          function get_restaurant() {

              $('.disable-screen').fadeIn('slow');

              $('#text_search').val("");

              near = "in 1 Km";

              $('input:radio[class=filter-change][id=both]').prop('checked', true);
              $('input:radio[class=filter-change][id=onethousand]').prop('checked', true);

              resultfound = 0;

              lastaction = 'find';

              find = 'pharmacy';
              find_text = 'Medical';


              $('.category-popup-container').fadeOut('fast');

              service.nearbySearch({

                  location: current_position,
                  radius: 1000,
                  type: [find]

              }, callback);

             $.ajax({

                  type: "POST",
                  url: base_url + 'home/insertJourney',
                  data: {
                      looking_for: find_text,
                  },
                  success: function(result) {

                      result = JSON.parse(result);

                      console.log(result);

                      if (result.status == 'success') {

                          $('#filter').fadeIn('slow');
                          console.log('Data Inserted');

                      } else {

                          console.log('Data Insert Failee');

                      }
                  },
                  error: function(error) {

                      console.log('Server Error');

                  }

              })
          }


          function callback(results, status, pagination) {

              resultfound += results.length;

              if (status === google.maps.places.PlacesServiceStatus.OK) {

                  if (pagination.hasNextPage) {

                      pagination.nextPage();

                      $('#result_found_container').html('<p class="result-found">Searching..</p>');

                      $('#result_found_container').animate({
                          right: '15px'
                      }, 500);

                  } else {

                      if (lastaction == 'find') {

                          $('#result_found_container').html('<p class="result-found"><span>' + resultfound + '</span> results found for <br> ' + find_text + ' <br> ' + near + '</p>');

                      } else if (lastaction == 'search') {

                          $('#result_found_container').html('<p class="result-found"><span>' + resultfound + '</span> results found for <br> ' + search + ' <br> ' + near + '</p>');

                      }

                      $('#result_found_container').animate({
                          right: '15px'
                      }, 500);

                      $('.disable-screen').fadeOut('fast');


                      map.setZoom(16);
                      map.setCenter(results[0].geometry.location);


                  }



                  for (var i = 0; i < results.length; i++) {
                      createMarker(results[i]);
                  }


              } else if (status === google.maps.places.PlacesServiceStatus.ZERO_RESULTS) {

                  if (lastaction == 'find') {

                      $('#result_found_container').html('<p class="result-found">0 results found for <br> ' + find_text + ' <br> ' + near + '</p>');

                  } else if (lastaction == 'search') {

                      $('#result_found_container').html('<p class="result-found">0 results found for <br> ' + search + ' <br> ' + near + '</p>');

                  }

                  $('#result_found_container').animate({
                      right: '15px'
                  }, 500);


                  $('.disable-screen').fadeOut('fast');



              } else if (status === google.maps.places.PlacesServiceStatus.OVER_QUERY_LIMIT) {

                  $.ajax({

                      type: "POST",
                      url: base_url + 'home/insertLimit',
                      success: function(result) {

                          result = JSON.parse(result);
                          // console.log(result);
                          if (result.status == 'success') {


                          } else {

                          }
                      },
                      error: function(error) {

                          console.log('Server Error');

                      }

                  })


                  alert('Daily Request limit exceeded for static search');
                  $('.disable-screen').fadeOut('fast');

              }

          }


          function createMarker(place) {


     var image = {
      url: base_url + 'assets/website_assets/img/pin.png',
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(50, 50)
    };

              console.log("createMarker Place " + place.place_id);

              infowindow = new google.maps.InfoWindow();

              multiple_marker = new google.maps.Marker({

                  map: map,
                  position: place.geometry.location,
                  icon: image,
                  animation: google.maps.Animation.DROP,

              });

              multiple_markers.push(multiple_marker);

              google.maps.event.addListener(multiple_marker, 'mouseover', function() {

                  infowindow.setContent("<div><h5 class='labelcss'><b>" + place.name + "</b></h5></div>");
                  infowindow.open(map, this);

              });

              google.maps.event.addListener(multiple_marker, 'click', function() {

                  console.log("Click Event Place " + place.place_id);

                  $('#open-details').animate({
                      left: '-125%'
                  }, 250);

                  service.getDetails({

                      placeId: place.place_id

                  }, function(place, status) {

                      console.log("Details Place " + place.place_id);

                      if (status === google.maps.places.PlacesServiceStatus.OK) {

                          if (place.photos != undefined) {

                              console.log(place.photos[0]);

                              src = place.photos[0].getUrl({
                                  'maxWidth': 1000,
                                  'maxHeight': 1000
                              });
                              src = src.replace("w1000-h1000-", "");
                              src = src.slice(0, -1);
                              src = src + "w1000-h1000";

                              slider = "<img class='place-image show_photos' src='" + src + "' alt='no image available'/>";

                          } else {

                              slider = "<img class='place-image show_photos' src='" + base_url + "assets/website_assets/img/default.png" + "' alt=''/>";;
                          }

                          var avgrating, currently, number, name, website, address, openinghours, reviewContent, rating;

                          if (place.rating != undefined) {
                              avgrating = place.rating;
                          } else {
                              avgrating = "NA";
                          }

                          if (place.opening_hours != undefined) {

                              if (place.opening_hours.open_now) {
                                  currently = "<b class='active-green'>OPEN</b>";
                              } else {
                                  currently = "<b class='deactive-red'>CLOSE</b>";
                              }

                          } else {
                              currently = 'NA';
                          }

                          if (place.international_phone_number != undefined) {
                              number = place.international_phone_number;
                          } else {
                              number = "NA";
                          }

                          if (place.name != undefined) {
                              name = place.name;
                          } else {
                              name = "NA";
                          }

                          if (place.website != undefined) {

                              website = "<a class='text-black' target='_blank' href='" + place.website + "'>" + place.website + "</a>";

                          } else {
                              website = "NA";
                          }

                          if (place.formatted_address != undefined) {
                              address = place.formatted_address;
                          } else {
                              address = "NA";
                          }

                          openinghours = "";
                          if (place.opening_hours != undefined) {
                              for (var i = place.opening_hours.weekday_text.length - 1; i >= 0; i--) {
                                  openinghours += "<p>" + place.opening_hours.weekday_text[i] + "</p>";
                              }
                          } else {
                              openinghours = "NA";
                          }

                          reviewContent = "";
                          if (place.reviews != undefined) {


                              for (var i = 0; i < place.reviews.length; i++) {

                                  var roundRating = Math.round(place.reviews[i].rating);
                                  rating = "";
                                  for (var j = 0; j < 5; j++) {
                                      if (roundRating > j) {
                                          rating += "<i style='color:yellow' class='fa fa-star star' aria-hidden='true'></i>";
                                      } else {
                                          rating += "<i class='fa fa-star star' aria-hidden='true'></i>";
                                      }
                                  }

                                  reviewContent += "<div class='row resolve-row'>" +
                                      "<div class='col-lg-3 col-xs-3 text-center pad0'>" +
                                      "<img class='img-responsive' src='" + place.reviews[i].profile_photo_url + "'>" +
                                      "<p>" + place.reviews[i].author_name + "</p>" +
                                      "</div>" +
                                      "<div class='col-lg-9 col-xs-9'>" +
                                      "<p>" + place.reviews[i].text + "</p>" +
                                      "<div class='row resolve-row'>" +
                                      "<div class='col-lg-6 col-xs-6 pad0'>" +
                                      "<p>Rating:</p>" +
                                      "<p>" + rating + "</p>" +
                                      "</div>" +
                                      "<div class='col-lg-6 col-xs-6 pad0'>" +
                                      "<p>" + place.reviews[i].relative_time_description + "</p>" +
                                      "</div>" +
                                      "</div>" +
                                      "</div>" +
                                      "</div>";

                              }

                          } else {

                              reviewContent = "NA";
                          }

                          // "++"
                          var html = "<div class='place-image-container'>" + slider +
                              "<div class='row resolve-row view-more-photos-container'>" +
                              "<div class='col-lg-8 col-xs-8'><p>" + name + "</p></div>" +
                              "<div class='col-lg-4 col-xs-4'><p class='view-photos show_photos'>View Photos</p></div>" +
                              "</div>" +
                              "<h1 class='rating-circle'>" + avgrating + "/5</h1>" +
                              "</div>" +

                              "<div class='row resolve-row qube-container'>" +
                              "<div class='col-lg-6 col-xs-6'>" +
                              "<h5><b>Currently:</b></h5>" + currently + "</div>" +
                              "<div class='col-lg-6 col-xs-6'>" +
                              "<h5><b>Contact No:</b></h5>" +
                              "<p><a class='call' href='tel:" + number + "'>" + number + "</a></p>" +
                              "</div>" +
                              "</div>" +

                              "<div class='details-content'>" +
                              "<h4>Website:</h4>" +
                              "<p class='overflow-scroll'>" + website + "</p>" +
                              "<h4>Address:</h4>" +
                              "<p>" + address + "</p>" +
                              "<h4>Opening Hours: </h4>" +
                              "<p>" + openinghours + "</p>" +
                              "<h4>Reviews: </h4>" +
                              "<div class='review-container'>" + reviewContent + "</div>" +
                              "<div id='btn-direction' class='direction-container'>" +
                              "<div class='full-width text-center'>" +
                              "<button  class='btn-direction'>Show Direction</button>" +
                              "</div>" +
                              "</div>" +
                              "</div>";


                          $('#dynamic-details').html(html);

                          $(".show_photos").click(function() {

                              var dynamicgallary = "$.fancybox.open([";

                              for (var photoi = 0; photoi < place.photos.length; photoi++) {

                                  src = place.photos[photoi].getUrl({
                                      'maxWidth': 1000,
                                      'maxHeight': 1000
                                  });
                                  src = src.replace("w1000-h1000-", "");
                                  src = src.slice(0, -1);
                                  src = src + "w1000-h1000";

                                  dynamicgallary += "{" +
                                      "src : '" + src + "'," +
                                      "},";
                              }

                              dynamicgallary += "], { thumbs : { autoStart : true } })";

                              eval(dynamicgallary);

                          });

                          start = current_position;
                          end = place.geometry.location;

                          $('.btn-direction').click(function() {

                              console.log('show direction button clicked ' + JSON.stringify(start) + " " + JSON.stringify(end));

                              $('.direction-btn').removeClass('direction-active');
                              $("[data-id='WALKING']").addClass('direction-active');

                              $('#open-filter').animate({
                                  right: '-125%'
                              }, 250);


                              $('.hideshowbtn').html('HIDE');
                              $('.hideshowbtn').fadeIn('slow');

                              $('#open-details').animate({
                                  left: '-125%'
                              }, 250);

                              directionsDisplay.setMap(null);
                              directionsDisplay.setMap(map);

                              directionsDisplay.setPanel(document.getElementById('right-panel'));

                              var request = {
                                  origin: start,
                                  destination: end,
                                  travelMode: 'WALKING'
                              };

                              directionsService.route(request, function(result, status) {

                                  if (status == 'OK') {

                                      directionsDisplay.setDirections(result);


                                      $('.right-panel-container').animate({
                                          right: '0'
                                      }, 500);

                                      $('.btn-fixed-container').animate({
                                          right: '0'
                                      }, 500);

                                  }

                              });
                          })

                          $('#open-details').animate({
                              left: '0%'
                          }, 500);


                      } else {

                          alert('failed');

                      }

                  });

              });
          }
      </script>

   </body>
</html>