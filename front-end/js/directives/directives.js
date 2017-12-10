angular.module('directives', [])
	.directive('clientList', function() {
    console.log('Diretivas-----');
		var ddo = {};

		ddo.restrict = "AE";
    ddo.transclude = true;

		ddo.scope = {
      client: '='
    };

		console.log('ddo: ', ddo.scope);

    ddo.templateUrl = 'js/directives/client-list.html';

		return ddo;
	})
