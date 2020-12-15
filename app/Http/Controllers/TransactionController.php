<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Shoe;
use App\TransactionHeader;
use App\TransactionDetail;
use DB;

class TransactionController extends Controller
{
    public function __construct(){
        $this->middleware('useronly')->only('getHistory');
        $this->middleware('adminonly')->only('getAllTransactions');
    }

    public function getHistory(){
        $transactions = TransactionHeader::
                            where('user_id', '=', Auth::user()->id)
                            ->get();

        // dd($transactions);
        return view('transactions', ['transactions' => $transactions]);
    }

    public function getAllTransactions(){
        $transactions = TransactionHeader::get();

        return view('transactions', ['transactions' => $transactions]);
    }
}
