angular.module('agenda')
	.controller('AgendaController', function($scope, $http) {


		$http.get('http://localhost:8080/teste')
			.success(function(response) {
				console.log('Backend response: ', response);
		})
		.error(function(error) {
			console.log(error);
		});
	});
