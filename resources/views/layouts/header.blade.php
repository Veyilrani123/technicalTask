<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div id="app">
    <div class="header-main">
				<div class="container row mx-auto col-12 py-4">
					<!-- Start : Site Logo Section -->
								<div id="logo" class="site-title col-4"><a href="https://demo2.themewarrior.com/hospitalplus" rel="home"><img src="http://demo2.themewarrior.com/hospitalplus/wp-content/themes/hospitalplus/images/logo.png" alt="Hospital Plus"></a></div>
						<!-- End : Site Logo Section -->

					<!-- Start : Nav Main menu -->
					<nav id="main-menu" class="site-navigation primary-navigation col-8">
                 
					<ul id="menu-main-menu" class="main">
                        <li id="menu-item-1014" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-1014">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li id="menu-item-1016" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1016">
                            <a href="{{ route('doctors') }}">Doctors</a>
                        </li>
                        <li id="menu-item-1016" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1016">
                            <a href="{{ route('favourites') }}">Favourites</a>
                        </li>
                        <li id="menu-item-1015" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1015">
                            @php
                                $id = Session::get('patient_id');
                            @endphp
                            @if($id)
                                <a href="{{ route('logout') }}">Logout</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                            @endif
                        </li>
                    </ul>					
					</nav>
					<!-- End : Nav Main menu -->
				</div>
			</div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
