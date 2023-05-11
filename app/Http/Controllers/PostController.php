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
  public function orderFulfilment()
  {
    $shopify = app(Shopify::class);
    $params = [
      'location_id'=>80874275106,
      "status" => 1,
      "shipment_status" => 1,
      "tracking_number" => 1213123
    ];

    //full fill order by this method and pass required params
    /*
    $params = [
        "id" => 4714436821281
        "order_id" => 5293576814881
        "status" => "success"
        "created_at" => "2023-05-11T05:25:48-04:00"
        "service" => "manual"
        "updated_at" => "2023-05-11T05:25:48-04:00"
        "tracking_company" => null
        "shipment_status" => null
        "location_id" => 80874275105
        "origin_address" => null
        "line_items" => array:1 [▶]
        "tracking_number" => null
        "tracking_numbers" => []
        "tracking_url" => null
        "tracking_urls" => []
        "receipt" => []
        "name" => "#1001.1"
        "admin_graphql_api_id" => "gid://shopify/Fulfillment/4714436821281"
      ]
    */
    // $o = $shopify->createOrderFulfillment(5293576814881, $params);
    // dd($o);

    // get counts
    // $o = $shopify->getOrderFulfillmentsCount(5293576814881, $params);
    // dd($o);
    
    // get details of order fulfil and fulfilment id
    $o = $shopify->getOrderFulfillments(5293576814881,[]);
    dd($o);

    // update order fulfil
    // $o = $shopify->updateOrderFulfillment(5293576814881,4714436821281,$params );
    // dd($o);
    

    //  $o = $shopify->cancelOrderFulfillment(5293576814881,4714436821281 );
    //  dd($o);

    //  $o = $shopify->getAssignedFulfillmentOrders('cancellation_requested',[80874275105] );
    //  dd($o);


  }
}
