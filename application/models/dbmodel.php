<?php

/*
 * @Description : Dbmodel the main model to access your database.
 * @Author      : Magdy Medhat
 * @Date        : 15/10/2011
 */

class Dbmodel extends CI_Model
{
    function Dbmodel()
    {
        parent::__construct();
        //support arabic in Database: set default collation to: utf8_unicode_ci
        //last inserted id: $this->db->insert_id()
        //check affected rows: $this->db->affected_rows()
        //count all records in a table: $this->db->count_all();
    }

    public function get_record($table, $id) 
    {
        return $this->db->where('id', $id)->limit('1')->get($table)->row_array();
    }

    public function insert_record($table, $data) 
    {
        $this->db->insert($table, $data);
    }

    public function update_record($table, $id, $data) 
    {
        $this->db->where('id', $id)->update($table, $data);
    }

    public function delete_record($table, $id) 
    {
        $this->db->where('id', $id)->delete($table);
    }
	
	public function get_patients()
	{
		$sql = "SELECT patient.id, patient.name, patient.gender, patient.phone, patient.age, patient.address, patient.doctor_id, patient.date, doctor.name as doctor_name FROM patient JOIN doctor ON patient.doctor_id = doctor.id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_patients_between($from, $to)
	{
		$sql = "SELECT scan.payment_type_id, scan.scan_type_id, patient.id, patient.name, patient.gender, patient.phone, patient.age, patient.address, patient.doctor_id, patient.date, doctor.name as doctor_name FROM patient JOIN doctor ON patient.doctor_id = doctor.id JOIN scan ON patient.id = scan.patient_id WHERE patient.date BETWEEN '$from' AND '$to'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		foreach($result as &$record)
		{
			$sql = "SELECT * FROM payment WHERE payment_type_id = $record[payment_type_id] AND scan_type_id = $record[scan_type_id]";
			$query = $this->db->query($sql);
			$res = $query->row_array();
			$record['amount'] = $res['amount'];
		}
		return $result;				
	}
	
	public function get_patients_bet($from, $to)
	{
		$sql = "SELECT patient.id, patient.name, patient.gender, patient.phone, patient.age, patient.address, patient.doctor_id, patient.date, doctor.name as doctor_name FROM patient JOIN doctor ON patient.doctor_id = doctor.id WHERE patient.date BETWEEN '$from' AND '$to'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_doctors()
	{
		return $this->db->get('doctor')->result_array();
	}
	
	public function get_scan_types()
	{
		return $this->db->get('scan_type')->result_array();
	}
	
	public function get_scan_types_of($payment_id)
	{
		$sql = "SELECT *, payment_type.type as payment_type, scan_type.type as scan_type FROM payment JOIN payment_type ON payment.payment_type_id = payment_type.id JOIN scan_type ON payment.scan_type_id = scan_type.id WHERE payment.payment_type_id = $payment_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_payment_types()
	{
		return $this->db->get('payment_type')->result_array();
	}
	
	public function get_payment_types_of($scan_id)
	{
		$sql = "SELECT *, payment_type.type as payment_type, scan_type.type as scan_type FROM payment JOIN payment_type ON payment.payment_type_id = payment_type.id JOIN scan_type ON payment.scan_type_id = scan_type.id WHERE payment.scan_type_id = $scan_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_scans($patient_id)
	{
		$sql = "SELECT *, scan_type.type as scan_type, payment_type.type as payment_type FROM scan JOIN payment_type ON scan.payment_type_id = payment_type.id JOIN scan_type ON scan.scan_type_id = scan_type.id WHERE scan.patient_id = $patient_id";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		foreach($result as &$record)
		{
			$sql = "SELECT * FROM payment WHERE payment_type_id = $record[payment_type_id] AND scan_type_id = $record[scan_type_id]";
			$query = $this->db->query($sql);
			$res = $query->row_array();
			$record['amount'] = $res['amount'];
		}
		return $result;
	}
	
}

?>