@extends('master')
@isset($page)
@section('meta_tag_title',  $page->name)
@section('meta_tag_description', $page->meta_tag_description)
@section('meta_tag_keywords', $page->meta_tag_keywords)
@endisset

@section('content')
<div class="block-company">

    <div class="container">

        <div class="row">
            <div class="block-company__header-block-company header-block-company">
                <h2>
                    @isset($page)
                    {{$page->name}}
                    @endisset
                </h2>
            </div>
        </div> 

        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="block-company__description-block-company description-block-company">
                    @isset($page)
                    {!!$page->description!!}
                    @endisset
                </div>
            </div>



            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="block-company__banners-block-company row banners-block-company">

                    <!------------ Top Banner ----------->
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                        <div class="bannets-block-company__top-banner top-banner">
                            <div class="top-banner__text-banner text-banner">
                                Производство пружинных <br>зубьев, пружин растяжения<br> и сжатия
                            </div>
                            <div class="top-banner__block-link-banner block-link-banner">
                                <a target="_blank" href="https://metkom57.ru" class="block-link-banner__link-banner link-banner">Перейти на сайт</a>
                            </div>
                        </div>
                    </div>
                    <!------------ End Top Banner ----------->


                    <!------------ Bottom Banner ----------->
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                        <div class="bannets-block-company__bottom-banner bottom-banner">
                            <div class="bottom-banner__text-banner text-banner">
                                Производство и поставки<br> техники для сельского<br> хозяйства
                            </div>
                            <div class="bottom-banner__block-link-banner block-link-banner">
                                <a target="_blank" href="http://metkomteh.ru" class="block-link-banner__link-banner link-banner">Перейти на сайт</a>
                            </div>
                        </div>
                    </div>
                    <!------------ End Bottom Banner ----------->

                </div>
            </div>

        </div>

    </div>

</div>
@endsection