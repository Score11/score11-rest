angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, MovieStart, DVDStart) {
        //$scope.moviestartData = {};
        $scope.loading = true;

        MovieStart.get()
            .success(function(data) {
                $scope.moviestarts = data;
                $scope.loading = false;
            });
        DVDStart.get()
            .success(function(data) {
                $scope.dvdstarts = data;
                $scope.loading = false;
            });
    });