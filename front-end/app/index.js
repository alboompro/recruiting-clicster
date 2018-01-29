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
            if(data)
            return $sce.trustAsResourceUrl("https://www.google.com/maps/embed/v1/place?key=AIzaSyD1BkO4y3-1D_ruz3nEr7qISCA8P9HTbm0&q=" + data.address);
        }

    $http.get(apiUri + 'user/' + $routeParams.id)
        .success(function(data) {
            $scope.user = data.user;
        });
});

app.controller('createUser', function($scope, $http) {

    $scope.contact  = {
        name: '',
        companyName: '',
        address: '',
        contacts: [
            {
                type: '', contact: ''
            }
        ]
    }

    $scope.add = function() {
        $scope.contact.contacts.push({
            type: '',
            contact: ''
        });
    };

    $scope.create = function() {
        $http.post(apiUri + "create/user", $scope.contact)
            .success(function(data) {
                console.log(data);
            });
    }
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