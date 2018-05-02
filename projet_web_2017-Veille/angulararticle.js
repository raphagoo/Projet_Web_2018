var app = angular.module('myApp', []);
app.controller('ContentCtrl', function ($scope, $http){
    $http({
        method: 'GET',
        url: 'gallerie.php'
    }).then(function (data){
        $scope.contents = data;
        console.log(data);
    },function (error){
        alert(error);
        console.log($scope.contents);
    });

});