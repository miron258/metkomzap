<div>
    <!--------- Form Quick Order --------->
    <form method="post"  ng-submit="fastOrder(formFastOrder.$valid)" name="formFastOrder" class='form-number-phone-quick-order form-inline' novalidate>
        <div ng-class="{ 'has-error' : formFastOrder.phone.$invalid && !formFastOrder.phone.$pristine }" class="form-group form-number-phone-quick-order form-group-phone">
            <input ng-class="{ 'is-invalid' : errors.phone[0] }" required 
                   ng-model="customer.phone" 
                   ui-mask="@{{phoneMask}}"  
                   ng-blur="removeMask()"
                   ng-focus="placeMask()"
                   ui-mask-placeholder
                   ui-mask-placeholder-char="_" name='phone' type="text" class="form-control-plaintext form-control-phone">

        </div>
        <button ng-disabled="formFastOrder.$invalid" type="submit" class="btn btn-primary btn-order">
            <span class='btn-order__text-order text-order'>заказать</span>
        </button>
    </form>
    <div ng-class="{ 'd-block' : errors.phone_number[0] }" ng-bind="errors.phone_number[0]" class="invalid-feedback"></div>
</div>
<!--------- End Form Quick Order --------->