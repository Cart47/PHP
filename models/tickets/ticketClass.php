<?php

class ticketdb {
    
 /*-------------ALL TICKETS-----------------*/ 
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
    
/*-------------BY ID-----------------*/   
public static function getTicketsById($tick_id){
    
        $db = Database::getDB();
        $query = 'SELECT * FROM tickets
                  WHERE tick_id ="' . $tick_id . '"';
        
        $result = $db->query($query);
        $getTicket = $result->fetch();
        
        return $getTicket;
}
/*-------------UPDATE TICKET-----------------*/ 
  
    public static function updateTicket($tick_id, $tick_type, $tick_price){               
        
        $db = Database::getDB();
        
        $query = "UPDATE tickets 
                  SET tick_type = '$tick_type', 
                      tick_price = '$tick_price'
                  WHERE tick_id = $tick_id";
        
        $row_count = $db->exec($query);
        
        return $row_count;
                   
    }
    
/*-------------INSERT-----------------*/ 
    public static function insertTicket($ticket){
        
        $db = Database::getDB();

        $tick_type = $ticket->getType();
        $tick_price = $ticket->getPrice();

        $query = "INSERT INTO tickets
                    (tick_type, tick_price)
                 VALUES
                    ('$tick_type', '$tick_price')";
        
        $insert_count = $db->query($query);
    }
    
/*-------------DELETE-----------------*/ 
}
