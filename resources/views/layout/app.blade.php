<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <meta http-equiv="Cache-Control" content="no-cache, no-store" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>

    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    @yield('css')

</head>
<body>
<div class="content">
    <div class="row">
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                         <li ><a href="/"><span class="{{ request()->is('journal*') ? 'active-page' : ''}}">Journal</span></a></li>
                        <li><a href="{{route('author.index')}}"><span class="{{ request()->is('author*') ? 'active-page' : ''}}">Author</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

@yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script src="{{asset('js/checkPage.js')}}"></script>

@yield('scripts')

</body>
</html>
