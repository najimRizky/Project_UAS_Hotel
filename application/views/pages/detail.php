<!DOCTYPE html>
<html lang="en" style="height: auto;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $style ?>
    <title><?= $hotels[0]['Nama_hotel'] ?></title>
    <style>
        #centered {
            position: absolute;
            top: 83%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        #showFullScreen{
            filter: brightness(50%);
            cursor: pointer;
            transition: 0.3s;
        }

        #showFullScreen:hover{
            filter: brightness(10%);
        }
    </style>
</head>

<body style="height: 100%;">
    <?= $nav ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?= $hotels[0]['Nama_hotel'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" style="max-width: 100%; height: 410px;">
                                <img style="width: 100%; height: 100%; object-fit:cover;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/1.jpeg') ?>" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item" style="max-width: 100%; height: 410px;">
                                <img style="width: 100%; height: 100%; object-fit:cover;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/2.jpeg') ?>" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item" style="max-width: 100%; height: 410px;">
                                <img style="width: 100%; height: 100%; object-fit:cover;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/3.jpeg') ?>" class="d-block w-100" alt="">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <div id="main" >
        <div class="container" style="background: white; border-radius: 4px; padding: 18px;">
            <h3><?= $hotels[0]['Nama_hotel'] ?></h3>
            <span class="badge badge-pill badge-primary">Hotels</span>
            <?php for ($i = 0; $i < $hotels[0]['Bintang']; $i++) { ?>
                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
            <?php } ?>
            <p style="font-weight:lighter;">
                <i class="fas fa-map-marked-alt" style="color: gray;"></i> <?= $hotels[0]['Lokasi'] ?>
            </p>
            <div class="row">
                <div class="col-md-9" style="height: 414px; padding: 3px; ">
                    <img style="width: 100%; height: 100%; object-fit:cover; border-radius: 5px;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/'.$hotels[0]['Gambar']) ?>" alt="">
                </div>
                <div class="col-md-3">
                    <div class="row" style="height: 138px; padding: 3px;">
                        <img style="width: 100%; height: 100%; object-fit:cover; border-radius: 5px;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/'.$hotels[0]['Gambar2']) ?>" alt="">
                    </div>
                    <div class="row" style="height: 138px; padding: 3px;">
                        <img style="width: 100%; height: 100%; object-fit:cover; border-radius: 5px;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/'.$hotels[0]['Gambar3']) ?>" alt="">
                    </div>
                    <div data-toggle="modal" data-target="#exampleModal" class="row" style="height: 138px; padding: 3px; cursor: pointer;">
                        <img  id="showFullScreen"  style="width: 100%; height: 100%; object-fit:cover; border-radius: 5px;" src="<?= base_url('assets/uploads/hotel/' . $hotels[0]['Kota'] . '/' . $hotels[0]['Nama_hotel'] . '/'.$hotels[0]['Gambar4']) ?>" alt="">
                        <div id="centered" class="texr-center" >Show full screen</div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4 offset-md-8 text-center" style="display: block; text-align:right;">
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
                            <a href="<?= base_url('index.php/User/form?idHotel=').$hotels[0]['Id_hotel'] ?>" class="btn btn-danger">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4 mb-4" style="background: white; border-radius: 4px; padding: 18px;">
            <div class="row">
                <div class="col-12 text-center">
                    <h3>Facilities</h3>
                </div>
                <div class="col-12 text-center">
                    <div class="row justify-content-center">
                        <?php
                        foreach ($facilities as $item) {
                            $iconFacility = "";
                            switch ($item['Id_fasilitas']) {
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
                            <div class="col-md-2 col-4">
                                <div class="row">
                                    <div class="col-12">
                                        <?= $iconFacility ?>
                                    </div>
                                    <div class="col-12">
                                        <?= $item['Deskripsi'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $footer ?>
    </div>
</body>

</html>