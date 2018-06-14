<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_model extends CI_Model {
    /**
     * 构造函数.
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 列出所有车辆的基本信息
     * @return Array 包含所有车辆基本信息的数组
     */
    public function get_options() {
        $sql = 'SELECT * FROM vms_options';
        $result_set = $this->db->query($sql);
        return $result_set->result_array();
    }

    /**
     * 列出某个车辆的基本信息.
     * @param  Long $vehicle_id 车辆的唯一标识符
     * @return 包含车辆基本信息的数组
     */
    public function get_vehicle($vehicle_id) {
        $sql = 'SELECT * FROM vms_vehicles NATURAL JOIN vms_vehicle_drive_modes WHERE vehicle_id = ?';

        $result_set = $this->db->query($sql, array($vehicle_id));
        return $result_set->row_array();
    }
}