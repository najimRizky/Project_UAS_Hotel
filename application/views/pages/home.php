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
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>
            <div class="row justify-content-center mt-4" >
                <div class="col-12 col-md-10">
                    <form class="" onSubmit="return false">
                        <div class="form-group">
                            <!-- <input class="form-control mr-sm-2" id="searchBar" type="search" oninput="search()" placeholder="Search" aria-label="Search"> -->
                            <input class="form-control " id="searchBar" oninput="search()" placeholder="Seach hotel name or city. Ex: bandung or kempinski" aria-label="Search">
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-outline-success w-100 my-2 my-sm-0" id="submitSearch">Search</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr>
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
    <script>
        function search() {
            var keyword = document.getElementById('searchBar').value;
            var submitSearch = document.getElementById('submitSearch');
            submitSearch.href = "<?= base_url('index.php/base/search/') ?>" + keyword;
            if(keyword == "") submitSearch.href = "#";
        }
        $('#searchBar').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13' && document.getElementById('searchBar').value != "") {
                document.getElementById("submitSearch").click();
            }
        });
    </script>
</body>

</html>