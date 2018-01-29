//Api URL
const apiUri = 'http://localhost:8080/api/';

//Angular object
var app = angular.module('clicster', ['ngRoute']);

app.controller('getUsers', function($scope, $http, userFactory) {
    $scope.users = [];
    $http.get(apiUri + 'users')
        .success(function(data) {
            userFactory.users = data;
            $scope.users = userFactory.users;
        });
});

app.controller('getUser', function($scope, $sce, $http, $routeParams, userFactory) {
        $scope.user = "";
        $scope.googleMaps = function(data) {
            if(data)
            return $sce.trustAsResourceUrl("https://www.google.com/maps/embed/v1/place?key=AIzaSyD1BkO4y3-1D_ruz3nEr7qISCA8P9HTbm0&q=" + data.address);
        }

        $http.get(apiUri + 'user/' + $routeParams.id)
        .success(function(data) {
            $scope.user = data.user;
            $scope.user.index = $routeParams.index;

        });
        $scope.remove = function(id, index) {
            if(confirm("Deseja mesmo excluir esse usuário?")) {
                $http.delete(apiUri + "delete/" + id).success(function(data) {
                    
                        userFactory.users.splice(index, 1);
                        window.location.href = "#/";
                });
            }
        }
});

app.controller('createUser', function($scope, $http, userFactory) {

    $scope.contact  = {
        firstName: '',
        lastName: '',
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

    $scope.cancel = function() {
        $scope.contact  = {
            firstName: '',
            lastName: '',
            companyName: '',
            address: '',
            contacts: [
                {
                    type: '', contact: ''
                }
            ]
        }
    }

    $scope.create = function() {
        $http.post(apiUri + "create/user", $scope.contact)
            .success(function(data) {
                $scope.messageOk = 'Usuário cadastrado com sucesso!';
                
                _user = {
                    user_id: data.lastId,
                    first_name: $scope.contact.firstName,
                    last_name: $scope.contact.lastName, 
                    company_name: $scope.contact.companyName, 
                    address: $scope.contact.address
                };

                if(_user.user_id !== "")
                    userFactory.users.push(_user);

                //Reset everything if it's ok
                $scope.contact  = {
                    firstName: '',
                    lastName: '',
                    companyName: '',
                    address: '',
                    contacts: [
                        {
                            type: '', contact: ''
                        }
                    ]
                }
            });
    }
});

app.controller('updateUser', function($scope, $sce, $http, $routeParams, userFactory){
    $scope.user = [];    

    $scope.add = function() {
        $scope.user.contacts.push({
            type: '',
            contact: ''
        });
    };

    $scope.update = function() {
        if(confirm("Deseja mesmo editar esse usuário?")){
            $http.post(apiUri + "update/user/" + $routeParams.id, $scope.user).success(function(data) {
                
                    window.location.href = "#/";
            });
        }
    };

    $http.get(apiUri + 'user/' + $routeParams.id)
    .success(function(data) {
        $scope.user = data.user;
       
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
        .when('/user/:id/index/:index', {
            templateUrl: "app/partials/detail.html",
            controller: 'getUser'
        })
        .when('/edit/:id', {
            templateUrl: "app/partials/update.html",
            controller: 'updateUser'
        });
}]);