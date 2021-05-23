<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $style ?>
</head>
<body>
<?= $nav ?>

<div class="container" id="main">
  <div class="row">
    <div class="col-sm-6">
    <div class="card" style="width: 18rem;">
        <img src="<?php base_url('assets/customer/WIN_20180424_00_37_33_Pro.jpg') ?>" class="card-img-top">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    </div>
    <div class="col-sm-6">
      One of three columns
    </div>
  </div>
</div>

<?= $footer ?>
</body>
</html>