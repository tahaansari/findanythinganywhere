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


      <div class="opened-popup login-popup-container">
         <div class="login-popup">
            <h4 class="popup-up-heading">Sign In</h4>
            <div class="form">
               <div class="row resolve-row social-container">
                  <div class="col-lg-6 col-xs-6">
                     <img id="fblogin" class="img-responsive" src="<?= base_url('assets/website_assets/img/facebook.png');?>"> 
                  </div>
                  <div class="col-lg-6 col-xs-6">
                     <img id="googlelogin" class="img-responsive" src="<?= base_url('assets/website_assets/img/google.png');?>">
                  </div>
               </div>
      
               <a target="_black" href="http://awwquotes.com/">Aww Quotes</a>

            </div>
         </div>
      </div>

      <div class="footer">
         <p>Developed By <a target="_blank" href="https://tahamehmoodansari.com/"> Taha Mehmood Ansari </a> </p>
      </div>

      <script src="<?= base_url('assets/website_assets/js/jquery-1.10.2.min.js')?>"></script>
      <script src="<?= base_url('assets/website_assets/js/bootstrap.min.js')?>"></script>
      <!-- old AIzaSyBXRUgPPo8LBZACZZCWAlCDfiXVoEu8-mI -->
      <!-- AIzaSyBpDbp2CweJU5jQy-j0w5tM-cLWRA_H0AY -->
      <script src="<?= base_url('assets/website_assets/js/api-client.js')?>"></script>

      <script type="text/javascript">

          var base_url = "https://findanythinganywhere.com/";

          window.fbAsyncInit = function() {
              FB.init({
                  appId: '1345970355499001',
                  xfbml: true,
                  version: 'v2.9'
              });

              FB.AppEvents.logPageView();

              // FB.getLoginStatus(function(response) {
              //    statusChangeCallback(response);
              //  });
          };

          (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) {
                  return;
              }
              js = d.createElement(s);
              js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js";
              fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));


          function statusChangeCallback(response) {

              console.log('statusChangeCallback');
              console.log(response);

              if (response.status === 'connected') {
                  testAPI();
              } else {

                  // document.getElementById('status').innerHTML = 'Please log ' +
                  //   'into this app.';
              }
          }

          function checkLoginState() {
              FB.getLoginStatus(function(response) {
                  statusChangeCallback(response);
              });
          }

          function testAPI() {

              console.log('Welcome!  Fetching your information.... ');

              FB.api('/me?fields=id,name,email,picture', function(response) {

                  // console.log('Successful login for: ' + );

                  $.ajax({

                      type: 'POST',
                      url: base_url + 'social_signup',
                      data: {

                          loggedin_from: "facebook",
                          social_id: response.id,
                          name: response.name,
                          email: response.email,
                          profile_url: response.picture.data.url,

                      },
                      success: function(result) {

                          result = JSON.parse(result);
                          console.log(result);

                          if (result.status == 'success') {

                              window.location.href = base_url+"location";

                          } else {

                              alert('failed')

                          }
                      },
                      error: function(error) {

                          console.log('Server Error');

                      }
                  });




              });

          }

          $('#fblogin').click(function() {

              FB.login(function(response) {

                  if (response.status === 'connected') {
                      testAPI();
                  } else {
                      // document.getElementById('status').innerHTML = 'Please log ' +
                      //   'into this app.';
                  }

              }, {
                  scope: 'public_profile,email'
              });
          })


          var googleUser = {};

          var startApp = function() {

              gapi.load('auth2', function() {
                  // Retrieve the singleton for the GoogleAuth library and set up the client.
                  auth2 = gapi.auth2.init({
                      client_id: '396969281785-kef6niou9a40dhqrqmc4ubng9e57v3to.apps.googleusercontent.com',
                      cookiepolicy: 'single_host_origin',
                      // Request scopes in addition to 'profile' and 'email'
                      //scope: 'additional_scope'
                  });
                  attachSignin(document.getElementById('googlelogin'));
              });
          };

          function attachSignin(element) {

              auth2.attachClickHandler(element, {},

                  function(googleUser) {

                      var profile = googleUser.getBasicProfile();

                      $.ajax({

                          type: 'POST',
                          url: base_url + 'social_signup',
                          data: {

                              loggedin_from: "google",
                              social_id: profile.getId(),
                              name: profile.getName(),
                              email: profile.getEmail(),
                              profile_url: profile.getImageUrl(),

                          },
                          success: function(result) {

                              result = JSON.parse(result);
                              console.log(result);
                              if (result.status == 'success') {

                                    
                                  window.location.href = base_url+"location";
                                 

                                  // Lockr.set('is_loggedin', true);

                              } else {

                                  alert('failed')

                              }
                          },
                          error: function(error) {

                              console.log('Server Error');

                          }
                      });

                  },
                  function(error) {

                      // alert(JSON.stringify(error, undefined, 2));
                  });
          }

          startApp();

          $(window).load(function(){

               $('.preloader').fadeOut('slow');

          })


      </script>


   </body>
</html>