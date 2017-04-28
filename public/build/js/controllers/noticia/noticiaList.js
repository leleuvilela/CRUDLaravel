angular.module('app.controllers')
    .controller('NoticiaListController', ['$scope', 'Noticia', function ($scope, Noticia) {
        $scope.noticia = Noticia.query();

    }]);