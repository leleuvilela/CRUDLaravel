angular.module('app.controllers')
    .controller('ProjectEditController',
        ['$scope', '$location', '$routeParams', 'Project', function ($scope, $location, $routeParams, Project) {
        $scope.projectNote = new ProjectNote.get({id: $routeParams.id, noteId: $routeParams.noteId});
        console.log($scope.projectNote);

        $scope.save = function(){
            if($scope.form.$valid) {
                ProjectNote.update({id: $routeParams.id, noteId: $scope.projectNote.id}, $scope.projectNote, function () {
                    $location.path('/project/' + $routeParams.id + '/notes')
                })
            }
        }
    }]);