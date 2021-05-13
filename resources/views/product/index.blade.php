@extends('product.template')
@isset($product)
    @section('meta_tag_title',  $product->name)
@section('meta_tag_description', $product->meta_tag_description)
@section('meta_tag_keywords', $product->meta_tag_keywords)
@endisset
@section('content')

    <div class='block-product'>

        <div class='container'>


            <div class='row'>


                <div class='col-xl-4 col-lg-4 d-xl-block d-lg-block d-md-none d-sm-none d-none'>
                    <div class='block-product__block-list-catalogs block-list-catalogs'>

                        <div class='block-list-catalogs__header-block-list-catalogs header-block-list-catalogs'>
                            <h2>Каталог запчастей</h2>
                        </div>

                        <!----------------- List Catalogs -------------------->
                        <div class='block-list-catalogs__wrapper-list-catalogs wrapper-list-catalogs'>
                            <ul class='wrapper-list-catalogs__list-catalogs list-catalogs'>

                                @foreach($catalogs as $catalog)
                                    <li class='list-catalogs__item-list-catalogs item-list-catalogs'>
                                        <a class='item-list-catalogs__link-list-catalogs link-list-catalogs'
                                           href='{{route('catalog_site.index', $catalog -> url)}}'>{{$catalog -> name}}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <!----------------- End List Catalogs -------------------->

                    </div>
                </div>


                <div class='col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12'>


                    <div class='block-product__block-show-product block-show-product'>

                        <div class='block-show-product__header-block-show-product header-block-show-product'>
                            <h1>
                                @isset($product->name)
                                    {{$product -> name}}
                                @endisset
                            </h1>
                        </div>


                        <!----------------- BLOCK IMG PRODUCT ----------------------->
                        <div class='block-show-product__block-img-product row block-img-product'>


                            <div class='col-xl-4 col-lg-4 col-md-4 col-12'>
                                <div class='block-img-product__img-product img-product'>
                                    <fotorama items="{{$productImages}}" options="options"/>
                                </div>
                            </div>


                            <div class='col-xl-8 col-lg-8 col-md-8 col-12 wrapper-features-product'>

                                <div class='block-img-product__features-product features-product'>

                                    <div class='row'>
                                        <!--------- BLOCK PRICE ------------>
                                        <div class='col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5'>
                                            <div class='features-product__box-price box-price'>
                                                <div class='box-price__block-number block-number'>
                                                    <div class='block-number__header-block-number header-block-number'>
                                                        Артикул
                                                    </div>
                                                    <div class='header-block-number__number number'>
                                                        @isset($product->art)
                                                            {{$product -> art}}
                                                        @endisset
                                                    </div>
                                                </div>


                                                <div class='box-price__block-price block-price'>
                                                    <div class='block-price__header-block-price header-block-price'>
                                                        стоимость
                                                    </div>

                                                    <div class='block-price__price price'>
                                                        @if(!empty($product->price))
                                                            @convert($product-> price) <span class='rub'>руб</span>
                                                        @else
                                                            Уточняйте
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--------- END BLOCK PRICE ------------>


                                        <div class='col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7'>
                                            <div class='features-product__box-availability box-availability'>

                                                <div class='box-availability__block-availability block-availability'>
                                                    <div
                                                        class='block-availability__header-block-availability header-block-availability'>
                                                        доступность
                                                    </div>
                                                    <div class='block-availability__availability availability   @if($product->availability) are-availability @else not-availability @endif'>
                                                        @isset($product->availability)
                                                            @if($product->availability)
                                                              Есть в наличии
                                                            @else
                                                               Нет в наличии
                                                            @endif
                                                        @endisset
                                                    </div>
                                                </div>


                                                <div class='box-availability__block-advice block-advice'>
                                                    <div class='block-advice__header-block-advice header-block-advice'>
                                                        консультация
                                                    </div>
                                                    <div class='block-advice__number-phone number-phone'>
                                                        <a class='number-phone__link-number-phone link-number-phone link-number-phone1'
                                                           href='tel:+74862781046'>+7-4862-78-10-46</a>
                                                        <a class='number-phone__link-number-phone link-number-phone link-number-phone2'
                                                           href='tel:+79307774747'>+7-930-777-47-47</a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <!------------------- Block Quick Order ------------------------>
                                    <div class='block-quick-order'>
                                        <div
                                            class='block-quick-order__header-block-quick-order header-block-quick-order'>
                                            быстрый заказ
                                        </div>
                                        <div ng-controller='quickOrderCtrl'
                                             class='block-quick-order__number-phone-quick-order block-form-number-phone-quick-order'>
                                            <quick-order></quick-order>
                                            <div
                                                class="block-form-number-phone-quick-order__message-send-form message-send-form"
                                                ng-bind-html="message"></div>
                                        </div>
                                    </div>
                                    <!------------------- End Block Quick Order ------------------------>


                                </div>


                            </div>

                        </div>
                        <!----------------- END BLOCK IMG PRODUCT ----------------------->


                        <!----------------- DESCRIPTION PRODUCT ----------------------->
                        <div class='block-show-product__description-product description-product'>
                            <div class='description-product__header-description-product header-description-product'>
                                описание и характеристики
                            </div>
                            @isset($product)
                                <div class='description-product__text-product text-product'>
                                    {!!$product->description!!}
                                </div>
                            @endisset
                        </div>
                        <!----------------- END DESCRIPTION PRODUCT ----------------------->

                    </div>


                </div>


            </div>


            @include('layouts.product.listproducts',['header' => 'Товары из этой категории', 'h1'=> false, 'classWrapper'=> 'inner-view-product'])


        </div>


    </div>


@endsection
