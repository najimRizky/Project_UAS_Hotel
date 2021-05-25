<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <?= $style ?>
</head>
<body style="padding-top: 30px;">
    <div class="container">
        <form action="<?= base_url('index.php/user/changePassword') ?>" oninput='newPass2.setCustomValidity(newPass2.value != newPass.value ? "Passwords do not match!" : "")' method="POST">
            <div class="form-group row">
                <label for="">Old Password: </label>
                <input type="password" minlength="6" class="form-control" required name="oldPass" placeholder="Old Password">
            </div>
            <div class="form-group row">
                <label for="">New Password: </label>
                <input type="password" minlength="6" class="form-control" required name="newPass" placeholder="New Password">
            </div>
            <div class="form-group row">
                <label for="">Confirm New Password: </label>
                <input type="password" minlength="6" class="form-control" required name="newPass2" placeholder="Confirm New Password">
            </div>
            <?= $this->session->flashdata('wrong') ?>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>