angular.module('app.controllers')
    .controller('NoticiaRemoveController',
        ['$scope', '$location', '$routeParams', 'Noticia', function ($scope, $location, $routeParams, Noticia) {
        $scope.noticia = new Noticia.get({id: $routeParams.id});

        $scope.remove = function(){
            $scope.noticia.$delete().then(function () {
                $location.path('/noticia');

            });
        }
    }]);