@extends('layouts.master')
@section('content')
    
        <div class="col-md-12">
            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="row row-nav-line">
                        <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">
                            
                            <li class="nav-item submenu"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
                            <li class="nav-item submenu"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3">
                        <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="pills-home-tab">
                        
                                <input type="hidden" name="id" value="{{ Auth::id() }}">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input type="text" class="form-control" readonly placeholder="Name"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input type="text" class="form-control" readonly placeholder="Name"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                          
                           
                                <div class="row mt-3 mb-1">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Jabatan</label>
                                            <textarea class="form-control" readonly placeholder=""
                                                rows="3">{{ Auth::user()->status }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form id="form_setting">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::id() }}">
                               
                                <div class="row">
                                    
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Phone / Whatsapp</label>
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::user()->no_wa }}" name="no_wa" placeholder="Phone">
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="" required>
                                            </div>
                                        </div>
                                </div>

                            
                                <div class="text-right mt-3 mb-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    {{-- <button class="btn btn-danger">Reset</button> --}}
                                </div>
                            </form>
                        </div>

                        
                    </div>


                    
                </div>
            </div>
        </div>
   
@endsection
@section('js')
<script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).on('click','.reset-koordinat', function(e){
			getLocation()
		})

		function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            // alert("Latitude : " + latitude + " Longitude: " + longitude);
            $('#koordinat').val(latitude + ',' + longitude)
            
            
        }

        function errorHandler(err) {
            if (err.code == 1) {
                alert("Error: Access is denied!");
            } else if (err.code == 2) {
                alert("Error: Position is unavailable!");
            }
        }

        function getLocation() {

            if (navigator.geolocation) {
                // timeout at 60000 milliseconds (60 seconds)
                var options = {
                    timeout: 60000
                };
                navigator.geolocation.getCurrentPosition(showLocation,
                    errorHandler,
                    options);
            } else {
                alert("Sorry, browser does not support geolocation!");
            }
        }


        $('#form_profile').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                type: 'post',
                url: "{!! url('profile/update-profile') !!}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (r) {
                    console.log(r)
                    if (r == 'success') {
                        swal("Berhasil !", "Simpan data berhasil !", {
                            icon : "success",
                            buttons: {
                                confirm: {
                                    className : 'btn btn-success'
                                }
                            },
                        }).then(function(){
                            location.reload()
                        });
                    }
                }
            })
        });

        $('#form_setting').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                type: 'post',
                url: "{!! url('profile/update-account') !!}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (r) {
                    console.log(r)
                    if (r == 'success') {
                        swal("Berhasil !", "Simpan data berhasil !", {
                            icon : "success",
                            buttons: {
                                confirm: {
                                    className : 'btn btn-success'
                                }
                            },
                        }).then(function(){
                            location.reload()
                        });
                    }
                }
            })
        });

    </script>
@endsection