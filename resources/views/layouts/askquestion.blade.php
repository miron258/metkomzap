<div class="block-ask-question @isset($classBlock){{$classBlock}}@endisset">
    <div class="container">
        <div class="row">




            <!----------------- Block Banner Benefits ------------------->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 wrapper-block-banner-benefits">
                <div class="block-ask-question__block-banner-benefits block-banner-benefits">

                    <div class="block-banner-benefits__banner-benefits banner-benefits">

                        <div class="banner-benefits__row-list-benefits row-list-benefits">
                            <ul class="row-list-benefits__list-benefits list-benefits">
                                <li class="list-benefits__item-benefits item-benefits">Обеспечим<br> реальные сроки</li>
                                <li class="list-benefits__item-benefits item-benefits">Предложим<br> лучшие цены</li>
                            </ul>
                        </div>

                    </div>


                </div>
            </div>
            <!----------------- End Block Banner Benefits ------------------->


            <!----------------- Block Form Question ------------------->
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 wrapper-block-form-question">
                <div ng-controller="askQuestionCtrl" class="block-ask-question__block-form-question block-form-question">
                    <div class="block-form-question__header-block-form-question header-block-form-question">
                        <span class="green">Остались вопросы?</span> <br>
                        Найдем ответы, подберем <br>правильные запчасти! 
                    </div>
                    <div class="form-question__message-send-form message-send-form" ng-bind-html="message"></div>
                    <form-ask-question></form-ask-question>
                </div>
            </div>
            <!----------------- End Block Form Question ------------------->



        </div>
    </div>
</div>
