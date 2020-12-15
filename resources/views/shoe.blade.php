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
            padding: 1vh 1.5vw 3vh 1.5vw;

            display: flex;
        }

        .shoe-photo{
            width: 20vw;
            height: 20vw;

            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 1vw;
        }

        .shoe-photo > img{
            width: inherit;
            height: inherit;
        }

        .info > form{
            flex-grow: 1;
        }

        .info > form input{
            user-select: none;
        }

        .info > form > .inp{
            margin: 15px 0;
        }

        .info > form > .inp > div{
            font-size: 12pt;
            top: 6px;
            left: 8px;
        }

        .info > form > .inp > input{
            color: #187bcd;
            border-bottom: 1px solid #187bcd;
            font-size: 12pt;
            padding: 6px 8px;
            color: #03254c;
        }

        .info > form > .inp > input:not(:placeholder-shown) + div, .info > form > .inp > input:focus + div, .info > form > .inp:hover > div, .info > form > .inp > div:hover{
            font-size: 10pt;
            top: -9px;
            left: 0;
        }

        .inp > textarea{
            border: 1px solid #187bcd;
            resize: none;
            outline: none;
            width: 100%;
            padding: 6px 8px;
            font-size: 12pt;
            border-radius: 3px;
            color: #03254c;
        }
        
        .inp > textarea + div{
            background-color: #fff;
            font-size: 10pt !important;
            top: -7.5px !important;
            left: 7.5px !important;
            padding: 0 3px;
        }
        
        #btn{
            display: flex;
            justify-content: flex-end;
        }

        #btn button, #btn input[type="button"]{
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

        #btn input[type="button"]:hover, #btn button:hover{
            background-color: #187bcd;
            color: #d0efff;
        }

        #btn > input[type="button"]{
            margin-left: 6px;
        }

        #btn > input[value="Delete"]:hover{
            border: 1px solid #800000;
            background-color: #800000;
        }

        #input-file{
            position: relative;
        }

        #input-file > label{
            position: absolute;
            z-index: 1;
            left: 6px;
            top: 7px;
            padding: 2px 6px;
            background-color: #fff;
            border: 1px solid #187bcd;
            border-radius: 2px;
            transition: .17s ease;
        }
        
        #input-file > label:hover{
            background-color: #187bcd;
            color: #d0efff;
        }

        input[type="file"]{
            border: 1px solid #187bcd;
            border-radius: 3px;
            /* visibility: hidden; */
        }
        
        #error{
            background-color: #fff;
            font-size: 8pt;
            color: #ff0000;
            text-align: center;
            padding: 2px 0;
        }
    </style>
@endsection

@section('content')
    <div class="modal">
        <div class="header">
            @if(!Auth::user()->admin)
                @if(str_starts_with($_SERVER['REQUEST_URI'], "/Carts"))
                Edit Cart
                @else
                Add to Cart
                @endif
            @else
                @if(str_starts_with($_SERVER['REQUEST_URI'], "/AddShoe"))
                Add Shoe
                @else
                Edit Shoe
                @endif
            @endif
        </div>
        <div class="info">
            @if(!str_starts_with($_SERVER['REQUEST_URI'], "/AddShoe"))
            <div class="shoe-photo">
                @if(str_starts_with($_SERVER['REQUEST_URI'], "/Carts"))
                <img src="{{asset('ShoeImage/'.$data->shoe->image)}}" alt="">
                @else
                <img src="{{asset('ShoeImage/'.$data->image)}}" alt="">
                @endif
            </div>
            @endif
            <form action="" method="post" id="form" enctype="multipart/form-data">
                {{csrf_field()}}
                @if(str_starts_with($_SERVER['REQUEST_URI'], "/Carts"))
                <input type="text" name="shoe_id" id="" value="{{$data->shoe_id}}" readonly hidden>
                @else
                <input type="text" name="image" id="" value="{{$data->image}}" readonly hidden>
                <input type="text" name="shoe_id" id="" value="{{$data->id}}" @if(!Auth::user()->admin) readonly @endif hidden>
                @endif
                <div class="inp">
                    @if(str_starts_with($_SERVER['REQUEST_URI'], "/Carts"))
                    <input type="text" name="name" id="name" placeholder=" " value="{{$data->shoe->name}}" readonly>
                    @else
                    <input type="text" name="name" id="name" placeholder=" " value="{{$data->name}}" @if(!Auth::user()->admin) readonly @endif>
                    @endif
                    <div>Name</div>
                </div>
                <div class="inp">
                    @if(str_starts_with($_SERVER['REQUEST_URI'], "/Carts"))
                    <textarea name="description" id="description" rows="3" readonly>{{$data->shoe->description}}</textarea>
                    @else
                    <textarea name="description" id="description" rows="3" @if(!Auth::user()->admin) readonly @endif>{{$data->description}}</textarea>
                    @endif
                    <div>Description</div>
                </div>
                <div class="inp">  
                    @if(str_starts_with($_SERVER['REQUEST_URI'], "/Carts"))
                    <input type="text" name="price" id="price" placeholder=" " value="{{'IDR '.$data->shoe->price}}" readonly>
                    @else
                    <input type="text" name="price" id="price" placeholder=" " value="{{'IDR '.$data->price}}" @if(!Auth::user()->admin) readonly @endif>
                    @endif
                    <div>Price</div>
                </div>
                @if(!Auth::user()->admin)
                <div class="inp">
                    @if (str_starts_with($_SERVER['REQUEST_URI'], "/Carts"))
                    <input type="number" name="quantity" id="quantity" min="1" value="{{$data->quantity}}">
                    @else
                    <input type="number" name="quantity" id="quantity" min="1" value="1">
                    @endif
                    <div>Quantity</div>
                </div>
                @else
                <div class="inp" id="input-file">
                    <label for="image">Choose File</label>
                    <input type="file" name="image" id="image" accept="image/x-png,image/jpeg">
                </div>
                @endif
                <div id="error">{{$error}}</div>
                <div id="btn">
                    @if (!Auth::user()->admin)
                        @if (str_starts_with($_SERVER['REQUEST_URI'], "/Carts"))
                        <input type="checkbox" name="is_update" id="is_update" hidden defaultValue="false">
                        <input type="button" value="Update" onclick="updateCart()">
                        <input type="button" value="Delete" onclick="deleteCart()">
                        @else
                        <button>Add</button>
                        @endif
                    @else
                        @if (str_starts_with($_SERVER['REQUEST_URI'], "/AddShoe"))
                        <button>Add</button>
                        @else
                        <button>Update</button>
                        @endif
                    @endif
                </div>
            </form>
            @if (!Auth::user()->admin)
            <script>
                function deleteCart(){
                    document.getElementById('form').submit();
                }

                function updateCart(){
                    document.getElementById('is_update').checked = true;
                    deleteCart();
                }
            </script>
            @endif
        </div>
    </div>
@endsection