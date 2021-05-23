<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $style ?>
    <title>Form</title>
    <script>
        $(document).ready(function() {
            var today, datepicker;
    		today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
            $('#Tanggal_checkin').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy/mm/dd',
                minDate: today
            });

            $('#Tanggal_checkin').on('change', function() { 
                var datearray = $('#Tanggal_checkin').val().split("/");
                var year = datearray[0];
                var month = datearray[1];
                var day = datearray[2];
                var minimumDate = (year +"/"+ month +"/"+ day);
                $('#Tanggal_checkout').datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'yyyy/mm/dd',
                    minDate: minimumDate
                });
            });
        });

    </script>
</head>
<body style="height: 100%;">
    <?= $nav ?>
    <div class="col-md-6 offset-md-3">
        <form class="" method="POST" action="<?= base_url('index.php/User/submitForm') ?>">
            <div class="form-group" >
                <label for="Email">Email address</label>
                <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="Nama_tamu">Nama Tamu</label>
                <input class="form-control" id="Nama_tamu" name="Nama_tamu" placeholder="Nama Tamu">
            </div>
            <div class="form-group">
                <label for="Nomor_telepon">Nomor Telepon</label>
                <input type="number" class="form-control" id="Nomor_telepon" name="Nomor_telepon" placeholder="Nomor Telepon" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="Jumlah_kamar">Jumlah kamar</label>
                <input type="number" class="form-control" id="Jumlah_kamar" name="Jumlah_kamar" placeholder="Jumlah kamar" min="0" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <small style="color:green;">isi checkin terlebih dahulu sebelum checkout!</small>
                </div>
                <div class="col form-group">
                    <label for="Tanggal_checkin">Tanggal check-in</label>
                    <input class="form-control" id="Tanggal_checkin" name="Tanggal_checkin" placeholder="YYYY/MM/DD" required>
                </div>
                <div class="col form-group">
                    <label for="Tanggal_checkout">Tanggal check-out</label>
                    <input class="form-control" id="Tanggal_checkout" name="Tanggal_checkout" placeholder="YYYY/MM/DD" required>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br> <br> <br> <br>
    </div>

    <?= $footer ?>
</body>
</html>