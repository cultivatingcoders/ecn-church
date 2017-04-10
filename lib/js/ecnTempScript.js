/**
 * Created by cc15 on 5/31/2016.
 */

var app = angular.module('recall', []);

app.controller('recallCtrl', ["$scope", "$http", function($scope, $http) {
    $scope.churchName = "the Episcopal Church In FGHavajoland";
}]);