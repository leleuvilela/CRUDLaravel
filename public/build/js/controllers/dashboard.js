angular.module('app.controllers')
    .controller('DashboardController', ['$scope', '$cookies', function ($scope, $cookies) {
        console.log($cookies.getObject('user'));
    }]);