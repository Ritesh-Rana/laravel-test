<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Signifly\Shopify\Shopify;

class PostController extends Controller
{
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function index()
  {
    $shopify = app(Shopify::class);
    $product = $shopify->getProducts();
    $product = json_decode($product);

    $html = "<table style='border: 1px solid black;'>
        <thead>
          <tr style='border: 1px solid black;'>
            <th style='border: 1px solid black;'>Product ID</th>
            <th style='border: 1px solid black;'>Image</th>
            <th style='border: 1px solid black;'>Description</th>
            <th style='border: 1px solid black;'>Price</th>
          </tr>
        </thead>
        <tbody>";
    foreach ($product as $p) {
      $html .= "<tr>
            <td style='border: 1px solid black;'>" . $p->id . "</td>
            <td style='border: 1px solid black;'> <img widht='20' height='100' src=" . $p->image->src . "></td>
            <td style='border: 1px solid black;'>" . $p->body_html . "</td>
            <td style='border: 1px solid black;'>" . $p->id . "</td>";
    }
    $html .= "</tbody>
      </table>";
    echo $html;
  }
  public function getOrders()
  {
    $shopify = app(Shopify::class);
    $orders = $shopify->getOrders();
    dd($orders);
  }
  public function updateProduct($id)
  {
    $shopify = app(Shopify::class);
    $fields = [
      'title' => 'test tv updated from laravel'
    ];
    try {
      $response = $shopify->updateProduct((int)$id, $fields);
      echo "Product Updated Successfully with product id " . $id;
    } catch (Exception $e) {
      echo "Failed to update product";
    }
  }
  public function updateMetafield($id)
  {
    $shopify = app(Shopify::class);
    $data = ['value'=>'India to updated from laravel'];
    try {
      dd($shopify->updateMetafield($id, $data));
    } catch (Exception $e) {
      echo "Can't update";
    }
  }
  public function getProductMetafields($id)
  {
    $shopify = app(Shopify::class);
    $data = [];
    try {
      dd($shopify->getProductMetafields($id, $data));
    } catch (Exception $e) {
      echo $e;
    }
  }
}
