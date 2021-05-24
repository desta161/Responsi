<?php
    require 'db.php';
    include("layout/link_web.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="layout/web.css" rel="stylesheet">
    <title>Desta</title>
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <?php
                include("navbar.php");
            ?>
        </div>
        <div class="container">
            <div class="container-satu">
                <div class="d-flex justify-content-around">
                    <div class="judul-satu">
                        <h3>Get that</h3>
                        <h3>glowing skin</h3>
                        <h3>you've always</h3>
                        <h3>wanted</h3>
                    </div>
                    <div class="gambar-judul">
                        <img src="img/studio_tropic.jpg" alt="">
                    </div>
                    <div class="judul-dua align-self-end border-bottom border-5">
                        <h6>Get product recommendations</h6>
                        <h6>best suited for your skin.</h6>
                    </div>
                    <div class="judul-tiga">
                        <p>PRODUCT COLLECTION</p>
                    </div>
                </div>
            </div>

            <div class="container-dua">
                <div class="d-flex">
                    <div class="gambar d-flex">
                        <div class="gambar-content left">
                            <img src="img/the_lab.jpg" alt="" width="270px" height="354px">
                        </div>
                        <div class="gambar-content-side">
                            <div class="gambar-content satu">
                                <img src="img/true_to_skin.jpg" alt="" width="150px" height="175px">
                                <img src="img/control_zero.jpg" alt="" width="150px" height="175px">
                            </div>
                            <div class="gambar-content dua">
                                <img src="img/hb5.jpg" alt="" width="150px" height="175px">
                                <img src="img/datglow_skin.jpg" alt="" width="150px" height="175px">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <h4>PRODUCT COLLECTION</h4>
                        <p>It's time we prove that<br/>
                        self-care is health care.<br/>
                        Join us in reclaiming health,<br/>
                        happiness and connectivity<br/>
                        and challenging stress<br/>
                        as the status quo.</p>
                        <button type="button" class="btn">
                            <a href="#">Shop Now</a>
                        </button>
                    </div>
                </div>
            </div>

            <div class="container-tiga">
                <h4>PRODUCT PACKAGE</h4>
                <div class="row">
                    <?php
                        $query = "SELECT * FROM produk WHERE Kategori = 'Package'";

                        $result = $db -> query($query);
                        $row = $result -> fetch_assoc();
                        $total_row = mysqli_affected_rows($db);
                        $output = '';
                        if($total_row > 0)
                        {
                            foreach($result as $row)
                            {
                                $output .= '
                                <div class="col-lg-3">
                                    <div
                                        style="border-right:1.5px solid #9c5921; border-left:1.5px solid #9c5921;
                                        padding:0 20px; margin-bottom:40px; height:410px;">

                                        <p class="text-end">'. $row['Brand'] .'</p>
                                        <img src="img/'. $row['Gambar'] .'" alt="" class="img-fluid" width="216px">
                                        <h6 class="text-center">'. $row['Nama'] .'</h6>
                                        <p>By : '. $row['By_Ingredient'] .'<br/>
                                        Goal : '. $row['By_Skincare_Goal'] .'</p>
                                        <p class="harga text-end">Rp. '. $row['Harga'] .'</p>
                                    </div>
                                </div>
                                ';
                            }
                        }
                        else
                        {
                            $output = '<h3>No Data Found</h3>';
                        }
                        echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>