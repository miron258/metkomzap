@foreach($items as $item)
<!--Добавляем класс active для активного пункта меню-->
@php $classItem = (!empty($classMenu))? "item-".$classMenu: 'item';  @endphp

<li class="{{$classItem}}{{ (URL::current() == $item->url()) ? " active" : '' }}">
    <!-- метод url() получает ссылку на пункт меню (указана вторым параметром
    при создании объекта LavMenu)-->

    @php $classLink = (!empty($classMenu))? "link-item-".$classMenu: 'link-item';  @endphp
    @php $classLink2 = (!empty($item->class))? "link-class-".$item->class():''; @endphp

    <a class="{{$classLink}}" href="{{ $item->url() }}">{{ $item->title }}</a>
    <!--Формируем дочерние пункты меню
    метод haschildren() проверяет наличие дочерних пунктов меню-->


    @if($item->hasChildren())
    <ul class="sub-menu">
        <!--метод children() возвращает дочерние пункты меню для текущего пункта-->
        @include('custom-menu.custom-menu-items', ['items'=>$item->children()])
    </ul>
    @endif
</li>
@endforeach