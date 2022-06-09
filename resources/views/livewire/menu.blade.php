<div>
    <style>
        #menu {
            position: fixed;
            top: 0;
            background: #fff;
            width: 250px;
            height: 100vh;
            z-index: 5;
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
            z-index: 4;
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
        <a href="{{route('index')}}">
            <div class="logo">
                <div class="logo-text">
                    {{config('app.name')}}
                </div>
            </div>
        </a>
        <div class="catagory" id="searchbox2">
            <i class='bx bx-search-alt'></i><div class="menu-text">Search</div>
        </div>
        <a href="#categories">
            <div class="catagory">
                <i class='bx bx-category'></i><div class="menu-text">Categories</div>
            </div>
        </a>
        <a href="https://www.instagram.com/bilgitoplusu">
            <div class="catagory">
                <i class='bx bxl-instagram'></i><div class="menu-text">Instagram</div>
            </div>
        </a>
        <a href="https://www.facebook.com/bilgitoplusu/">
            <div class="catagory">
                <i class='bx bxl-facebook-circle'></i><div class="menu-text">Facebook</div>
            </div>
        </a>
        <a href="">
            <div class="catagory">
                <i class='bx bx-envelope'></i><div class="menu-text">Contact</div>
            </div>
        </a>
        <a href="">
            <div class="catagory">
                <i class='bx bx-phone-call'></i><div class="menu-text">Call us</div>
            </div>
        </a>

        @auth
            <a href="user/profile">
                <div class="catagory">
                    <i class='bx bxs-user'></i><div class="menu-text">Profile</div>
                </div>
            </a>
            <a href="{{ route('dashboard') }}">
                <div class="catagory">
                    <i class='bx bxs-dashboard' ></i><div class="menu-text">Dashboard</div>
                </div>
            </a>
            <div class="catagory exitt">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button>
                        <i class='bx bx-log-out exit' ></i>
                    </button>
                    <div style="margin-top: -27px;position:absolute;margin-left: 30px;">Logout</div>
                </form>
            </div>
        @endauth

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

            $('.exitt').on('click', function(){
                $(this).children('form').submit();
            });
        })
    </script>
</div>
