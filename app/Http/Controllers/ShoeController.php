<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoe;
use DB;

class ShoeController extends Controller
{
    public function __construct(){
        $this->middleware('adminonly');
    }

    public function editShoe($id){
        $data = Shoe::get()->where('id','=', $id)->first();
        return view('shoe', ['data' => $data, 'error' => '']);
    }

    public function updateShoe(Request $request){
        $price = explode(" ", $request->price);
        $price = (int)$price[count($price) - 1];
        $error = "";

        if($request->name == ""){
            $error = "Shoe name must be filled";
        } else if($request->description == ""){
            $error = "Shoe description must be filled";
        } else if($request->price == ""){
            $error = "Shoe price must be filled";
        } else if($price < 100){
            $error = "Shoe price must at least 100";
        }

        if($error != ""){
            $arr = array(
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $price,
                'image' => $request->image
            );
            $data = new Shoe($arr);
            return view('shoe', ['data' => $data, 'error' => $error]);
        }

        $data = Shoe::where('id','=', $request->id)
                    ->update([
                        'name' => $request->name,
                        'description' => $request->description,
                        'price' => $price
                    ]);

        if($request->image != null){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $ext = explode(".", $imageName);
            $ext = $ext[count($ext) - 1];
            
            Shoe::where('id', '=', $request->id)->update(['image' => $request->id.'.'.$ext]);
            $image->storeAs("", $request->id.'.'.$ext,['disk' => 'shoe_image']);
        }
        
        return redirect('/');
    }

    public function addShoe(){
        $arr = array(
            'id' => '',
            'name' => '',
            'description' => '',
            'price' => '',
            'image' => ''
        );
        $data = new Shoe($arr);
        return view('shoe', ['data' => $data, 'error' => '']);
    }

    public function insertShoe(Request $request){
        $price = explode(" ", $request->price);
        $price = (int)$price[count($price) - 1];
        $error = "";

        if($request->name == ""){
            $error = "Shoe name must be filled";
        } else if($request->description == ""){
            $error = "Shoe description must be filled";
        } else if($request->price == ""){
            $error = "Shoe price must be filled";
        } else if($price < 100){
            $error = "Shoe price must at least 100";
        } else if($request->image == null){
            $error = "Shoe image must be inputted";
        }

        if($error != ""){
            $arr = array(
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $price,
                'image' => $request->image
            );
            $data = new Shoe($arr);
            return view('shoe', ['data' => $data, 'error' => $error]);
        }

        $image = $request->image;
        $imageName = $image->getClientOriginalName();
        $ext = explode(".", $imageName);
        $ext = $ext[count($ext) - 1];
        $id = DB::table('shoes')->insertGetId([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $price
        ]);
        
        Shoe::where('id', '=', $id)->update(['image' => $id.'.'.$ext]);
        $image->storeAs("", $id.'.'.$ext,['disk' => 'shoe_image']);

        return redirect('/');
    }
}
