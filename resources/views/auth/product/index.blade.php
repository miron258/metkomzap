@extends('auth.layouts.app')
@section('title', 'Список товаров')
@section('content')

    <div class="container-fluid">
        <div class="row-fluid">
            @if(session()->has('success-import'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ session()->get('success-import') }}
                    </div>
                </div>
            @endif
            @if(session()->has('success-error'))
                <div class="col-12">
                    <div class="alert alert-danger">
                        {{ session()->get('error-import') }}
                    </div>
                </div>
            @endif
            <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12 col-12">


                <div class="card bg-light mt-3">
                    <div class="card-header">
                        Импорт/Экспорт товаров
                    </div>
                    <div class="card-body">
                        <form action="{{ route('import-products') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="file" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Выбор каталога</label>
                                <select class='form-control' name='id_catalog'>
                                    @if (isset($catalogs))
                                        @php
                                            buildTreeSelectOptions($catalogs);
                                        @endphp
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success">Импортировать товары из XLS</button>
                                <a class="btn btn-warning" href="{{ route('export-products') }}">Выгрузить товары в
                                    XLS</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <div ng-app='ngApp' class="container-fluid mt-5">
        <div class="row-fluid justify-content-center">
            <div class="col-xl-12">
                <div ng-controller="productCtrl" class="card">
                    <div class="card-header">@yield('title')</div>

                    <!------------- Form Filter Search ------------------>
                    <form ng-submit="submitForm()" name="formProductsFilter" method="get">
                        <div class='form-row ml-3 mt-3 mr-3'>

                            <div class="col-xl-3">
                                <div class="form-group">
                                    <label>Название</label>
                                    <input name="name" type="text" class="form-control" ng-model="filter.name">
                                </div>

                            </div>

                            <div class="col-xl-2">
                                <div class="form-group">
                                    <label>Артикул</label>
                                    <input name="art" type="text" class="form-control" ng-model="filter.art">
                                </div>
                            </div>


                            <div class="col-xl-2">
                                <div class="form-group">
                                    <label>Цена</label>
                                    <input name="price" type="text" class="form-control" ng-model="filter.price">
                                </div>
                            </div>


                            <div class="col-xl-3">
                                <div class="form-group">
                                    <label>Выбор каталога</label>
                                    <select class='form-control' ng-model="filter.idCatalog" name='id_catalog'>
                                        <option value="">Все каталоги</option>
                                        @if (isset($catalogs))
                                            @php
                                                buildTreeSelectOptions($catalogs);
                                            @endphp
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-2">
                                <button style="margin-top: 35px;" type="submit" class="btn btn-primary btn-sm "><i
                                        class="fas fa-search-plus mr-2"></i>Искать
                                </button>
                                <button style="margin-top: 35px;" type="reset" class="btn btn-primary btn-sm"><i
                                        class="fas fa-filter mr-2"></i>Сбросить фильтр
                                </button>

                            </div>

                        </div>
                    </form>
                    <!------------- End Form Filter Search ------------------>


                    <div class="col-12 ml-1 mt-2">
                        <a class="btn btn-primary btn-sm" href="{{route('product.create')}}"><i
                                class="far fa-plus-square mr-2"></i>Создать продукт</a>
                        <button ng-disabled="deleteButton" class="btn btn-danger btn-sm" ng-click="deleteProducts()"><i
                                class="fas fa-trash mr-2"></i>Удалить отмеченные
                        </button>
                    </div>


                    <div ng-init="getProducts()" class="card-body">
                        <div ng-bind-html="message"></div>
                        <div ng-show="loader" class="loader-gif">
                            <img src="/img/admin/tpl_img/ajax-loader.gif" class="ajax-loader"/>
                        </div>
                        <table-products></table-products>
                        <div class="block-pagination">
                            <products-pagination></products-pagination>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--- Plugin Angular Resourse JS --->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/angular-resource/1.8.0/angular-resource.min.js"></script>
    <script src="{{ asset('js/admin/angular/ngApp.js')}}"></script>
    <script src="{{ asset('js/admin/angular/ngAppScripts.js')}}"></script>
@endsection
