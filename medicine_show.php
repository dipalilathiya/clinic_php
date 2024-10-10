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
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Medicine</p>
                <h1>Buy Medicine</h1>
            </div>
            <div class="row g-4">
            <?php
            $query = "select * from medicine";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($result)) {
                $id=$row['Id'];
                $name = $row['Name'];
                $quantity = $row['Quantity'];
                $tabs = $row['Tabs'];
                $ex_date = $row['Ex_Date'];
                $buy_date = $row['Buy_Date'];
                $m_code = $row['M_Code'];
                $mrp = $row['Mrp'];
                $price = $row['Price'];
                $s_name = $row['S_Name'];
                $img = $row['Img'];

             ?>
            
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <!-- <div class="d-flex justify-content-between mb-4"> -->
                        <a href="order_show.php?id=<?php  echo $id ?>"> <?php echo '<img src="./img/' . $img . '" alt=" not found " height="150px" width="150px" ></img>' ; ?></a>
                            <a href="   order_show.php?id=<?php echo  $id ?>"> <h3 class="mb-3 d-flex align-items-center mt-4  "><?php echo $name;?></h3></a>
                            <p class="mb-3 d-flex align-items-center "><?php echo $price;?></p>

                        <!-- </div> -->

                        <a class="btn" href="order_show.php?id=<?php  echo $id ?>"><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
            <?php }?>
            </div>
        </div>
    </div>
    </body>
    </html>