<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking history</title>
    <?= $style  ?>
</head>

<body>
    <?= $nav ?>
    <div id="main">
        <div class="container mb-2">
            <?php if(count($bookings) == 0){ ?>
                <h1>You don't have any booking yet</h1>
            <?php }else{ foreach ($bookings as $item) { ?>
                <div id="" class="card mb-12" style="overflow: hidden;">
                    <div class="row">
                        <div class="col-md-9 col-7">
                            <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-6">
                                        <h1>Invoice</h1>
                                        <p style="font-size: 20px;">Id Booking : <strong><?= $item['Id_booking'] ?></strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-3" style="overflow: hidden; background: rgba(0,0,0,0.1);">
                                            <div class="row">
                                                <div class="col-md-3 col-5">
                                                    <img style="width: 100%; height: 100%; object-fit:cover" src="<?= base_url('assets/uploads/hotel/' . $item['Kota'] . '/' . $item['Nama_hotel'] . '/' . $item['Gambar']) ?>" class="card-img-top" alt="...">
                                                </div>
                                                <div class="col-md-9 col-7">
                                                    <div class="card-body p-2">
                                                        <div style="color: rgba(0,0,0,0.8);">
                                                            <h5 class="card-title" style="margin-bottom: 0;"><?= $item['Nama_hotel'] ?></h5>
                                                        </div>
                                                        <?php for ($i = 0; $i < $item['Bintang']; $i++) { ?>
                                                            <i class="fas fa-star" style="color: #fcba03; font-size: 10px;"></i>
                                                        <?php } ?>
                                                        <p style="font-size: 10px; color: maroon;"><i class="fas fa-map-marked-alt"></i> <?= $item['Kota'] ?></p>
                                                        <p> <?= $item['Lokasi'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('index.php/User/invoice/' . $item['Id_booking']) ?>" class="btn btn-primary text-center">See invoice</a>
                            </div>
                        </div>
                    </div>
                <?php } }?>
                </div>
        </div>
    </div>
        <?= $footer ?>
</body>

</html>