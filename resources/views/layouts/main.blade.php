<!DOCTYPE html>
<html lang="en">
    @include('partials._header')
<body>
    @include('partials._nav')
    <div class="container">
        @include('partials._errors')
        @yield('content')
        
        
    </div>
    @include('partials._footer')
    @include('partials._script')
    @yield('script')
</body>
</html>