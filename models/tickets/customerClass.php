<?php

class customerDB{
    
/*--------------GET CUSTOMERS---------------*/
/*
public function getCustomers(){
    
    $db = Database::getDB();
    $query = "SELECT * FROM customers";
    $result = $db->query($query);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $customers = array();
    
    $customer = new Customer($row['cust_id'],
                             $row['cust_fname'],
                             $row['cust_lname'],
                             $row['cust_phone'],
                             $row['cust_email']
                            )
    
    return $customers;
    
}

*/
/*--------------INSERT CUSTOMER---------------*/
    
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