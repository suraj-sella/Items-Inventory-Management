'use strict';
app.config(function($routeProvider, CORE_CONFIG) {
    $routeProvider
    .when("/", {
        templateUrl : CORE_CONFIG.SERVER_IP + "/assets/view/main.php"
    })
    .when("/blue", {
        templateUrl : "blue.htm"
    });
});