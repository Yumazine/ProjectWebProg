@extends('layouts')

@section('style')
    <style>
        #content{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal{
            width: 50%;
            min-height: 30vh;
            margin: 5vh 0;
            background-color: #2a9df4;

            display: flex;
            flex-direction: column;
            align-items: center;

            border-radius: 7px;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
        }

        .modal > *{
            width: 100%;
        }

        .header{
            text-align: center;
            padding: 1.5vh .5vw;
            font-size: 14pt;
            color: #03254c;
        }
        
        .info{
            flex-grow: 1;
            background-color: #fff;
            color: #187bcd;
            padding: 3vh 1.5vw;
            font-size: 10pt;

            display: flex;

            @if (count($transactions) > 0)
            flex-direction: column;
            justify-content: space-between;
            @else
            justify-content: center;
            align-items:center;
            @endif
        }

        .detail-image{
            width: 100px;
            height: 100px;
        }

        .detail-image > img{
            width:inherit;
            height:inherit;
        }

        .detail-item{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #03254c;
        }

        .transaction-info{
            display: flex;
            justify-content: space-between;
            color: #03254c;
            padding: 1vh 0;

            border-bottom: 1px solid #03254c;
        }
        
        #add-btn{
            display: flex;
            justify-content: flex-end;
        }

        #add-btn button{
            border: 1px solid #187bcd;
            background-color: transparent;
            color: #187bcd;
            padding: 5px 12px;
            font-size: 10pt;
            border-radius: 5px;
            transition: .17s ease;
            outline: none;
            cursor: pointer;
        }

        #add-btn button:hover{
            border: 1px solid #449e48;
            background-color: #449e48;
            color: #fff;
        }

        #add-btn > button{
            margin-left: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="modal">
        <div class="header">Transactions</div>
        <div class="info">
            @foreach ($transactions as $transaction)
            @php ($sum = 0)
            @foreach ($transaction->details as $detail)
            @php ($sum += $detail->quantity * $detail->shoe->price)
            @endforeach
            <div class="transaction-container">
                <div class="transaction-info">
                    @if (Auth::user()->admin)
                    <div>User: {{$transaction->user->name}}</div>
                    @endif
                    <div>Transaction Date: {{$transaction->transaction_date}}</div>
                    <div>Total Price: IDR {{$sum}}</div>
                </div>
                <div class="transaction-detail">
                    @foreach ($transaction->details as $detail)
                    <div class="detail-item">
                        <div class="detail-image">
                            <img src="{{asset('ShoeImage/'.$detail->shoe->image)}}" alt="">
                        </div>
                        <div class="shoe-name" style="width: 45%">
                            {{$detail->shoe->name}}
                        </div>
                        <div style="width: 5%">
                            {{$detail->quantity}}
                        </div>
                        <div style="width: 25%; text-align: right">
                            IDR {{$detail->quantity * $detail->shoe->price}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            @if (count($transactions) == 0)
                <div>There is no transaction.</div>
            @endif
        </div>
    </div>
@endsection