<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
    <ol class="carousel-indicators">
        <?php $num = 0;
        foreach ($randomHotel as $item) { ?>
            <li data-target="#carouselExampleCaptions" data-slide-to="<?= $num ?>" class="<?php if ($num == 0) echo "active"; ?>"></li>
        <?php $num++;
        } ?>
    </ol>
    <div class="carousel-inner">
        <?php $num = 1;
        foreach ($randomHotel as $item) { ?>
            <div style="max-width: 100%; height: 400px;"  class="carousel-item <?php if ($num == 1) echo "active"; $num++; ?>" >
                <img style="widht: 100%; height: 100%; object-fit: cover;" src="<?= base_url('assets/uploads/hotel/' . $item['Kota'] . '/' . $item['Nama_hotel'] . '/1.jpeg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.5); border-radius: 10px; ">
                    <a href="<?= base_url('index.php/base/detail/'.$item['Id_hotel']) ?>" style="color: white"><h5><?= $item['Nama_hotel'] ?></h5></a>
                    <?php for($i=0; $i<$item['Bintang']; $i++){ ?>
                        <i class="fas fa-star" style="color: yellow; font-size: 10px;"></i>
                    <?php }?>
                    <p><?= $item['Lokasi'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>