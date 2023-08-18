<!DOCTYPE html>
<html lang="en">

<head>
	<title>SIKADES | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>/public/logo.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: linear-gradient(to right, dodgerblue, deepskyblue, skyblue, lightblue, powderblue, skyblue, deepskyblue);">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" method="post" id="form">
					<span class="login100-form-title p-b-53">
						LUPA KATA SANDI
					</span>

					<div class="p-t-31 p-b-9 w-full" id="input-container">
						<span class="txt1">
							Password Baru
						</span>
						<div class="wrap-input100 validate-input">
							<input class="input100" type="password" name="password" autofocus>
						</div>
						<div class="container-login100-form-btn m-t-17">
							<button type="submit" class="login100-form-btn">
								Ubah
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<div class="flash-data" data-flashdata="<?= session()->getFlashdata('gagal'); ?>"></div>
	<div class="flash-data2" data-flashdata="<?= session()->getFlashdata('casesensitif'); ?>"></div>
	<div class="flash-data3" data-flashdata="<?= session()->getFlashdata('kosong'); ?>"></div>
	<div class="flash-data4" data-flashdata="<?= session()->getFlashdata('tidakaktif'); ?>"></div>
	<div class="flash-data5" data-flashdata="<?= session()->getFlashdata('tambah'); ?>"></div>

	<script src="<?= base_url(); ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/public/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/public/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/public/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>/public/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/public/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/public/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>/public/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/public/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/public/login/js/main.js"></script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script>
		const base_url = '<?= base_url(); ?>'
	</script>
	<script src="<?= base_url('/public/assets/js/login/forgotpassword2.js'); ?>"></script>
</body>

</html>