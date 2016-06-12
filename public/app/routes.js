var app =  angular.module('main-App',
    ['ngRoute','angularUtils.directives.dirPagination'])
     .constant('API_URL', 'http://localhost:8000/api/v1/');
;
app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'templates/home.html',
                controller: 'AdminController'
            }).
            when('/users', {
                templateUrl: 'templates/users.html',
                controller: 'UserController'
            });
}]);