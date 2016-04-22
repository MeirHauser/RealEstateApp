var my_app = angular.module('my_app', ['ngRoute']);

//  build factories
my_app.factory('HouseFactory', function($http){
  var factory = {};
  var houses;
  factory.getHouses = function(callback){
    $http.get('/angularhouses').success(function(output) {
      houses = output;
      callback(houses);
    })
  }
  factory.removeHouse = function(callback, id){
    $http.get('/angular/delete/' + id).success(function(data) {
      console.log(data);
      callback();
    })
    console.log(id);
  }
  return factory;
});

//  build controllers
my_app.controller('HouseController', function($scope, HouseFactory) {
  HouseFactory.getHouses(function(data){
    $scope.houses = data;
    angular.forEach($scope.houses, function(value){
      value.created_at = new Date(value.created_at);
      var locate = value.address.replace(" ", "+") + ',' + value.city.replace(" ", "+") + ',' + value.state.replace(" ", "+");
      value.image = locate;
    });
    console.log($scope.houses);
  });
  $scope.removeHouse = function(id){
    var confirmation = confirm("Delete House?");
    if (confirmation == true) {
      HouseFactory.removeHouse(function(){
        console.log('yo')
      }, id)
      HouseFactory.getHouses(function(data){
        $scope.houses = data;
        angular.forEach($scope.houses, function(value){
          value.created_at = new Date(value.created_at);
          var locate = value.address.replace(" ", "+") + ',' + value.city.replace(" ", "+") + ',' + value.state.replace(" ", "+");
          value.image = locate;
        });
        console.log($scope.houses);
      });
    }
  }
})