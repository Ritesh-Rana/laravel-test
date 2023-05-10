<?php
  
namespace App\Http\Controllers;

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
        $product=json_decode($product);

        $html = "<table>
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>";
        foreach($product as $p){
            $html.="<tr>
            <td>".$p->id."</td>
            <td> <img widht='20' height='30' src=".$p->image->src."></td>
            <td>".$p->body_html."</td>
            <td>".$p->id."</td>";
        }
       $html.="</tbody>
      </table>"
      ;
      echo $html;
    }
}
