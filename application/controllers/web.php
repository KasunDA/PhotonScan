<?php

/*
 * @Description : Default back end controller for admin panel
 * @Author      : Magdy Medhat
 * @Date        : 12/21/2011
 */

class Web extends CI_Controller
{
    function Web()
    {
        parent::__construct();
    }

    function index()
    {
		$this->login();
    }
    
    function _display($view, $view_data = null)
    {
        $header_data['type'] = $this->session->userdata('type');
        $this->load->view('header', $header_data);
		
        $this->load->view($view, $view_data);
		
		$footer_data = null;
        $this->load->view('footer', $footer_data);
    }
	
    
    function _verify_access()
    {
        if(!$this->session->userdata('type'))
        {
            echo "not logged in";
            exit;
        }       
    }
    
	function login()
	{
		$this->load->view('login');
	}
	
    function login_done()
    {
    	//username, password
        $post = $this->input->post();

        foreach($post as &$parameter)
            $parameter = $this->mylib->security_filter($parameter);
        
        if($post['username'] == 'admin' && $post['password'] == 'admin')
        {
            $this->session->set_userdata('type','admin');
            redirect('web/home');
        }
		
		else if($post['username'] == 'photon' && $post['password'] == 'photon')
        {
            $this->session->set_userdata('type','normal');
            redirect('web/home');
        }
		
        else
        {
            $this->mylib->message_alert('wrong username or password');
			$this->login();
        }
    }
    
    function logout()
    {
        if($this->session->userdata('type'))
        {
            $this->session->unset_userdata('type');
            redirect('web/login');
        }
    }
    
    function home()
    {
        $this->_verify_access();
        $this->_display('home');
    }
	
	function patients()
	{
		$this->_verify_access();
		$data['patients'] = $this->dbmodel->get_patients();
		$this->_display('patients', $data);
	}

	function doctors()
	{
		$this->_verify_access();
		$data['doctors'] = $this->dbmodel->get_doctors();
		$this->_display('doctors', $data);
	}

	function scan_types()
	{
		$this->_verify_access();
		$data['scan_types'] = $this->dbmodel->get_scan_types();
		$this->_display('scan_types', $data);
	}

	function payment_methods()
	{
		$this->_verify_access();
		$data['payment_types'] = $this->dbmodel->get_payment_types();
		$this->_display('payment_methods', $data);
	}
	
	function income()
	{
		$this->_verify_access();
		$data['patients'] = $this->dbmodel->get_patients();
		$data['doctors'] = $this->dbmodel->get_doctors();
		//$data['income'] = 100;
		$this->_display('income', $data);
	}
	
	function income_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$data['to_date'] = $post['to_date'];
		$data['from_date'] = $post['from_date'];
		$data['patients'] =  $this->dbmodel->get_patients_bet($data['from_date'], $data['to_date']);
		$data['doctors'] = $this->db->where("date BETWEEN '$data[from_date]' AND '$data[to_date]'")->get('doctor')->result_array();
		
		$total_amount = 0;
		$patients = $this->dbmodel->get_patients_between($data['from_date'], $data['to_date']);
		foreach($patients as &$patient)
			$total_amount += $patient['amount'];
			
		$data['income'] = $total_amount;
		$this->_display('income', $data);
	}
	
	function add_doctor()
	{
		$this->_verify_access();
		$this->_display('add_doctor');
	}
	
	function add_doctor_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->insert_record('doctor', $post);
		redirect("web/doctors");
	}

	function add_patient()
	{
		$this->_verify_access();
		$data['doctors'] = $this->dbmodel->get_doctors();
		$this->_display('add_patient', $data);
	}

	function add_patient_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		unset($post['table-example_length']);
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->insert_record('patient', $post);
		redirect("web/patients");
	}
	
	function add_scan($patient_id)
	{
		$this->_verify_access();
		$data['patient'] = $this->dbmodel->get_record('patient', $patient_id);
		$data['scan_types'] = $this->dbmodel->get_scan_types();
		$data['payment_types'] = $this->dbmodel->get_payment_types();
		$this->_display('add_scan', $data);
	}
	
	function add_scan_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->insert_record('scan', $post);
		redirect("web/update_patient/$post[patient_id]");
		
	}
	
	function add_payment_method()
	{
		$this->_verify_access();
		$data['scan_types'] = $this->dbmodel->get_scan_types();
		$this->_display('add_payment_method', $data);
	}
	
	function add_payment_method_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->insert_record('payment_type', array('type'=>$post['type']));
		unset($post['type']);
		$last_insert_id = $this->db->insert_id();
		
		foreach($post as $scan_type_id => $amount)
		{
			$data['scan_type_id'] = $scan_type_id;
			$data['amount'] = $amount;
			$data['payment_type_id'] = $last_insert_id;
			$this->dbmodel->insert_record('payment', $data);
		}
		redirect("web/payment_methods");
	}
	

	function add_scan_type()
	{
		$this->_verify_access();
		$data['payment_types'] = $this->dbmodel->get_payment_types();
		$this->_display('add_scan_type', $data);
	}
	
	
	function add_scan_type_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->insert_record('scan_type', array('type'=>$post['type']));
		unset($post['type']);
		$last_insert_id = $this->db->insert_id();
		
		foreach($post as $payment_type_id => $amount)
		{
			$data['scan_type_id'] = $last_insert_id;
			$data['amount'] = $amount;
			$data['payment_type_id'] = $payment_type_id;
			$this->dbmodel->insert_record('payment', $data);
		}
		redirect("web/scan_types");
	}
	
	
	function update_doctor($id)
	{
		$this->_verify_access();
		$data['doctor'] = $this->dbmodel->get_record('doctor', $id);
		$this->_display('update_doctor', $data);
	}
	
	function update_doctor_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->update_record('doctor', $post['id'], $post);
		redirect("web/doctors");
	}
			
	function update_patient($id)
	{
		$this->_verify_access();
		$data['patient'] = $this->dbmodel->get_record('patient', $id);
		$data['doctors'] = $this->dbmodel->get_doctors();
		$data['scans'] = $this->dbmodel->get_scans($id);
		$this->_display('update_patient', $data);
	}
	
	function update_patient_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		unset($post['table-example_length']);
		unset($post['table-example2_length']);
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->update_record('patient', $post['id'], $post);
		redirect("web/patients");
	}	
	
	function update_payment_method($id)
	{
		$this->_verify_access();
		$data['payment_type'] = $this->dbmodel->get_record('payment_type', $id);
		$data['scan_types'] = $this->dbmodel->get_scan_types_of($id);
		$this->_display('update_payment_method', $data);
	}
	
	function update_payment_method_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->update_record('payment_type',$post['id'], array('type'=>$post['type']));
		unset($post['type']);
		$payment_type_id = $post['id'];
		unset($post['id']);
		
		foreach($post as $scan_type_id => $amount)
		{
			$data['scan_type_id'] = $scan_type_id;
			$data['amount'] = $amount;
			$data['payment_type_id'] = $payment_type_id;
			$this->db->update('payment', $data, "payment_type_id = $payment_type_id AND scan_type_id = $scan_type_id");
		}
		redirect("web/payment_methods");
	}
	
	function update_scan_type($id)
	{
		$this->_verify_access();
		$data['scan_type'] = $this->dbmodel->get_record('scan_type', $id);
		$data['scan_types'] = $this->dbmodel->get_payment_types_of($id);
		$this->_display('update_scan_type', $data);
	}	

	function update_scan_type_done()
	{
		$this->_verify_access();
		
		$post = $this->input->post();
		
		foreach($post as &$parameter)
			$parameter = $this->mylib->security_filter($parameter);
		
		$this->dbmodel->update_record('scan_type',$post['id'], array('type'=>$post['type']));
		unset($post['type']);
		$scan_type_id = $post['id'];
		unset($post['id']);
		
		foreach($post as $payment_type_id => $amount)
		{
			$data['scan_type_id'] = $scan_type_id;
			$data['amount'] = $amount;
			$data['payment_type_id'] = $payment_type_id;
			$this->db->update('payment', $data, "payment_type_id = $payment_type_id AND scan_type_id = $scan_type_id");
		}
		redirect("web/scan_types");
	}    
}

?>