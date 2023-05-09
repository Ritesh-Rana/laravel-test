<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
  
class PostController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $api_key = "9f55cb73434b94349a234d8e584962349ec951d";
        $api_password = "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f345f24b";
        $store_url = "megam34artone.myshopify.com";

        $url = "https://{$api_key}:{$api_password}@{$store_url}/admin/api/2021-07/products.json";

        $response = Http::get($url);
    
        $jsonData = $response->json();
          
        dd($jsonData);
    }
}