const apiUri = 'http://localhost:8080/api/';

var app = angular.module('clicster', ['ngRoute']);

app.controller('getUsers', function($scope, $http) {
    $scope.users = [];
    $http.get(apiUri + 'users')
        .success(function(data) {
            $scope.users = data;
        });
});

app.controller('getUser', function($scope, $sce, $http, $routeParams) {
    $scope.user = "";
        $scope.googleMaps = function(data) {
            return $sce.trustAsResourceUrl("https://www.google.com/maps/embed/v1/place?key=AIzaSyD1BkO4y3-1D_ruz3nEr7qISCA8P9HTbm0&q=" + data.street + ", " + data.city);
        }

    $http.get(apiUri + 'user/' + $routeParams.id)
        .success(function(data) {
            $scope.user = data.user;

        });
});

app.controller('createUser', function($scope, $http) {
    $http.post(apiUri + "create/user")
        .success(function() {
            console.log("Ok");
        });
});

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: "app/partials/home.html"
        })
        .when('/create', {
            templateUrl: "app/partials/create.html",
            controller: 'createUser'
        })
        .when('/user/:id', {
            templateUrl: "app/partials/detail.html",
            controller: 'getUser'
        });
}]);