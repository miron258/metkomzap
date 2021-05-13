<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.preheader')
    <body ng-app='ngApp'>
        @include('layouts.header', ['viewSlider' => false, 'classHeader'=> 'header-product'])
        @include('layouts.breadcrumbs', ['name'=> 'product', 'object'=> $product])
        @yield('content')
        @include('layouts.askquestion', ['classBlock'=> 'inner-product'])
        @include('layouts.footer')
    </body>
</html>   
