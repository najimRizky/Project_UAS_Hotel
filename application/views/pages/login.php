<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <?= $style ?>
</head>

<body>
    <div class="container">
        <form action="<?php echo base_url('index.php/Home/login') ?>" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email">
                </div>
            </div>
            <div class="form-group">
                <label for="Password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter Password">
                </div>
            </div>
            <h5 id="inputError" class="sr-only" for="warning" style="color: red">Email/Password salah, Silahkan coba lagi</h5>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                <a href="" class="btn btn-warning">Register</a>
            </div>
            <?php //echo $this->session->flashdata('msg'); 
            ?>
        </form>
    </div>
</body>

</html>