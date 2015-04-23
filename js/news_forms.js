$(document).ready(function() {
    
    //Toggle change between radio buttons
    $('input[type="radio"]').change(function() {
  
        //If internal article radio button has value, hide the external news form
        if($(this).val() === "1") {
            $('.internal').fadeOut(200);
            $('.external').fadeIn(200);
        //If external article radio button has value, hide the internal news form
        }else{
            $('.external').fadeOut(200);
            $('.internal').fadeIn(200);
        }
        
    });
});