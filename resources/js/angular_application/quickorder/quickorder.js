ngApp.controller('quickOrderCtrl', ['$scope', '$rootScope', '$compile', '$timeout', '$http', function ($scope, $rootScope, $compile, $timeout, $http) {


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



        $scope.fastOrder = function (isValid) {
//Вытаскиваем название и артикул товара на который был сделан Быстрый Заказ
            $scope.customer.name = angular.element('.header-block-show-product h1').text();
            if (isValid) {
                $http({
                    method: 'POST',
                    data: $.param($scope.customer),
                    url: "/saveformquickorder",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function (data) {
                    var response = data['data'];
                    var success = response['success'];
                    var message = response['message'];
                    if (success) {
                        $scope.message = message;
                        $scope.isSendForm = true;
                        $scope.customer.phone = "";
                        $scope.phoneMask = "+7 (999) 999-99-99";

                    } else {
                        $scope.message = message;
                        $scope.errors = response['errors'];
                    }


                    console.log(response);
                }, function (error) {
                    console.log(error);
                    alert('');
                });



            }



        };


    }]);

ngApp.directive('quickOrder', ['$http', '$compile', '$rootScope',
    function ($http, $compile, $rootScope) {
        //URK шаблона страницы для текущей директивы
        var templateUrl = '/quickorder';
        return {
            restrict: "EA", //Тип директивы в данный момент мы указали что созданная директива должна являться как элементтом так и директивой
            replace: true,
//            scope: {
//                items: '=',
//                openModalSave: '='
//            },
            templateUrl: templateUrl,
            link: function (scope, element, attrs) {






            }
        };
    }]);


