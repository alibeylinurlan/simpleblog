<div>
    @if($country_code == 'am')
        @php
            header("Location: https://www.deviantart.com/elamiras/art/4K-HD-AZERBAIJAN-FLAG-LION-WALLPAPER-838938849");
            die();
        @endphp
    @else
        <img src="http://www.abflags.com/_flags/flags-of-the-world/{{$country_name}}%20flag/{{$country_name}}%20flag-S-anim.gif" alt="{{$country_name}}_flag">

        {{--$country_code--}}
    @endif
</div>
