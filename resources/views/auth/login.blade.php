<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{!! asset('public/atlantis/assets/img/icon.ico') !!}" type="image/x-icon" />
	<!-- Fonts and icons -->
    <script src="{!! asset('public/atlantis/assets/js/plugin/webfont/webfont.min.js') !!}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{!! asset('public/atlantis/assets/css/fonts.min.css') !!}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        </script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{!! asset('public/atlantis/assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/atlantis/assets/css/atlantis.css') !!}">
</head>
<body class="login">
	<div class="modal fade" id="reset-password-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fab fa-key"></i> Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_reset_password">
                        @csrf
                        
                        <div class="form-group form-group-default">
                            <label>Email</label>
                            <input type="email" id="r_email" name="email" class="form-control" required>
                        </div>
                        <small class="mt-2"><a href="#" id="req-otp"><span>Minta Kode OTP</span></a></small>

                        <div class="form-group form-group-default">
                            <label>Kode OTP</label>
                            <input type="text" name="kode_otp" class="form-control" required>
                        </div>

                        <div class="alert alert-danger" role="alert">
                            Dapatkan kode OTP di Email anda ...
                        </div>
    
                        <div class="form-group">
                            <button type="submit" class="btn btn-bordered btn-primary btn-rounded form-control"><i class="fa fa-check"></i> Sumbit</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center" style="font-weight: 700;font-size: 26px;">CoVer MaP</h3>
			<p class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Contract & Vendor Performance Management Apps</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
			<div class="login-form mt-3">
				<div class="form-group">
					<label for="username" class="placeholder"><b>Email</b></label>
					<input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="password" class="placeholder"><b>Password</b></label>
					<a href="#" class="link float-right btn-reset-password" data-toggle="modal" data-target="#reset-password-modal">Lupa Password ?</a>
					<div class="position-relative">
						<input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        autocomplete="current-password" required>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						{!! NoCaptcha::display() !!}
						{!! NoCaptcha::renderJs() !!}
						@error('g-recaptcha-response')
							<span class="text-danger alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
				<div class="form-group form-action-d-flex mb-3">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="rememberme">
						<label class="custom-control-label m-0" for="rememberme">Remember Me</label>
					</div>
					<button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</button>
				</div>
				{{-- <div class="login-account">
					<span class="msg">Don't have an account yet ?</span>
					<a href="#" id="show-signup" class="link">Sign Up</a>
				</div> --}}
			</div>
            </form>
		</div>

        

	</div>
    <script src="{!! asset('public/atlantis/assets/js/core/jquery.3.2.1.min.js') !!}"></script>
    <script src="{!! asset('public/atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') !!}"></script>

    <script src="{!! asset('public/atlantis/assets/js/core/popper.min.js') !!}"></script>
    <script src="{!! asset('public/atlantis/assets/js/core/bootstrap.min.js') !!}"></script>
	<script src="{!! asset('public/atlantis/assets/js/atlantis.min.js') !!}"></script>
	<script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
	<script>
		function showPleaseWait() {
		    var modalLoading = '<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false" role="dialog">\
                                <div class="modal-dialog">\
                                    <div class="modal-content">\
                                        <div class="modal-header">\
                                            <h4 class="modal-title">Please wait...</h4>\
                                        </div>\
                                        <div class="modal-body is-loading is-loading-lg">\
                                        </div>\
										<div class="modal-footer"></div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>';
		    $(document.body).append(modalLoading);
		    $("#pleaseWaitDialog").modal("show");
		}


		function hidePleaseWait() {
		    $("#pleaseWaitDialog").modal("hide");
		}

        $(document).on('click','#req-otp', function(e){
            showPleaseWait()
            var email = $('#r_email').val()

            if(email !== '' || email !== null){
                $.ajax({
                    type : 'GET',
                    url : "{{ url('req-otp?email=') }}"+email,
                    success : function(r){
                        console.log(r)
                        hidePleaseWait()
                        if (r.res == 'success') {
                            swal("Yeaa !", r.msg, {
                                icon: "success",
                                timer: 2000,
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                },
                            })
                        } else {
                            swal("Opps !", r.msg, {
                                icon: "error",
                                timer: 2000,
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                },
                            })
                        }
                    }
                })
            }else{
                swal("Opps !", "Email belum diisi !", {
                    icon: "error",
                    timer: 1000,
                    buttons: {
                        confirm: {
                            className: 'btn btn-danger'
                        }
                    },
                })
            }
        })
		


        $('#form_reset_password').on('submit', function (e) {
            e.preventDefault()
            showPleaseWait()
            $.ajax({
                type: 'post',
                url: "{!! url('reset-password') !!}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (r) {
                    hidePleaseWait()
                    console.log(r)
                    if (r.res == 'success') {
                        swal("Yeaa !", r.msg, {
                            icon: "success",
                            timer: 1000,
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        }).then(function () {
                            location.reload()
                        });
                    } else {
                        swal("Opps !", r.msg, {
                            icon: "error",
                            timer: 1000,
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        })
                    }
                }
            })
        });
	</script>
</body>
</html>