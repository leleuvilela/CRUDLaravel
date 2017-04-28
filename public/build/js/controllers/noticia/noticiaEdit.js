angular.module('app.controllers')
    .controller('NoticiaEditController',
        ['$scope', '$location', '$routeParams', 'Noticia', function ($scope, $location, $routeParams, Noticia) {
        $scope.noticia = new Noticia.get({id: $routeParams.id});

        $scope.save = function(){
            if($scope.form.$valid) {
                Noticia.update({id: $scope.noticia.id}, $scope.noticia, function () {
                    $location.path('/noticia');
                })
            }
        }
    }]);