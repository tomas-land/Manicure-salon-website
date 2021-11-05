

    <header>
        <div class="container">


            <div class="socmedia">
                @auth
               
                @endauth
                   
                <a href="https://www.facebook.com/Virmant%C4%97-nails-art-224146397793615/"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0" />
                    </svg></a>
                <a href="https://www.instagram.com/virmante_nails/"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m301 256c0 24.851562-20.148438 45-45 45s-45-20.148438-45-45 20.148438-45 45-45 45 20.148438 45 45zm0 0" />
                        <path
                            d="m332 120h-152c-33.085938 0-60 26.914062-60 60v152c0 33.085938 26.914062 60 60 60h152c33.085938 0 60-26.914062 60-60v-152c0-33.085938-26.914062-60-60-60zm-76 211c-41.355469 0-75-33.644531-75-75s33.644531-75 75-75 75 33.644531 75 75-33.644531 75-75 75zm86-146c-8.285156 0-15-6.714844-15-15s6.714844-15 15-15 15 6.714844 15 15-6.714844 15-15 15zm0 0" />
                        <path
                            d="m377 0h-242c-74.4375 0-135 60.5625-135 135v242c0 74.4375 60.5625 135 135 135h242c74.4375 0 135-60.5625 135-135v-242c0-74.4375-60.5625-135-135-135zm45 332c0 49.625-40.375 90-90 90h-152c-49.625 0-90-40.375-90-90v-152c0-49.625 40.375-90 90-90h152c49.625 0 90 40.375 90 90zm0 0" />
                    </svg></a>
            </div>
            <button class="hamburger hamburger--elastic no_highlights" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <div class="login">
           
                
                @guest
                    @if (Route::has('login'))

                        <a class="" href="{{ route('login') }}"><span class="material-icons">
                            login
                            </span></a>

                    @endif

                    @if (Route::has('register'))

                        {{-- <a class="" href="{{ route('register') }}">{{ __('Register') }}</a> --}}

                    @endif

                @else
{{-- 
                    <a>
                        {{ Auth::user()->name }}
                    </a> --}}
                    <a href="{{route('clients.index')}}">
                        ADMIN 
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('LOGOUT') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                @endguest
            </div>

            <div class="shadow"></div>



        </div>
    

        {{-- --------------prisijungti svg --}}
        {{-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path
                    d="M16.848 12.168c1.56-1.32 2.448-3.216 2.448-5.232 0-3.768-3.072-6.84-6.84-6.84s-6.864 3.072-6.864 6.84c0 2.016 0.888 3.912 2.448 5.232-4.080 1.752-6.792 6.216-6.792 11.136 0 0.36 0.288 0.672 0.672 0.672h21.072c0.36 0 0.672-0.288 0.672-0.672-0.024-4.92-2.76-9.384-6.816-11.136zM12.432 1.44c3.048 0 5.52 2.472 5.52 5.52 0 1.968-1.056 3.792-2.76 4.776l-0.048 0.024c0 0 0 0-0.024 0-0.048 0.024-0.096 0.048-0.144 0.096h-0.024c-0.792 0.408-1.632 0.624-2.544 0.624-3.048 0-5.52-2.472-5.52-5.52s2.52-5.52 5.544-5.52zM9.408 13.056c0.96 0.48 1.968 0.72 3.024 0.72s2.064-0.24 3.024-0.72c3.768 1.176 6.576 5.088 6.816 9.552h-19.68c0.264-4.44 3.048-8.376 6.816-9.552z"
                ></path>
            </svg> --}}


        <div class="menu">
            <ul class="ul">
                <li>
                    <a href="{{ route('home') }}">PRADŽIA</a>
                </li>
                <li>
                    <a href="{{ route('paslaugos.index') }}">PASLAUGOS</a>
                </li>
                <li>
                    <a href="{{ route('galerija.index') }}">GALERIJA</a>
                </li>             
                <li>
                    <a href="">MOKYMAI</a>
                </li>
                <li>
                    <a href="">KONTAKTAI</a>
                </li>
            </ul>
        </div>


</div>
<div class="slide_menu ">

    <ul class="ul">
       

        <li>
            <a href="{{ route('home') }}">PRADŽIA</a>
        </li>
        <li>
            <a href="{{ route('paslaugos.index') }}">PASLAUGOS</a>
        </li>
        <li>
            <a href="{{ route('galerija.index') }}">GALERIJA</a>
        </li>
        <li>
            <a href="">MOKYMAI</a>
        </li>
        <li>
            <a href="">KONTAKTAI</a>
        </li>
    </ul>
</div>
    </header>

