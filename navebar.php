
<!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Klinik</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="medicine.php" class="nav-item nav-link">Medicine</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Doctors</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <!-- <a href="feature.html" class="dropdown-item">Feature</a> -->
                        <a href="doctor.php" class="dropdown-item">Our Doctor</a>
                        <a href="appointment.php" class="dropdown-item">Appointment</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        <!-- <a href="404.html"class="dropdown-item">404 Page</a> -->
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <?php if(isset($_SESSION['user'])) {?>
                <a href="logout.php" class="nav-item nav-link">logout</a>
                <?php  
                        echo '<img class="rounded-circle mt-3 me-2" src="img/'.$_SESSION['user']['Img'].'" width="50px" height="50px" ></img>';
               ?>
                <?php } else {?>
                <a href="login.php" class="nav-item nav-link">login</a>
                <?php  
                        echo '<a href="login.php"><img class="rounded-circle mt-3 me-2" src="img/no_img.jpg" width="50px" height="50px" ></img></a>';
               ?>
                <?php } ?>
            </div>
            <a href="appointment.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Appointment<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->