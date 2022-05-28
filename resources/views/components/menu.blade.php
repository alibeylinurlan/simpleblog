<div>
    <style>
        #menu {
            position: fixed;
            top: 0;
            background: #fff;
            width: 250px;
            height: 100vh;
            z-index: 1;
            transition: 0.3s;
            margin-left: -260px;
            opacity: 0;
        }
        #menu-x {
            top: 0;
            position: fixed;
            width: 100%;
            height: 100vh;
            background: black;
            z-index: 1;
            opacity: 0.5;
            display: none;
            transition: 0.1s;
        }
        .catagory {
            padding: 5px;
            margin: 10px;
            border-bottom: solid thin #eee;
            transition: 0.1s;
            border-radius: 5px;
            cursor: pointer;
        }
        .catagory:hover {
            background-color: #eee;
        }
        .catagory i {
            font-size: 28px;
        }
        .menu-text {
            position: absolute;
            margin-left: 30px;
            margin-top: -28px;
            width: 75%;
            white-space: nowrap;
            overflow: hidden;
        }
        .logo {
            padding: 10px;
            font-size: 28px;
        }
        .logo-text {
            background: #eee;
            border-radius: 8px;
            padding: 5px;
        }
        a, a:link, a:active, a:hover, a:visited {
            text-decoration: none;
            color: black;
        }
    </style>
    <div id="menu-x"></div>
    <div id="menu">
        <div class="logo">
            <div class="logo-text">
                {{config('app.name')}}
            </div>
        </div>
        <div class="catagory" id="searchbox2">
            <i class='bx bx-search-alt'></i><div class="menu-text">Search</div>
        </div>
        {{--        <a href="{{ route('instazoom') }}">--}}
        <a href="https://instazoomer.de/tr">
            <div class="catagory">
                <i class='bx bxl-instagram'></i><div class="menu-text">Instagram</div>
            </div>
        </a>
        <a href="https://webpostegro.com/login">
            <div class="catagory">
                <i class='bx bx-envelope'></i><div class="menu-text">Contact</div>
            </div>
        </a>
        <a href="https://webpostegro.com/login">
            <div class="catagory">
                <i class='bx bx-phone-call'></i><div class="menu-text">Call us</div>
            </div>
        </a>
        
    </div>
    <script>
        $(document).ready(function () {
            // $('.menu-o').on('click', function (){
            //     $('.menu-x').show();
            //     $('.menu').show().css({'margin-left' : '0'});
            // });
            // $('.menu-x').on('click', function (){
            //     $(this).fadeOut();
            //     $('.menu').css({'margin-left' : '-250'}).fadeOut(300);
            // });

            $('.menu-o').on('click', function(){
                $('#menu').show();
                $('#menu').css({'margin-left' : '0px', 'opacity' : '1'});
                $('#menu-x').show();
            });
            $('#menu-x, .catagory').on('click', function(){
                $('#menu').css({'margin-left' : '-250px', 'opacity' : '0'});
                $('#menu, #menu-x').fadeOut();
            });
        })
    </script>
</div>
