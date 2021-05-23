<nav style="background-color: transparent;"  class="navbar navbar-expand-md navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">LOGO</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/base/aboutUs')?>">About Us</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form class="form-inline" onSubmit="return false;">
          <input class="form-control mr-sm-2" id="searchBar" type="search" oninput="search()" placeholder="Search" aria-label="Search">
          <a href="" class="btn btn-outline-success my-2 my-sm-0" id="submitSearch" >Search</a>
        </form>
      </li>
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-alt"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Login</a>
          <a class="dropdown-item" href="#">Logout</a>
          <a class="dropdown-item" href="#">Booking History</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<script>
  function search(){
    var keyword = document.getElementById('searchBar').value;
    var submitSearch = document.getElementById('submitSearch');
    submitSearch.href = "<?= base_url('index.php/base/search/')?>" + keyword;
  }
  $('#searchBar').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13' && document.getElementById('searchBar').value != ""){
        document.getElementById("submitSearch").click();
      }
  });
</script>