@include('admin.inc.header')

<body>  
    <div class="main-wrapper">

       {{-- header top --}}
       @include('admin.inc.header-top')
        {{-- sidebar --}}
        @include('admin.inc.sidebar')

        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>

    @include('admin.inc.footer')
