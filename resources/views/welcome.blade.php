@include('layouts.welcome')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links color-white">
            @auth
                @if (Auth::user()->role == 'Admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('employee.dashboard') }}">Dashboard</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline-block; padding: 0 25px;">
                    @csrf
                    <a style="color: white" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    </form>

                @endif
            @else
            <a style="color: white" href="{{ route('login') }}">Login</a>

            {{-- @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif --}}
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                <div class="clockStyle" id="clock"></div>
            </div>


        </div>
    </div>

