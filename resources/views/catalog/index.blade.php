@extends('catalog.template')
@isset($catalog)
@section('meta_tag_title',  $catalog->name)
@section('meta_tag_description', $catalog->meta_tag_description)
@section('meta_tag_keywords', $catalog->meta_tag_keywords)
@endisset
@section('content')
<div class='block-view-catalog'>

    @if(isset($catalogs))
    @include('layouts.catalogs', ['catalogs'=> $catalogs, 'h1'=> 'true', 'header'=> $catalog->name, 'classWrapper'=> 'inner-view-catalog'])
    @endif

    @if(isset($products))
    <div class='container'>


        @include('layouts.product.listproducts', [
        'products'=> $products, 
        'h1'=> true,'header'=> $catalog->name, 
        'classWrapper'=> 'inner-view-catalog', 
        'pagination'=> true])


    </div>
    @endif


    <div class='container d-xl-block d-lg-block d-md-block d-sm-block d-none'>       
        <div class='block-view-catalog__description-catalog description-catalog'>
            @isset($catalog)
            {!!$catalog->description!!}
            @endisset 
        </div>  
    </div>


</div>
@endsection