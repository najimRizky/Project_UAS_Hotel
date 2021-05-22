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
            </div><br>
            <div class="row">
                <div class="col-4 offset-8 text-center" style="display: block; text-align:right;" >
                    <div class="row">
                        <div class="col-12 text-right">
                            Price/room/night starts from
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h2 class="text-danger">Rp<?= number_format($hotels[0]['Harga']) ?></h2>
                        </div>
                    </div>
                    <div class="row" style="text-align:right;">
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-danger">Select Room</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4" style="background: white; border-radius: 4px; padding: 18px;">
            <div class="row">
                <div class="col-12 text-center">
                    <h3>Facilities</h3>
                </div>
                <div class="col-12 text-center">
                    <div class="row justify-content-center">
                    <?php 
                        foreach($facilities as $item){ 
                            $iconFacility = "";
                            switch($item['Id_fasilitas']){
                                case 1:
                                    $iconFacility = '<i class="fas fa-utensils"></i>';
                                    break;
                                case 2:
                                    $iconFacility = '<i class="fas fa-concierge-bell"></i>';
                                    break;
                                case 3:
                                    $iconFacility = '<i class="fas fa-wifi"></i>';
                                    break;
                                case 4:
                                    $iconFacility = '<i class="fas fa-parking"></i>';
                                    break;
                                case 5:
                                    $iconFacility = '<i class="fas fa-laptop-house"></i>';
                                    break;
                                case 6:
                                    $iconFacility = '<i class="fas fa-smoking-ban"></i>';
                                    break;
                                case 7:
                                    $iconFacility = '<i class="fas fa-swimmer"></i>';
                                    break;
                                case 8:
                                    $iconFacility = '<i class="fas fa-glass-cheers"></i>';
                                    break;
                                case 9:
                                    $iconFacility = '<i class="fas fa-temperature-low"></i>';
                                    break;
                                case 10:
                                    $iconFacility = '<i class="fas fa-coffee"></i>';
                                    break;
                            }
                    ?>
                    <div class="col-2">
                        <div class="row">
                            <div class="col-12">
                                <?= $iconFacility ?>
                            </div>
                            <div class="col-12">
                                <?= $item['deskripsi'] ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>