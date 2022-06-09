@extends('home')
@section('dashboard')
    <style>
        .shadow {
            box-shadow: 0 0 5px gray;
        }
        .input-label {
            font-size: 18px;
        }
        .input-text {
            width: 100%;
            border-radius: 5px;
            box-shadow: 0 0 2px gray;
            border: solid thin white;
            padding: 2px;
            outline-width: 1px;
            padding-inline: 10px;
        }
        .input-text:focus {
            outline: none;
            box-shadow: 0 0 2px gray;
        }
        .button {
            float: left;
            padding: 5px;
            padding-inline: 10px;
            background: #eee;
            border-radius: 5px;
            box-shadow: 1px 1px 4px gray;
            transition: 0.3s;
            cursor: pointer;
            margin-right: 10px;
        }
        .button:hover {
            box-shadow: 3px 3px 5px gray;

        }
        .button div {

            font-size: 20px;
            display: flex;
            float: left;
        }
        .xx {
            position:absolute;
            font-size: 32px;
            margin-top: 5px;
            margin-left: 10px;
            cursor: pointer;
        }
        .ph_vd_txt {
            display: flex;
        }
        .ph_vd_txt input, .ph_vd_txt textarea {
            width: 85%;
        }
        textarea {
            margin-top: 10px;
        }
        .enter {
            background: indigo;
            color: white;
        }
    </style>
    <div class="mt-4" style="padding: 5px;">
        <div class="rounded-md overflow-hidden shadow" style="max-width: 1200px;margin: auto;padding: 0;padding-bottom: 10px;background: white;">
            <div style="background: darkcyan;padding: 10px;font-size: 20px;color: white;">
                Add new item
            </div>
            <div style="background: white;padding: 5px;">
                <form action="{{ route('add') }}" method="post">
                    @csrf
                    <label class="input-label">Header</label><br>
                    <input class="input-text" type="text" name="header" autocomplete="header" required>
                    <label class="input-label">Slogan</label><br>
                    <input class="input-text" type="text" name="slogan" required>
                    <label class="input-label">Category</label><br>
                    <div style="display: flex;">
                        <select class="input-text" required style="flex-grow: 2;" name="category">
                            <option selected disabled>Select category</option>
                            @forelse($categories as $k => $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @empty
                                <option disabled>write a new category please</option>
                            @endforelse
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="input-text" name="newcategory" style="width: 30%;" placeholder="or write a new category">
                    </div>
                    <label class="input-label">Header foto link</label><br>
                    <input class="input-text" type="text" name="header_photo_link" required placeholder="Please write just image link">
                    <div class="depend-div">
                    </div>
                    <div class="mt-4">
                        <br>
                        <div class="button textbtn">
                            <div><i class='bx bxs-file-plus'></i></div>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="button imagebtn">
                            <div><i class='bx bx-image-add'></i></div>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="button videobtn">
                            <div><i class='bx bx-video-plus'></i></div>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="button otherlinkbtn">
                            <div><i class='bx bx-link'></i></div>
                        </div>
                    </div>
                    <button class="button enter" style="float: right;margin-right: 5px;">
                        Enter
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var order = 0;
            $('.imagebtn').on('click', function (){
               $('.depend-div')
                   .append('<div class="ph_vd_txt"><input class="input-text mt-4" type="text" name="photo_links[]" placeholder="Write image link" ><input type="hidden" name="photo_orders[]" value="'+order+'" /><div><div class="xx"><i class="bx bx-x"></i></div></div></div>');
               $('.ph_vd_txt:last-child').hide().slideDown();
               $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                order++;
            });

            $('.videobtn').on('click', function (){
                $('.depend-div')
                    .append('<div class="ph_vd_txt"><input class="input-text mt-4" type="text" name="video_links[]" placeholder="Write google drive video link" ><input type="hidden" name="video_orders[]" value="'+order+'" /><div><div class="xx"><i class="bx bx-x"></i></div></div></div>');
                $('.ph_vd_txt:last-child').hide().slideDown();
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                order++;
            });

            $('.textbtn').on('click', function (){
                $('.depend-div')
                    .append('<div class="ph_vd_txt"><textarea class="input-text" type="text" name="texts[]" placeholder="Write text"></textarea><input type="hidden" name="text_orders[]" value="'+order+'" /><div><div class="xx"><i class="bx bx-x"></i></div></div></div>');
                $('.ph_vd_txt:last-child').hide().slideDown();
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                order++;
            });

            $('.otherlinkbtn').on('click', function (){
                $('.depend-div')
                    .append('<div class="ph_vd_txt"><input style="width: 40%;" class="input-text mt-4" type="text" name="other_links[]" placeholder="Write other referance link" required><input style="width: 45%;" class="input-text mt-4" type="text" name="other_link_texts[]" placeholder="Write text for referance link" required ><input type="hidden" name="other_link_orders[]" value="'+order+'" /><div><div class="xx"><i class="bx bx-x"></i></div></div></div>');
                $('.ph_vd_txt:last-child').hide().slideDown();
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                order++;
            });

            $('.depend-div').on('click', '.xx', function (){
                $(this).parent().parent().slideUp(function() { $(this).remove(); });
                order--;
            });

        });
    </script>

{{--    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>--}}
{{--    <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        CKEDITOR.replace('txt0');--}}
{{--        CKEDITOR.replace('txt1');--}}
{{--        CKEDITOR.replace('txt2');--}}
{{--        CKEDITOR.replace('txt3');--}}
{{--        CKEDITOR.replace('txt4');--}}
{{--        CKEDITOR.replace('txt5');--}}
{{--        CKEDITOR.replace('txt6');--}}
{{--    </script>--}}

@endsection
