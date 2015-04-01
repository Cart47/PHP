
$(".deletePublished").each(function(){
    
    $id = $(this).find('#pub_news_id').attr('value');

    console.log('published: ' + $id);
    
    $("#yes").click(function(){

        $('#modal_news_id').attr('value', $id);
        
        $("#delete_news").submit();
        return false;

    });
    
});

$(".deleteUnpublished").each(function(){
    
    $id = $(this).find('#unpub_news_id').attr('value');

    console.log('unpublished: ' + $id);
    
    $("#yes").click(function(){

        $('#modal_news_id').attr('value', $id);
        
        $("#delete_news").submit();
        return false;

    });
    
});

$(".modal_trigger").leanModal({top : 80, overlay : 0.6, closeButton: ".modal_close" });





