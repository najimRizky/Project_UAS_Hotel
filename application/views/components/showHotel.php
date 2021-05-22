<div class="row justify-content-center mt-5">
    <?php foreach ($hotels as $item) { ?>
        <div class="col-md-4 col-sm-6">
            <div class="card mb-4" style="width: 15rem;">
                <div style="height: 200px;">
                    <img style="width: 100%; height: 100%; object-fit:cover" src="<?= base_url('assets/uploads/hotel/' . $item['Kota'] . '/' . $item['Nama_hotel'] . '/1.jpeg') ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body p-2" style="height: 150px;">
                    <h6 class=""><?= $item['Nama_hotel'] ?></h6>
                    <?php for ($i = 0; $i < $item['Bintang']; $i++) { ?>
                        <i class="fas fa-star" style="color: #fcba03; font-size: 10px;"></i>
                    <?php } ?>
                    <p style="font-size: 10px;"><i class="fas fa-map-marked-alt text-danger"></i> <?= $item['Kota'] ?></p>
                    <a href="#" class="btn btn-primary">Book now</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>