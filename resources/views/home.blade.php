@extends('layouts')

@section('style')
    <style>
        #content{
            padding: 20px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .heading{
            margin-bottom: 20px;
        }

        .heading > a{
            display:flex;
            align-items: center;
            width: fit-content;
        }

        #shoe-container{
            display: flex;
            font-size: 12pt;
            flex-wrap: wrap;
            @if(count($data) == 6)
            justify-content: space-between;
            @endif
        }

        .shoes{
            text-align: center;

            background-color: #d0efff;
            border-radius: 7px;
            overflow: hidden;
            @if(count($data) < 6)
            margin-right: calc((100vw - 7vw) / 7 / 7);
            @endif
            padding: 0 .4vw;
            display: flex;
            flex-direction: column;
            margin-bottom: 5vh;
            font-size: 10pt;

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
            transition: transform 0.17s ease;  
        }

        .shoes:hover{
            transform: scale(1.1);
        }

        .shoes > div{
            max-width: calc((100vw - 7vw) / 7);
        }

        .shoe-image{
            width: calc((100vw - 7vw) / 7);
            height: calc((75vh - 20px) * (1 / 3));

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .shoe-image > img{
            width: inherit;
            height: inherit;
        }

        .shoe-name, .shoe-price{
            padding: 15px 10px;
        }

        .shoe-information{
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .container{
            margin-bottom: 2vh;
        }

        .paginate{
            margin-top: 1vh;
            display: flex;
            justify-content: center;
        }

        .paginate ul{
            list-style-type: none;
            display: flex;
        }

        .paginate a, .paginate span{
            border: 1px solid #03254c;
            color: #03254c;
            width: 1.5vw;
            height: 1.5vw;
            margin: 0 .3vw;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
        }

        .paginate .active span{
            border: 1px solid #03254c;
            background-color: #03254c;
            color: #d0efff;
        }

        .paginate .disabled span{
            border: none;
        }

        .paginate .disabled[aria-label="« Previous"], .paginate .disabled[aria-label="Next »"]{
            display: none;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="heading">
            <div style="font-size: 18pt"><div>All Shoes</div></div>
        </div>
        <div id="shoe-container">
            @foreach($data as $shoe)
                @if (Auth::user())
                    @if(Auth::user()->admin)
                    <a href="/Edit/{{$shoe->id}}" class="shoes">
                    @else
                    <a href="/Shoe/{{$shoe->id}}" class="shoes">
                    @endif
                @else
                    <div class="shoes">
                @endif
                        <div class="shoe-image"><img src="{{asset('ShoeImage/'.$shoe->image)}}" alt=""></div>
                        <div class="shoe-information">
                            <div class="shoe-name">{{$shoe->name}}</div>
                            <div class="shoe-price">{{'IDR '.$shoe->price}}</div>
                        </div>
                    @if (Auth::user())
                    </a>
                    @else
                    </div>
                    @endif
            @endforeach
        </div>
    </div>
    <div class="paginate">{{$data->links()}}</div>
@endsection