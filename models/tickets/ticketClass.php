<?php

class ticketdb {
    
    public function getTickets(){

        $db = Database::getDB();
        $query = 'SELECT * FROM tickets';     
        $result = $db->query($query);
        
       
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $tickets = array();
        
    foreach ($result as $row) {
            
            $ticket_type = new Ticket($row['tick_img'],
                                      $row['tick_type'],
                                      $row['tick_price']);
            $ticket_type->setId($row['tick_id']);        
            $tickets[] = $ticket_type; 
        }
        return $tickets;
    }  
}
