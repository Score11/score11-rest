angular.module('movieStartService', [])
    .factory('MovieStart', function($http) {
        return {
            get : function() {
                return $http.get('api/moviestart');
            }
        }
    });