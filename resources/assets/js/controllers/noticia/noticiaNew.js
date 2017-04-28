angular.module('app.controllers')
    .controller('NoticiaNewController', ['$scope', '$location', 'Noticia', 'Upload', function ($scope, $location, Noticia, Upload) {
        // $scope.noticia = new Noticia();

        $scope.save = function(){
            if($scope.form.$valid) {
                $scope.upload = function (file) {
                    Upload.upload({
                        url: 'upload/url',
                        fields: {
                            'titulo': $scope.noticia.titulo,
                            'conteudo': $scope.noticia.conteudo
                        },
                        file: $scope.noticia.file
                    }).progress(function (evt) {
                        var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                        console.log('progress: ' + progressPercentage + '% ' + evt.config.file.name);
                    }).success(function (data, status, headers, config) {
                        console.log('file ' + config.file.name + 'uploaded. Response: ' + data);
                        $location.path('noticias');
                    }).error(function (data, status, headers, config) {
                        console.log('error status: ' + status);
                    });
                };
            }
        }
    }]);