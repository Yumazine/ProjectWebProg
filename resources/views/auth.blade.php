@extends('layouts')

@section('style')
    <style>
        #content{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #modal{
            width: 30%;
            /* min-height: 30vh; */
            background-color: #2a9df4;

            display: flex;
            flex-direction: column;
            align-items: center;

            border-radius: 7px;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
        }

        #modal > *{
            width: 100%;
        }

        #modal-header{
            text-align: center;
            padding: 1.5vh .5vw;
            font-size: 14pt;
            color: #03254c;
        }

        #information{
            flex-grow: 1;
            background-color: #fff;
            color: #187bcd;
            padding: 1vh 1.5vw;

            display: flex;
            flex-direction: column;
        }

        #information > .inp, #information > #login-btn{
            margin: 1vh 0;
        }

        #information > .inp > div{
            font-size: 12pt;
            top: 6px;
            left: 8px;
        }

        #information > .inp > input{
            color: #187bcd;
            border-bottom: 1px solid #187bcd;
            font-size: 12pt;
            padding: 6px 8px;
            color: #03254c;
        }

        #information > .inp > input:not(:placeholder-shown) + div, #information > .inp > input:focus + div, #information > .inp:hover > div, #information > .inp > div:hover{
            font-size: 10pt;
            top: -9px;
            left: 0;
        }

        #login-btn{
            display: flex;
            justify-content: flex-end;
        }

        #login-btn > button{
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

        #login-btn > button:hover{
            background-color: #187bcd;
            color: #d0efff;
        }

        #ask{
            color: #187bcd;
            font-size: 8pt;

            text-align: right;
        }

        #ask > a{
            color: #03254c;
            border-bottom: 1px solid transparent;
            transition: border 0.13s ease-in;
        }

        #ask > a:hover{
            border-bottom: 1px solid #03254c;
        }

        #remember-me{
            display: flex;
            align-items:center;
        }

        #remember-me > label{
            margin-left: .5vw;
            font-size: 9pt;
        }

        .custom-checkbox{
            -webkit-appearance: none;
            outline: none;
            background-color: #fff;
            border: 1px solid #187bcd;
            padding: 5px;
            border-radius: 3px;
            display: inline-block;
            position: relative;
        }

        .custom-checkbox:hover, .custom-checkbox:checked{
            background-color: #d0efff;
        }

        .custom-checkbox:checked:after{
            content: '\2714';
            font-size: 10px;
            position: absolute;
            top: -1px;
            left: 0px;
            color: #03254c;
        }
        
        #error{
            font-size: 8pt;
            color: #ff0000;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div id="modal">
        <div id="modal-header">
            @if ($_SERVER['REQUEST_URI'] == '/Login')
            Login
            @else
            Register
            @endif
        </div>
        <form action="" method="post" id="information">
            {{csrf_field()}}
            <div id="ask">
                @if ($_SERVER['REQUEST_URI'] == '/Login')
                Don't have an account? <a href="/Register">Register here</a>
                @else
                Already have an account? <a href="/Login">Login here</a>
                @endif
            </div>
            @if ($_SERVER['REQUEST_URI'] == '/Register')
            <div class="inp">
                <input type="text" name="username" id="username" placeholder=" " value="{{$username}}">
                <div>Username</div>
            </div>
            @endif
            <div class="inp">
                <input type="email" name="email" id="email" placeholder=" ">
                <div>Email</div>
            </div>
            <div class="inp">
                <input type="password" name="password" id="password" placeholder=" ">
                <div>Password</div>
            </div>
            @if ($_SERVER['REQUEST_URI'] == '/Register')
            <div class="inp">
                <input type="password" name="confirm_password" id="confirm_password" placeholder=" ">
                <div>Confirm Password</div>
            </div>
            @endif
            <div id="error">{{$error}}</div>
            @if ($_SERVER['REQUEST_URI'] == '/Login')
            <div id="remember-me"><input type="checkbox" class="custom-checkbox" name="remember" id="remember"><label for="remember">Remember Me</label></div>
            @endif
            <div id="login-btn">
                <button>
                    @if ($_SERVER['REQUEST_URI'] == '/Login')
                    Login
                    @else
                    Register
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection