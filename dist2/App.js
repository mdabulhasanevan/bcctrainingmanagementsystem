var baseUrl="http://localhost/bitc/";
 var app = angular.module("myApp",['ngRoute','ui.bootstrap'] );

app.filter('beginning_data', function() {
    return function(input, begin) {
        if (input) {
            begin = +begin;
            return input.slice(begin);
        }
        return [];
    }
});


