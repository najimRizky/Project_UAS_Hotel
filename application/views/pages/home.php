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
    <div id="main">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?= $carrousel ?>
                </div>
            </div>
            <?= $showHotel ?>
        </div>
    </div>
    <?= $footer ?>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>