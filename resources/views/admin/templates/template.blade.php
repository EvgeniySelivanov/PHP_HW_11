<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('administrator/js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('administrator/css/admin.css') }}" rel="stylesheet">
</head>


<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark h-100">
             {{--    <ul>
                    <li><a href="{{ route('categories.index') }}">Categories</a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
 --}}

                <ul class="list-unstyled ps-0 mt-5">
                    <li class="mb-1">
                        <button class="text-light btn btn-toggle align-items-center rounded collapsed 
                        " data-bs-toggle="collapse"
                            data-bs-target="#home-collapse" aria-expanded="true">
                     Categories
                        </button>
                        <div class="collapse show" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-menu">
                                <li><a href="{{ route('categories.index') }}" class="link-light rounded mt-2">Categories</a></li>
                                <li><a href="{{ route('categories.create') }}" class="link-light rounded mt-2">Categories create</a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="mb-1">
                      <button class="text-light btn btn-toggle align-items-center rounded collapsed 
                      " data-bs-toggle="collapse"
                          data-bs-target="#post-collapse" aria-expanded="true">
                  Posts
                      </button>
                      <div class="collapse show" id="post-collapse">
                          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small sub-menu">
                              <li><a href="{{ route('posts.index') }}" class="link-light rounded mt-2">Posts</a></li>
                              <li><a href="{{ route('posts.create') }}" class="link-light rounded mt-2">Posts create</a></li>
                          </ul>

                      </div>
                  </li>
                </ul>
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>
