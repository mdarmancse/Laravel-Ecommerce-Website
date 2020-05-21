<html>

<head>
    <title>@yield('title')</title>

    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">


</head>

<body>
@include('Layout.menu')

@yield('content')

@include('Layout.footer')


@yield('script')
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<script src="{{asset('js/sticky-kit.min.js')}}"></script>
<script src="{{asset('js/custom.min-2.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

</body>


</html>
