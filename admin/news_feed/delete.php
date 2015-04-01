<div id="modal" class="popupContainer" style="display:none;">
    
    <header class="popupHeader">
        
        <h3>Please Confirm</h3>
        
    </header>

    <section class="popupBody">

        <h3>Permenantly delete this article?</h3>

        <form action="." method="post" id="delete_news">       
            <input type="hidden" name="news_id" id="modal_news_id" value="" />
            <input type="hidden" name="action" value="yesDelete" />
            <input type="submit" class="btn" name="yes" value="Yes" id="yes" />
            <a href="." class="btn xtra-pad">No</a>     
        </form>

    </section>
    
</div>