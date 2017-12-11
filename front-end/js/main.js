angular.module('agenda', ['directives', 'services','ngAnimate', 'ngRoute', 'ngResource'])
	.config(function($routeProvider, $locationProvider) {

		$locationProvider.html5Mode(true);

		$routeProvider.when('/clients', {
			templateUrl: 'partials/main.html',
			controller: 'ClientsController'
		});

		$routeProvider.when('/new', {
			templateUrl: 'partials/client.html',
			controller: 'ClientController'
		});

		$routeProvider.otherwise({redirectTo: '/clients'});

	});
