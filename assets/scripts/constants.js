'use strict';
var WEB_URL = "http://"+location.hostname;
WEB_URL=location.origin+location.pathname;
app.constant('CORE_CONFIG', {
    HTTP_PROTOCOL: 'http://',
    SERVER_IP: WEB_URL,
    WEB_SERVICE: WEB_URL + 'index.php/api',
});