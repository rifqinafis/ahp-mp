<link href="<?php echo base_url() ?>Asset/Css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo base_url() ?>Asset/Js/bootstrap.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Login Aplikasi Pemilihan Calon Karyawan</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/v4-shims.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>Asset/Css//bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>Asset/Js/jquery-3.1.0.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>Asset/Css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>Asset/Css/login.css">
</head>

<body>
    <div class="container h-100">
        <h1 style="text-align: center; margin-top: 50px; font-family: cursive; color: white">Sistem Pendukung Keputusan <br> Pemilihan Calon Karyawan</h1>
        <h4 style="text-align: center; font-family: cursive; color: white; margin-bottom: 50px;">( AHP dan Matching Profile )</h4>
        <div class="d-flex justify-content-center">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="<?php echo base_url() ?>/Asset/images/logoo.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="post" action="<?php echo base_url() ?>login/proses">
                        <div class="input-group mb-3">
                            <?php echo $this->session->flashdata('Pesan_Login'); ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" required="" class="form-control input_user" value="" placeholder="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="pass" required="" class="form-control input_pass" value="" placeholder="password">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <input type="submit" class="btn login_btn" name="login" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>