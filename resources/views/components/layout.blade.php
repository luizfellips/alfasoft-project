<!doctype html>
<html style="overflow-x: hidden;">

<head>
    @include('includes.head')
</head>

<body style="overflow-x: hidden;">
        <div class="container">
        <x-flash-message />
        <header class="row">
            @include('layouts.navigation')

        </header>
        <!-- wraps content !-->
        <div id="main" class="row px-5 mx-5 my-3">
            {{ $slot }}
        </div>
        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
</body>

</html>
