<v-modal class="vModal--default v-modal-callback">
    <v-dialog class="v-modal-callback__v-modal-disalog v-modal-dialog" role="dialog" fit middle>
        <button class="v-modal-callback__v-modal-callback-close v-modal-callback-close" ng-click="close()" aria-label="close" v-close></button>
        <div class="v-modal-callback__header-v-modal-callback header-v-modal-callback">
            <div ng-bind-html="header" class="header-v-modal-callback__top-header top-header"></div>
            <div ng-bind-html="title" class="header-v-modal-callback__bottom-header bottom-header"></div>
        </div>
        <div ng-bind-html="content" class="v-modal-callback__text-v-modal-callback text-v-modal-callback"></div>

        <div class="v-modal-callback__form-v-modal-callback form-v-modal-callback">
            <div ng-bind-html="message" class="form-v-modal-callback__message-form-v-modal-callback message-form-v-modal-callback"></div>
            <form  method="post"  ng-submit="sendForm(formCallback.$valid)" name="formCallback" class='form-callback' novalidate>

                <div class="form-row form-v-modal-callback__form-row-phone form-row-phone">
                    <div ng-class="{ 'has-error' : formCallback.phone.$invalid && !formCallback.phone.$pristine }" class="form-group form-group-phone">
                        <input placeholder="Номер телефона" ng-class="{ 'is-invalid' : errors.phone[0] }" required 
                               ng-model="customer.phone" 
                               ui-mask="@{{phoneMask}}"  
                               ng-blur="removeMask()"
                               ng-focus="placeMask()"
                               ui-mask-placeholder
                               ui-mask-placeholder-char="_" class="form-control form-control-phone" type="text" name="phone">
                        <div ng-class="{ 'd-block' : errors.phone[0] }" ng-bind="errors.phone[0]" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-row form-v-modal-callback__form-row-name form-row-name">
                    <div ng-class="{ 'has-error' : formCallback.name.$invalid && !formCallback.name.$pristine }" class="form-group form-group-name">
                        <input required ng-model="customer.name" class="form-control form-control-name" placeholder="Ваше имя" type="text" name="name">
                        <div ng-class="{ 'd-block' : errors.name[0] }" ng-bind="errors.name[0]" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-row form-v-modal-callback__form-row-btn-send form-row-btn-send">
                    <div class="form-group form-group-btn-send">
                        <button ng-disabled="formCallback.$invalid" type="submit" class="brn btn-primary btn-send-callback">
                            <span class="btn-send-callback__text-btn-send-callback text-btn-send-callback">отправить</span>
                        </button>
                    </div>
                </div>


            </form>
        </div>

    </v-dialog>
</v-modal>