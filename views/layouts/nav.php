<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=home">Home</a></li>
                <?php if(isset($_SESSION["user_name"])): ?>
    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=blogs">Blog</a></li>
    <li class="nav-item d-flex flex-column align-items-center text-white">
      
        <i class="fas fa-user-circle fa-2x mb-1"></i>
        <small>
            <?php echo $_SESSION["user_name"] ?? 'No name'; ?>
        </small>
    </li>
    <li class="nav-item d-flex flex-column align-items-center text-white">
    <a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=logout">LogOut</a>
    </li>
<?php else: ?>
    <li class="nav-item">
        <a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=register">Register</a>
    </li>
    <li class="nav-item">
        <a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=login">Login</a>
    </li>
<?php endif; ?>

             </ul>
        </div>
    </div>
</nav>