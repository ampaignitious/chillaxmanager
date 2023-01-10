
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
    <title>ChillxDelivery</title>
  </head>
  <body>
  <!--navbar-->
  <!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top" id="nvbr">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="/">Admin Section </a>
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
            <a class="nav-link text-white" href="signup">Logout</a>
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

  {{-- this sectin deals with alerts --}}
  <div class="container-fluid">
    @if ($errors->any())
<div class="alert alert-danger" id="alert" role="alert">
   <p>Details not saved</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success" id="alert" role="alert">
    <p class="text-success">{{ $message}}</p>
</div>
@endif

<script>
function showAlert() {
  var alert = document.getElementById('alert');
  alert.style.display = 'block';
  setTimeout(function() {
    alert.style.display = 'none';
  }, 3000);
}
</script>

{{-- end of the alerts section --}}


      <div class="row" style="margin-right: 5px; margin-left:5px;">
          <div class=" col-sm-12 border" style="margin-top:15px;">
            <p class="text-center" style="font-size: 20px; margin-top:5px;">Available registered products</p>
            <form style="margin-top:5px; margin-bottom:5px;">
                <input type="text" class="form-control" id="filterInput" onkeyup="filterTable()" placeholder="Search for a product..">
              </form>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                      <th scope="col">product code</th>
                      <th scope="col">product name</th>
                      <th scope="col">price</th>
                      <th scope="col">quantity</th>
                      <th scope="col">measurement</th>
                      <th scope="col">quantity</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $item)
                    <tr>
                      <th scope="row">{{$item->productcode}}</th>
                      <td>{{$item->productname}}</td>
                      <td>{{$item->productprice}}</td>
                      <td>{{$item->quantity}}</td>
                      <td>{{$item->measurement}}</td>
                      <td>{{$item->category}}</td>
                      <form action="{{ route('product.destroy', $item->id)}}" method="POST">
                        {{-- <td><a  class="btn border" href="{{ route('category.show', $units->id)}}">Show</a></td> --}}
                        <td><a class="btn border btn-secondary" href="{{ route('product.edit', $item->id)}}" >Edit</a></td>
                        @csrf
                        @method('DELETE')
                        <td><button type="submit" class="btn btn-danger delete-btn">Delete</button></td>
                        <script>
                          $(document).ready(function() {
                            $('.delete-btn').click(function(e) {
                              e.preventDefault();
                              if (confirm('Are you sure you want to delete this item?')) {
                                // If the user clicks "OK", submit the form to delete the item
                                $(this).closest('form').submit();
                              }
                            });
                          });
                        </script>
                        
                        </form>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script>
  function filterTable() {
    // Get the value of the input field
    var input = document.getElementById("filterInput");
    var filter = input.value.toUpperCase();

    // Get the table rows
    var rows = document.getElementsByTagName("tr");

    // Loop through all the rows and hide those that don't match the search query
    for (i = 0; i < rows.length; i++) {
      var cols = rows[i].getElementsByTagName("td");
      var match = false;
      for (j = 0; j < cols.length; j++) {
        if (cols[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          match = true;
          break;
        }
      }
      if (match) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }
</script>

  </body>
</html>