<!doctype html>
<html style="overflow-x: hidden;">

<head>
    @include('includes.head')
</head>

<body style="overflow-x: hidden;">
    <div>
        <x-flash-message />
        <header class="bg-gray-100 w-screen">
            @include('layouts.navigation')

        </header>
        <!-- wraps content !-->
        <div id="main" class="row px-56 mx-5 my-3">
            {{ $slot }}
        </div>
        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
</body>

</html>
