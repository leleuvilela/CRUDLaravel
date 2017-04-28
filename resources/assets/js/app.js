var app = angular.module('app', ['ngRoute','angular-oauth2','app.controllers', 'app.services', 'app.filters', 'ui.bootstrap.typeahead', 'ui.bootstrap.datepicker', 'ui.bootstrap.tpls']);

angular.module('app.controllers',['ngMessages','angular-oauth2']);
angular.module('app.services',['ngResource']);
angular.module('app.filters',[]);

app.provider('appConfig', ['$httpParamSerializerProvider', function($httpParamSerializerProvider){
    var config = {
        baseUrl: 'http://localhost:8000/',
        project: {
            status: [
                {value: 1, label: 'Não Iniciado'},
                {value: 2, label: 'Iniciado'},
                {value: 3, label: 'Concluído'}
            ]
        },
        utils: {
            transformRequest: function (data) {
                if(angular.isObject(data)){
                    return $httpParamSerializerProvider.$get()(data);
                }
                return data;
            },
            transformResponse: function(data,headers){
                var headersGetter = headers();
                if(headersGetter['content-type'] === 'application/json' || headersGetter['content-type'] === 'text/json'){
                    var dataJson = JSON.parse(data);
                    if(dataJson.hasOwnProperty('data')){
                        dataJson = dataJson.data;
                    }
                    return dataJson;
                }
                return data;
            }
        }
    };

    return {
        config: config,
        $get: function(){
            return config;
        }
    }
}]);

app.config(['$routeProvider', '$httpProvider', 'OAuthProvider', 'OAuthTokenProvider', 'appConfigProvider',
    function($routeProvider, $httpProvider, OAuthProvider, OAuthTokenProvider, appConfigProvider){
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    $httpProvider.defaults.headers.put['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    $httpProvider.defaults.transformRequest = appConfigProvider.config.utils.transformRequest;
    $httpProvider.defaults.transformResponse = appConfigProvider.config.utils.transformResponse;
    // $httpProvider.interceptors.push('aouthFixInterceptor');
    $routeProvider
        .when('/',{
            templateUrl:'build/views/home.html',
            controller:'HomeController'
        })
        .when('/home',{
            templateUrl:'build/views/dashboard.html',
            controller:'DashboardController'
        })
        .when('/login',{
            templateUrl:'build/views/login.html',
            controller:'LoginController'
        })
        .when('/logout',{
            resolve: {
                logout: ['$location', 'OAuthToken', function($location, OAuthToken){
                    OAuthToken.removeToken();
                    return $location.path('/login');
                }]
            }
        })
        .when('/clients',{
            templateUrl:'build/views/client/list.html',
            controller:'ClientListController'
        })
        .when('/clients/new',{
            templateUrl:'build/views/client/new.html',
            controller:'ClientNewController'
        })
        .when('/clients/:id/edit',{
            templateUrl:'build/views/client/edit.html',
            controller:'ClientEditController'
        })
        .when('/clients/:id/remove',{
            templateUrl:'build/views/client/remove.html',
            controller:'ClientRemoveController'
        })
        .when('/project',{
            templateUrl:'build/views/project/list.html',
            controller:'ProjectListController'
        })
        .when('/project/new',{
            templateUrl:'build/views/project/new.html',
            controller:'ProjectNewController'
        })
        .when('/project/:id/edit',{
            templateUrl:'build/views/project/edit.html',
            controller:'ProjectEditController'
        })
        .when('/project/:id/remove',{
            templateUrl:'build/views/project/remove.html',
            controller:'ProjectRemoveController'
        })
        .when('/project/:id/notes',{
            templateUrl:'build/views/project-note/list.html',
            controller:'ProjectNoteListController'
        })
        .when('/project/:id/notes/:noteId/show',{
            templateUrl:'build/views/project-note/note.html',
            controller:'ProjectNoteShowController'
        })
        .when('/project/:id/notes/new',{
            templateUrl:'build/views/project-note/new.html',
            controller:'ProjectNoteNewController'
        })
        .when('/project/:id/notes/:noteId/edit',{
            templateUrl:'build/views/project-note/edit.html',
            controller:'ProjectNoteEditController'
        })
        .when('/project/:id/notes/:noteId/remove',{
            templateUrl:'build/views/project-note/remove.html',
            controller:'ProjectNoteRemoveController'
        });
    OAuthProvider.configure({
        baseUrl: appConfigProvider.config.baseUrl,
        clientId: 'appid1',
        clientSecret: 'secret',
        grantPath: 'oauth/access_token'
    });
    OAuthTokenProvider.configure({
        name: 'token',
        options: {
            secure: false
        }
    });
}]);

app.run(['$rootScope', '$location', 'OAuth', function($rootScope, $location, OAuth) {
    $rootScope.$on('$routeChangeStart', function(event,next,current){
        if(next.$$route.originalPath != '/login'){
            if(!OAuth.isAuthenticated()){
                $location.path('login');
            }
        } else {
            if(OAuth.isAuthenticated()){
                $location.path('home');
            }
        }
    });
    $rootScope.$on('oauth:error', function(event, rejection) {
        // Ignore `invalid_grant` error - should be catched on `LoginController`.
        if ('invalid_grant' === rejection.data.error) {
            return;
        }

        // Refresh token when a `invalid_token` error occurs.
        if ('access_denied' === rejection.data.error) {
            return OAuth.getRefreshToken();
        }

        // Redirect to `/login` with the `error_reason`.
        return $location.path('/login');
    });
}]);