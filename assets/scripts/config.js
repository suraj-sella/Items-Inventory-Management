'use strict';
app.config(function($routeProvider, CORE_CONFIG) {
    $routeProvider
    .when("/", {
        templateUrl : CORE_CONFIG.SERVER_IP + "/assets/view/main.php",
        controller : "myController"
    })
    .when("/test", {
        templateUrl : CORE_CONFIG.SERVER_IP + "/assets/view/test.php",
        controller : "testController"
    })
    .otherwise({
        template : "<h1>None</h1><p>Nothing has been selected</p>"
    });
});