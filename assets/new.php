<?php

            //validation
            if(!$this->input->post('pay_type') || !$this->session->userdata('shipment_id'))
            {
                $data['error'] = "Please Select Payment Information or Shipment Information.";
            }
            else
            {
//                echo "<pre>";
//                print_r($this->input->post());
//                print_r($this->session->useerdata());
//                die();
                
                // bill insert
                $ins['register_id'] = $this->session->useerdata('user');
                $ins['shipment_id'] = $this->session->useerdata('shipment_id');
            
                $billprice = $this->md->my_query("SELECT SUM(`total_price`) AS sm FROM `tbl_cart` WHERE `register_id` = '" . $this->session->userdata('user') . "'")[0]->sm;
                
                if($this->session->useerdata('shipment_id'))
                {
                    $ins['promocode_id'] = $this->session->useerdata('promocode_id');
                    $codedetail = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$this->session->useerdata('promocode_id')))[0];
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
                $result = $this->md->my_select('tbl_bill',$ins);
                
                if($result == 1)
                {
                    $billid = $this->md->my_query("SELECT MAX(`bill_id`) AS mx FROM `tbl_bill`")[0]->mx;
                    
                    $cartdata = $this->md_my_select('tbl_cart','*',array('register_id'=> $this->session->userdata('user')));
                    
                    foreach ($cartdata as $item)
                    {
                        $tr['bil_id'] = $billid;
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
                    $this->md->my_delete('tbl_cart','*',array('register_id'=> $this->session->userdata('user')));
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

