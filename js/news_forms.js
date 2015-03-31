//alert('hi');
$(document).ready(function() {
    
    $('#external').hide();
    
    $('input[type="radio"]').change(function() {
  
        if($(this).val() === "1") {
            $('#internal').fadeOut(200);
            $('#external').fadeIn(200);
        }else{
            $('#external').fadeOut(200);
            $('#internal').fadeIn(200);
        }
        
    });
});