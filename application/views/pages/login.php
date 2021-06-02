<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <?= $style ?>
    <script>
        $(document).ready(function() {
            $('.captcha-refresh').on('click', function() {
                $.get('<?php echo base_url() . 'index.php/login/refresh'; ?>', function(data) {
                    $('#image_captcha').html(data);
                });
            });
        });
    </script>
</head>

<body>
    <?= $nav ?>
    <div id="main">
        <div class="container mb-2" id="content" style=" padding: 5px 200px 0px 200px; ">
            <h2>Login</h2>
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?php echo base_url('index.php/Login/auth') ?>" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="Email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="Email" name="email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="Password" name="password" placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-group">
                    <p class="ml-3" id="image_captcha"><?php echo $captchaImg; ?></p>
                    <div class="col-sm-10">
                        <input type="text"  name="captcha" placeholder="Enter the Captcha above">
                        <a href="javascript:void(0);" class="captcha-refresh btn btn-primary"><i class="fas fa-sync" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    Don't have account?, register 
                    <a href="<?= base_url('index.php/Register') ?>" class="">Here</a>
                </div>
                
            </form>
        </div>
    <?= $footer ?>
    </div>
</body>

</html>