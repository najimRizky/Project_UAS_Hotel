<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $style ?>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
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
                day++
                var minimumDate = (year +"/"+ month +"/"+ day);
                console.log(day);
                $('#Tanggal_checkout').datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'yyyy/mm/dd',
                    minDate: minimumDate
                });
                document.getElementById('Tanggal_checkout').disabled = false;
            });
        });

    </script>
</head>
<body style="height: 100%;">
    <?= $nav ?>
    <div id="main">
        <div class="container" style="background: white; padding-top: 32px">
            <h3 class="text-center">Hotel BLBALBALBA</h3>
            <div class="col-md-8 offset-md-2">
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
                        <input type="number" class="form-control" id="Jumlah_kamar" name="Jumlah_kamar" onchange="calculateTotal()" placeholder="Jumlah kamar" min="0" value="1" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <small style="color:green;">isi checkin terlebih dahulu sebelum checkout!</small>
                        </div>
                        <div class="col form-group">
                            <label for="Tanggal_checkin">Tanggal check-in</label>
                            <input class="form-control" readonly id="Tanggal_checkin" name="Tanggal_checkin" placeholder="YYYY/MM/DD" required>
                        </div>
                        <div class="col form-group">
                            <label for="Tanggal_checkout">Tanggal check-out</label>
                            <input class="form-control" readonly id="Tanggal_checkout" name="Tanggal_checkout" onchange="calculateTotal()" placeholder="YYYY/MM/DD" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="Hari" name="Hari" value="0" readonly>
                        <label for="Total">Total</label>
                        <input class="form-control" id="Total" name="Total" value="0" readonly>
                    </div>
                    <div style="margin-bottom: 10px; margin-top: -10px">
                        <small>Harga kamar * jumlah hari * jumlah kamar</small><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br> <br> <br> <br>
            </div>
        </div>
        <?= $footer ?>
    </div>

    <script>
        function calculateTotal() {
            var harga = 100000;

            var kamar = document.getElementById('Jumlah_kamar').value;
            var checkin = document.getElementById('Tanggal_checkin').value;
            var checkout = document.getElementById('Tanggal_checkout').value;

            checkin = new Date(checkin);
            checkout = new Date(checkout);

            days = (checkout - checkin) / (1000 * 60 * 60 * 24);
            days = Math.round(days);

            var total = harga * days * kamar;

            if(isNaN(total)){
                document.getElementById('Total').value = 0;
            } else {
                document.getElementById('Total').value = total;
            }
            document.getElementById('Hari').value = days;

        }
    </script>
</body>
</html>