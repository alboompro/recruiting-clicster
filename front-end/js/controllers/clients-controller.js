angular.module('agenda').controller('ClientsController', [ '$scope', 'clientResource', function($scope, clientResource) {
	
	$scope.clients = [];
	$scope.filter = '';
	$scope.message = '';

	// clientResource.query(function(clients) {
	// 	$scope.clients = clients;
	// }, function(erro) {
	// 	console.log(erro);
	// });

	$scope.clients = [
		{
			name: 'Geovane Pacheco da Rocha 1',
			company: 'Alboom',
			image: 'client.png'
		},
		{
			name: 'Geovane Pacheco da Rocha 2',
			company: 'Alboom',
			image: 'client.png'
		},
		{
			name: 'Geovane Pacheco da Rocha 3',
			company: 'Alboom',
			image: 'client.png'
		},
		{
			name: 'Geovane Pacheco da Rocha 4',
			company: 'Alboom',
			image: 'client.png'
		},
		{
			name: 'Geovane Pacheco da Rocha 5',
			company: 'Alboom',
			image: 'client.png'
		},
		{
			name: 'Geovane Pacheco da Rocha 6',
			company: 'Alboom',
			image: 'client.png'
		}
	]

}]);
