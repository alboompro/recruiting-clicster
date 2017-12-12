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
	.directive('searchInput', function() {
		var ddo = {};

		ddo.restrict = "E";

    ddo.templateUrl = 'js/directives/search-input.html';

		return ddo;
	})
	.directive('defaultHeader', function() {
		var ddo = {};

		ddo.restrict = "E";

		ddo.templateUrl = 'js/directives/default-header.html';

		return ddo;
	})
	.directive('defaultFooter', function() {
		var ddo = {};

		ddo.restrict = "E";

		ddo.templateUrl = 'js/directives/default-footer.html';

		return ddo;
	})
	.directive('clientPanel', function() {
		var ddo = {};

		ddo.restrict = "E";

		ddo.templateUrl = 'js/directives/client-panel.html';

		return ddo;
	})
	.directive('clientPhoto', function() {

		var ddo = {};

		ddo.restrict = "AE";

		ddo.scope = {
				name: '@',
				url: '@'
		};

		ddo.template = '<img class="img-responsive center-block" src="{{url}}" alt="{{name}}"/>';

		return ddo;
})
