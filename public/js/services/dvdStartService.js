angular.module('dvdStartService', [])
    .factory('DVDStart', function($http) {
        return {
            get : function() {
                return $http.get('api/dvdstart');
            }
        }
    });