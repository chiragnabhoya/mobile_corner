<?php

class Pages extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set('Asia/Kolkata');
        
        //start offer
        $offer = $this->md->my_select('tbl_offer');
        foreach($offer as $single)
        {
            $today = date('Y-m-d');
            $start_date = $single->start_date;
            
            
            
            
            if($today >= $start_date)
            {
                //active offer 
                $this->md->my_update('tbl_offer',array('status'=>1),array('offer_id'=>$single->offer_id));
                
                //applied to product
                $category = $single->label;
                $min_price = $single->min_price;
                $max_price = $single->max_price;
                $id = $single->offer_id;
                $category_id = $single->category_id;
                
                if($category == "main")
                {
                    $this->md->my_sql("UPDATE `tbl_product` SET `offer_id` = $id WHERE `main_id` = $category_id AND `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `price` >= $min_price AND `price` <= $max_price )");                
                }
                else if($category == "sub")
                {
                    $this->md->my_sql("UPDATE `tbl_product` SET `offer_id` = $id WHERE `sub_id` = $category_id AND `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `price` >= $min_price AND `price` <= $max_price )");                
                }
                else if($category == "peta")
                {
                    $this->md->my_sql("UPDATE `tbl_product` SET `offer_id` = $id WHERE `peta_id` = $category_id AND `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `price` >= $min_price AND `price` <= $max_price )");                
                }
                else if($category == "All")
                {
                    $this->md->my_sql("UPDATE `tbl_product` SET `offer_id` = $id WHERE `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `price` >= $min_price AND `price` <= $max_price )");                
                }
            }
        }
        
        //end offer
        $offer = $this->md->my_select('tbl_offer');
        foreach($offer as $single)
        {
            $today = date('Y-m-d');
            $end_date = $single->end_date;
            
            
            if($today > $end_date)
            {   
                $whh['offer_id'] = $single->offer_id;
                
                //applied to product
                $this->md->my_update('tbl_product',array('offer_id'=>0),$whh);
                
                //deactive offer
                $this->md->my_update('tbl_offer',array('status'=>0),$whh);
                
            }
        }
    }
    

    public function index() {

        $this->load->view('index');
    }

    public function about() {

        $this->load->view('aboutus');
    }

    public function contact() {
        $data = array();
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valide Name.'));
            $this->form_validation->set_rules('mo', '', 'required|numeric|min_length[8]|max_length[12]', array('required' => 'Please Enter Mobile Number.', 'numeric' => 'Please Enter Valide Mobile Number.', 'min_length' => 'Please Enter Minimum 8 Number.', 'max_length' => 'Please Enter Maximum 12 Number.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email', array('required' => 'Please Enter Email.', 'valid_email' => 'Please Enter Valide Email.'));
            $this->form_validation->set_rules('subject', '', 'required|max_length[25]|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Email.', 'regex_match' => 'Please Enter Valide Subject.', 'max_length' => 'Please Enter Maximum 25 Charactor Subject.'));
            $this->form_validation->set_rules('message', '', 'required|min_length[20]', array('required' => 'Please Enter Message.', 'min_length' => 'Please Enter Minimum 20 Charactor Message.'));

            if ($this->form_validation->run() == TRUE) {
//                    $sql = "SELECT COUNT(*) AS cc FROM `tbl_location` WHERE `name` = '".$this->input->post('country')."' AND `label` = 'country'";
//                     $count = $this->md->my_query($sql) [0]->cc;
//                     if($count == 0)
//                     {
                $ins['name'] = $this->input->post('name');
                $ins['email'] = $this->input->post('email');
                $ins['mobile'] = $this->input->post('mo');
                $ins['subject'] = $this->input->post('subject');
                $ins['message'] = $this->input->post('message');
 

                $result = $this->md->my_insert('tbl_contact_us', $ins);
                if ($result == 1) {
                    $data['success'] = "Your Message Sent Successfully.";
                } else {
                    $data['error'] = "Something Went Wrong.";
                }




//                     }
//                     else
//                     {
//                         $data['error'] = "Country Already Exist.";
//                     }
            }
        }

        $this->load->view('contact', $data);
    }

    public function faqs() {

        $this->load->view('faqs');
    }

    public function feedback() 
    {
        $data = array();
        if ($this->input->post('add'))
        {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valide Name.'));
            $this->form_validation->set_rules('review', '', 'required|min_length[20]', array('required' => 'Please Enter Message.', 'min_length' => 'Please Enter Minimum 20 Charactor Message.'));

            if ($this->form_validation->run() == TRUE)
            {
                $ins['name'] = $this->input->post('name');
                $ins['message'] = $this->input->post('review');


                $result = $this->md->my_insert('tbl_feedback',$ins);
                if ($result == 1) 
                {
                    $data['success'] = "Your Message Sent Successfully.";
                } 
                else
                {
                    $data['error'] = "Something Went Wrong.";
                }

            }
        }

        $data['aa'] = "dvgfdfddh";
        $this->load->view('feedback',$data);
    }

    public function fpassword() {

        $this->load->view('fpassword');
    }

    public function login() {

        $data = array();
        if ($this->input->post('login')) 
        {
                        
            //email varify
            $email = $this->input->post('email');

            $record = $this->md->my_select('tbl_register', '*', array('email' => $email));

            $count = count($record);

            if ($count == 1) 
            {
                //password varify

                $ops = $this->encryption->decrypt($record[0]->password);

                if ($this->input->post('ps') == $ops) 
                {                 
                    //status check
                    if ($record[0]->status == 1)
                    {
                        // creat cookie
                        if ($this->input->post('svp')) 
                        {
                            $expire = 60 * 60 * 24 * 2;
                            set_cookie('user_email', $this->input->post('email'), $expire);
                            set_cookie('user_password', $this->input->post('ps'), $expire);
                        } 
                        else 
                        {
                            
                            if ($this->input->cookie('user_email')) 
                            {
                                set_cookie('user_email', '', -10);
                                set_cookie('user_password', '', -10);
                            }
                        }

                        $this->session->set_userdata('user', $record[0]->register_id);
                        $this->session->set_userdata('user_lastlogin', date('Y-m-d h:i:s'));

                        redirect('home');
                    }
                    else
                    {
                        $data['error'] = "Your Acount is Inactive. Please Contact Admin For Activation.";
                    }
                    
                    
                } else 
                {
                    $data['error'] = "Invalid Email or Password !";
                }
            } else 
            {
                $data['error'] = "Invalid Email or Password !";
            }
        }
        
        $this->load->view('login',$data);
    }

    public function privacy_policy() {

        $this->load->view('privacy_policy');
    }

    public function product_detail() {

        if ($this->uri->segment(2) == "")
        {
            redirect('product-list');
        }
        $this->load->view('product_detail');
    }

    public function product_list() {

        $this->load->view('product_list');
    }

    public function register() {

        $data =  array();
        
        if ($this->input->post('register'))
        {                                                         
            $this->form_validation->set_rules('name','','required|regex_match[/^[a-zA-Z ]+$/]',array('required'=>'Please Enter First Name.','regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('email','','required|valid_email|is_unique[tbl_register.email]',array('required'=>'Please Enter Email.','valid_email' => 'Please Enter Valid Email.','is_unique'=>'Email Already Registered.'));
            $this->form_validation->set_rules('mobile','','required|regex_match[/^[0-9]{10}$/]',array('required'=>'Please Enter Mobile No.','regex_match' => 'Please Enter Valid Mobile No.'));
            $this->form_validation->set_rules('ps','','required|min_length[4]|max_length[16]',array('required'=>'Please Enter Password.','min_length' => 'Please Enter Password Between 8 to 16 Character.','max_length' => 'Please Enter Password Between 8 to 16 Character.'));
            $this->form_validation->set_rules('cps','','required|matches[ps]',array('required'=>'Please Enter Password.','matches' => 'Password Does not matched.'));
           
                
                    if($this->form_validation->run()==TRUE)
                {
                     if($this->input->post('cd'))
                    {
                        $ins['name'] = $this->input->post('name');
                        $ins['email'] = $this->input->post('email');
                        $ins['mobile'] = $this->input->post('mobile');
                        $ins['password'] = $this->encryption->encrypt($this->input->post('ps'));
                        $ins['join_date'] = date('Y-m-d');
                        $ins['status'] = 1;

                        $result = $this->md->my_insert('tbl_register',$ins);

                        if($result == 1)
                        {
                            $mx = $this->md->my_query("SELECT MAX(register_id) AS mx FROM `tbl_register`")[0]->mx;

                            $this->session->set_userdata('user',$mx);
                            $this->session->set_userdata('user_lastlogin',date('Y-m-d h:i:s'));

                            redirect('member-dashboard');
                        }
                    }
                     else
                    {
                        $data['cd'] = "Please read and accept our terms and conditions.";
                    }
                }
          
            
           
           
            
        }
        
        $this->load->view('register',$data);
    }

    public function r_policy() {    

        $this->load->view('return_policy');
    }

    public function t_c() {

        $this->load->view('t&c');
    }
    
    public function view_cart() {

        if(!$this->session->userdata('user'))
        {
            redirect('login');
        }
        $this->load->view('view_cart');
    }
    
    public function checkout() {
        
        if(!$this->session->userdata('user'))
        {
            redirect('login');
        }
        
        $count = count($this->md->my_select('tbl_cart','*',array('register_id'=> $this->session->userdata('user'))));
        
        if ($count == 0)
        {
            redirect('view-cart');
        }
        
        //button click
        $data = array();
        if($this->input->post('checkout'))
        {
            //validation
            if(!$this->input->post('pay_type') || !$this->session->userdata('shipment_id'))
            {
                $data['error'] = "Please Select Payment Information or Shipment Information.";
            }
            else
            {
                
                // bill insert
                $ins['register_id'] = $this->session->userdata('user');
                $ins['shipment_id'] = $this->session->userdata('shipment_id');
            
                $billprice = $this->md->my_query("SELECT SUM(`total_price`) AS sm FROM `tbl_cart` WHERE `register_id` = '" . $this->session->userdata('user') . "'")[0]->sm;
                
                if($this->session->userdata('promocode_id'))
                {
                    $ins['promocode_id'] = $this->session->userdata('promocode_id');
                    $codedetail = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$this->session->userdata('promocode_id')))[0];
                    $amount = $codedetail->amount;
                    $ins['amount'] = $billprice - $amount;
                }    
                else
                {
                    $ins['promocode_id'] = 0;
                    $ins['amount'] = $billprice;
                }
                
                $ins['bill_date'] = date('Y-m-d');
                $ins['pay_type'] = $this->input->post('pay_type');
                
//                echo "<pre>";
//                print_r($ins);
//                print_r($this->session->userdata());
//                die();
                
                // transaction insert
                $result = $this->md->my_insert('tbl_bill',$ins);
                
                if($result == 1)
                {
                    $billid = $this->md->my_query("SELECT MAX(`bill_id`) AS mx FROM `tbl_bill`")[0]->mx;
                    
                    $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=> $this->session->userdata('user')));
                    
                    foreach ($cartdata as $item)
                    {
                        $tr['bill_id'] = $billid;
                        $tr['product_id'] = $item->product_id;
                        $tr['image_id'] = $item->image_id;
                        $tr['gross_price'] = $item->gross_price;
                        $tr['discount'] = $item->discount;
                        $tr['net_price'] = $item->net_price;
                        $tr['qty'] = $item->qty;
                        $tr['total_price'] = $item->total_price;
                        
                        $this->md->my_insert('tbl_transaction',$tr);
                    }
                    
                    // cart data delete session delete
                    $this->md->my_delete('tbl_cart',array('register_id'=> $this->session->userdata('user')));
                    $this->session->unset_userdata('shipment_id');
                    $this->session->unset_userdata('promocode_id');
                    
                    $pay_type = $this->input->post('pay_type');
                    
                    // transfer to route
                    if($pay_type == "cod")
                    {
                        redirect('order-success');
                    }
                    else
                    {
                        redirect('https://www.paypal.com/in/home');
                    }
                }
            }
        }

        $this->load->view('checkout',$data);
    }
    public function success()
    {
        
      $this->load->view('success');
    }
    

}
