<div class="card-columns mt-4">
    <?php foreach ($hotels as $item) { ?>
        <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" class="card">
            <img style="width: 100%; height: 100%; object-fit:cover" src="<?= base_url('assets/uploads/hotel/' . $item['Kota'] . '/' . $item['Nama_hotel'] . '/'.$hotels[0]['Gambar']) ?>" class="card-img-top" alt="...">
            <div class="card-body p-2">
                <a href="<?= base_url('index.php/base/detail/'.$item['Id_hotel']) ?>" style="color: rgba(0,0,0,0.8);">
                    <h5 class="card-title" style="margin-bottom: 0;"><?= $item['Nama_hotel'] ?></h5>
                </a>
                <?php for ($i = 0; $i < $item['Bintang']; $i++) { ?>
                    <i class="fas fa-star" style="color: #fcba03; font-size: 10px;"></i>
                <?php } ?>
                <p style="font-size: 10px; color: maroon;"><i class="fas fa-map-marked-alt"></i> <?= $item['Kota'] ?></p>
                <p>Rp<?= number_format($item['Harga']) ?></p>
                <a href="<?= base_url('index.php/User/form?idHotel=').$item['Id_hotel'] ?>" class="btn btn-primary text-center">Book now</a>
            </div>
        </div>
    <?php } ?>
</div>