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
				<form class="login100-form validate-form flex-sb flex-w" action="<?= base_url(); ?>/CLogin/cek_login_control" method="post">
					<span class="login100-form-title p-b-53">
						LOGIN
					</span>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Sign In
						</button>
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Belum punya akun?
						</span>

						<a href="<?= base_url(); ?>/CUtama/link_registrasi" class="txt2 bo1">
							Daftar sekarang
						</a>
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
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire(
				'Gagal Masuk',
				'Username atau Password salah!',
				'error'
			)
		}

		const flashData2 = $('.flash-data2').data('flashdata');
		if (flashData2) {
			Swal.fire(
				'Case sensitive',
				'Username dan Password bersifat case sensitive!',
				'warning'
			)
		}

		const flashData3 = $('.flash-data3').data('flashdata');
		if (flashData3) {
			Swal.fire(
				'Field Kosong!',
				'Field tidak boleh kosong!',
				'warning'
			)
		}

		const flashData4 = $('.flash-data4').data('flashdata');
		if (flashData4) {
			Swal.fire(
				'Akun Belum Aktif!',
				'Maaf akun belum aktif, silahkan hubungin admin terlebih dahulu!',
				'error'
			)
		}

		const flashData5 = $('.flash-data5').data('flashdata');
		if (flashData5) {
			Swal.fire(
				'Registrasi berhasil',
				'Mohon tunggu konfirmasi dari admin untuk pengaktifan akun',
				'success'
			)
		}
	</script>
</body>

</html>