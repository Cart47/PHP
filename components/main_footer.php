<div id="footContainer">
    
    <div class="left-col">
    
        <div id="footer-contact">
            <h3>Chorus in the Forest Head Office</h3>
            <p>123 Woods Road</p>
            <p>Moosonee, Ontario, Canada</p>
            <p>P0L 1Y0</p>
            
            <div id="contact">
                <p>(705) 555-3144</p>
                <p>admin@citf.ca</p>
            </div>
            
            <p id="copyright">&copy; 2015 Chorus in the Forest</p>
            
        </div>
        
    </div><!-- end left-col -->
    
    <div class="center-col">
    
        <h3>Sponsors</h3>
    
    </div><!-- end center-col -->
    
    <div class="right-col">
        
        <form action="../email_subscription" method="post" id="subscribe">

            <h3>Subscribe to our newsletter!</h3>

            <input type="hidden" name="email_id" />

            <input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>" />
            <?php echo $fields->getField('name')->showErrors();?>

            <br /><br />

            <input type="text" name="email" placeholder="Your Email" value="<?php echo $email; ?>" />
            <?php echo $fields->getField('email')->showErrors();?>

            <br /><br />

            <input type="submit" name="submit" value="Submit" />
            
        </form>
        
    </div><!-- end right-col -->
    
</div>