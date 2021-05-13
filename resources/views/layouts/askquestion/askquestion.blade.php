<!------------ Block Form ------------->
<form method="post"  ng-submit="sendForm(formAskQuestion.$valid)" name="formAskQuestion" class="block-form-question__form-question row form-question" novalidate>
   
    <div class="form-group form-group-phone col-xl-5">
        <label>Телефон</label>
        <input  ng-class="{ 'is-invalid' : errors.phone[0] }" required 
                ng-model="customer.phone" 
                ui-mask="@{{phoneMask}}"  
                ng-blur="removeMask()"
                ng-focus="placeMask()"
                ui-mask-placeholder
                ui-mask-placeholder-char="_" type="text" 
                class="form-control-plaintext form-control-plaintext-phone" ng-model="customer.phone" name="phone" id="staticPhone" placeholder="Ваш номер телефона">
        <div ng-class="{ 'd-block' : errors.phone[0] }" ng-bind="errors.phone[0]" class="invalid-feedback"></div>
    </div>
    <div class="form-group form-group-email col-xl-5">
        <label>E-mail</label>
        <input ng-class="{ 'is-invalid' : errors.email[0] }" required ng-model="customer.email"  type="text" class="form-control-plaintext form-control-plaintext-email" name="email" id="staticEmail" placeholder="Электронная почта">
        <div ng-class="{ 'd-block' : errors.email[0] }" ng-bind="errors.email[0]" class="invalid-feedback"></div>
    </div>

    <div class="w-100"></div>

    <button ng-disabled="formAskQuestion.$invalid" type="submit" class="btn btn-send-form-question btn-primary mb-2">
        <span class="btn-send-form-question__text-bt-send text-bt-send">Отправить</span>
    </button>

    <div class="w-100"></div>

    <div class="form-check form-check-personal-data">

        <label class="custom-control custom-checkbox">
            <input required ng-model="customer.isPersonData" class="custom-control-input" type="checkbox" id="prDataCheck">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-label">Даю согласие на обработку персональных данных</span>
        </label>

    </div>

</form>
<!------------ End Block Form ------------->