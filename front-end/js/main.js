angular.module('agenda', ['ngAnimate', 'ngRoute', 'ngResource'])
	.config(function($routeProvider, $locationProvider) {

		$locationProvider.html5Mode(true);

		$routeProvider.when('/', {
			templateUrl: 'partials/main.html',
			controller: 'AgendaController'
		});

		$routeProvider.otherwise({redirectTo: '/'});

	});
