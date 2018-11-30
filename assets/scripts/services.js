'use strict';
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