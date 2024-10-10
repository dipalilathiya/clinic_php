<?php
//   session_start();
//   include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Klinik - Clinic Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
    .ser{
        display: flex;
        margin-top: 30px;   
    }
    .ser input {
        border: 1px solid gray;
        display: flex;
        width: 150px;
        height: 30px;
        margin-left: 10px;
        border-radius: 5px 0px 0px 5px;
        /* margin-top: -20px; */
    }
     .sub  input{
        width: 50px;
        border-radius: 0px 5px 5px 0px;
    }
</style>
<body>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
                <h1>Our Experience Doctors</h1>
            </div>
            <form method="post">
                <div class="ser">
                    <div class="search">
                        <input type="search" name="search" placeholder="Search">
                    </div>
                    <div class="sub">
                        <input type="submit" name="submit">
                    </div>
                </div>
            </form>
            <div class="row g-4">
                <?php
                if (isset($_POST['submit'])){

                    $search = $_POST['search'];
                    $query = "select * from register where name like '%$search%'";
                    $result = mysqli_query($connection, $query);
                }
                else if(isset ($_GET['no']))
                {
                    $page_no = $_GET['no'];
                    echo $page_no;
                    $limit = 2;
                    echo $limit;
                    $offset = ($page_no - 1) * $limit;
                    // echo $offset;
                    $query = "select * from register  limit $offset ,$limit";
                    $result = mysqli_query($connection, $query);

                }else {
                    $query = "select * from register";
                    $result = mysqli_query($connection, $query);
                }
                while ($row = mysqli_fetch_array($result)) {
                    $id= $row['Id'];
                    $name = $row['Name'];
                    $department = $row['Department'];
                    $img = $row['Img'];
                    ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative rounded overflow-hidden">
                            <div class="overflow-hidden">
                                <!-- <img class="img-fluid" src="img/team-1.jpg" alt=""> -->
                                <?php echo '<img src="./img/' . $img . '" alt=" not found " height="314px" width="261px"></img>'; ?>

                            </div>
                            <div class="team-text bg-light text-center p-4">
                                <h5><?php echo $name; ?></h5>
                                <p class="text-primary"><?php echo $department; ?></p>
                                <div class="team-social text-center">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </div>
        </div>
    </div>
    <table>
                    <tr class="num">
                        <?php
                        $select = "select * from register";
                        $query = mysqli_query($connection, $select);
                        if (mysqli_num_rows($query) > 0) {
                            $total_records = mysqli_num_rows($query);
                            $limit = 2;
                            $total_page = $total_records / $limit;
                            for ($i = 1; $i <= $total_page; $i++) {
                                echo '<li><a href="selected.php?no=' . $i . '">' . $i . '</a></li>';
                            }
                        }
                        ?>
                    </tr>
                    </table>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>