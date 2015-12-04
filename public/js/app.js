var score11App = angular.module('score11App', ['mainCtrl', 'movieStartService', 'dvdStartService']);

score11App.filter('dateToISO', function() {
    return function(input) {
        input = new Date(input).toISOString();
        return input;
    };
});