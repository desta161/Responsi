<?php
    require 'db.php';
    include("layout/link_web.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="layout/web.css" rel="stylesheet">
    <title>Product</title>
</head>

<body>
    <div class="container-fluid">
        <div class="header">
            <?php
                include("navbar.php");
            ?>
        </div>
        <div class="container">
            <div class="container-tiga">
                <h3>OUR PRODUCT</h3><br>
                <div class="check">
                    <h5>By Skincare Goal</h5>
                    <div class="check-item">
                        <?php
                        $query = "SELECT DISTINCT(By_Skincare_Goal) FROM produk ORDER BY Id_Produk DESC";
                        $result = $db -> query($query);
                        $row = $result -> fetch_assoc();
                        foreach($result as $row)
                        {
                        ?>
                            <div>
                                <label><input type="checkbox" class="common_selector Goal"
                                value="<?= $row['By_Skincare_Goal']; ?>" > <?= $row['By_Skincare_Goal']; ?></label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <br/>
                    <div class="row filter_data">

                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
#loading {
	text-align:center;
	background: url('loading.gif') no-repeat center;
	height: 150px;
}
</style>

<script>
$(document).ready(function(){
    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var Goal = get_filter('Goal');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, Goal:Goal},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
});
</script>
</body>
</html>
