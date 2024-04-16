<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH0chJJOex9mJGIdocfxKird-OLPlBNDME&libraries=places"></script>
        {{-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBfIxjNTFoq5i_T1TwZV_L90sx37lbHsDs&libraries=places"></script> --}}
        @include('Main')
        <script>
            google.maps.event.addDomListener(window, 'load', initialize);

            function initialize() {

                var input = document.getElementById('txtAddress');

                var autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.addListener('place_changed', function () {

                    var place = autocomplete.getPlace();

                    // place variable will have all the information you are looking for.

                    $("#txtCity").val(place.geometry['location'].lat());

                    $("#txtProvince").val(place.geometry['location'].lng());

                });
            }

        </script>
    </head>
    <body>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            <span class="font-weight-bold">Edogaru</span>
                            <span class="text-black-50">edogaru@mail.com.my</span>

                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" placeholder="first name" value="{{auth()->user()->name}}">
                            </div>
                            <div class="col-md-6"><label class="labels">Surname</label><input type="text"
                                    class="form-control" value="" placeholder="surname">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email Id</label>
                                <input type="text" class="form-control" placeholder="enter email id" value="{{auth()->user()->email}}">
                            </div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                    class="form-control" placeholder="enter phone number" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address</label>
                                <input type="text" class="form-control" placeholder="enter address" id="txtAddress" name="txtAddress" value=""  >
                            </div>
                            <div class="col-md-12">
                                <label class="labels">City</label>
                                <input type="text" class="form-control" placeholder="enter the city" id="txtCity" name="txtCity" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Province</label>
                                <input type="text" class="form-control" placeholder="enter the province" id="txtProvince" name="txtProvince" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Postcode</label>
                                <input type="text" class="form-control" placeholder="Postal Code" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Country</label>
                                <input type="text"  class="form-control" placeholder="country" value="">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="button">
                                Save Profile
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                                Experience</span><span class="border px-3 p-1 add-experience"><i
                                    class="fa fa-plus"></i>&nbsp;Experience</span>
                        </div><br>
                        <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text"
                                class="form-control" placeholder="experience" value=""></div> <br>
                        <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                                class="form-control" placeholder="additional details" value="">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


