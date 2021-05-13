@extends('page.template')
@isset($page)
@section('meta_tag_title',  $page->name)
@section('meta_tag_description', $page->meta_tag_description)
@section('meta_tag_keywords', $page->meta_tag_keywords)
@endisset

@section('content')
<div class='block-view-page'>
    <div class='container'>
    
            <div class='block-view-page__header-block-view-page header-block-view-page'>
                @isset($page)
                <h1>
                    {{$page->name}}
                </h1>
                @endisset
            </div>

            <div class='block-view-page__description-page description-page'>
                @isset($page)
                {!!$page->description!!}
                @endisset
            </div>
      
    </div>
</div>
@endsection