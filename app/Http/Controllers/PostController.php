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
    return view('product');
  }
  public function getOrders()
  {
    try {
      $shopify = app(Shopify::class);
      $orders = $shopify->getOrders();
      dd($orders);
    } catch (Exception $e) {
      echo $e;
    }
  }
  public function updateProduct($id)
  {
    try {
      $shopify = app(Shopify::class);
      $fields = [
        'title' => 'test tv updated from laravel'
      ];
      $response = $shopify->updateProduct((int)$id, $fields);
      echo "Product Updated Successfully with product id " . $id;
    } catch (Exception $e) {
      echo "Failed to update product";
    }
  }
  public function updateMetafield($id)
  {
    try {
      $shopify = app(Shopify::class);
      $data = ['value' => 'India to updated from laravel'];
      dd($shopify->updateMetafield($id, $data));
    } catch (Exception $e) {
      echo "Can't update";
    }
  }
  public function getProductMetafields($id)
  {
    try {
      $shopify = app(Shopify::class);
      $data = [];
      dd($shopify->getProductMetafields($id, $data));
    } catch (Exception $e) {
      echo $e;
    }
  }
  public function orderFulfilment()
  {
    try {
      $shopify = app(Shopify::class);
      $params = [
        'location_id' => 80874275106,
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
      $o = $shopify->getOrderFulfillments(5293576814881, []);
      dd($o);

      // update order fulfil
      // $o = $shopify->updateOrderFulfillment(5293576814881,4714436821281,$params );
      // dd($o);


      //  $o = $shopify->cancelOrderFulfillment(5293576814881,4714436821281 );
      //  dd($o);

      //  $o = $shopify->getAssignedFulfillmentOrders('cancellation_requested',[80874275105] );
      //  dd($o);
    } catch (Exception $e) {
      echo $e;
    }
  }
  public function getBlogs()
  {
    try {
      $shopify = app(Shopify::class);

      // get all blogs
      // $blogs=$shopify->getBlogs([]);
      // dd($blogs);


      //update blogs
      /*
     array:11 [▼
        "id" => 96841957665
        "handle" => "news"
        "title" => "News"
        "updated_at" => "2023-05-11T06:48:11-04:00"
        "commentable" => "no"
        "feedburner" => null
        "feedburner_location" => null
        "created_at" => "2023-04-11T07:14:16-04:00"
        "template_suffix" => null
        "tags" => ""
        "admin_graphql_api_id" => "gid://shopify/OnlineStoreBlog/96841957665"
      ]
    */
      $data = ['title' => 'NewsTo', 'commentable' => 'no'];
      // $update = $shopify->updateBlog(96841957665,$data);
      // dd($update);

      //get articles
      // $article = $shopify->getArticles();
      // dd($article);

      // get page collection
      // $pages = $shopify->getPages([]);
      // dd($pages);

      $pagedata = [
        'body_html' => '<h1>Ritesh rana</h1>',
        'author' => 'Ritesh Rana ji'
      ];
      // update page content
      $pages = $shopify->updatePage(115645153569, $pagedata);
      dd($pages);
    } catch (Exception $e) {
      echo $e;
    }
  }
}
