@if(isset($products) && !empty($products))
<div class="block-list-products @isset($classWrapper) {{$classWrapper}} @endisset">
    <div class="container">
        <div class="row">


            <div class="block-list-product__header-block-list-products header-block-list-products w-100">
                @if($h1)
                <h1>{{$header}}</h1>
                @else
                <h3>{{$header}}</h3>
                @endif
            </div>
        </div>


            <div class="block-list-products__list-products list-products">
                @if($products->count()>0)
                <div class="row list-products__list-products-row list-products-row">


                    @foreach($products as $key=>$product)
                    <!----------- COL PRODUCT -------------->
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-6">
                        <!--------------- BOX PRODUCT ------------------->
                        <div class="list-products__box-product box-product box-product-{{$key+1}}">

                            <!----- Img Product ------>
                            <div class="box-product__block-img-product block-img-product">
                                <a class="block-img-product__link-product link-product  @if (empty($product->img)) link-product-empty @endif" href="{{route('product_site.index', $product->url)}}">
                                    @isset($product->img)
                                    @if (!empty($product->img))
                                    @foreach(json_decode($product->img) as $k=>$image)
                                    @if($k<1)
                                    <img class="link-product__img-link-product d-block img-link-product img-fluid" alt="{{$product->name}}" src="{{Storage::url($image)}}">
                                    @endif
                                    @endforeach
                                    @endif
                                    @endif
                                </a>
                            </div>
                            <!----- End Img Product ------>

                            <!----- Name Product ------>
                            <a href="{{route('product_site.index', $product->url)}}" class="box-product__name-product name-product">
                                {!! $product->name !!}
                            </a>
                            <!----- End Name Product ------>
                        </div>
                        <!--------------- END BOX PRODUCT ------------------->
                    </div>
                    <!----------- END COL PRODUCT -------------->
                    @endforeach


                </div>




                @if(isset($pagination) && $pagination)
                <div class='list-products__pagination-list-products pagination-list-products row'>
                    {{$products->links()}}
                </div>
                @endif

                @else
                <p class="empty-search-result row">Не найдено ни одного товара</p>
                @endif

            </div>



        </div>
    </div>

@endif
