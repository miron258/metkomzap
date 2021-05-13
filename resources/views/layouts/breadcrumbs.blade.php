<div class='block-breadcrumbs'>
    <div class='container'>
        <div class='row'>
            @if(isset($object))
            {{ Breadcrumbs::render($name, $object) }}
            @else
            {{ Breadcrumbs::render($name) }}
            @endif
        </div>
    </div>
</div>