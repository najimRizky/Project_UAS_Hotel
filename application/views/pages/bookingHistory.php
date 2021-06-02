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
        <div class="container">
            <?php foreach($bookings as $item){ ?>
                <div id="filter" class="card mb-3 b<?= $item['Bintang'] ?> <?= $item['Kota'] ?> <?= $item['Harga'] ?>" style="overflow: hidden;">
                        <div class="row">
                            <div class="col-md-9 col-7">
                                <div class="card-body p-2">
                                    <div style="color: rgba(0,0,0,0.8);">
                                        <h5 class="card-title" style="margin-bottom: 0;">Id Booking : <?= $item['Id_booking'] ?></h5>
                                    </div>
                                    <a href="<?= base_url('index.php/User/invoice/'.$item['Id_booking']) ?>" class="btn btn-primary text-center">See invoice</a>
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