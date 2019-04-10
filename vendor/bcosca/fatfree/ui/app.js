var userApp = angular.module('userApp', []);

userApp.controller('UserController', function UserController($scope, $http) {
  $http.get('/vendor/bcosca/fatfree/users').
  then(function(response) {
      $scope.list = response.data.data;
  });
});