angular.module('agenda').controller('ClientsController', [ '$scope', '$http', 'clientResource', 'getClient', function($scope, $http, clientResource, getClient) {

	$scope.clients = [];
	$scope.clientFilter = '';
	$scope.message = '';

	clientResource.query(function(clients) {
		$scope.clients = clients;
	}, function(erro) {
		console.log(erro);
	});

	$scope.getCardClient = function(client) {
		getClient.get(client)
		.then(function(client) {
			$scope.client = client;
		})
		.catch(function(erro) {
			$scope.message = erro.message;
		});
	};

}]);
