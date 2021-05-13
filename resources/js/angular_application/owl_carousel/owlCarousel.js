ngApp.controller('owlCarouselCtrl', ['$scope', '$timeout', function ($scope, $timeout) {
        var owlAPi;
        $scope.items = [1, 2, 3, 4, 5, 6, 7, 8, 10];

     
        $scope.properties = {
            // autoHeight:true,
            animateIn: 'fadeIn',
            loop: false,
            margin: 10,
            navText: ['<span>', '<span>'],
            responsiveClass: true,
            lazyLoad: true,
            items: 1,
            nav: false,
            navContainer: '#nav-manufacturer',
            dots: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }

        };

        $scope.ready = function ($api) {
            owlAPi = $api;



        };

    }]);

