<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.preheader')
    <body ng-app='ngApp'>
        @include('layouts.header', ['viewSlider' => false, 'classHeader'=> 'header-catalog'])
        @include('layouts.breadcrumbs', ['name'=> 'catalog', 'object'=> $catalog])
        @yield('content')
        @include('layouts.askquestion', ['classBlock'=> 'inner-catalog'])
        @include('layouts.footer')
    </body>
</html>   
