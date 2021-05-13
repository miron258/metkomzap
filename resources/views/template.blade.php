<!doctype html>
<html lang="{{ str_replace('_', '-', app()-> getLocale())}}">
    @include('layouts.preheader')
    <body ng-app='ngApp'>
        @include('layouts.header', ['viewSlider' => true, 'classHeader'=> ''])
        @include('layouts.catalogs', ['catalogs'=> $catalogs, 'h1'=>false, 'header'=> 'Каталог запчастей'])
        @include('layouts.manufacturer')
        @yield('content')
        @include('layouts.askquestion', ['classBlock'=> ''])
        @include('layouts.footer')
    </body>

</html>   
