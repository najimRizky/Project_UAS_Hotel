<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?= $style ?>
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
        
        .list-unstyled li {
            color: red;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#TanggalLahir').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy/mm/dd'
            });
        });
    </script>
</head>

<body>
    <?= $nav ?>

    <div class="container">
        <div class="container rounded bg-white mt-5 mb-5">
        <?php echo $this->session->flashdata('msg'); ?>
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5 mb-3" style="max-width: 100%;" src="<?= base_url('assets/customer/').$user[0]['Foto'] ?>">
                        <span class="font-weight-bold"><?= $user[0]['Nama'] ?></span>
                        <span class="text-black-50"><?= $user[0]['Email'] ?></span>
                        <span> </span>
                    </div>
                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right"><?= $user[0]['Nama'] ?>'s Profile</h4>
                        </div>
                        <?php echo form_open_multipart(base_url('index.php/User/editProfile'), array('type' => 'POST', 'data-toggle' => 'validator', 'role' => 'form')); ?>
                            <div class="form-group row mt-2">
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input type="email" class="form-control" placeholder="enter email id" value="<?= $user[0]['Email'] ?>" disabled>
                                    <input type="hidden" name="Email" value="<?= $user[0]['Email'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Password</label>
                                    <div class="col-md-12" style="padding: 0;">
                                        <a href="" class="btn btn-link btn-sm">Change Password</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Change Profile Picture</label>
                                    <div class="col-md-12" style="padding: 0;">
                                        <input type="file" class="form-control" id="PosterLink" name="PosterLink" placeholder="PosterLink" value="">
                                        <small>Max. size 1MB</small>
					                    <span style="color: red"> <?php echo $error ?> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <label for="Nama" class="labels">Name</label>
                                    <input type="text" class="form-control" placeholder="name" id="Nama" name="Nama" value="<?= $user[0]['Nama'] ?>" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label for="NoTelp" class="labels">PhoneNumber</label>
                                    <input type="number" class="form-control" placeholder="enter phone number" id="NoTelp" name="NoTelp" value="<?= $user[0]['Nomor_telepon'] ?>" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label for="TanggalLahir" class="labels">Birth Date</label>
                                    <input id="TanggalLahir" name="TanggalLahir" width="276" placeholder="yyyy/mm/dd" value="<?= $user[0]['Tanggal_lahir'] ?>"/>
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary" type="submit" name="submit">Save Profile</button>
                                <a class="btn btn-warning" href="<?= base_url() ?>">Cancel</a>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $footer ?>
</body>

</html>