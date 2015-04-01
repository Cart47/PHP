<div id="modal_del" class="popupContainer" style="display:none;">
    
    <header class="popupHeader">
        
        <h3>Please Confirm</h3>
        
    </header>

    <section class="popupBody">

        <h3>Permenantly delete this article?</h3>

        <form action="." method="post" id="delete_news">       
            <input type="hidden" name="news_id" id="modal_news_id" value="" />
            <input type="hidden" name="action" value="delete" />
            <input type="submit" class="btn yes1" name="yes" value="Yes" />
            <a href="." class="btn xtra-pad">No</a>     
        </form>

    </section>
    
</div>