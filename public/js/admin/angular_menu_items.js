global.appMenuItems = angular.module('appMenuItems', [
    require('restangular'),
    require('angular-route'),
    require('angular-localstorage')
]).run(['$rootScope', function ($rootScope) {

    }]);




appMenuItems.controller('menuItemsCtrl', ['$scope', '$timeout', 'menuItemsSrv', function ($scope, $timeout, menuItemsSrv) {


        //Получаем список пунктов меню
        menuItemsSrv.getMenuItems();





        $scope.createMenuItem = function () {

            alert("Создание");

        };

    }]);



appMenuItems.directive('menuItems',
        function () {
            //URK шаблона страницы для текущей директивы
            var templateUrl = '/menu_items/index.html';
            return {
                restrict: "EA", //Тип директивы в данный момент мы указали что созданная директива должна являться как элементтом так и директивой
                replace: true,
                templateUrl: templateUrl,
                link: function (scope, element, attrs) {
                    


                }
            };
        });
appMenuItems.directive('formMenuItem',
        function () {
            //URK шаблона страницы для текущей директивы
           var templateUrl = '/menu_items/form.html';
            return {
                restrict: "EA", //Тип директивы в данный момент мы указали что созданная директива должна являться как элементтом так и директивой
                replace: true,
                templateUrl: templateUrl,
                link: function (scope, element, attrs) {



                }
            };
        });
appMenuItems.service('menuItemsSrv', ['$http', '$q', '$timeout', function ($http, $q, $timeout) {

        /******* Получаем все папки гостей по конкретному туру *******/
        this.getMenuItems = function () {

//Формируем пост данные для запроса на сервер
            var def = $q.defer();
            var postData = new FormData();
            postData.append('ajax', 1);



//        console.log(email);

//Составляем объект запроса к серверу
            var request = {
                method: 'POST',
//            async:   false,
                url: '/cp/ajax_query/ajax_check_out_gdrive/ajax_get_list_tours',
                responseType: 'json',
                cache: true,
                headers: {
                    'Content-Type': undefined
                },
                data: postData
            };

            promise = $http(request);
            promise.then(fulfilled, rejected);

            //В случае успеха ответа сервера регистрируем функцию
            function fulfilled(response) {

                $timeout(function () {
                    def.resolve(response);
                }, 1000);


            }

            //В слачае ошибки ответа от сервера регистрируем функцию
            function rejected(error) {
                console.error(error.status);
            }
            return def.promise;
        };



        this.insertMenuItem = function () {

//Формируем пост данные для запроса на сервер
            var def = $q.defer();
            var postData = new FormData();
            postData.append('ajax', 1);



//        console.log(email);

//Составляем объект запроса к серверу
            var request = {
                method: 'POST',
//            async:   false,
                url: '/cp/ajax_query/ajax_check_out_gdrive/ajax_get_list_tours',
                responseType: 'json',
                cache: true,
                headers: {
                    'Content-Type': undefined
                },
                data: postData
            };

            promise = $http(request);
            promise.then(fulfilled, rejected);

            //В случае успеха ответа сервера регистрируем функцию
            function fulfilled(response) {

                $timeout(function () {
                    def.resolve(response);
                }, 1000);


            }

            //В слачае ошибки ответа от сервера регистрируем функцию
            function rejected(error) {
                console.error(error.status);
            }
            return def.promise;
        };



    }]);