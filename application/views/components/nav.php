<nav style="background-color: transparent;" class="navbar navbar-expand-md navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?= base_url() ?>"><img width="100px" src="<?= base_url('assets/uploads/images/logo.png') ?>"></a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bintang
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">5
          <?php for ($i = 0; $i < 5; $i++) { ?>
              <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
          <?php } ?>
          </a>
          <a class="dropdown-item" href="#">4
          <?php for ($i = 0; $i < 4; $i++) { ?>
              <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
          <?php } ?>
          </a>
          <a class="dropdown-item" href="#">3
          <?php for ($i = 0; $i < 3; $i++) { ?>
              <i class="fas fa-star" style="color: #fcba03; font-size: 16px;"></i>
          <?php } ?>
          </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kota
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Bandung</a>
          <a class="dropdown-item" href="#">Jakarta</a>
          <a class="dropdown-item" href="#">Bali</a>
          <a class="dropdown-item" href="#">Tokyo</a>
          <a class="dropdown-item" href="#">Seoul</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/base/aboutUs') ?>">About Us</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form class="form-inline" onSubmit="return false;">
          <input class="form-control mr-sm-2" id="searchBar" type="search" oninput="search()" placeholder="Search" aria-label="Search">
          <a href="" class="btn btn-outline-success my-2 my-sm-0" id="submitSearch">Search</a>
        </form>
      </li>
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-alt"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php if(!$this->session->userdata('email')) { ?>
            <a class="dropdown-item" href="<?= base_url('index.php/Login') ?>">Login</a>
          <?php } else { ?>
            <a class="dropdown-item" href="<?= base_url('index.php/User/profile') ?>">My Profile</a>
            <a class="dropdown-item" href="#">Booking History</a>
            <a class="dropdown-item" href="<?= base_url('index.php/Login/logOut') ?>">Logout</a>
          <?php } ?>
        </div>
      </li>
    </ul>
  </div>
</nav>

<script>
  function search() {
    var keyword = document.getElementById('searchBar').value;
    var submitSearch = document.getElementById('submitSearch');
    submitSearch.href = "<?= base_url('index.php/base/search/') ?>" + keyword;
  }
  $('#searchBar').keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13' && document.getElementById('searchBar').value != "") {
      document.getElementById("submitSearch").click();
    }
  });
</script>