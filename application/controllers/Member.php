<?php

class Member extends CI_Controller{
    
    public function __construct() 
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        
    }
    
    public function security() 
    {
        if (!$this->session->userdata('user'))
        {
            redirect ('login');
        }
    }

    public function member_change_password() 
    {
        $data = array();
        $this->security();
        
        if ($this->input->post('btn_ps')) {
            $cps = $this->input->post('cps');
            $wh['register_id'] = $this->session->userdata('user');
            $ps = $this->encryption->decrypt($this->md->my_select('tbl_register', '*', $wh)[0]->password);

            if ($cps == $ps) {
                $this->form_validation->set_rules('nps','', 'required|min_length[3]|max_length[16]', array('required' => 'Please Enter New Password', 'min_length' => 'Please Enter Minimum 8 Character.', 'max_length' => 'Please Enter Maximum 16 character.'));
                $this->form_validation->set_rules('cnps','', 'required|matches[nps]', array('required' => 'Please Enter Confirm Password', 'matches' => 'Password Does Not Match'));

                if ($this->form_validation->run() == TRUE) {
                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));
                    $result = $this->md->my_update('tbl_register', $ins, $wh);

                    if ($result == 1) {
                        
                        redirect('member-logout');
                    }
                }
            } else {
                $data['error'] = "Current Password Not Match";
            }
        }

        $this->load->view('member/member_change_password',$data);
    }
    
    public function member_dashboard() 
    {
        $this->security();

        $this->load->view('member/member_dashboard');
    }
    
    public function member_logout() 
    {
        echo "hi";
        
        $wh['register_id'] = $this->session->userdata('user');
        $data['last_login'] = $this->session->userdata('user_lastlogin');
        
        $this->md->my_update('tbl_register',$data,$wh);
        
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('user_lastlogin');
        
        redirect('login');
    }
    
    public function member_profile() 
    {
        $this->security();
        
        $wh['register_id']= $this->session->userdata('user');
        $data['record'] = $this->md->my_select('tbl_register','*',$wh);
        
        $this->load->view('member/member_profile',$data);
    }
    
    public function member_update_profile() 
    {
        $this->security();
        
        $wh['register_id']= $this->session->userdata('user');
        $data['record'] = $this->md->my_select('tbl_register','*',$wh);
        
        if($this->input->post('edit'))
        {
            $this->form_validation->set_rules('name','','required|regex_match[/^[a-zA-Z ]+$/]',array('required'=>'Please Enter First Name.','regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('email','','required|valid_email',array('required'=>'Please Enter Email.','valid_email' => 'Please Enter Valid Email.'));
            $this->form_validation->set_rules('mobile','','required|regex_match[/^[0-9]{10}$/]',array('required'=>'Please Enter Mobile No.','regex_match' => 'Please Enter Valid Mobile No.'));
            
            if($this->form_validation->run()==TRUE)
            {
                $old_email= $data['record'][0]->email;
                $new_email= $this->input->post('email');
                
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_register` WHERE `email` != '".$old_email."' AND `email` = '".$new_email."' ")[0]->cc;
                
                if($count==0)
                {
                    //profile
                    if (strlen($_FILES['profile']['name']) > 0)
                    {
                        $config['upload_path'] = './member_assets/profile/';
                        $config['allowed_types'] = 'jpg|png';
                        $config['max_size'] = 1024 * 4;
                        $config['file_name'] = "user_". time();
                        $config['encrypt_name'] = TRUE;

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('profile')) {

                            //new photo update
                            $ins['profile_pic'] = "member_assets/profile/" . $this->upload->data('file_name');
                            
                        } else {
                            $data['error'] = $this->upload->display_errors();
                        }
                    }
                    
                    $ins['name']= $this->input->post('name');
                    $ins['mobile']= $this->input->post('mobile');
                    $ins['email']= $this->input->post('email');
                    $ins['birth_date']= $this->input->post('birth_date');
                    $ins['gender']= $this->input->post('gender');
                    
                    $result = $this->md->my_update('tbl_register',$ins,$wh);
                    
                    if($result==1)
                    {
                        redirect('member-profile');
                    }
                    
                }
                else
                {
                    $data['email_error'] = "Email Already Registered";
                }
            }
        }
        
        
        $this->load->view('member/member_update_profile',$data);
    }
    
    public function member_address() 
    {
    $this->security();
       if ($this->input->post('add')) 
        {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please Select Country.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please Select State.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please Select City.'));
            $this->form_validation->set_rules('address','','required|min_length[20]', array('required' => 'Please Enter Address.','min_length' => 'Please Enter Minimum 20 Character.'));
            $this->form_validation->set_rules('gender','','required', array('required' => 'Please Select Address Type.'));
            
            if ($this->form_validation->run() == TRUE)
            {
                
                 $ins['register_id']= $this->session->userdata('user');
                 $ins['location_id']= $this->input->post('city');
                 $ins['address']= $this->input->post('address');
                 $ins['address_type']= $this->input->post('gender');

                $result = $this->md->my_insert('tbl_shipment',$ins);
                if ($result == 1)
                    {
                        $data['success'] = "Addresss Added Successfully.";
//                        redirect('member-address');
                    } 
                    else 
                    {
                        $data['error'] = "Something Went Wrong.";
                    }
                
            }
        }
        
        $wh['register_id']= $this->session->userdata('user');
        
        $data['address']=  $this->md->my_select('tbl_shipment', '*',$wh);
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        
        $this->load->view('member/member_address',$data);
    }
    
    public function member_wishlist() 
    {
        $this->security();        
        $this->load->view('member/member_wishlist');
    }
    
    public function member_review() 
    {
        $this->security();
        
        $this->load->view('member/member_review');
    }
    public function member_view_bill() 
    {
        $this->security();
        
        $this->load->view('member/member_view_bill');
    }
    
    public function member_view_order() 
    {
        $this->security();
        
        $this->load->view('member/member_view_order');
    }

}

