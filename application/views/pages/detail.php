<!DOCTYPE html >
<html lang="en" style="height: 1000%;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $style ?>
    <title><?= $hotels[0]['Nama_hotel']?></title>
</head>
<body style="height: 100%;">
    <?= $nav ?>
    <div id="main" style="height: 100%; background-color: #E6EAED; padding-top: 3rem;">
        <div class="container" style="background: white; border-radius: 4px; padding: 18px;">
            <h3><?= $hotels[0]['Nama_hotel']?></h3>
            <?php for ($i = 0; $i < $hotels[0]['Bintang']; $i++) { ?>
                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
            <?php } ?>
            <p style="font-weight:lighter;">
                <i class="fas fa-map-marked-alt" style="color: gray;"></i> <?= $hotels[0]['Lokasi'] ?>
            </p>
            <div class="row">
                <div class="col-9" style="height: 414px; padding: 3px; " >
                    <img style="width: 100%; height: 100%; object-fit:cover; border-radius: 5px;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/1.jpeg') ?>" alt="">
                </div>
                <div class="col-3">
                    <div class="row" style="height: 138px; padding: 3px;">
                        <img style="width: 100%; height: 100%; object-fit:cover; border-radius: 5px;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/2.jpeg') ?>" alt="">
                    </div>
                    <div class="row" style="height: 138px; padding: 3px;">
                        <img style="width: 100%; height: 100%; object-fit:cover; border-radius: 5px;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/3.jpeg') ?>" alt="">
                    </div>
                    <div class="row" style="height: 138px; padding: 3px;">
                        <img style="width: 100%; height: 100%; object-fit:cover; border-radius: 5px;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/4.jpeg') ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 offset-8 text-center" style="display: block; text-align:right;" >
                    <div class="row">
                        Price/room/night starts from
                    </div>
                    <div class="row">
                        <h2 class="text-danger">Rp<?= number_format($hotels[0]['Harga']) ?></h2>
                    </div>
                    <div class="row" style="text-align:right;">
                        <button type="button" class="btn btn-danger">Select Room</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>