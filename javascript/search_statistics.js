$(document).ready(function(){

    // Search on statistics pages
    var $rows = $('.collection .collection-item');
    $('#search').keyup(function(){
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        $rows.show().filter(function(){
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
    
});
