angular.module('movieService', [])
    .factory('Movie', function($http) {
        return {
            show : function(id) {
                return $http.get('api/movie/' + id);
            }
        }
    });