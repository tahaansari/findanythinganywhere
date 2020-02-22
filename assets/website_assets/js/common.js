
var final_transcript = '';
var recognizing = false;

if ('webkitSpeechRecognition' in window) {

    var recognition = new webkitSpeechRecognition();

    recognition.continuous = true;
    recognition.interimResults = true;

    recognition.onstart = function() {
        recognizing = true;
    };

    recognition.onerror = function(event) {
        console.log(event.error);
    };

    recognition.onend = function() {
        recognizing = false;
        $('.listening').fadeOut('fast');
        
    };

    recognition.onresult = function(event) {

        var interim_transcript = '';

        for (var i = event.resultIndex; i < event.results.length; ++i) {

            if (event.results[i].isFinal) {

                $('.listening').fadeOut('fast');
                final_transcript += event.results[i][0].transcript;
                $("#search").trigger("click");


            } else {
                interim_transcript += event.results[i][0].transcript;
            }

        }

        final_transcript = capitalize(final_transcript);

        text_search.value = linebreak(final_transcript);
        text_search.value = linebreak(interim_transcript);



    };
}

var two_line = /\n\n/g;
var one_line = /\n/g;


function linebreak(s) {
    return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

function capitalize(s) {
    return s.replace(s.substr(0, 1), function(m) {
        return m.toUpperCase();
    });
}

function startDictation(event) {


    $('.listening').fadeIn('slow');

    if (recognizing) {
        recognition.stop();
        return;
    }
    final_transcript = '';
    recognition.lang = 'en-US';
    recognition.start();

    text_search.value = '';
    text_search.value = '';
}








$(document).ready(function() {

    var searchBox = new google.maps.places.SearchBox(document.getElementById('change_location'));

    google.maps.event.addListener(searchBox, 'places_changed', function() {

        var place = searchBox.getPlaces()[0];

        if (!place) {

            document.getElementById('change_location').value = "";
            return;
        }

        if (place.geometry.viewport) {

            current_position = place.geometry.location;

            $('.opened-popup').fadeOut('slow');

            $.ajax({

                type: 'POST',
                url: base_url + 'set_position',
                data: {

                    current_position: JSON.stringify(current_position),

                },
                success: function(results) {

                    map.setCenter(current_position);
                    map.setZoom(16);
                    cl_marker.setPosition(current_position);

                    infowindow = new google.maps.InfoWindow();
                    infowindow.setContent("<div><h5 class='labelcss_success'><b>YOU ARE HERE</b></h5></div>");
                    infowindow.open(map, cl_marker);

                },
                error: function() {

                }

            })

        } else {


            current_position = place.geometry.location;

            $('.opened-popup').fadeOut('slow');

            $.ajax({

                type: 'POST',
                url: base_url + 'set_position',
                data: {

                    current_position: JSON.stringify(current_position),

                },
                success: function(results) {

                    map.setCenter(current_position);
                    map.setZoom(16);
                    cl_marker.setPosition(current_position);

                    infowindow = new google.maps.InfoWindow();
                    infowindow.setContent("<div><h5 class='labelcss_success'><b>YOU ARE HERE</b></h5></div>");
                    infowindow.open(map, cl_marker);

                },
                error: function() {

                }

            })
        }


    });


    $('.right-location').click(function() {

        function showLocation(position) {

            $('.opened-popup').fadeOut('slow');

            current_position = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            $.ajax({

                type: 'POST',
                url: base_url + 'set_position',
                data: {

                    current_position: JSON.stringify(current_position),

                },
                success: function(results) {

                    map.setCenter(current_position);
                    map.setZoom(16);
                    cl_marker.setPosition(current_position);

                    infowindow = new google.maps.InfoWindow();
                    infowindow.setContent("<div><h5 class='labelcss_success'><b>YOU ARE HERE</b></h5></div>");
                    infowindow.open(map, cl_marker);

                },
                error: function() {

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




    $('#share').click(function() {

        // FB.ui({
        //     method: 'share',
        //     display: 'popup',
        //     href: 'https://findanythinganywhere.com/',
        // }, function(response) {});

        FB.ui({
                method: 'share',
                href: 'https://findanythinganywhere.com/', // The same than link in feed method
                title: 'Find Places Near Me', // The same than name in feed method
                picture: 'https://findanythinganywhere.com/assets/website_assets/img/facebookshare.png',
                caption: 'Find Places Near Me',
                description: 'Find Places Near Me',
            },
            function(response) {
                // your code to manage the response

                $.ajax({

                    type: "POST",
                    url: base_url + 'home/insertShare',
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

            });

    })


    $('#feedback_submit').click(function() {

        var description = $('#description').val();

        if (!description) {
            $('#feedback_error').html('<p>*Description Required</p>');
            return false;
        }

        showPreloader();

        $.ajax({

            type: 'POST',
            url: base_url + 'home/insertFeedback',
            data: {
                description: description,
            },
            success: function(result) {

                result = JSON.parse(result);
                console.log(result);

                if (result.status == 'success') {

                    $('#description').val("");
                    $('#feedback_error').html("");

                    $('#feedback_error').html("<p class='success'>Feedback Subimitted Successfully</p>");
                    hidePreloader();

                } else {

                    $('#feedback_error').html("<p class='success'>Feedback Failed</p>");
                    hidePreloader();

                }
            },
            error: function(error) {

                console.log('Server Error');

            }
        });

    })




    $('#search').click(function() {

        if (!$('#text_search').val()) {

            return false;
        }

        $('.disable-screen').fadeIn('slow');

        near = "<p class='adjust-zoom'>NOTE:- ADJUST ZOOM TO <br> SEE ALL RESULTS<p>";

        $('input:radio[class=filter-change][id=both]').prop('checked', true);
        $('input:radio[class=filter-change][id=onethousand]').prop('checked', true);

        resultfound = 0;

        $('#filter').fadeOut('fast');
        $('input:radio[class=filter-change][id=onethousand]').prop('checked', true);

        lastaction = 'search';

        resetMapArea();

        search = $('#text_search').val();

        var request = {
            location: current_position,
            radius: 1000,
            query: search
        };

        service = new google.maps.places.PlacesService(map);
        service.textSearch(request, callback);

        $.ajax({

            type: "POST",
            url: base_url + 'home/insertJourney',
            data: {
                looking_for: search,
            },
            success: function(result) {

                result = JSON.parse(result);
                console.log(result);
                if (result.status == 'success') {

                    console.log('Data Inserted');

                } else {

                    console.log('Data Insert Failee');

                }
            },
            error: function(error) {

                console.log('Server Error');

            }

        })
    })



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
      scaledSize: new google.maps.Size(35, 35)
    };


    console.log("createMarker Place " + JSON.stringify(place));

    infowindow = new google.maps.InfoWindow();

    multiple_marker = new google.maps.Marker({

        map: map,
        position: place.geometry.location,
        // icon: base_url + 'assets/website_assets/img/pin.png',
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




    function resetMapArea() {

        directionsDisplay.setMap(null);

        for (var i = 0; i < multiple_markers.length; i++) {
            multiple_markers[i].setMap(null);
        }

        // map.setZoom(16);
        // map.setCenter(current_position);

        $('#open-filter').animate({
            right: '-125%'
        }, 250);

        $('#open-details').animate({
            left: '-125%'
        }, 250);

        $('.right-panel-container').animate({
            right: '-300px'
        });

        $('.btn-fixed-container').animate({
            right: '-300px'
        });

        $('#result_found_container').animate({
            right: '-200px'
        }, 250);

        $('.direction-btn').removeClass('direction-active');
        $("[data-id='WALKING']").addClass('direction-active');

        $('.hideshowbtn').fadeOut('fast');
        $('.hideshowbtn').html('HIDE');
    }




})



$(window).load(function() {

    $('.preloader').fadeOut('slow');

})