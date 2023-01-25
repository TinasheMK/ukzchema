@include('inc.licence')

<!doctype html>
<html lang="en">

<head>
    @include('inc.head')
</head>

<body class="">
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-light" role="status"><span class="sr-only">Loading...</span></div>
    </div>
    <div class="wrapper" id="ukz-app">
        <!-- <member-nav :user="{{$user}}" :nav_links="{{$nav_links}}"></member-nav> -->
        <member-nav :user="{{$user}}" :nav_links="{{$nav_links}}" :balance="{{Auth::user()->balance}}"></member-nav>
        <div class="main-panel" style="min-height: 100vh;">
            @include('inc.nav')
            <div class="content">
                @yield('content')
            </div>
            @include('inc.footer')
            <!-- Modal -->

        </div>
        <new-message :level="'{{session('level') ?? 'primary'}}'" :message="'{{session('message') ?? null}}'">
        </new-message>
        {{-- <div class="mb-2"></div> --}}
        <member-loaded></member-loaded>
        <deposit-modal
            :user="{{$user}}"
            :client_id="'{{env('PAYPAL_CLIENT')}}'"
            :route="'{{route('members-area.submit_deposit')}}'">
            @csrf
        </deposit-modal>
    </div>

    <script src="{{ asset('js/ukz.app.js?id='.time()) }}"></script>

</html>
