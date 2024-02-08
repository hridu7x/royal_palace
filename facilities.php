<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php');?>
   


</head>
<body class="bg-light">

    <!-- Navbar -->
    <?php require('inc/header.php');?>
      
    <div class="my-5 px-4">
        <h5 class="mt-5 pt-4 mb-3 text-center fw-bold h-font font-2">OUR FACILITIES</h5>
        
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Our presidential-style suites in downtown Chicago boast formal foyers and powder rooms, separate parlor rooms with televisions, upscale dining areas with seating for eight, luxurious master bedrooms with canopy beds, artful touches like Oriental rugs, and sweeping views of Lake Michigan and Grant Park.
            <br> For a modern feel, opt to stay at the very top of Royal Palace with 17-foot ceilings and enjoy a modern aesthetic with touches like a marble foyer, a dining area and wet bar, two skylights, a King bed, and two luxurious bathrooms.
        </p>
    </div>

    <div class="container">
        <div class="row">

            <?php
                $res = selectAll('facilities');
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res)){
                    echo<<<data
                        <div class="col-lg-3 col-mb-3 mb-5 px-4">
                            <div class=" bg-white rounded shadow p-4 border-top border-4 border-dark align-items-center pop">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="$path$row[icon]" width="40px" alt="">
                                    <WIFI class="m-0 ms-3">$row[name]</h5>
                                </div>
                                <p>$row[description]</p>
                            </div>
                        </div>
                    data;
                }
            ?>
        </div>
    </div>
       

    <!-- Footer -->

    <?php require('inc/footer.php');?>

</body>
</html>