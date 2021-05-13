ngApp.factory('callbackModal', function (vModal) {
    return vModal({
        controller: 'callbackModalCtrl',
        templateUrl: '/modalcallback'
    });
});
//Контроллера в шаблоне сайта
ngApp.controller('mainCtrl', function ($scope, callbackModal) {
    var dataModal = {
        header: 'Подбор запчастей',
        title: 'для вашей техники',
        content: 'Оставьте заявку<br>и получите выгодное предложение'
    };
    $scope.openCallbackModal = function () {
        callbackModal.activate(dataModal);
    };


});
//Контроллера самого модального окна
ngApp.controller('callbackModalCtrl', function ($scope, $http, callbackModal) {

    //SET UI MASK
    $scope.phoneMask = "+7 (999) 999-99-99";
    $scope.removeMask = function () {
        if ($scope.customer.phone) {
            if ($scope.customer.phone.length === 10) {
                $scope.phoneMask = "+7 (999) 999-99-99";
            }
        }
    };
    $scope.placeMask = function () {
        $scope.phoneMask = "+7 (999) 999-99-99";
    };
//END SET UI MASK



    $scope.sendForm = function (isValid) {

        if (isValid) {
            $http({
                method: 'POST',
                data: $.param($scope.customer),
                url: "/saveformcallback",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (data) {
                var response = data['data'];
                var success = response['success'];
                var message = response['message'];
                if (success) {
                    $scope.message = message;
                    angular.element('.form-callback').html('');
                } else {
                    $scope.message = message;
                    $scope.errors = response['errors'];
                }
                console.log(response);
            }, function (error) {
                console.log(error);

            });



        }

    };

    $scope.close = callbackModal.deactivate;
});


