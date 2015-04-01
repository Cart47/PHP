// ------------------------------------ //
// ---------- Delete Articles --------- //
// ------------------------------------ //

$(".deleteUnpublished").each(function(){
    
    $id = $(this).find('#unpub_news_id').attr('value');

    //console.log('unpublished: ' + $id);
    
    $(".yes1").click(function(){

        $('#modal_news_id').attr('value', $id);
        
        $("#delete_news").submit();
        return false;

    });
    
});


$(".deletePublished").each(function(){
    
    $id = $(this).find('#pub_news_id').attr('value');

    //console.log('published: ' + $id);
    
    $(".yes1").click(function(){

        $('#modal_news_id').attr('value', $id);
        
        $("#delete_news").submit();
        return false;

    });
    
});

// ------------------------------------- //
// ---------- Publish Articles --------- //
// ------------------------------------- //

$(".publishArticle").each(function(){
    
    $id = $(this).find('#publish_news_id').attr('value');

    //console.log('unpubbed: ' + $id);
    
    $(".yes2").click(function(){

        $('#modal_news_id').attr('value', $id);
        
        $("#publish_news").submit();
        return false;

    });
    
});

$(".modal_trigger").leanModal({top : 80, overlay : 0.6 });