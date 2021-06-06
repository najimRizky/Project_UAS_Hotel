<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice ID Booking <?= $booking[0]['Id_booking'] ?></title>
    <?= $style ?>
</head>

<body style="padding-top: 2rem;" class="mb-4">
    <div class="container p-4" style="border: 1px solid black; ">
        <div class="row">
            <div class="col-6">
                <h1>Invoice</h1>
                <p style="font-size: 20px;">Id Booking : <strong><?= $booking[0]['Id_booking'] ?></strong></p>
            </div>
            <div class="col-6 text-right">
                <img src="<?= base_url('assets/uploads/images/logo.png') ?>" width="200px" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3" style="overflow: hidden; background: rgba(0,0,0,0.1);">
                    <div class="row">
                        <div class="col-md-3 col-5">
                            <img style="width: 100%; height: 100%; object-fit:cover" src="<?= base_url('assets/uploads/hotel/' . $booking[0]['Kota'] . '/' . $booking[0]['Nama_hotel'] . '/' . $booking[0]['Gambar']) ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-9 col-7">
                            <div class="card-body p-2">
                                <div style="color: rgba(0,0,0,0.8);">
                                    <h5 class="card-title" style="margin-bottom: 0;"><?= $booking[0]['Nama_hotel'] ?></h5>
                                </div>
                                <?php for ($i = 0; $i < $booking[0]['Bintang']; $i++) { ?>
                                    <i class="fas fa-star" style="color: #fcba03; font-size: 10px;"></i>
                                <?php } ?>
                                <p style="font-size: 10px; color: maroon;"><i class="fas fa-map-marked-alt"></i> <?= $booking[0]['Kota'] ?></p>
                                <p> <?= $booking[0]['Lokasi'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <span style="color: rgba(0,0,0,0.5);">Check-in</span><br>
                <span style="font-size: 24px; font-weight:600;"><?= date_format(date_create($booking[0]['Tgl_checkin']), "D, d M y") ?></span><br>
                <span style="color: rgba(0,0,0,0.5);">14:00 - 00:00(+1)</span>
            </div>
            <div class="col-3">
                <span style="color: rgba(0,0,0,0.5);">Check-out</span><br>
                <span style="font-size: 24px; font-weight:600;"><?= date_format(date_create($booking[0]['Tgl_checkout']), "D, d M y") ?></span><br>
                <span style="color: rgba(0,0,0,0.5);">12:00</span>
            </div>
            <div class="col-3">
                <span style="color: rgba(0,0,0,0.5);">Jumlah kamar</span><br>
                <span style="font-size: 24px; font-weight:600;"><?= $booking[0]['Jumlah_pesan_kamar'] ?> Kamar</span><br>
            </div>
            <div class="col-3">
                <span style="color: rgba(0,0,0,0.5);">Jumlah hari</span><br>
                <span style="font-size: 24px; font-weight:600;"><?= $booking[0]['Jumlah_hari'] ?> Hari</span><br>
            </div>
            <div class="col-12 mt-2">
                <span style="color: rgba(0,0,0,0.5);">Harap informasikan ke pihak hotel jika Anda terlambat check-in untuk menghindari pembatalan.</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr style="border: 0.1px solid rgba(0,0,0,0.2); ">
            </div>
            <div class="col-12">
                <h2>Pesanan Anda <span style="font-size: 1rem;">Untuk detail lengkap, mohon lihat email konfirmasi</span></h2>
            </div>
            <div class="col-11 ml-4">
                <div class="row mb-2">
                    <div class="col-4">
                        <h4 style="color: gray;">Nama tamu</h4>
                    </div>
                    <div class="col-7 ml-4">
                        <h4 style=""><?= $booking[0]['Nama_tamu'] ?></h4>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-4">
                        <h4 style="color: gray;">Email</h4>
                    </div>
                    <div class="col-7 ml-4">
                        <h4 style=""><?= $booking[0]['Email'] ?></h4>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-4">
                        <h4 style="color: gray;">Nomor telepon</h4>
                    </div>
                    <div class="col-7 ml-4">
                        <h4 style=""><?= $booking[0]['Nomor_telepon'] ?></h4>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-4">
                        <h4 style="color: gray;">Total harga</h4>
                    </div>
                    <div class="col-7 ml-4">
                        <h4 style="">Rp<?= number_format($booking[0]['Total_harga']) ?>.-</h4>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-4">
                        <h4 style="color: gray;">Waktu booking</h4>
                    </div>
                    <div class="col-7 ml-4">
                        <h4 style=""><?= $booking[0]['Waktu_booking'] ?></h4>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-4">
                        <h4 style="color: gray;">Kebijakan pembatalan</h4>
                    </div>
                    <div class="col-7 ml-4">
                        <h4 >Non-refundable</h4>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container pt-4">
        <div class="row">
            <div class="col-12 text-right">
                <a href="<?= base_url('index.php/User/booking') ?>" class="btn btn-secondary">Return</a>
            </div>
        </div>
    </div>
</body>

</html>