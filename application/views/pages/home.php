<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?= $style ?>
</head>

<body>
    <?= $nav ?>
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $num = 0; 
                foreach($randomHotel as $item){ ?>
                    <li data-target="#carouselExampleCaptions" data-slide-to="<?= $num ?>" class="<?php if($num == 0) echo "active"; ?>"></li>
                <?php $num++; }?>
            </ol>
            <div class="carousel-inner">
                <?php $num = 1; 
                foreach($randomHotel as $item){ ?>
                <div class="carousel-item <?php if($num == 1) echo "active"; $num++;?>">
                    <img src="<?= base_url('assets/uploads/hotel/'.$item['Kota'].'/'.$item['Nama_hotel'].'/1.jpeg') ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $item['Nama_hotel'] ?></h5>
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
    </div>

    <?= $footer ?>
</body>

</html>