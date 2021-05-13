<!---------------- Header Block Menu --------------------->
<div class="header__header-block-menu header-block-menu">
    <div class="row">

        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-9">
            <div class="header-block-menu__block-menu-catalog block-menu-catalog">

                <!-- Collapse button -->
                <button class="block-menu-catalog__bt-menu-catalog bt-menu-catalog navbar-toggler" type="button"
                        data-toggle="collapse"
                        data-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="animated-icon">
                        <span class="mburger mburger-top"></span>
                        <span class="mburger mburger-middle"></span>
                        <span class="mburger mburger-bottom"></span>
                    </div>
                </button>
                <div class="block-menu-catalog__text-menu-catalog text-menu-catalog" data-toggle="collapse"
                     data-target="#navbarContent"
                     aria-controls="navbarContent" aria-expanded="false">каталог запчастей
                </div>
                <!-- End Collapse button -->


                <!-- Collapsible content -->
                <div id="navbarContent"
                     class='block-menu-catalog__hidden-menu-catalog hidden-menu-catalog collapse navbar-collapse'
                     aria-labelledby="dropdownMenuButton">

                    <!------------ Catalog Menu -------------->
                    <ul class='hidden-menu-catalog__list-menu-catalog list-menu-catalog'>
                        @foreach($menu['catalogsMenu'] as $k=>$catalog)
                            <li class='list-menu-catalog__item-menu-catalog item-menu-catalog'>
                                <a class='item-menu-catalog__link-menu-catalog link-menu-catalog'
                                   href='{{route('catalog_site.index', $catalog->url)}}'>
                                    {{$catalog->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!------------ End Catalog Menu -------------->


                    <!------------ Main Menu -------------->
                    <div class="d-xl-none d-lg-none d-md-none d-sm-none d-block">
                        {!!$menu['menu']!!}
                    </div>
                    <!------------ End Main Menu -------------->

                </div>
                <!-- End Collapsible content -->


            </div>


        </div>


        <div class="co-xl-8 col-lg-8 col-md-9 d-xl-block d-lg-block d-md-block d-sm-none d-none">
            <div class="header-block-menu__block-menu-main block-menu-main">


                <!---------------------------- TOP NAVIGATION ------------------------------>
            {!!$menu['menu']!!}
            <!---------------------------- END TOP NAVIGATION ------------------------------>


                <!------------ Search Tablet ------------->
                <div
                    class="block-menu-main__search-tablet d-xl-none d-lg-none d-md-block d-sm-block d-block search-tablet">
                    <form action="{{ route('search_site.index') }}" method="get">
                        <input value="{{ request('query') }}" class="block-search__search-catalog search-catalog"
                               type="search" name="query" placeholder="">
                    </form>
                </div>
                <!------------ End Search Tablet ------------->


            </div>
        </div>


        <div
            class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-3 d-xl-block d-lg-block d-md-none d-sm-block d-block wrapper-block-search">
            <div class="header-block-menu__block-search block-search float-right">

                <form action="{{ route('search_site.index') }}" method="get">
                    <input value="{{ request('query') }}"
                           class="block-search__search-catalog search-catalog d-xl-block d-lg-block d-md-block d-sm-none d-none search-catalog-desktop"
                           type="text" name="query" placeholder="Поиск по каталогу">
                </form>

                <form action="{{ route('search_site.index') }}" method="get">
                    <input value="{{ request('query') }}"
                           class="block-search__search-catalog search-catalog search-catalog-mobile d-xl-none d-lg-none d-md-none d-sm-block d-block"
                           type="text" name="query" placeholder="Поиск">
                </form>
            </div>
        </div>

    </div>
</div>

<!---------------- End Header Block Menu --------------------->
