angular.module('agenda').controller('ClientsController', function($scope, clientResource) {

	$scope.clients = [];
	$scope.filter = '';
	$scope.message = '';

	clientResource.query(function(clients) {
		$scope.clients = clients;
	}, function(erro) {
		console.log(erro);
	});

});
