<?php
include 'db.php';
require 'vendor/autoload.php';

$result = $conn -> query("select * from products;");

$pdf = new TCPDF();
$pdf = AddPage();
$pdf = setFont('times','I','12');

$html ='<table>
    <tr>
    <td>Product Name</td>
    <td>Product Category</td>
    <td>Product Price</td>
    <td>Product Quantity</td>
    <td>Product Description</td>
    </tr>';

while($row = $result -> fetch_assoc()){
    $html .= '<tr>
    <td>'.<?= $row["pname"]?>.'</td>
    <td>'.<?= $row["category"]?>.'</td>
    <td>'.<?= $row["price"]?>.'</td>
    <td>'.<?= $row["quantity"]?>.'</td>
    <td>'.<?= $row["description"]?>.'</td>
    </tr>';
}

$html .= '</table>';

$pdf -> writeHtml($html,true,false,true,false,'');
$pdf -> Output("products.pdf","D");
?>