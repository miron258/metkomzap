<!---------------------------------- HEADER -------------------------------------------------->
<div class="header @isset($classHeader){{$classHeader}}@endisset">
    <div class="container">
        @include('layouts.header.contacts')
    </div>
    <div class="container container-navigation">
        @include('layouts.header.navigation')
    </div>
    @includeWhen($viewSlider, 'layouts.header.slider')
</div>
<!-------------------------------------- END HEADER ----------------------------------------------->
