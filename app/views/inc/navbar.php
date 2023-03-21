<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Hospital</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Patient</a>
        </li>
        <li class="nav-item">
            <?php
                if(isset($_SESSION['doctor_id'])){
                    echo '<a class="nav-link" href="/doctors/logout">Logout</a>';
                }else{
                    echo'<a class="nav-link" href="/doctors/login">Login</a>';
                }
            ?>
    
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/home">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>