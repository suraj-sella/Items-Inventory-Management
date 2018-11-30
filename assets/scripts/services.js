'use strict';

app.factory('Excel', function($window){
    var uri='data:application/vnd.ms-excel;base64,',
        template='<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64=function(s){return $window.btoa(unescape(encodeURIComponent(s)));},
        format=function(s,c){return s.replace(/{(\w+)}/g,function(m,p){return c[p];})};
    return {
        tableToExcel: function(tableId,worksheetName){
            var table=$(tableId),
                ctx={worksheet:worksheetName,table:table.html()},
                href=uri+base64(format(template,ctx));
            return href;
        }
    };
});

app.factory('itemsFactory', function($resource) {
    var resource =  $resource('http://localhost/Items-Inventory-Management/index.php/api/items/items', 
        {},
        { update: { method: 'PUT' }}
    );

    resource.getAll = function(fromto) {
        return resource.query({fromto : fromto});
    };

    resource.insertItem = function(itemname) {
        return resource.save({name : itemname}, function(){
            // console.log('Entry save chal gaya bhai');    
        }, function(response){
            console.log(response);
        });
    };

    resource.deleteItem = function(itemname) {
        return resource.delete({name : itemname}, function(){
            // console.log('Item Delete chal gaya bhai');    
        }, function(response){
            console.log(response);
        });
    };

    resource.decrementItem = function(itemname) {
        return resource.update({name : itemname, action : 1}, function(){
            // console.log('Item Decrement chal gaya bhai');    
        }, function(response){
            console.log(response);
        });
    };

    resource.incrementItem = function(itemname) {
        return resource.update({name : itemname, action : 2}, function(){
            // console.log('Item Increment chal gaya bhai');    
        }, function(response){
            console.log(response);
        });
    };

    resource.editItem = function(item) {
        return resource.update({name : item, action : 3}, function(){
            // console.log('Item Edit chal gaya bhai');    
        }, function(response){
            console.log(response);
        });
    };

    return resource;
});