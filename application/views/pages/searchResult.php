<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $style ?>
    <title>Search: <?= count($hotels) ?> Found</title>
</head>

<body>
    <?= $nav ?>
    <div id="main">
        <div class="container">
            <h3>
                Showing result for <?= $keyword . ": " . count($hotels) ?> found
            </h3>
            <?php foreach ($hotels as $item) { ?>
                <div class="card mb-3" style="overflow: hidden;">
                    <div class="row">
                        <div class="col-md-3 col-5" >
                            <img style="width: 100%; height: 100%; object-fit:cover" src="<?= base_url('assets/uploads/hotel/' . $item['Kota'] . '/' . $item['Nama_hotel'] . '/' . $hotels[0]['Gambar']) ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-9 col-7">
                            <div class="card-body p-2">
                                <a href="<?= base_url('index.php/base/detail/' . $item['Id_hotel']) ?>" style="color: rgba(0,0,0,0.8);">
                                    <h5 class="card-title" style="margin-bottom: 0;"><?= $item['Nama_hotel'] ?></h5>
                                </a>
                                <?php for ($i = 0; $i < $item['Bintang']; $i++) { ?>
                                    <i class="fas fa-star" style="color: #fcba03; font-size: 10px;"></i>
                                <?php } ?>
                                <p style="font-size: 10px; color: maroon;"><i class="fas fa-map-marked-alt"></i> <?= $item['Kota'] ?></p>
                                <p>Rp<?= number_format($item['Harga']) ?></p>
                                <a href="#" class="btn btn-primary text-center">Book now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?= $footer ?>
    </div>
</body>

</html>