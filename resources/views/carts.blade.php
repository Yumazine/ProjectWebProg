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

            display: flex;

            @if (count($carts) > 0)
            flex-direction: column;
            justify-content: space-between;
            @else
            justify-content: center;
            align-items:center;
            @endif
        }

        .cart-image{
            width: 100px;
            height: 100px;
        }

        .cart-image > img{
            width:inherit;
            height:inherit;
        }

        .cart-item{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #03254c;
        }

        .shoe-info{
            margin-left: 10px;
        }

        .edit-cart{
            border: 1px solid #187bcd;
            background-color: transparent;
            color: #187bcd;
            padding: 4px 6px;
            font-size: 10pt;
            border-radius: 5px;
            transition: .17s ease;
            outline: none;
            cursor: pointer;
        }

        .edit-cart:hover{
            border: 1px solid #03254c;
            background-color: #03254c;
            color: #d0efff;
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
        <div class="header">Carts</div>
        <div class="info">
            @foreach ($carts as $cart)
            <div class="cart-item">
                <div class="cart-image">
                    <img src="{{asset('ShoeImage/'.$cart->shoe->image)}}" alt="">
                </div>
                <div class="shoe-name">
                    {{$cart->shoe->name}}
                </div>
                <div>
                    {{$cart->quantity}}
                </div>
                <div>
                    IDR {{$cart->quantity * $cart->shoe->price}}
                </div>
                <a href="/Carts/{{$cart->shoe_id}}" class="edit-cart">
                    Edit
                </a>
            </div>
            @endforeach
            @if (count($carts) > 0)
            <form action="" method="post">
                {{csrf_field()}}
                <div id="add-btn">
                    <button>Checkout</button>
                </div>
            </form>
            @else
                <div>You have no item.</div>
            @endif
        </div>
    </div>
@endsection