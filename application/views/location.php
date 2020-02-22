<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Best Places Around Me | Railway Station Near Me | Find Nearby Atm</title>
      <meta name="description" content="This Website Is For People Who Mostly Search For Places Around Me, Railway Station, Atm Nearby, Find Petrol Pump, Medical Store In My Location.">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no/>
      <meta property="og:image" content="https://findanythinganywhere.com/assets/website_assets/img/facebookshare.png"/>
      <link rel="icon" type="image/png" href="<?= base_url('assets/website_assets/img/favicon.png');?>" sizes="32x32"/>
      <link href="<?= base_url('assets/website_assets/css/bootstrap.min.css')?>" rel="stylesheet">
      <link href="<?= base_url('assets/website_assets/fonts/font.css')?>" rel="stylesheet" media="screen">
      <link href="<?= base_url('assets/website_assets/css/styles.css')?>" rel="stylesheet" media="screen">
      <link href="<?= base_url('assets/website_assets/css/media.css')?>" rel="stylesheet" media="screen">
      
      <style type="text/css">
         .keywords{
         display: none;
         }
      </style>

   </head>
   <body style="">
      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
         
         ga('create', 'UA-102274533-1', 'auto');
         ga('send', 'pageview');
      </script>

      <img class="listening" src="<?= base_url('assets/website_assets/img/speak3.png');?>">
      

      <div class="preloader">
      
      <!-- https://www.vesselfinder.com/images/loading-text.gif -->
<!-- http://bestanimations.com/Earth&Space/Earth/earthglobeanimation/globe-earth-animation-8-6.gif -->
         <img class="img-responsive" src="<?= base_url('assets/website_assets/img/preloader.gif');?>">
      </div>

      <div class="opened-popup select-location-popup-container">
         <div class="select-location-popup">
            <h4 class="popup-up-heading">Enter Location</h4>
            <div class="location-container">
               <input id="select_location" placeholder="E.g. Lokhandwala, Andheri, Mumbai, Maharashtra, India" class="change-location" type="text" name="change-location">
               <p style="padding: 3%;">OR</p>
               <button class="right-marker right-location">Use My Current Location</button>
            </div>
            <p class="browser-location-error"></p>

         </div>
      </div>


      <div class="footer">
         <p>Developed By <a target="_blank" href="https://tahamehmoodansari.com/"> Taha Mehmood Ansari </a> </p>
      </div>


      <script src="<?= base_url('assets/website_assets/js/jquery-1.10.2.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/bootstrap.min.js')?>"></script>
      
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXRUgPPo8LBZACZZCWAlCDfiXVoEu8-mI&libraries=places"></script>
      <!-- old AIzaSyBXRUgPPo8LBZACZZCWAlCDfiXVoEu8-mI -->
      <!-- AIzaSyBpDbp2CweJU5jQy-j0w5tM-cLWRA_H0AY -->
      <script type="text/javascript">

        var base_url = "https://findanythinganywhere.com/";

        var geocoder;
        geocoder = new google.maps.Geocoder;

        var select_searchBox = new google.maps.places.SearchBox(document.getElementById('select_location'));

        google.maps.event.addListener(select_searchBox, 'places_changed', function() {

            var place = select_searchBox.getPlaces()[0];

            if (!place) {

                document.getElementById('select_location').value = "";
                return;
            }

            if (place.geometry.viewport) {

                current_position = place.geometry.location;

                geocoder.geocode({

                    'location': current_position

                }, function(results, status) {

                    if (status === 'OK') {

                        if (results[0]) {

                            place_id = results[0].place_id;

                            $.ajax({

                                type:'POST',
                                url:base_url+'set_position',
                                data:{

                                  current_position:JSON.stringify(current_position),
                                  place_id:place_id

                                },
                                success:function(results){

                                  console.log(results);
                                  window.location.href = base_url;

                                },
                                error:function(){

                                }

                            })

                        } else {
                            console.log("No reverse geocode results.")
                        }

                    } else {
                        alert('Geocoder failed due to: ' + status);
                    }
                });


            } else {

                current_position = place.geometry.location;

                geocoder.geocode({

                    'location': current_position

                }, function(results, status) {

                    if (status === 'OK') {

                        if (results[0]) {

                            place_id = results[0].place_id;

                            
                            $.ajax({

                                type:'POST',
                                url:base_url+'set_position',
                                data:{

                                  current_position:JSON.stringify(current_position),
                                  place_id:place_id

                                },
                                success:function(results){

                                  console.log(results);
                                  window.location.href = base_url;

                                },
                                error:function(){

                                }

                            })


                        } else {
                            console.log("No reverse geocode results.")
                        }

                    } else {
                        alert('Geocoder failed due to: ' + status);
                    }
                });


                $('.select-location-popup-container').fadeOut('fast');

            }

            $('.disable-screen').fadeOut('fast');

        });


        $('.right-location').click(function() {

            function showLocation(position) {

                current_position = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                $.ajax({

                    type:'POST',
                    url:base_url+'set_position',
                    data:{

                      current_position:JSON.stringify(current_position),

                    },
                    success:function(results){

                      console.log(results);
                      window.location.href = base_url;

                    },
                    error:function(){

                    }

                })

            }

            function errorHandler(err) {

                if (err.code == 1) {

                    console.log("Error: Access is denied!");
                    $('.browser-location-error').html('*Your Browser Location is Disabled Enter Location Manually');
                    

                    // $('.location-popup-container').fadeOut('fast');
                    // $('.select-location-popup-container').fadeIn('slow');

                } else if (err.code == 2) {

                    console.log("Error: Position is unavailable!");
                    $('.browser-location-error').html('*Your Browser Location is Disabled Enter Location Manually');

                    // $('.location-popup-container').fadeOut('fast');
                    // $('.select-location-popup-container').fadeIn('slow');
                }
            }

            if (navigator.geolocation) {
                var options = {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 60000
                };
                navigator.geolocation.getCurrentPosition(showLocation, errorHandler, options);
            } else {
                alert("Sorry, browser does not support geolocation!");
            }

        })


        $(window).load(function(){

             $('.preloader').fadeOut('slow');

        })


    </script>

   </body>
</html>