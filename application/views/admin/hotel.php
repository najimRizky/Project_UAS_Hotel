<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <?= $style ?>
    <?php echo $groceryCRUD ?>

</head>
<body>
    <h1>Hotel</h1>
    <a class="btn btn-danger" href="<?php echo base_url('index.php/login/logOut'); ?>">Log Out</a>
    <a class="btn btn-secondary" href="<?php echo base_url('index.php/Admin/crudItemBooking'); ?>">Booking</a>
    <?php echo $crud['output']; ?>
</body>
</html>