<?php

class Seller extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        date_default_timezone_get('Asia/Kolkata');
    }

    public function verified_seller() {
        $wh['seller_id'] = $this->session->userdata('seller');
        $status = $this->md->my_select('tbl_seller','*',$wh)[0]->status;
        
        if ($status == 0)
        {
            redirect('seller-dashboard');
        }
    }
    
    public function security(){
        if (!$this->session->userdata('seller'))
        {
            redirect('seller-register-1');
        }
    }
    public function index() {
        $data = array();
        
        //login code
        if($this->input->post('login'))
        {
            //email varify
            $email = $this->input->post('seller_email');

            $record = $this->md->my_select('tbl_seller', '*', array('email' => $email));

            $count = count($record);

            if ($count == 1) {
                //password varify

                $ops = $this->encryption->decrypt($record[0]->password);

                if ($this->input->post('seller_ps') == $ops) {
                    
                    //session
                    $this->session->set_userdata('seller', $record[0]->seller_id);
                    $this->session->set_userdata('seller_lastlogin', date('Y-m-d h:i:s'));

                    redirect('seller-dashboard');
                } else {
                    $data['error'] = "Invalid Email or Password. Try Again.";
                }
            } else {
                $data['error'] = "Invalid Email or Password. Try Again.";
            }
        }

        //insert code
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('company_name', '', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required' => 'Please Enter Company Name.', 'regex_match' => 'Please Enter Valid Company Name'));
            $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[tbl_seller.email]', array('required' => 'Please Enter Email.', 'valid_email' => 'Please Enter Valid Email.', 'is_unique' => 'Email alrady Registered'));
            $this->form_validation->set_rules('password', '', 'required|min_length[4]|max_length[16]', array('required' => 'Please Enter Password.', 'min_length' => 'Please Enter Password Between 8-16 Character.', 'max_length' => 'Please Enter Password Between 8-16 Character.'));
            $this->form_validation->set_rules('cpassword', '', 'required|matches[password]', array('required' => 'Please Enter confirm Password.', 'matches' => 'Password Does Not Match.'));
            $this->form_validation->set_rules('mobile', '', 'required|numeric|exact_length[10]', array('required' => 'Please Enter Mobile No.', 'numeric' => 'Please Enter Valid Mobile No1.', 'exact_length' => 'Please Enter Valid Mobile No.'));
            $this->form_validation->set_rules('pan_no', '', 'required|regex_match[/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/]', array('required' => 'Please Enter PAN No.', 'regex_match' => 'Please Enter Valid PAN No.'));
            $this->form_validation->set_rules('gst_no', '', 'required|regex_match[/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$/]', array('required' => 'Please Enter GST No.', 'regex_match' => 'Please Enter Valid GST No.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('company_name', $this->input->post('company_name'));
                $this->session->set_userdata('email', $this->input->post('email'));
                $this->session->set_userdata('password', $this->input->post('password'));
                $this->session->set_userdata('mobile', $this->input->post('mobile'));
                $this->session->set_userdata('pan_no', $this->input->post('pan_no'));
                $this->session->set_userdata('gst_no', $this->input->post('gst_no'));
//                $this->session->unset_userdata('cpassword', $this->input->post('cpassword'));

                redirect('seller-register-2');
            }
        }

        $this->load->view('seller/seller_register_1',$data);
    }

    public function seller_register_2() {
        
        if (!$this->session->userdata('company_name')) {
            redirect('seller-register-1');
        }

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please Select Country.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please Select State.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please Select City.'));
            $this->form_validation->set_rules('address', '', 'required|min_length[20]', array('required' => 'Please Enter Address.', 'min_length' => 'Please Enert Address Minimum 20 Character.'));
            $this->form_validation->set_rules('pincode', '', 'required|numeric|exact_length[6]', array('required' => 'Please Enter Pincode.', 'numeric' => 'Please Enter Valid Pincode.', 'exact_length' => 'Please Enter Valid Pincode.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('country', $this->input->post('country'));
                $this->session->set_userdata('state', $this->input->post('state'));
                $this->session->set_userdata('city', $this->input->post('city'));
                $this->session->set_userdata('address', $this->input->post('address'));
                $this->session->set_userdata('pincode', $this->input->post('pincode'));


                redirect('seller-register-3');
            }
        }

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));

        $this->load->view('seller/seller_register_2', $data);
    }

    public function seller_register_3() {
        

        if (!$this->session->userdata('company_name') && !$this->session->userdata('country')) {
            redirect('seller-register-1');
        } else if ($this->session->userdata('company_name') && !$this->session->userdata('country')) {
            redirect('seller-register-2');
        }
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('bank_banificial_name', '', 'required', array('required' => 'Please Enter Bank Banificial Name.'));
            $this->form_validation->set_rules('bank_name', '', 'required', array('required' => 'Please Select Bank Name.'));
            $this->form_validation->set_rules('branch_name', '', 'required', array('required' => 'Please Select Branch Name.'));
            $this->form_validation->set_rules('ifsc_code', '', 'required|regex_match[/^[A-Za-z]{4}[a-zA-Z0-9]{7}$/]', array('required' => 'Please Enter IFSC Code.', 'regex_match' => 'Please Enter Valid IFSC Code.'));
            $this->form_validation->set_rules('ac_no', '', 'required|regex_match[/^[0-9]{10,16}$/]', array('required' => 'Please Enter Acount No.', 'regex_match' => 'Please Enter Valid Acount No.'));
            $this->form_validation->set_rules('cac_no', '', 'required|matches[ac_no]', array('required' => 'Please Enter Confirm Acount No.', 'matches' => 'Acount No Does Not Match.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('bank_banificial_name', $this->input->post('bank_banificial_name'));
                $this->session->set_userdata('bank_name', $this->input->post('bank_name'));
                $this->session->set_userdata('branch_name', $this->input->post('branch_name'));
                $this->session->set_userdata('ifsc_code', $this->input->post('ifsc_code'));
                $this->session->set_userdata('ac_no', $this->input->post('ac_no'));

                redirect('seller-register-4');
            }
        }



        $this->load->view('seller/seller_register_3');
    }

    public function seller_register_4() {
        $data=array();
        if (!$this->session->userdata('company_name') && !$this->session->userdata('country') && !$this->session->userdata('bank_name')) {
            redirect('seller-register-1');
        } else if ($this->session->userdata('company_name') && !$this->session->userdata('country') && !$this->session->userdata('bank_name')) {
            redirect('seller-register-2');
        } else if ($this->session->userdata('company_name') && $this->session->userdata('country') && !$this->session->userdata('bank_name')) {
            redirect('seller-register-3');
        }
                
        if ($this->input->post('add')) 
            {
            $config['upload_path'] = './seller_assets/profile/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1024 * 4;
            $config['file_name'] = "profile_".time();
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);

            if ($this->upload->do_upload('profile')) 
                {
                
                //insert array
                $ins['company_name']= $this->session->userdata('company_name');
                $ins['email']= $this->session->userdata('email');
                $ins['password']= $this->encryption->encrypt($this->session->userdata('password'));
                $ins['mobile']= $this->session->userdata('mobile');
                $ins['pan_no']= $this->session->userdata('pan_no');
                $ins['gst_no']= $this->session->userdata('gst_no');
                $ins['location_id']= $this->session->userdata('city');
                $ins['address']= $this->session->userdata('address');
                $ins['pincode']= $this->session->userdata('pincode');
                $ins['bank_banificial_name']= $this->session->userdata('bank_banificial_name');
                $ins['bank_name']= $this->session->userdata('bank_name');
                $ins['branch_name']= $this->session->userdata('branch_name');
                $ins['ifsc_code']= $this->session->userdata('ifsc_code');
                $ins['ac_no']= $this->session->userdata('ac_no');
                $ins['profile_pic']= "seller_assets/profile/". $this->upload->data('file_name');
                $ins['join_date']= date('Y-m-d');
                $ins['status'] = 0;
                                
                $result = $this->md->my_insert('tbl_seller', $ins);

                if ($result == 1) {
                    
                    $this->session->unset_userdata('company_name');
                    $this->session->unset_userdata('email');
                    $this->session->unset_userdata('password');
                    $this->session->unset_userdata('mobile');
                    $this->session->unset_userdata('pan_no');
                    $this->session->unset_userdata('gst_no');
                    $this->session->unset_userdata('country');
                    $this->session->unset_userdata('state');
                    $this->session->unset_userdata('city');
                    $this->session->unset_userdata('address');
                    $this->session->unset_userdata('pincode');
                    $this->session->unset_userdata('bank_banificial_name');
                    $this->session->unset_userdata('bank_name');
                    $this->session->unset_userdata('branch_name');
                    $this->session->unset_userdata('ifsc_code');
                    $this->session->unset_userdata('ac_no');
                    
                    $id = $this->md->my_query("SELECT MAX(`seller_id`) AS mx FROM `tbl_seller`")[0]->mx;
                    
                    $this->session->set_userdata('seller',$id);
                    $this->session->set_userdata('seller_lastlogin',date('Y-m-d h:i:s'));
                    
                    redirect('seller-dashboard');
                    
                    
                    
                }
            } else {
                $data['error'] = $this->upload->display_errors();
            }
        }
        $this->load->view('seller/seller_register_4',$data);
    }

    public function seller_dashboard() {
        $this->security();
        
        $this->load->view('seller/seller_dashboard');
    }

    public function seller_profile() {
        $this->security();
        $data= array();
        
        $this->load->view('seller/seller_profile',$data);
    }

    public function seller_update_profile() {
        $this->security();
        
        $wh['seller_id']= $this->session->userdata('seller');
        $data['record'] = $this->md->my_select('tbl_seller','*',$wh);
        
        if($this->input->post('edit'))
        {
            $this->form_validation->set_rules('company_name','','required|regex_match[/^[a-zA-Z ]+$/]',array('required'=>'Please Enter First Name.','regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('pan_no', '', 'required|regex_match[/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/]', array('required' => 'Please Enter PAN No.', 'regex_match' => 'Please Enter Valid PAN No.'));
            $this->form_validation->set_rules('gst_no', '', 'required|regex_match[/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$/]', array('required' => 'Please Enter GST No.', 'regex_match' => 'Please Enter Valid GST No.'));
            $this->form_validation->set_rules('email','','required|valid_email',array('required'=>'Please Enter Email.','valid_email' => 'Please Enter Valid Email.'));
            $this->form_validation->set_rules('mobile','','required|regex_match[/^[0-9]{10}$/]',array('required'=>'Please Enter Mobile No.','regex_match' => 'Please Enter Valid Mobile No.'));
            $this->form_validation->set_rules('bank_banificial_name', '', 'required', array('required' => 'Please Enter Bank Banificial Name.'));
            $this->form_validation->set_rules('bank_name', '', 'required', array('required' => 'Please Select Bank Name.'));
            $this->form_validation->set_rules('branch_name', '', 'required', array('required' => 'Please Select Branch Name.'));
            $this->form_validation->set_rules('ifsc_code', '', 'required|regex_match[/^[A-Za-z]{4}[a-zA-Z0-9]{7}$/]', array('required' => 'Please Enter IFSC Code.', 'regex_match' => 'Please Enter Valid IFSC Code.'));
            $this->form_validation->set_rules('ac_no', '', 'required|regex_match[/^[0-9]{10,16}$/]', array('required' => 'Please Enter Acount No.', 'regex_match' => 'Please Enter Valid Acount No.'));
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please Select Country.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please Select State.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please Select City.'));
            $this->form_validation->set_rules('address', '', 'required|min_length[20]', array('required' => 'Please Enter Address.', 'min_length' => 'Please Enert Address Minimum 20 Character.'));
            $this->form_validation->set_rules('pincode', '', 'required|numeric|exact_length[6]', array('required' => 'Please Enter Pincode.', 'numeric' => 'Please Enter Valid Pincode.', 'exact_length' => 'Please Enter Valid Pincode.'));

            
            if($this->form_validation->run()==TRUE)
            {
                $old_email= $data['record'][0]->email;
                $new_email= $this->input->post('email');
                
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_seller` WHERE `email` != '".$old_email."' AND `email` = '".$new_email."' ")[0]->cc;
                
                if($count==0)
                {
                    //profile
                    if (strlen($_FILES['profile']['name']) > 0)
                    {
                        $config['upload_path'] = './seller_assets/profile/';
                        $config['allowed_types'] = 'jpg|png';
                        $config['max_size'] = 1024 * 4;
                        $config['file_name'] = "seller_". time();
                        $config['encrypt_name'] = TRUE;

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('profile')) {

                            //new photo update
                            $ins['profile_pic'] = "seller_assets/profile/" . $this->upload->data('file_name');
                            
                        } else {
                            $data['error'] = $this->upload->display_errors();
                        }
                    }
                    
                    $ins['company_name']= $this->input->post('company_name');
                    $ins['pan_no']= $this->input->post('pan_no');
                    $ins['gst_no']= $this->input->post('gst_no');
                    $ins['email']= $this->input->post('email');
                    $ins['mobile']= $this->input->post('mobile');
                    $ins['bank_banificial_name']= $this->input->post('bank_banificial_name');
                    $ins['bank_name']= $this->input->post('bank_name');
                    $ins['branch_name']= $this->input->post('branch_name');
                    $ins['ifsc_code']= $this->input->post('ifsc_code');
                    $ins['ac_no']= $this->input->post('ac_no');
                    $ins['location_id']= $this->input->post('city');
                    $ins['address']= $this->input->post('address');
                    $ins['pincode']= $this->input->post('pincode');
                    
                    $result = $this->md->my_update('tbl_seller',$ins,$wh);
                    
                    if($result==1)
                    {
                        redirect('seller-profile');
                    }
                    
                }
                else
                {
                    $data['email_error'] = "Email Already Registered";
                }
            }
        }
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        $data['city'] = $this->md->my_select('tbl_location', '*', array('label' => 'city'));
        
        $this->load->view('seller/seller_update_profile',$data);
    }

    public function seller_add_new_product() {
        $this->security();
        $this->verified_seller();
        
        if($this->input->post('add_product'))
        {
            $this->form_validation->set_rules('main','','required',array('required'=>'Please Select Main Category.'));
            $this->form_validation->set_rules('sub','','required',array('required'=>'Please Select Sub Category.'));
            $this->form_validation->set_rules('peta','','required',array('required'=>'Please Select Peta Category.'));
            $this->form_validation->set_rules('description','','required|min_length[50]',array('required'=>'Please Enter Product Description.','min_length'=>'Please Enter Minimum 20 Character Description.'));
            $this->form_validation->set_rules('name','','required',array('required'=>'Please Enter Product Name.'));
            $this->form_validation->set_rules('code','','required',array('required'=>'Please Enter Product Code.'));
//            $this->form_validation->set_rules('price','','required',array('required'=>'Please Enter Product Price.'));
            $this->form_validation->set_rules('specification','','required|min_length[50]',array('required'=>'Please Enter Product Description.','min_length'=>'Please Enter Minimum 20 Character Specification.'));
            
            if ($this->form_validation->run()==TRUE)
            {
                $ins['seller_id'] = $this->session->userdata('seller');
                $ins['main_id'] = $this->input->post('main');
                $ins['sub_id'] = $this->input->post('sub');
                $ins['peta_id'] = $this->input->post('peta');
                $ins['code'] = $this->input->post('code');
                $ins['name'] = $this->input->post('name');
                $ins['description'] = $this->input->post('description');
                $ins['specification'] = $this->input->post('specification');
                $ins['status'] = 0;
                $ins['offer_id'] = 0;
                
                if($this->session->userdata('lastproduct'))
                {
                    $result = $this->md->my_update('tbl_product',$ins,array('product_id'=> $this->session->userdata('lastproduct')));
                }
                else
                {
                    $result = $this->md->my_insert('tbl_product',$ins);
                }
                
                
                if ($result==1)
                {
                    $mx = $this->md->my_query('SELECT MAX(`product_id`) AS mx FROM `tbl_product`')[0]->mx;
                    $this->session->set_userdata('lastproduct',$mx);
                    $this->session->set_userdata('productform',2); 
                    
                }
            }
        }
        
        if($this->input->post('back') )
        {
            $this->session->set_userdata('productform',1);             
        }
        
        if ($this->input->post('finish'))
        {
            $wh['product_id']= $this->session->userdata('lastproduct');
            $record = $this->md->my_select('tbl_product_image','*',$wh);
            $count = count($record);
                        
            if($count > 0)
            {
                $this->session->unset_userdata('lastproduct');
                $this->session->unset_userdata('productform');               
            }
            else
            {
                $data['img_err'] = "Please Upload Atleast One Image.";
            }
        }
        
        if ($this->input->post('add_img'))
        {
            $this->form_validation->set_rules('color','','required',array('reqired'=>'Please Select Product Colour.'));
            $this->form_validation->set_rules('ram','','required',array('reqired'=>'Please Select Product Ram.'));
            $this->form_validation->set_rules('internal','','required',array('reqired'=>'Please Select Product Internal Storage.'));
            $this->form_validation->set_rules('qty','','required|numeric',array('reqired'=>'Please Enter Product Stock.','numeric'=>'Please Enter Product Valid Stock.'));
            $this->form_validation->set_rules('price','','required|numeric',array('reqired'=>'Please Enter Product Price.','numeric'=>'Please Enter Valid Product Price.'));
            
            if($this->form_validation->run()==TRUE)
            {
             //blank
                if(strlen($_FILES['product']['name'][0]) >0)
                {
                    $multi_path= "";
                    
                    //count
                    $count = count($_FILES['product']['name'] );
                    
                    for($i=0;$i<$count;$i++)
                    {
                        $_FILES['single']['name'] = $_FILES['product']['name'][$i];
                        $_FILES['single']['type'] = $_FILES['product']['type'][$i];
                        $_FILES['single']['size'] = $_FILES['product']['size'][$i];
                        $_FILES['single']['tmp_name'] = $_FILES['product']['tmp_name'][$i];
                        $_FILES['single']['error'] = $_FILES['product']['error'][$i];
                    
                        //upload Array
                        $config['upload_path'] = './assets/product/';
                        $config['allowed_types'] = 'jpg|png';
                        $config['max_size'] = 1024 * 4;
                        $config['file_name'] = "product_".time()."_$i";
                        $config['encrypt_name'] = TRUE;

                        $this->load->library('upload', $config);

                        if($this->upload->do_upload('single'))
                        {
                            $path = "assets/product/".$this->upload->data('file_name');
                            $multi_path .= $path.",";
                            $photo_success = 1;
                            
                            $data['img_errorlist'][$i] = "Product Photo Uploaded Successfully.";
                        }
                        else
                        {
                            $data['img_errorlist'][$i] = "Please Select Valid Photo.";
                        }
                    } 
                    
                    if (isset($photo_success) && $photo_success == 1)
                    {
                        echo $multi_path = rtrim($multi_path,",");
                        
                        $ins['product_id'] = $this->session->userdata('lastproduct');
                        $ins['colour'] = $this->input->post('color');
                        $ins['ram'] = $this->input->post('ram');
                        $ins['internal_storage'] = $this->input->post('internal');
                        $ins['path'] = $multi_path;
                        $ins['qty'] = $this->input->post('qty'); 
                        $ins['price'] = $this->input->post('price');
                    
                        $result = $this->md->my_insert('tbl_product_image',$ins);
                        
                        if ($result == 1)
                        {
                            $data['success'] = "Product Image Upload Successfully.";
                        }
                    }
                    
                
                }
                else
                {
                    $data['img_error']= "Please Select Atleast One Image.";
                }
            }
        }
        
        if(!$this->session->userdata('productform'))
        {
            $this->session->set_userdata('productform',1);
        }
        
        $data['main'] = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));     
        $this->load->view('seller/seller_add_new_product',$data);
    }

    public function seller_view_all_product() {
        $this->security();
        $this->verified_seller();
        
        $wh['seller_id']= $this->session->userdata('seller');
        $data['product']= $this->md->my_select('tbl_product','*',$wh);
        
        $this->load->view('seller/seller_view_all_product',$data);
    }

    public function seller_setting() {
        $this->security();
        
        $data = array();
        
        if ($this->input->post('btn_ps')) {
            $cps = $this->input->post('cps');
            $wh['seller_id'] = $this->session->userdata('seller');
            $ps = $this->encryption->decrypt($this->md->my_select('tbl_seller', '*', $wh)[0]->password);

            if ($cps == $ps) {
                $this->form_validation->set_rules('nps','', 'required|min_length[3]|max_length[16]', array('required' => 'Please Enter New Password', 'min_length' => 'Please Enter Minimum 8 Character.', 'max_length' => 'Please Enter Maximum 16 character.'));
                $this->form_validation->set_rules('cnps','', 'required|matches[nps]', array('required' => 'Please Enter Confirm Password', 'matches' => 'Password Does Not Match'));

                if ($this->form_validation->run() == TRUE) {
                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));
                    $result = $this->md->my_update('tbl_seller', $ins, $wh);

                    if ($result == 1) {
                        
                        redirect('seller-logout');
                    }
                }
            } else {
                $data['error'] = "Current Password Not Match";
            }
        }
        
        $this->load->view('seller/seller_setting',$data);
    }

    public function seller_logout() {
        $wh['seller_id'] = $this->session->userdata('seller');
        $data['last_login'] = $this->session->userdata('seller_lastlogin');

        $this->md->my_update('tbl_seller', $data, $wh);

        $this->session->unset_userdata('seller');
        $this->session->unset_userdata('seller_lastlogin');

        redirect('seller-register-1');
        
//        $this->load->view('seller/seller_logout');
    }

}
