$(document).ready(function(){
    $(".button").click(function(){
        var root = $(this).parent();

        if(root.find('i').hasClass('fa-caret-right')){
           root.find('i').removeClass('fa-caret-right').addClass('fa fa-caret-down')
        }
        else{
            root.find('i').removeClass('fa-caret-down').addClass('fa fa-caret-right')
        }


        root.find('.txt-guide').toggle();
    });
});


