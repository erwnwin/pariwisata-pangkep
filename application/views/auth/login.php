<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/assets/dist/img/logo-jastip.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/login.css">
    <!-- <style>
        
    </style> -->

</head>

<body class="hold-transition login-page">
    <div class="login-container">
        <div class="svg-container">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="svg1">
                <path fill="#d1dbe4" fill-opacity="0.15" d="M43.2,-70.9C53.7,-60.6,58.2,-44.6,62,-30.1C65.9,-15.6,69.2,-2.6,69.8,11.7C70.3,26,68.2,41.7,60.2,53.6C52.1,65.4,38,73.6,22.7,78.9C7.3,84.3,-9.5,86.7,-25.3,83.4C-41.1,80,-56,70.7,-67.2,58.1C-78.3,45.4,-85.7,29.4,-86.9,13.2C-88.1,-3,-83.2,-19.4,-74.1,-31.5C-65,-43.7,-51.7,-51.7,-38.6,-60.9C-25.6,-70.1,-12.8,-80.5,1.8,-83.4C16.4,-86.2,32.8,-81.3,43.2,-70.9Z" transform="translate(100 100)" />
            </svg>
            <svg id="sw-js-blob-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg2">
                <path fill="#d1dbe4" fill-opacity="0.15" d="M18.7,-22.8C23.9,-18,27.4,-11.7,28.6,-5.1C29.7,1.6,28.5,8.7,25.7,16C22.9,23.4,18.5,31.1,11.3,35.7C4.2,40.4,-5.8,41.9,-14.7,39.2C-23.5,36.4,-31.2,29.4,-35.8,20.9C-40.4,12.4,-41.9,2.4,-39.9,-6.7C-37.9,-15.7,-32.3,-23.7,-25,-28.2C-17.8,-32.6,-8.9,-33.4,-1,-32.1C6.8,-30.9,13.6,-27.6,18.7,-22.8Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;" stroke="url(#sw-gradient)"></path>
            </svg>
            <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg3">
                <polygon points="50,15 90,85 10,85" fill="#d1dbe4" fill-opacity="0.15" />
            </svg>
            <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg4">
                <rect x="25" y="25" width="50" height="50" fill="#d1dbe4" fill-opacity="0.15" transform="rotate(45 50 50)" />
            </svg>
            <svg id="sw-js-blob-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg5">
                <path fill="#d1dbe4" fill-opacity="0.15" d="M18.7,-22.8C23.9,-18,27.4,-11.7,28.6,-5.1C29.7,1.6,28.5,8.7,25.7,16C22.9,23.4,18.5,31.1,11.3,35.7C4.2,40.4,-5.8,41.9,-14.7,39.2C-23.5,36.4,-31.2,29.4,-35.8,20.9C-40.4,12.4,-41.9,2.4,-39.9,-6.7C-37.9,-15.7,-32.3,-23.7,-25,-28.2C-17.8,-32.6,-8.9,-33.4,-1,-32.1C6.8,-30.9,13.6,-27.6,18.7,-22.8Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;" stroke="url(#sw-gradient)"></path>
            </svg>
            <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg6">
                <rect x="25" y="25" width="50" height="50" fill="#d1dbe4" fill-opacity="0.15" transform="rotate(45 50 50)" />
            </svg>
            <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg7">
                <polygon points="30,20 80,75 10,85" fill="#d1dbe4" fill-opacity="0.15" />
            </svg>
            <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg8">
                <rect x="25" y="25" width="50" height="50" fill="#d1dbe4" fill-opacity="0.15" transform="rotate(45 50 50)" />
            </svg>
        </div>


        <div class="login-form-container">
            <div class="login-form">
                <!-- <img src="<?= base_url() ?>public/assets/dist/img/logo-jastip.png" alt="" style="width: 18%;"> -->
                <div class="mb-5">
                    <p class="lead">Login to App</p>
                </div>
                <form id="loginForm">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group remember-me-container">

                        <button type="submit" class="btn btn-default">
                            <span id="btnLoader" style="display: none;">
                                <i class="fa fa-spinner fa-spin"></i>
                            </span>
                            Login
                        </button>
                    </div>
                </form>
                <!-- <a href="https://wa.link/62fh0h" class="lupa-password">Lupa password? Hubungi ADMIN</a> -->
            </div>
        </div>
    </div>
</body>


<script src="<?= base_url() ?>public/assets/plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>public/assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url() ?>public/css/login.js"></script>
<script src="<?= base_url() ?>public/assets/js/login.js"></script>

</html>