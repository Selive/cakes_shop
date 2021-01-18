<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();

        return view('store', ['products' => $products]);
    }

    public function GetProduct(Request $request){
        $product = DB::table('products')->where('id', $request->input('id'))->first();
        return [ 
            'price' => $product->price,
            'name'  => $product->name,
            'id' => $product->id
        ];
    }

    public function CreateOrder(Request $request){
        $data = $request->input('data');
        $cart = $request->input('cart');
        $id = DB::table('orders')->insertGetId(
            array(
                'address' => $data['address'], 
                'last_name' => $data['lastName'],
                'first_name' => $data['firstName'],
                'email' => $data['email'], 
                'phone' => $data['phone']
                )
        );
        foreach ($cart as $cake) {
            $cakes[] = [
                'order_id' => $id,
                'product_id' => $cake['id'],
                'count' => $cake['count']
            ];
        }
        DB::table('products_to_carts')->insert($cakes);
        return $id;
    }
}
