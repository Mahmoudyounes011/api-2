<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
       $name = $request->input('name');
       $description = $request->input('description');
       $price = $request->input('price');
       $brand = $request->input('brand');
       if( !$name || !$description || !$price || !$brand )
       {
           return response()->json(['message' => 'invalid payload ,all fialds are required ', 'data'=>null],400);
       }
       $pathfile = 'C:\xampp\htdocs\products_list.json';
       $fileContent = file_get_contents($pathfile);
       $jsonContent = json_decode($fileContent,false);
       $payload =
       [
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'brand' => $brand
       ];

       if(!$jsonContent || is_array($jsonContent))
       {
         $content = [
            $payload
         ];
         file_put_contents($pathfile,json_encode($content));
       }
       else
       {
        $jsonContent[] = $payload;
        file_put_contents($pathfile,json_encode($jsonContent));
       }
       return response()->json(['massage' => 'product has been added successfully','data'=>$payload]);

    }
    public function deleteProduct($productId)
    {
        $pathfile = 'C:\xampp\htdocs\products_list.json';
       $fileContent = file_get_contents($pathfile);
       $jsonContent = json_decode($fileContent,false);
       if($productId < 0 || $productId > count($jsonContent))
       {
        return response()->json(['message' => 'Invalid ID']);
       }
       unset($jsonContent[$productId-1]);
       file_put_contents($pathfile,json_encode(array_values($jsonContent)));
       return response()->json(['message' => 'product has been delete successfuly ']);
    }
    public function listAllProducts()
    {
       $pathfile = 'C:\xampp\htdocs\products_list.json';
       $fileContent = file_get_contents($pathfile);
       $jsonContent = json_decode($fileContent,true);
       return response()->json(['message' => 'Retrieved Successfully!',
       'data' => $jsonContent
    ]);
    }
}
