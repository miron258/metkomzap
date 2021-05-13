@extends('search.template')
@isset($search)
@section('meta_tag_title',  'Результаты поиска')
@section('meta_tag_description', 'Результаты поиска')
@section('meta_tag_keywords', 'Результаты поиска')
@endisset

@section('content')
<div class='block-view-search'>
    <div class='container'>

        <div class='block-view-search__header-block-view-search header-block-view-search'>
            <h1>
                Результаты поиска
            </h1>
        </div>

        <div class='block-view-search__searching-results searching-results'>
            @if(isset($products))

            @include('layouts.product.listproducts', [
            'products'=> $products,
            'search'=> true,
            'h1'=> false,'header'=> '',
            'classWrapper'=> 'inner-view-search',
            'pagination'=> true])

            @else
            Ничего не найдено
            @endif
        </div>

    </div>
</div>
@endsection
