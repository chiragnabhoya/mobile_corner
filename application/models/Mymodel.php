<?php

class Mymodel extends CI_Model
{
    public function my_insert($table,$data)
    {
        return $this->db->insert($table,$data);
       
    }
    
     public function my_select($table , $column='*' ,$where=NULL)
    {
        $this->db->select($column);
        $this->db->from($table);
                
        if(isset($where))
        {
                   $this->db->where($where);
 
        }
        
        $recordset = $this->db->get();
        
        return $recordset->result();
       
    }
    
    public function my_query($sql)
    {
        
        $recordset = $this->db->query($sql);
        return $recordset->result();
    }
    
    public function my_sql($sql)
    {
        return $this->db->query($sql);
    }
    
    public function my_delete($table,$where)
    {
        return $this->db->delete($table,$where);
    }
    
    public function my_update($table,$data,$where)
    {
        return $this->db->update($table,$data,$where);
    }
    
    public function my_mailer( $to , $subject , $message ) 
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mobilecorner0101@gmail.com', // change it to yours
            'smtp_pass' => 'mobile@0101', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('mobilecorner0101@gmail.com'); // change it to yours
        $this->email->to($to);// change it to yours
        $this->email->subject($subject);
        
        $this->email->message($message);
        
        if($this->email->send())
        {
            return 1;
        }
        else
        {
//            return $this->email->print_debugger();
            return 0;
        }
    }
    
}