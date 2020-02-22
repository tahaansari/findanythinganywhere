

 
            
$(document).ready(function() {


    geocoder = new google.maps.Geocoder;
    service = new google.maps.places.PlacesService(map);
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();



    // find start 

    // $('.find').click(function() {

    //     $('.disable-screen').fadeIn('slow');

    //     $('#text_search').val("");

    //     near = "in 1 Km";

    //     $('input:radio[class=filter-change][id=both]').prop('checked', true);
    //     $('input:radio[class=filter-change][id=onethousand]').prop('checked', true);

    //     resultfound = 0;

    //     resetMapArea();

    //     lastaction = 'find';

    //     find = $(this).attr('data-id');
    //     find_text = $(this).attr('data-name');


    //     $('.category-popup-container').fadeOut('fast');

    //     service.nearbySearch({

    //         location: current_position,
    //         radius: 1000,
    //         type: [find]

    //     }, callback);

    //     $.ajax({

    //         type: "POST",
    //         url: base_url + 'home/insertJourney',
    //         data: {

    //             place_id: place_id,
    //             location: location,
    //             looking_for: find_text,

    //         },
    //         success: function(result) {

    //             result = JSON.parse(result);

    //             console.log(result);

    //             if (result.status == 'success') {

    //                 $('#filter').fadeIn('slow');
    //                 console.log('Data Inserted');

    //             } else {

    //                 console.log('Data Insert Failee');

    //             }
    //         },
    //         error: function(error) {

    //             console.log('Server Error');

    //         }

    //     })

    // })


    


    $(".filter-change").change(function() {

        $('.disable-screen').fadeIn('slow');

        $('#text_search').val("");

        near = $('input[name=radius]:checked').val();
        near = 'in ' + near / 1000 + ' Km';

        resultfound = 0;
        resetMapArea();

        filter_currently = $('input[name=showStatus]:checked').val();
        filter_radius = $('input[name=radius]:checked').val();

        if (lastaction == 'find') {

            if (filter_currently == 'true') {

                service.nearbySearch({
                    location: current_position,
                    radius: filter_radius,
                    openNow: true,
                    type: [find]
                }, callback);

            } else {

                service.nearbySearch({
                    location: current_position,
                    radius: filter_radius,
                    openNow: false,
                    type: [find]
                }, callback);

            }

        } else if (lastaction == 'search') {

            if (filter_currently == 'true') {

                var request = {
                    location: current_position,
                    radius: filter_radius,
                    openNow: true,
                    query: search
                };

            } else {

                var request = {
                    location: current_position,
                    radius: filter_radius,
                    openNow: false,
                    query: search
                };
            }

            service = new google.maps.places.PlacesService(map);
            service.textSearch(request, callback);
        }
    })


    $('.direction-btn').click(function() {

        console.log('routes change button clicked location is  ' + JSON.stringify(start) + " " + JSON.stringify(end));

        $('.direction-btn').removeClass('direction-active');

        directionsDisplay.setMap(null);

        if ($(this).attr('data-id') == 'WALKING') {

            $(this).addClass('direction-active');

            var request = {
                origin: start,
                destination: end,
                travelMode: 'WALKING'
            };

        } else {

            $(this).addClass('direction-active');

            var request = {
                origin: start,
                destination: end,
                travelMode: 'DRIVING'
            };
        }

        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));

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

})