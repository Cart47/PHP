//jQuery Live Search plugin can be found at: http://www.designchemical.com/blog/index.php/jquery/live-text-search-function-using-jquery/

$(document).ready(function(){
    
   
    
    $("#search").keyup(function(){
      
        var filter = $(this).val(), count = 0;
        
        
        $(".artist").each(function(){
            
            
            if($(this).text().search(new RegExp(filter, "i")) <0 ){
                $(this).fadeOut();
            }
            else{
                $(this).show();
                count++;
            }
        });
        
        var numberItems = count;
        $("#filter-count").text("Matching Artists = "+count);
        
         if($("#filter-count").focusin())
        {
            $(this).show();
        }
        else if($("#filter-count").focusout())
        {
            $(this).hide();
        }
        else 
        {
            $(this).hide();
        }
        });
    
});