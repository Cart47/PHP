<?php

class customerDB{
    
    public function insertCustomer($customer){
        
        $db = Database::getDB();
        
        $cust_fname = $customer->getFname();
        $cust_lname = $customer->getLname();
        $cust_phone = $customer->getPhone();
        $cust_email = $customer->getEmail();
        
        $query = "INSERT INTO customers
                    (cust_fname, cust_lname, cust_phone, cust_email)
                 VALUES
                    ('$cust_fname', '$cust_lname', '$cust_phone', '$cust_email')";
        
        $insert_count = $db->query($query);
        return $insert_count;
        
    }
}