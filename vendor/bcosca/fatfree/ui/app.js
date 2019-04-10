var userApp = angular.module('userApp', []);

userApp.controller('UserController', function UserController($scope, $http) {
  getUser();
  function getUser() {
    $http.get('/vendor/bcosca/fatfree/users').
    then(function(response) {
        $scope.list = response.data.data;
    });
  }

  $scope.text = '';
  $scope.submit = function() {
    $http.post('/vendor/bcosca/fatfree/users', {
      'name': this.text
    }).
      then(function() {
      $scope.text = '';
        getUser();
      });
  }
});