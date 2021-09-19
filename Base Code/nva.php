<nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="navbar">
    <div class="container">
    <a href="index.php" class="navbar-brand"><h2>Atatturk</h2></a>
    <button 
    class="navbar-toggler" type="button" 
    data-bs-toggle="collapse" data-bs-target="#navmenu"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="Booking.php" class="nav-link links">Book</a>
            </li>
            <li class="nav-item">
              <a href="help.php" class="nav-link links">Help</a>
            </li>
            <li class="nav-item">
              <a href="manage.php" class="nav-link links">Manage</a>
            </li>
           
            <li class="nav-item" id="logIn">
              <a href="#" class="nav-link links" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            </li>
        </ul>
        <div class="dropdown" id="dropIt" style="display:none;">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="manage.php">Manage</a></li>
            <li><a class="dropdown-item" href="history.php">History</a></li>
            <li><a class="dropdown-item" href="#">Sign Out</a></li>
            <li><a class="dropdown-item" href="ManageP.php">Manage Profile</a></li>
          </ul>
        </div>
                
    </div>
  </div>
</nav>