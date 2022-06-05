<div>
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.css')}}">
    <script type="text/javascript" src="{{ asset('js/toastr.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",//"toast-bottom-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "slideDown",//"fadeIn",
            "hideMethod": "slideUp"//"fadeOut"
        }
        @if(session()->has('success'))
            toastr.success("{{session()->get('success')}}");
        @elseif(session()->has('error'))
            toastr.error("{{session()->get('error')}}");
        @endif
    </script>
</div>
