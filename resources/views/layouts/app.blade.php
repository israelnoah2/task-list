<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tasks App</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.tailwindcss.com"></script>

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

        <style type="text/css">
            body { font-family :'figtree';
                    padding:60px;}
            * li { list-style-type:decimal;}
            * a { text-decoration: none;}
            h1 { text-transform: uppercase;}
        </style>

    </head>

    <body>
        <div>

        @if(session()->has('success'))
        <div x-data="{flash : true }">
            <div x-show="flash">
                <i class="fa fa-close cursor-pointer" @click="flash = false"></i>
                <p class="alert alert-success mt-2">{{ session('success') }}</p>
            </div>
        </div>
        @endif

       

        @if(session()->has('delete'))
        <div>
        <i class="fa fa-close"></i>
        <p class="alert alert-danger mt-2">{{ session('delete')}}</p>
        </div>
        @endif

        <div> <h1> @yield('title') </h1> </div>

        <div>
            @yield('content')
        </div>

        </div>
    </body>
    
</html>
