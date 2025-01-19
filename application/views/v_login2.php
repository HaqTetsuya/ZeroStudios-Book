<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zerostudios Book</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/all.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style2.css'; ?>">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="card-form signin-form">
                <form action="<?php echo base_url('login/dashboard_masuk') ?>" method="post">
                    <div class="form-group">
                        <input id="Username" name="username" type="text" class="form-control" value="<?php echo $data = $this->session->userdata('username');?>" readonly/>
                    </div>
                    <div class="form-group">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required />
                        <span toggle="#password" id="toggle-password" class="eye-icon fas fa-fw fa-eye  toggle-password"></span>
                    </div>
                    <button type="submit" class="btn gradient-custom">
                        Login
                    </button>
                </form>
                <hr>
                <div class="form-group d-md-flex" style="margin-top: 20px;">
                    <div class="w-50">
                        <label class="checkbox-wrap checkbox-primary">Remember Me
                            <input type="checkbox" checked />
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="w-50 text-md-right">
                        <a href="#" style="color: #fff">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="intros-container">
            <div class="intro-control signin-intro ">
                <div class="intro-control__inner">
                    <h2>Welcome back!</h2>
                    <p>
                        Welcome back! We are so happy to have you here. It's great to see
                        you again. We hope you had a safe and enjoyable time away.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/all.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main2.js'); ?>"></script>
</body>