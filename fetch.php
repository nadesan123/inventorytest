<?php
include "config.php";

$column = array("SKU", "Quantity", "location");

$query = "SELECT * FROM products WHERE Quantity<10 AND unit1 IS NULL AND (SKU NOT LIKE '%+%') AND (SKU NOT LIKE '%ENC%') AND (SKU NOT LIKE '%-IFR%') AND (SKU NOT LIKE '%-IDE%') AND (SKU NOT LIKE '%-CA%') AND (ListingType!='Variation') AND (SKU NOT LIKE '%PK' AND SKU NOT LIKE '%PK' OR ProductType='Vintage Cable')  ";

if(isset($_POST["search"]["value"]))
{
  $query .= '
  AND SKU LIKE "%'.$_POST["search"]["value"].'%"  ';

}


if(isset($_POST["order"]))
{
  $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
  $query .= 'ORDER BY location ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
  $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$totalresult = mysqli_query($con, $query);

$number_filter_row = mysqli_num_rows(mysqli_query($con, $query));

$result = mysqli_query($con, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{

  $skucolorcode=substr($row["SKU"],-2);

  $colorsql = 'SELECT * from colors WHERE code="'.$skucolorcode.'"'; 

  $colorresult = mysqli_query($con, $colorsql);

  if($colorresult->num_rows === 0)
  {
    $color="N/A";
  }
  else
  {
    while($colorrow = mysqli_fetch_array($colorresult))
    {
    $color=$colorrow["color"];
    }
  }

    $skucolumn='<img src="'.$row["Mainimage"].'" class="img-thumbnail" width="300px"></br><b>SKU : </b>'.$row['SKU'].'</br><b>Color : </b>'.$color;

  $sub_array = array();
  $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="sku">' . $skucolumn . '</div>';
  $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="Quantity">' . $row["Quantity"] . '</div>';

  $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="location">' . $row["location"] . '</div>';

  $data[] = $sub_array;

}

function count_all_data($con)
{
  $query = "SELECT * FROM products";

  $totalrows = mysqli_num_rows(mysqli_query($con, $query));

  return $totalrows;
}

$output = array(
  'draw'    =>  intval($_POST['draw']),
  'recordsTotal'  =>  count_all_data($con),
  'recordsFiltered' =>  $number_filter_row,
  'data'    =>  $data
);

echo json_encode($output);

?>