<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoe;

class HomeController extends Controller
{
    public function getDefaultView(){
        $data = Shoe::paginate(6);

        return view('home', ['data' => $data]);
    }

    public function getSearchView(Request $request){
        $string = $request->search_string;
        $data = Shoe::where('name', 'like', '%'.$string.'%')
                    ->orWhere('description', 'like', '%'.$string.'%')->paginate(6);

        return view('home', ['data' => $data]);
    }
}
