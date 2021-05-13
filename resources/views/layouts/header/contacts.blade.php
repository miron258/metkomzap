<!---------------- Header Block Conctacts --------------------->
<div class="header__header-block-contacts header-block-contacts">
    <div class="row">

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
            <a class="header-block-contacts__logo logo" href="/">
                <img class="block-logo__img-logo img-logo d-xl-block d-lg-block d-md-none d-sm-none d-none" alt="Метком Запчасти" src="{{asset('img/tpl_img/logo.png')}} ">

                <!-- no index --->
                <img class="block-logo__img-logo img-logo d-xl-none d-lg-none d-md-block d-sm-block d-none" alt="Метком Запчасти" src="{{asset('img/tpl_img/tablet/logo_tablet.png')}} ">
                <!-- /no index --->

                <!-- no index --->
                <img class="block-logo__img-logo img-logo d-xl-none d-lg-none d-md-none d-sm-none d-block" alt="Метком Запчасти" src="{{asset('img/tpl_img/mobile/logo_mobile.png')}} ">
                <!-- /no index --->
            </a>
        </div>




        <div class="col-xl-3 col-lg-3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
            <div class="header-block-contacts__header-slogan header-slogan">
                Надежный поставщик запчастей
            </div>
        </div>

        <!----------- Hidden Block In SM Diplay and XS Display --------------->
        <div class="col-xl-2 col-lg-3 col-md-3 d-xl-block d-lg-block d-md-block d-sm-none d-none">
            <div class="header-block-contacts__header-email header-email">
                <a class="header-email__header-link-email header-link-email" href="mailto:metkom57@mail.ru">metkom57@mail.ru</a>
            </div>
        </div>
        <!----------- End Hidden Block In SM Diplay and XS Display --------------->

        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6">
            <div class="header-block-contacts__header-phone header-phone">
                <a class="header-phone__header-link-phone header-link-phone header-link-phone1" href="tel:+74862781046">+7-4862-78-10-46</a>
                <a class="header-phone__header-link-phone header-link-phone header-link-phone2" href="tel:+79307774747">+7-930-777-47-47</a>
            </div>
        </div>


        <div ng-controller="mainCtrl" class="col-xl-2 col-lg-2 col-md-3 d-xl-block d-lg-block d-md-block d-sm-none d-none">
            <div class="header-block-contacts__header-callback header-callback">
                <a ng-click='openCallbackModal()' class="header-callback__button-callback button-callback" href="">Обратный звонок</a>
            </div>
        </div>



    </div>
</div>
<!---------------- End Header Block Conctacts --------------------->
