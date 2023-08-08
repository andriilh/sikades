<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registrasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/Regis/fonts/linearicons/style.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/Regis/css/style.css">

</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="<?= base_url(); ?>/public/Regis/images/image-1.png" alt="" class="image-1">
            <form action="<?= base_url(); ?>/CLogin/registrasi" method="post">
                <h3>Registrasi</h3>

                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="hidden" class="form-control" name="idmasyarakat" value="MSY-<?= $idmasyarakat; ?>">
                    <input type="text" class="form-control" placeholder="NIK" name="nik" required>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                </div>

                <div class="form-holder">
                    <span class="lnr lnr-phone-handset"></span>
                    <input type="text" class="form-control" placeholder="No Hp" name="nohp" required>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="text" class="form-control" placeholder="Password" name="password" required>
                </div>
                <button>
                    <span>Register</span>
                </button>
            </form>
            <img src="<?= base_url(); ?>/public/Regis/images/image-2.png" alt="" class="image-2">
        </div>

    </div>

    <script src="<?= base_url(); ?>/public/Regis/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>/public/Regis/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>