
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = "<"+slider.value+"€";
slider.oninput = function() {
    output.innerHTML = "<"+this.value+"€";
};
var app = angular.module('myApp', []);
app.controller('ContentCtrl', function ($scope, $http){
    $http({
        method: 'GET',
        url: 'requetejson.php'
    }).then(function (data){
        $scope.contents = data;
        console.log(data);
    },function (error){
        alert(error);
        console.log($scope.contents);
    });
    $scope.moyen = 13225;

});


