ngApp.directive('fotorama', [
    function () {
        return {
            template: '<div class="fotorama"></div>',
            replace: true,
            restrict: 'E',
            controller: 'fotoramaCtrl',
            scope: {
                options: '=',
                items: '='
            },
            link: function (scope, element, attrs) {

                // Initialize fotorama with the images
                scope.items.forEach(function (item) {
                    $('<img alt="' + item.title +'" src="' + item.imageUrl + '">').appendTo(element);
                });
                var $fotoramaDiv = $('.fotorama').fotorama();

                // Pass it the given options
                $fotoramaDiv.data('fotorama').setOptions(scope.options);
            }
        };
    }
]);
ngApp.controller('fotoramaCtrl', ['$scope',
    function ($scope) {

        $scope.options = {
            width: '100%',
            ratio: '1200/800',
            loop: true,
            keyboard: true,
            nav: 'thumbs',
            allowfullscreen: 'native',
            fit: 'cover'
                    // add other parameters here, see http://fotorama.io/customize/options/
        };
    }
]);

