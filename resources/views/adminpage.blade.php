<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/mycss.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
      </script>
    <title>ChillxDelivery</title>
  </head>
  <body>
  <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" id="nvbr">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="/">
            Admin Section </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0">
              <span class="material-icons" style="padding-top:7px; color:white;">
                home
                </span>
              <li class="nav-item">
                <a class="nav-link text-white" href="adminpage">Home</a>
              </li>
              <span class="material-icons" style="padding-top:7px; color:white;">
                store
                </span>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Products
                </a>
                <ul class="dropdown-menu me-auto" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="registerproduct">Add product</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ route('category.index') }}">Add category</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="products">View products</a></li>
                  <li><hr class="dropdown-divider"></li> 
                  <li><a class="dropdown-item" href="products">Graphs</a></li>
                </ul>
              </li>
              <span class="material-icons" style="padding-top:7px; color:white;">
                sell
                </span>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sales
                </a>
                <ul class="dropdown-menu me-auto" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">View sales</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Graphs</a></li>
                </ul>
              </li>
              <span class="material-icons" style="padding-top:7px; color:white;">
                manage_accounts
                </span>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Users
                </a>
                <ul class="dropdown-menu me-auto" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Add user</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Delete user</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">View users</a></li>
                </ul>
              </li>
              <span class="material-icons" style="padding-top:7px; color:white;">
                logout
                </span>
                <li class="nav-item">
                <a class="dropdown-item text-white" href="{{ route('logout') }}" style="padding-top:8px; background:none;"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
               </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </li>
            </ul>
            {{-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
          </div>
        </div>
      </nav>



  <!--End of admin navigation bar -->
<div class="container" id="section1"> 
  
  {{-- This is the section displaying the date and time --}}
  
  <ul class="list-group list-group-horizontal " style="margin-bottom: 10px;">
    <li class="list-group-item flex-fill justify-content-between align-items-start">
     <p class="text-danger" id="username">USER: {{ Auth::user()->name }}
</p> 
    </li>
    <li class="list-group-item flex-fill justify-content-between align-items-start">
    <p class="fw-bold">DATE:<span style="margin-left:10px;"><?php echo date("y-m-d")?></span></p>
    </li>
    <li class="list-group-item  justify-content-between " style="margin-right: -28px;">
    <p class="fw-bold text-danger" id="time">Time:<span style="padding-left:10px;"><?php 
      date_default_timezone_set('Asia/Kolkata');
      echo $runningTime =date('h:i:s');
     ?></span></p>
    </li>
  </ul>

  <script>
  function updateTime() {
  var now = new Date();
  document.getElementById('time').innerHTML = now.toLocaleTimeString();
  }
  setInterval(updateTime, 1000);
  </script>
  
  {{-- end of the the section displaying the date and time --}}
  <div class="row">
<div class="col-md-3 col-xs-12">
  <div class="card" style="width: 18rem;">
    <a href="products" id="menuhref">
 <img src="images/image4.png" class="card-img-top" alt="..." id="img4">
    <div class="card-body">
      <h5 class="card-title text-center">Products</h5>
    </div>
  </a>
  </div>
</div>
<div class="col-md-3 col-xs-12">
  <div class="card" style="width: 18rem;">
    <a href="{{route('sales.index')}}" id="menuhref">
      <img src="images/image6.png" class="card-img-top" alt="..." id="img4">
      <div class="card-body">
        <h5 class="card-title text-center">Sales</h5>
      </div>
    </a>
  </div>
</div>
<div class="col-md-3 col-xs-12">
  <div class="card" style="width: 18rem;">
    <img src="images/image10.png" class="card-img-top" alt="..." id="img4">
    <div class="card-body">
      <h5 class="card-title text-center">Users</h5>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-12">
  <div class="card" style="width: 18rem;">
 <img src="images/image13.png" class="card-img-top" alt="..." id="img4">
    <div class="card-body">
      <h5 class="card-title text-center">Reports</h5>
    </div>
  </div>
</div>
  </div>
</div>

<!-- second section of admin section content -->
<div class="container" id="section2">    
  <div class="row">
<div class="col-md-3 col-sm-12">
  <div class="card" style="width: 18rem;">
 <img src="images/image8.png" class="card-img-top" alt="..." id="img4">
    <div class="card-body">
      <h5 class="card-title text-center">Graphs</h5>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-12">
  <div class="card" style="width: 18rem;">
    <img src="images/image7.png" class="card-img-top" alt="..." id="img4">
    <div class="card-body">
      <h5 class="card-title text-center">Notification</h5>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-12">
  <div class="card" style="width: 18rem;">
    <img src="images/image9.png" class="card-img-top" alt="..." id="img4">
    <div class="card-body">
      <h5 class="card-title text-center">Exit</h5>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-12">
  <div class="card" style="width: 18rem;">
    {{-- <img src="images/image9.png" class="card-img-top" alt="..." id="img10">
    <div class="card-body">
      <h5 class="card-title text-center">Exit</h5>
    </div> --}}
  </div>
</div>
  </div>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>