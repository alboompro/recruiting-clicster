angular.module('directives', [])
	.directive('clientList', function() {
		var ddo = {};

		ddo.restrict = "AE";
    ddo.transclude = true;

		ddo.scope = {
      client: '='
    };

    ddo.templateUrl = 'js/directives/client-list.html';

		return ddo;
	})
