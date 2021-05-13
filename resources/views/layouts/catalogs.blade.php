<!-------------------------------------- BLOCK CATALOG ----------------------------------------------->
<div class="block-catalog @isset($classWrapper) {{$classWrapper}} @endisset">
    <div class="container">
        <div class="row">
            <div class="block-catalog__header-block-catalog header-block-catalog">
                @isset($h1)
                @if($h1)
                <h1>{{$header}}</h1>
                @else
                <h2>{{$header}}</h2>
                @endif
                @endisset
            </div>
        </div>

        <!--------------- List Catalogs --------------------->
        <div class="block-catalog__list-catalogs list-catalogs">

            @foreach($catalogs->chunk(4) as $k=>$chunk)
            <!--------------------------- Row Catalogs -------------------------->
            <div class="list-catalogs__row-catalogs row row-catalogs">

                @foreach($chunk as $key=>$catalog)
                <!------------- Box Catalog -------------->
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 wrapper-box-catalog wrapper-box-catalog-{{$key+1}}">
                    <div class="list-catalogs__box-catalog box-catalog box-catalog-{{$key+1}}">

                        <div class="box-catalog__block-img-catalog block-img-catalog">
                            <a class="block-img-catalog__link-catalog link-catalog" href="{{route('catalog_site.index', $catalog->url)}}">
                                <img class="ink-catalog__img-catalog img-catalog img-fluid" alt="" src="{{ Storage::url($catalog->img) }}">
                            </a>
                        </div>

                        <div class="box-catalog__block-name-catalog block-name-catalog">
                            <i class="name-catalog__num-catalog num-catalog">{{$key+1}}</i>
                            <span class="block-name-catalog__name-catalog name-catalog">
                                {{$catalog->name}}
                            </span>
                        </div>
                    </div>
                </div>
                <!------------- End Box Catalog -------------->
                @endforeach

            </div>
            @endforeach

        </div>
        <!--------------- End List Catalogs --------------------->



    </div>
</div>
<!-------------------------------------- END BLOCK CATALOG ----------------------------------------------->
