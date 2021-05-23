<!DOCTYPE html>
<html lang="en">
<head>
    <?= $style ?>
    <title>Form</title>
</head>
<body style="height: 100%;">
    <?= $nav ?>
    <div class="col-md-6 offset-md-3">
        <form class="">
            <div class="form-group" >
                <label for="Email">Email address</label>
                <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="Nama_tamu">Nama Tamu</label>
                <input class="form-control" id="Nama_tamu" placeholder="Nama Tamu">
            </div>
            <div class="form-group">
                <label for="Nomor_telepon">Nomor Telepon</label>
                <input type="number" class="form-control" id="Nomor_telepon" name="Nomor_telepon" placeholder="Nomor Telepon" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="Jumlah kamar">Jumlah kamar</label>
                <input type="number" class="form-control" id="Jumlah_kamar" name="Jumlah_kamar" placeholder="Jumlah kamar" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="Tanggal check-in">Tanggal check-in</label>
                    <input type="date" class="form-control" id="Tanggal_checkin" placeholder="Tanggal check-in">
                </div>
                <div class="col form-group">
                    <label for="Tanggal check-out">Tanggal check-out</label>
                    <input type="date" class="form-control" id="Tanggal_checkout" placeholder="Tanggal check-out">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br> <br> <br> <br>
    </div>

    <?= $footer ?>
</body>
</html>