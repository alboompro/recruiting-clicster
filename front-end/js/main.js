angular.module('agenda', ['directives', 'services','ngAnimate', 'ngRoute', 'ngResource'])
	.config(function($routeProvider, $locationProvider) {

    // For some reason, this config isn't working
		// $locationProvider.html5Mode(true);

		$routeProvider.when('/#/clients', {
			templateUrl: 'partials/main.html',			
			controller: 'ClientsController'
		});

		$routeProvider.otherwise({redirectTo: '#/clients'});

	});
