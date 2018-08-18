<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device_model extends CI_Model {
    /**
     * 构造函数.
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_rooms($hotel_id) {
        $sql = 'SELECT * FROM tp_room where hotelId = ?';

        $result_set = $this->db->query($sql, $hotel_id);
        return $result_set->result_array();
    }

	
	public function get_room($room_id) {
        $sql = 'SELECT * FROM tp_room WHERE id = ? AND uid = ?';

        $result_set = $this->db->query($sql, array(
            'id'   => $room_id,
            'uid'  => 0
        ));
        return $result_set->row_array();
    }


    public function get_room_details($hotel_id) {
        $sql = 'SELECT * FROM vms_hotel where hotel_id = ?';

        $result_set = $this->db->query($sql, $hotel_id);
        return $result_set->result_array();
    }

    public function get_attractions($keyword) {
        $s  = "SELECT * FROM tp_attraction WHERE attr_name LIKE";
        $start = "'%";
        $end = "%'";
        $sql = $s. $start . $keyword . $end;
        $result_set = $this->db->query($sql);
        return $result_set->result_array();
    }

    public function get_attractions_byid($id) {
        $sql = 'SELECT * FROM tp_attraction where attrs_id = '. $id;
        $result_set = $this->db->query($sql);
        return $result_set->result_array();  
    }

    public function get_ticket_by_attraction_id($id) {
        $sql = 'SELECT * FROM tp_attr_tickets where ticket_attr_id = '. $id;
        $result_set = $this->db->query($sql, $id);
        return $result_set->result_array();
    }

    public function get_hotel($addr, $hotelName, $checkdate) {
        $sql = 'SELECT * FROM vms_hotel WHERE hotel_name= ? AND hotel_addr = ? AND hotel_check_day = ?';
        $result_set = $this->db->query($sql, array(
            'hotel_name'   => $hotelName,
            'hotel_addr'  => $addr,
            'hotel_check_day' => $checkdate
        ));
        return $result_set->row_array();
    }

    public function get_travels($id) {
        $sql = "SELECT * FROM tp_travelogs WHERE travels_name Like '%青海湖%' or travels_ketword LIKE '%青海湖%'";

        $result_set = $this->db->query($sql, $id);
        return $result_set->result_array();
    }

    public function get_travel_content($id) {
        $sql = 'SELECT * FROM tp_travelogs WHERE travels_id = ?';

        $result_set = $this->db->query($sql, $id);
        return $result_set->row_array();
    }   

    public function get_logs($id) {
        $sql = 'SELECT * FROM tp_log_sections WHERE travels_id = ?';
        $result_set = $this->db->query($sql, $id);
        return $result_set->result_array();
    }

    public function get_goods_byid($id) {
        $sql = 'SELECT * FROM tp_goods WHERE goods_id = ?';
        $result_set = $this->db->query($sql, $id); 
        return $result_set->result_array();
    }

    public function get_init_goods() {
        $sql = 'SELECT * FROM `tp_goods` LIMIT 0,4';
        $result_set = $this->db->query($sql);
        return $result_set->result_array();
    }

}
