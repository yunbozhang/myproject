$(function() {
    //alert("OK");
    var a = function() {
        
        var gt='.goodsList span,.goodsList h2,.goodsList .Progress-bar';
    $(document).on('click',gt,function(){
     var id=$(this).attr('id');
     if(id){
         location.href=Gobal.Webpath+"/mobile/mobile/item/"+id;
     }           
    });
    };
    a()
});