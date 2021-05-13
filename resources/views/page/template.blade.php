<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.preheader')
    <body ng-app='ngApp'>
        @include('layouts.header', ['viewSlider' => false, 'classHeader'=> 'header-page'])
        @include('layouts.breadcrumbs', ['name'=> 'page', 'object'=> $page])
        @yield('content')
        @include('layouts.askquestion', ['classBlock'=> 'inner-page'])
        @include('layouts.footer')
    </body>
</html>   
