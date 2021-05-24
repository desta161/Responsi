<?php
//fetch_data.php
require 'db.php';

if(isset($_POST["action"]))
{
	$query = "SELECT * FROM produk";

	if(isset($_POST["Goal"]))
	{
		$goal = implode("','", $_POST["Goal"]);
		$query .= "
		 WHERE By_Skincare_Goal IN('".$goal."')
		";
	}

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
                    padding:0 20px; margin-bottom:40px; height:440px;">

					<p class="text-end">'. $row['Brand'] .'</p>
					<img src="img/'. $row['Gambar'] .'" alt="" class="img-fluid" width="216px">
					<h6 class="text-center">'. $row['Nama'] .'</h6>
					<p>Category : '. $row['Kategori'] .'<br/>
					By : '. $row['By_Ingredient'] .'<br/>
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
}
?>