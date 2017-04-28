angular.module('app.services')
.service('Noticia', ['$resource','appConfig', function ($resource, appConfig) {
    return $resource(appConfig.baseUrl + 'noticia/:id',{id: '@id'},{
        update: {
            method: 'PUT'
        }
    });
}]);