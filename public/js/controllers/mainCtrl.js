var app = angular.module('mainCtrl', []);

app.controller('mainController', function($scope, $http, MovieStart, DVDStart) {
    $scope.loading = true;

    /*Movie.show(29455)
        .success(function(data) {
            $scope.movie = data;
        });*/
    MovieStart.get()
       .success(function(data) {
           $scope.moviestarts = data;
       });
    DVDStart.get()
        .success(function(data) {
            $scope.dvdstarts = data;
            $scope.loading = false;
        });
});