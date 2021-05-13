<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.preheader')
    <body ng-app='ngApp'>
        @include('layouts.header', ['viewSlider' => false, 'classHeader'=> 'header-search'])
        @include('layouts.breadcrumbs', ['name'=> 'search'])
        @yield('content')
        @include('layouts.askquestion', ['classBlock'=> 'inner-search'])
        @include('layouts.footer')
    </body>
</html>   
