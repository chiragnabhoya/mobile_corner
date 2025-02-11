<?php

class Edit extends CI_Controller {

    public function security() {
        if (!$this->session->userdata('admin_lastlogin')) {
            redirect('admin-authentication');
        }
    }
    
    public function country() {
        $this->security();
        $wh['location_id'] = $this->uri->segment(2);

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['editcountry'] = $this->md->my_select('tbl_location', '*', $wh);

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('country', 'Country Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Country Name.', 'regex_match' => 'Please Enter  Valide Country Name.'));

            if ($this->form_validation->run() == TRUE) {
                $old = $data['editcountry'] [0]->name;
                $new = $this->input->post('country');
                $sql = "SELECT COUNT(*) AS cc FROM `tbl_location` WHERE `name` != '" . $old . "' AND `name` = '" . $new . "' AND `label` = 'country'";

                $count = $this->md->my_query($sql) [0]->cc;

                if ($count == 0) {
                    $ins['name'] = $this->input->post('country');

                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-country');
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "Country Already Exist.";
                }
            }
        }

        $this->load->view('admin/manage_country', $data);
    }
    
    
    public function state() {     
        
        $this->security();
        $wh['location_id'] = $this->uri->segment(2);
        $data['country'] = $this->md->my_select('tbl_location','*',array('label'=>'country'));
        $data['state'] = $this->md->my_query("SELECT c.`name` AS country , s.* FROM `tbl_location` AS c, `tbl_location` AS s WHERE c. `location_id` = s.`parent_id` AND s. `label` = 'state';");
        $data['editstate'] = $this->md->my_select('tbl_location', '*', $wh);

        if ($this->input->post('edit')) {
            
            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter State Name.', 'regex_match' => 'Please Enter  Valide State Name.'));

            if ($this->form_validation->run() == TRUE) {
                $old = $data['editstate'] [0]->name;
                $new = $this->input->post('state');
                echo $old."<br>".$new;
                
                $sql = "SELECT COUNT(*) AS cc FROM `tbl_location` WHERE `name` != '".$old."' AND `name` = '".$new."' AND `label` = 'state'";

                $count = $this->md->my_query($sql) [0]->cc;
                

                if ($count == 0) {
                    $ins['name'] = $this->input->post('state');

                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-state');
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "State Already Exist.";
                }
            }
        }

        $this->load->view('admin/manage_state', $data);
    }
    
    
    public function city()
    {
         $this->security();
        $wh['location_id']= $this->uri->segment(2);
         if($this->input->post('update'))
        {
            
            $this->form_validation->set_rules('country','','required',array('required'=>'Please Select Country'));
            $this->form_validation->set_rules('state','','required',array('required'=>'Please Select State'));
            $this->form_validation->set_rules('city','','required|regex_match[/^[a-zA-Z ]+$/]',array('required'=>'Please Select City.','regex_match'=>'Please Enter Valide City.'));
        
            if($this->form_validation->run() == TRUE)
                
            {
                               
               $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_location` WHERE `name` = '".$this->input->post('city')."' AND `parent_id` = '".$this->input->post('state')."' ")[0]->cc;
            
              if($count == 0)
              {
                  $ins['name'] = $this->input->post('city') ;
                  $ins['parent_id'] = $this->input->post('state') ;
                  $ins['label'] = 'city';
                  
                  $result = $this->md->my_update('tbl_location',$ins,$wh);
                  
                  if ($result == 1)
                  {
                      redirect('manage-city');  
                  }
              }
              else
              {
                 $data['error'] = "City Already Exist"; 
              }
            }
        }
        $data['editcity']= $this->md->my_select('tbl_location','*',$wh);
        $data['state']= $this->md->my_select('tbl_location','*',array('location_id'=>$data['editcity'][0]->parent_id));
        $data['country']= $this->md->my_select('tbl_location','*',array('label'=>'country'));
        $data['city']=$this->md->my_query("SELECT c.name AS country, s.name AS state ,ct.* FROM `tbl_location`AS c, `tbl_location` AS s, `tbl_location` AS ct WHERE c.`location_id` = s.`parent_id` AND s.`location_id` = ct.`parent_id`");
        
        $this->load->view('admin/manage_city',$data);
        
    }
    public function peta()
    {
        $wh['category_id']= $this->uri->segment(2);
         if($this->input->post('update'))
        {
           
            $this->form_validation->set_rules('main', '', 'required', array('required' => 'Please Select Main Category'));
            $this->form_validation->set_rules('sub', '', 'required', array('required' => 'Please Sub Category'));
            $this->form_validation->set_rules('peta', '', 'required', array('required' => 'Please Enter Peta Category.'));

            if ($this->form_validation->run() == TRUE) {
                 
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` = '" . $this->input->post('peta') . "' AND `parent_id` = '" . $this->input->post('sub') . "' ")[0]->cc;

                if ($count == 0) {
                 
                    $ins['name'] = $this->input->post('peta');
                    $ins['parent_id'] = $this->input->post('sub');
                    

                    $result = $this->md->my_update('tbl_category', $ins ,$wh);

                    if ($result == 1) {
                        redirect('manage-peta-category'); 
                    }
                } else {
                    $data['error'] = "Peta Category Already Exist";
                }
            }
        }

         $data['editpeta']= $this->md->my_select('tbl_category','*',$wh);
        $data['sub']= $this->md->my_select('tbl_category','*',array('category_id'=>$data['editpeta'][0]->parent_id));
        $data['main'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
        $data['peta'] = $this->md->my_query("SELECT m.name AS main, s.name AS sub ,pt.* FROM `tbl_category`AS m, `tbl_category` AS s, `tbl_category` AS pt WHERE m.`category_id` = s.`parent_id` AND s.`category_id` = pt.`parent_id`");
        
        
        $this->load->view('admin/petacategory',$data);
        
    }

    
    public function maincategory() {
        $this->security();
        $wh['category_id'] = $this->uri->segment(2);

        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
        $data['editmaincategory'] = $this->md->my_select('tbl_category', '*', $wh);

        if ($this->input->post('edit')) {

            $this->form_validation->set_rules('maincategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Main Category Name.', 'regex_match' => 'Please Enter  Valide Main Category Name.'));

            if ($this->form_validation->run() == TRUE) {
                $old = $data['editmaincategory'] [0]->name;
                $new = $this->input->post('maincategory');

                $sql = "SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` != '" . $old . "'AND `name` = '" . $new . "' AND `label` = 'maincategory'";

                $count = $this->md->my_query($sql) [0]->cc;

                if ($count == 0) {
                    $ins['name'] = $this->input->post('maincategory');


                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-main-category');
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "Main Category Already Exist.";
                }
            }
        }

        $this->load->view('admin/maincategory', $data);
    }
    
    
    public function subcategory() {     
        
        $this->security();
        $wh['category_id'] = $this->uri->segment(2);
        $data['main'] = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));
        $data['sub'] = $this->md->my_query("SELECT c.`name` AS maincategory , s.* FROM `tbl_category` AS c, `tbl_category` AS s WHERE c. `category_id` = s.`parent_id` AND s. `label` = 'subcategory';");
        $data['editsubcategory'] = $this->md->my_select('tbl_category', '*', $wh);

        if ($this->input->post('edit')) {           
       
            
            $this->form_validation->set_rules('sub', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Sub Category Name.', 'regex_match' => 'Please Enter  Valide Sub Category Name.'));

            if ($this->form_validation->run() == TRUE) {
                $old = $data['editsubcategory'][0]->name;
                $new = $this->input->post('sub');
               
                
                $sql = "SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` != '".$old."' AND `name` = '".$new."' AND `label` = 'subcategory'";

                $count = $this->md->my_query($sql) [0]->cc;
                

                if ($count == 0) {
                    $ins['name'] = $this->input->post('sub');

                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-sub-category');
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "Sub Category Already Exist.";
                }
            }
        }

        $this->load->view('admin/subcategory',$data);
    }

}
