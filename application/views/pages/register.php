<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <?= $style ?>
    <script>
        $(document).ready(function() {
            $('#TanggalLahir').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy/mm/dd'
            });
        });
    </script>
    <style>
        .list-unstyled li {
            color: red;
        }
    </style>
</head>

<body>
    <?= $nav ?>
    <div id="main" style="margin-bottom: -16px;">
        <div class="container">
            <h1>Register</h1>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo form_open_multipart(base_url('index.php/Register/auth'), array('type' => 'POST', 'data-toggle' => 'validator', 'role' => 'form')); ?>
                <div class="form-group row">
                    <label for="Nama" class="col-sm-2 control-label col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nama" name="Nama" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Email" class="col-sm-2 control-label col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="Email" name="Email" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Password" class="col-sm-2 control-label col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="Password" name="Password" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="RePassword" class="col-sm-2 control-label col-form-label">Re-type Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="RePassword" name="RePassword" data-match="#Password" data-match-error="Whoops, these don't match" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TanggalLahir" class="col-sm-2 control-label col-form-label">Birth Date</label>
                    <div class="col-sm-10">
                        <input id="TanggalLahir" name="TanggalLahir" width="276" required />
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NoTelp" class="col-sm-2 control-label col-form-label">Telephone Number</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="NoTelp" name="NoTelp" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Foto" class="col-sm-2 control-label col-form-label">Photo (Optional)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="Foto" name="Foto">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary mb-5">Register</button>
                    <a class="btn btn-secondary mb-5" href="<?= base_url('index.php/Login') ?>" role="button">Cancel</a>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <?= $footer ?>
</body>

</html>