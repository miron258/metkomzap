<!------------ Block Form ------------->
<form ng-submit="sendForm(formCallback.$valid)" name="formCallback" class="block-form-selection-spare-parts__form-selection-spare-parts align-items-end row form-selection-spare-parts" novalidate>
    <div class="form-group col-xl-4 col-lg-4 col-md-6 form-group-phone">
        <input ng-class="{ 'is-invalid' : errors.phone[0] }" required 
               ng-model="customer.phone" 
               ui-mask="@{{phoneMask}}"  
               ng-blur="removeMask()"
               ng-focus="placeMask()"
               ui-mask-placeholder
               ui-mask-placeholder-char="_" type="text" name="phone" ng-model="customer.phone"  type="text" class="form-control-plaintext form-control-plaintext-phone" id="staticPhoneSpareParts" placeholder="Номер телефона">
        <div ng-class="{ 'd-block' : errors.phone[0] }" ng-bind="errors.phone[0]" class="invalid-feedback"></div>
    </div>

    <div class="form-group col-xl-4 col-lg-4 col-md-6 form-group-fio">
        <input ng-class="{ 'is-invalid' : errors.name[0] }" required  ng-model="customer.name" type="text" class="form-control-plaintext form-control-plaintext-fio" id="staticFioSpareParts" placeholder="Ваше имя">
        <div ng-class="{ 'd-block' : errors.name[0] }" ng-bind="errors.name[0]" class="invalid-feedback"></div>
    </div>
    <div class="w-100 d-xl-none d-lg-none d-md-block d-sm-block d-block"></div>
    <div class="form-group col-xl-4 col-lg-4 col-12">
        <button ng-disabled="formCallback.$invalid" type="submit" class="btn btn-send-spare-parts btn-primary">
            <span class="btn-send-spare-parts__text-bt-send text-bt-send">Отправить</span>
        </button>
    </div>
</form>
<!------------ End Block Form -------------> 