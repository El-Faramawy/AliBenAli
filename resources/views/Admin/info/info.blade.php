@extends('layouts.admin.app')
@section('page_name') معلومات الموقع @endsection
@section('content')
<br>
<br>
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{$errors->first()}}',
            text: 'حاول مرة اخري!',
            confirmButtonText: 'حسنا',

// footer: '<a href="">Why do I have this issue?</a>'
        })
    </script>
@endif
<!------------------------------------ start INFO form --------------------------------->
<div class="card mt-15">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title fs-3 fw-bolder">اعدادات الموقع</div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Form-->
    <form id="kt_project_settings_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post" action="{{route('edit_info')}}">
        <!--begin::Card body-->
        {{csrf_field()}}
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-2">
                    <div class="fw-bold mt-2 mb-3">الايميل<i class="bi bi-link mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-10 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="email" value="{{$info->email}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-2">
                    <div class="fs-6 fw-bold mt-2 mb-3">الهاتف الاول<i class="bi bi-phone mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="phone1" value="{{$info->phone1}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>

                <!--begin::Col-->
                <div class="col-xl-2 text-center">
                    <div class="fs-6 fw-bold mt-2 mb-3">الهاتف الثاني<i class="bi bi-phone mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="phone1" value="{{$info->phone2}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-2">
                    <div class="fs-6 fw-bold mt-2 mb-3">لينك فيســبوك<i class="bi bi-facebook mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="facebook" value="{{$info->facebook}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--begin::Col-->
                <div class="col-xl-2 text-center">
                    <div class="fs-6 fw-bold mt-2 mb-3">لينك تويتــر<i class="bi bi-twitter mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="twitter" value="{{$info->twitter}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-2">
                    <div class="fs-6 fw-bold mt-2 mb-3">لينك انستجرام<i class="bi bi-instagram mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="insta" value="{{$info->insta}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--begin::Col-->
                <div class="col-xl-2 text-center">
                    <div class="fs-6 fw-bold mt-2 mb-3">لينكيد ان<i class="bi bi-linkedin mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="linkedin" value="{{$info->linkedin}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
            </div>
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-2">
                    <div class="fs-6 fw-bold mt-2 mb-3">العنوان بالعربي<i class="bi bi-building mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="address_ar" value="{{$info->address_ar}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--begin::Col-->
                <div class="col-xl-2">
                    <div class="fs-6 fw-bold mt-2 mb-3">العنوان بالانجليزي<i class="bi bi-building mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid fs-5" name="address_en" value="{{$info->address_en}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
            </div>
{{--            <div id="map" style="height: 500px;width: 100%;"></div>--}}
            <script>
                $("#pac-input").focusin(function () {
                    $(this).val('');
                });
                $('#latitude').val('');
                $('#longitude').val('');
                // This example adds a search box to a map, using the Google Place Autocomplete
                // feature. People can enter geographical searches. The search box will return a
                // pick list containing a mix of places and predicted search terms.
                // This example requires the Places library. Include the libraries=places
                // parameter when you first load the API. For example:
                // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
                function initAutocomplete() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 24.740691, lng: 46.6528521},
                        zoom: 13,
                        mapTypeId: 'roadmap'
                    });
                    // move pin and current location
                    infoWindow = new google.maps.InfoWindow;
                    geocoder = new google.maps.Geocoder();
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            var pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            map.setCenter(pos);
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(pos),
                                map: map,
                                title: 'موقعك الحالي'
                            });
                            markers.push(marker);
                            marker.addListener('click', function () {
                                geocodeLatLng(geocoder, map, infoWindow, marker);
                            });
                            // to get current position address on load
                            google.maps.event.trigger(marker, 'click');
                        }, function () {
                            handleLocationError(true, infoWindow, map.getCenter());
                        });
                    } else {
                        // Browser doesn't support Geolocation
                        console.log('dsdsdsdsddsd');
                        handleLocationError(false, infoWindow, map.getCenter());
                    }
                    var geocoder = new google.maps.Geocoder();
                    google.maps.event.addListener(map, 'click', function (event) {
                        SelectedLatLng = event.latLng;
                        geocoder.geocode({
                            'latLng': event.latLng
                        }, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    deleteMarkers();
                                    addMarkerRunTime(event.latLng);
                                    SelectedLocation = results[0].formatted_address;
                                    console.log(results[0].formatted_address);
                                    splitLatLng(String(event.latLng));
                                    $("#pac-input").val(results[0].formatted_address);
                                }
                            }
                        });
                    });

                    function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
                        var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                        /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                        $('#latitude').val(markerCurrent.position.lat());
                        $('#longitude').val(markerCurrent.position.lng());
                        geocoder.geocode({'location': latlng}, function (results, status) {
                            if (status === 'OK') {
                                if (results[0]) {
                                    map.setZoom(8);
                                    var marker = new google.maps.Marker({
                                        position: latlng,
                                        map: map
                                    });
                                    markers.push(marker);
                                    infowindow.setContent(results[0].formatted_address);
                                    SelectedLocation = results[0].formatted_address;
                                    $("#pac-input").val(results[0].formatted_address);
                                    infowindow.open(map, marker);
                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                            }
                        });
                        SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
                    }

                    function addMarkerRunTime(location) {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                        markers.push(marker);
                    }

                    function setMapOnAll(map) {
                        for (var i = 0; i < markers.length; i++) {
                            markers[i].setMap(map);
                        }
                    }

                    function clearMarkers() {
                        setMapOnAll(null);
                    }

                    function deleteMarkers() {
                        clearMarkers();
                        markers = [];
                    }

                    // Create the search box and link it to the UI element.
                    var input = document.getElementById('pac-input');
                    $("#pac-input").val("أبحث هنا ");
                    var searchBox = new google.maps.places.SearchBox(input);
                    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
                    // Bias the SearchBox results towards current map's viewport.
                    map.addListener('bounds_changed', function () {
                        searchBox.setBounds(map.getBounds());
                    });
                    var markers = [];
                    // Listen for the event fired when the user selects a prediction and retrieve
                    // more details for that place.
                    searchBox.addListener('places_changed', function () {
                        var places = searchBox.getPlaces();
                        if (places.length == 0) {
                            return;
                        }
                        // Clear out the old markers.
                        markers.forEach(function (marker) {
                            marker.setMap(null);
                        });
                        markers = [];
                        // For each place, get the icon, name and location.
                        var bounds = new google.maps.LatLngBounds();
                        places.forEach(function (place) {
                            if (!place.geometry) {
                                console.log("Returned place contains no geometry");
                                return;
                            }
                            var icon = {
                                url: place.icon,
                                size: new google.maps.Size(100, 100),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(17, 34),
                                scaledSize: new google.maps.Size(25, 25)
                            };
                            // Create a marker for each place.
                            markers.push(new google.maps.Marker({
                                map: map,
                                icon: icon,
                                title: place.name,
                                position: place.geometry.location
                            }));
                            $('#latitude').val(place.geometry.location.lat());
                            $('#longitude').val(place.geometry.location.lng());
                            if (place.geometry.viewport) {
                                // Only geocodes have viewport.
                                bounds.union(place.geometry.viewport);
                            } else {
                                bounds.extend(place.geometry.location);
                            }
                        });
                        map.fitBounds(bounds);
                    });
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
                    infoWindow.open(map);
                }

                function splitLatLng(latLng) {
                    var newString = latLng.substring(0, latLng.length - 1);
                    var newString2 = newString.substring(1);
                    var trainindIdArray = newString2.split(',');
                    var lat = trainindIdArray[0];
                    var Lng = trainindIdArray[1];
                    $("#latitude").val(lat);
                    $("#longitude").val(Lng);
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiqMoTJHpUOwn6jeeVNTQIbs36Tf8YAUQ&libraries=places&callback=initAutocomplete&language=ar&region=EG
async defer"></script>
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">حفظ التغيرات</button>
        </div>
        <!--end::Card footer-->
    </form>
    <!--end:Form-->
</div>

@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>



