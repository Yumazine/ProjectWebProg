<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Du It!</title>
    <link rel = "icon" href="{{asset('icon.png')}}" type="image/x-icon"> 
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body{
            background-color: #eee;
        }

        @font-face{
            font-family: 'bebasneue';
            src: url('{{asset('/fonts/BebasNeue-Regular.ttf')}}') format('truetype');
        }

        @font-face{
            font-family: 'helvetica';
            src: url('{{asset('/fonts/HelveticaNeue.ttf')}}') format('truetype');
        }

        body > div{
            padding-left: 3.5vw !important;
            padding-right: 3.5vw !important;
        }

        #logo{
            font-family: 'bebasneue';
            font-size: 20pt !important;
            color: #03254c;
            margin-left: 1.5vw;
            font-weight: 100 !important;
            height: 100%;
            padding: 1.5vh;
            display: flex;

            align-items: center;
        }

        #logo > img{
            height: 80%;
            margin-left: 15px;
        }

        #header{
            background-color: #187bcd;
            display: flex;
            align-items: center;
            width: 100vw;
            height: 8vh;
            position: sticky;
            top: 0;
            z-index: 2;
        }

        a{
            text-decoration: none;
            color: inherit;
        }

        #nav{
            font-family: sans-serif;
            display: flex;
            align-items: center;
            height: 100%;
            font-size: 10pt;
            color: #d0efff;
            position: relative;
        }

        #nav-logo{
            width: 4.5vh;
            height: 4vh;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .nav-logo-bar{
            width: 100%;
            height: 25%;
            background-color: #d0efff;
        }

        .nav-item{
            height: 100%;
            display: flex;
            padding: 0 15px;
            margin: 0 1.5px;
            align-items: center;
            justify-content: center;
            position: relative;
            border-bottom: solid 1px transparent;
            transition: border 0.27s ease;
        }

        #nav-container{
            position: absolute;
            left: -3.5vw;
            top: 0;
            width: 100vw;
            height: 100vh;
            display: flex;

            /* background-color: rgba(0, 0, 0, .25); */
            /* z-index: 1; */
        }

        #nav-items{
            width: 20%;
            background-color: #03254c;
            height: 100%;
            display: flex;
            flex-direction: column;
            text-align: flex-start;
            position: relative;
            z-index: 1;
            transform: translateX(-100%);
            transition: transform 0.5s ease-in-out;
        }

        #nav-else{
            width: 80%;
            height: 100%;
            /* background-color: red; */
        }

        #nav-close{
            position: absolute;
            font-size: 18pt;
            text-align: right;
            padding: 10px 15px;
            cursor: pointer;
            right: 0;

            /* background-color: purple; */
            z-index: 1;
        }

        #nav-items > .nav-item{
            height: min-content;
            font-size: 12pt;
            padding: 15px 0;
            margin: 1.5px 0;
            border-bottom: none;
            border-right: solid 1px transparent;
        }

        .hover-drop{
            min-width: 100%;
            height: 100%;
            position: absolute;
            background-color: rgba(0,0,0,0.6);
            transform: translateY(-100%);
            transition: transform 0.35s ease;
        }

        #nav-items > .nav-item > .hover-drop {
            transform: translateY(0);
            transform: translateX(-100%);
        }
        
        #nav-items > .nav-item:hover > .hover-drop {
            transform: translateX(0);
        }

        #nav-items > .nav-item:hover{
            border-right: solid 1px #d0efff;
        }

        .nav-text{
            z-index: 1;
        }

        .nav-item:hover{
            border-bottom: solid 1px #d0efff;
        }

        .nav-item:hover > .hover-drop{
            transform: translateY(0);
        }

        #content{
            width: 100vw;
            min-height: 75vh;
            font-family: sans-serif;
            font-weight: 600;
            color: #187bcd;
            /* background-color: #fff; */
        }

        #footer{
            width: 100vw;
            min-height: 17vh;
            background-color: #187bcd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            font-family: sans-serif;
            font-size: 8pt;
            padding: 17px 0;
        }
        #footer > div{
            max-width: 18%;
            min-height: calc(17vh - (17px * 2));
        }

        #footer > div:not(:last-child){
            /* border-right: 1px solid #fff; */
        }

        #footer-logo{
            font-family: 'bebasneue', Arial, sans-serif;
            font-size: 18pt;
            color: #03254c;
        }

        #footer-sec1{
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .wt{
            color: #d0efff;
        }

        .foot-head{
            font-size: 9pt;
            margin: 3px 0;
        }

        .list{
            display: flex;
            flex-direction: column;
        }
        
        .list > *{
            margin: 3.5px 0;
        }

        .inp{
            position: relative;
            margin: 15px 0;
        }

        .inp > div{
            position: absolute;
            font-size: 10pt;
            top: 6px;
            left: 3px;
            transition: 0.25s ease-in-out;
        }

        .inp > input{
            outline:none;
            border: none;
            background-color: transparent;
            border-bottom: 1px solid #fff;
            padding: 6px 3px;
            width: 100%;
            font-size: 8pt;
            border-radius: 0;
            color: #fff;
        }

        .inp:hover > div, .inp > input:not(:placeholder-shown) + div, .inp > input:focus + div{
            top: -5px;
            left: 0;
            font-size: 7pt;
        }

        #contact-me-btn{
            display: flex;
            justify-content: flex-end;
        }

        #contact-me-btn > button{
            border: 1px solid #fff;
            background-color: transparent;
            color: #fff;
            padding: 4px 6px;
            font-size: 8pt;
            border-radius: 5px;
            transition: .17s ease;
            outline: none;
            cursor: pointer;
        }

        #contact-me-btn > button:hover{
            border: 1px solid #03254c;
            background-color: #03254c;
            color: #d0efff;
        }

        .hbar{
            width: 1px;
            min-height: calc(9vh - (17px * 2));
            background-color: #fff;
        }

        #search-bar{
            flex-grow: 1;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #search-bar > form{
            width: 65%;
            height: 60%;
            display: flex;
            border: 1px solid #03254c;
            border-radius: 5px;
            overflow: hidden;
        }

        #search-bar > form > input{
            width: 80%;
            border: none;
            border-radius: 0;
            outline: none;
            padding: 5px;
            font-family: sans-serif;
        }

        #search-bar > form > button{
            width: 20%;
            border: none;
            border-radius: 0;
            background-color: #03254c;
            color: #d0efff;
            cursor: pointer;
            font-family: sans-serif;
        }

        #prev-container{
            display: flex;
            justify-content: flex-end;
            color: #d0efff;
            font-family: sans-serif;
            font-size: 10pt;
        }

        #prev-container > *{
            display: flex;
            height: 100%;
            align-items: center;
            padding: 3px 5px;
            font-size: 11pt;
        }

        #prev-container > div{
            border-right: 1px solid #d0efff;
        }
        
        #prev-container > a{
            padding-right: 0;
        }

        #triangle-right{
            width: 0;
            height: 0;

            border-top: 3px solid transparent;
            border-bottom: 3px solid transparent;

            border-left: 3px solid #d0efff;
            margin-left: .5vw;
        }

        .nav-item{
            cursor: pointer;
        }
    </style>
    @yield('style')
</head>
<body id="body" onload="preload()" style="opacity: 0">
    <div id="header">
        <div id="nav">
            <div id="nav-menu" class="nav-item" onclick="openNav()">
                <div class="hover-drop"></div>
                <div id="nav-logo" class="nav-text">
                    <div class="nav-logo-bar"></div>
                    <div class="nav-logo-bar"></div>
                    <div class="nav-logo-bar"></div>
                </div>
            </div>
            <div id="nav-container">
                <div id="nav-items">
                    <div id="nav-close" onclick="closeNav()">X</div>
                    <a href="/" class="nav-item">
                        <div class="hover-drop"></div>
                        <div class="nav-text">View All Shoe</div>
                    </a>
                    @if (Auth::check())
                    @if (!Auth::user()->admin)
                    <a href="/Carts" class="nav-item">
                        <div class="hover-drop"></div>
                        <div class="nav-text">View Cart</div>
                    </a>
                    <a href="/Transactions" class="nav-item">
                        <div class="hover-drop"></div>
                        <div class="nav-text">View Transaction</div>
                    </a>
                    @else
                    <a href="/AddShoe" class="nav-item">
                        <div class="hover-drop"></div>
                        <div class="nav-text">Add Shoe</div>
                    </a>
                    <a href="/AllTransactions" class="nav-item">
                        <div class="hover-drop"></div>
                        <div class="nav-text">View All Transaction</div>
                    </a>
                    @endif
                    @endif
                </div>
                <div id="nav-else" onclick="closeNav()"></div>
            </div>
            <script>
                function closeNav(){
                    var nav = document.getElementById('nav-items');
                    var container = document.getElementById('nav-container');
                    nav.style = "transform: translateX(-100%)";
                    container.style = "transition: background-color 0.5s ease-in-out, z-index 0.8s, transform 0s; transition-delay: 0s, 0.8s, 0.8s; background-color: none; z-index: 0; transform: translateX(-100%)";
                }

                function openNav(){
                    var nav = document.getElementById('nav-items');
                    var container = document.getElementById('nav-container');
                    nav.style = "transform: translateX(0);";
                    container.style = "transition: background-color 0.5s ease-in-out, z-index 0.8s; background-color: rgba(0, 0, 0, .25); z-index: 2; transform: translateX(0)";
                }
                closeNav();
            </script>
        </div>
        <div id="logo">
            <a href="/">Just Du It!</a>
            <img src="{{asset('logo.png')}}" alt="">
        </div>
        <div id="search-bar">
            <form action="/" method="post">
                {{csrf_field()}}
                <input type="text" name="search_string" id="">
                <button>Search</button>
            </form>
        </div>
        @if ($_SERVER['REQUEST_URI'] != "/Login" && $_SERVER['REQUEST_URI'] != "/Register")
        <div id="prev-container">
            @if (!Auth::check())
            <a href="/Login">
                Login
            </a>
            @else
            <div>
                {{Auth::user()->name}} 
            </div>
            <a href="/Logout">
                Logout
            </a>
            @endif
        </div>
        @endif
    </div>
    <div id="content">
        @yield('content')
    </div>
    <div id="footer">
        <div id="footer-sec1">
            <div>
                <a href="/" id="footer-logo">JUST DU IT</a>
                <div>The <span class="wt">door</span> to your <span class="wt">feet</span> comfort.</div>
            </div>

            <div>
                <div class="wt foot-head">About Us</div>
                <div>
                    This website were created by <span class="wt">Muhamad Daffa Mennawi</span> - <span class="wt">2201810943</span> and <span class="wt">Kevin Orlando Sutanto</span> - <span class="wt">2201760945</span>
                </div>
            </div>
        </div>
        <div class="hbar"></div>
        <div>
            <div class="wt foot-head">Visit Us</div>
            <div class="list">
                <div>BINUS University, Anggrek Campus</div>
                <div>Jl. Raya Kb. Jeruk No.27, RT.2/RW.9, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530</div>
            </div>
        </div>
        <div class="hbar"></div>
        <div>
            <div class="wt foot-head">Social Media</div>
            <div class="list">
                <a href="https://www.facebook.com/yuma.zinoskov">Facebook</a>
                <a href="https://www.instagram.com/yumazine">Instagram</a>
                <a href="https://www.linkedin.com/in/yumazine/">LinkedIn</a>
            </div>
        </div>
        <div class="hbar"></div>
        <div>
            <div class="wt foot-head">Legal</div>
            <div class="list">
                <div>Terms</div>
                <div>Privacy</div>
            </div>
        </div>
        <div class="hbar"></div>
        <div>
            <div class="wt foot-head">Contact Me</div>
            <div class="inp">
                <input type="email" name="" id="" placeholder=" ">
                <div>Email</div>
            </div>
            <div id="contact-me-btn">
                <button>Submit</button>
            </div>
        </div>
    </div>
</body>
<script>
    function preload(){
        document.getElementById("body").style = "opacity: 1;";
    }
</script>
</html>