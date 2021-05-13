<div class="block-manufacturer">
    <div class="container">

        <div class="row">
            <div class="block-manufacturer__header-block-manufacturer header-block-manufacturer">
                <h2>Производители</h2>
            </div>
        </div>


        <div ng-app="appOwlCarousel" ng-controller="owlCarouselCtrl" class="block-manufacturer__block-slider-manufacturer row block-slider-manufacturer">
          
            <ng-owl-carousel class="block-slider-manufacturer__owlcarousel col-12 owlcarousel" owl-items="items" owl-properties="properties" owl-ready="ready($api)">

                <div class="col-12">
                    <div class="block-slider-manufacturer__box-owl-item box-owl-item">
                        <img alt="" class="box-owl-item__box-owl-item-img box-owl-item-img" src="{{ asset('img/usr_img/img_producer.png')}}">
                    </div>
                </div>

                <div class="col-12">
                    <div class="block-slider-manufacturer__box-owl-item box-owl-item">
                        <img alt="" class="box-owl-item__box-owl-item-img box-owl-item-img" src="{{ asset('img/usr_img/img_producer.png')}}">
                    </div>
                </div>

                <div class="col-12">
                    <div class="block-slider-manufacturer__box-owl-item box-owl-item">
                        <img alt="" class="box-owl-item__box-owl-item-img box-owl-item-img" src="{{ asset('img/usr_img/img_producer.png')}}">
                    </div>
                </div>


            </ng-owl-carousel>
        </div>



    </div>
</div>


