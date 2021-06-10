<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $style ?>
    <title>Search: <?= count($hotels) ?> Found</title>
</head>

<body onload="getMinMaxFilter()">
    <?= $nav ?>
    <div id="main">
        <div class="container">
            <?php if (count($hotels) != 0) { ?>
                <p style="text-align: right;">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </p>
            <?php } ?>
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <p>Kota:</hp>
                                    <div class="kota">
                                        <?php foreach ($kota as $city) { ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" rel="<?= $city ?>" onchange="change();" /><?= $city ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>Bintang:</p>
                                    <div class="bintang">
                                        <div class="checkbox">
                                            <label><input type="checkbox" rel="b3" onchange="change();" />
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" rel="b4" onchange="change();" />
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" rel="b5" onchange="change();" />
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                                <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>Harga</p>
                                    <input type="number" oninput="filterPrice()" id="minprice" class="form-control" value="" placeholder="Minimal harga">
                                    <br>
                                    <input type="number" oninput="filterPrice()" id="maxprice" class="form-control" value="<?php if(isset($_GET['maxprice'])) echo $_GET['maxprice']; ?>" placeholder="Maksimal harga">
                                    <br>
                                    <p id="msg"></p>
                                    <a href="#" id="btnFilterPrice"  class="btn btn-primary">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>
                Showing result for <?= $keyword . ": " . count($hotels) ?> found
            </h3>

            <div class="result">
                <?php foreach ($hotels as $item) { ?>
                    <div id="filter" class="card mb-3 b<?= $item['Bintang'] ?> <?= $item['Kota'] ?> <?= $item['Harga'] ?>" style="overflow: hidden;">
                        <div class="row">
                            <div class="col-md-3 col-5" style="height: 200px;">
                                <img style="width: 100%; height: 100%; object-fit:cover" src="<?= base_url('assets/uploads/hotel/' . $item['Kota'] . '/' . $item['Nama_hotel'] . '/' . $item['Gambar']) ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="col-md-9 col-7">
                                <div class="card-body p-2">
                                    <a href="<?= base_url('index.php/base/detail/' . $item['Id_hotel']) ?>" style="color: rgba(0,0,0,0.8);">
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
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?= $footer ?>
    </div>
</body>
<script>
    function change() {
        var kotaCbs = document.querySelectorAll(".kota input[type='checkbox']");
        var bintangCbs = document.querySelectorAll(".bintang input[type='checkbox']");
        var filters = {
            kota: getClassOfCheckedCheckboxes(kotaCbs),
            bintang: getClassOfCheckedCheckboxes(bintangCbs)
        };
        filterResults(filters);
    }

    function getClassOfCheckedCheckboxes(checkboxes) {
        var classes = [];
        if (checkboxes && checkboxes.length > 0) {
            for (var i = 0; i < checkboxes.length; i++) {
                var cb = checkboxes[i];
                if (cb.checked) {
                    classes.push(cb.getAttribute("rel"));
                }
            }
        }
        return classes;
    }

    function filterResults(filters) {
        var rElems = document.querySelectorAll(".result #filter");
        var hiddenElems = [];
        if (!rElems || rElems.length <= 0) {
            return;
        }
        for (var i = 0; i < rElems.length; i++) {
            var el = rElems[i];
            // console.log(el);
            if (filters.kota.length > 0) {
                var isHidden = true;
                for (var j = 0; j < filters.kota.length; j++) {
                    var filter = filters.kota[j];
                    if (el.classList.contains(filter)) {
                        isHidden = false;
                        break;
                    }
                }
                if (isHidden) {
                    hiddenElems.push(el);
                }
            }
            if (filters.bintang.length > 0) {
                var isHidden = true;
                for (var j = 0; j < filters.bintang.length; j++) {
                    var filter = filters.bintang[j];
                    if (el.classList.contains(filter)) {
                        isHidden = false;
                        break;
                    }
                }
                if (isHidden) {
                    hiddenElems.push(el);
                }
            }
        }
        for (var i = 0; i < rElems.length; i++) {
            rElems[i].style.display = "block";
        }
        if (hiddenElems.length <= 0) {
            return;
        }
        for (var i = 0; i < hiddenElems.length; i++) {
            hiddenElems[i].style.display = "none";
        }
    }

    function getMinMaxFilter(){
        <?php if(isset($_GET['maxprice']) && isset($_GET['minprice'])) { ?>
            document.getElementById("minprice").value = <?php echo $_GET['minprice']; ?>;
            document.getElementById("maxprice").value = <?php echo $_GET['maxprice']; ?>;
        <?php } ?>
    }

    function filterPrice(){
        var min = document.getElementById("minprice").value;
        var max = document.getElementById("maxprice").value;
        var submitFilter = document.getElementById("btnFilterPrice");
        if(min == 0) min = 0;
        if(max == 0) max = 0;
        
        // console.log(min+" "+max);
        if(parseInt(min)<0 || parseInt(max)<0){
            submitFilter.href = "#";
            document.getElementById('msg').innerHTML = "Input tidak valid";
        }
        else if(parseInt(min)==0 && parseInt(max)==0) {
            submitFilter.href = "#";
            document.getElementById('msg').innerHTML = "";
        }else if(parseInt(min)<parseInt(max)){
            submitFilter.href = "<?= base_url('index.php/base/search/'.$keyword) ?>?minprice="+min+"&maxprice="+max;
            document.getElementById('msg').innerHTML = "";
        }else if(parseInt(min) >= parseInt(max)){
            submitFilter.href = "#";
            document.getElementById('msg').innerHTML = "Input tidak valid";
        }
    }
</script>

</html>