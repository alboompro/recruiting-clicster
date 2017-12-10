angular.module('agenda', ['directives', 'services','ngAnimate', 'ngRoute', 'ngResource'])
	.config(function($routeProvider, $locationProvider) {

		$locationProvider.html5Mode(true);

		$routeProvider.when('/', {
			templateUrl: 'partials/main.html',
			// controller: 'AgendaController'
			controller: 'ClientsController'
		});

		$routeProvider.otherwise({redirectTo: '/'});

	});
