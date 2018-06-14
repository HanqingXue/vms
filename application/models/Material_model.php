<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_model extends CI_Model {
    /**
     * 构造函数.
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 列出所有物资的基本信息
     * @return Array 包含所有物资基本信息的数组
     */
    public function get_materials() {
        $sql = 'SELECT * FROM vms_materials';

        $result_set = $this->db->query($sql);
        return $result_set->result_array();
    }

    /**
     * 列出某个物资的分配信息
     * @param  long $material_id 物资的唯一标识符
     * @return Array 包含所有物资分配信息的数组
     */
    public function get_material_allocation($material_id) {
        $sql = 'SELECT material_amount, vehicle_id, vehicle_name FROM vms_material_allocation NATURAL JOIN vms_vehicles WHERE material_id = ?';

        $result_set = $this->db->query($sql, array($material_id));
        return $result_set->result_array();
    }

    /**
     * 更新物资调度信息.
     * @param  long $material_id     物资的唯一标识符
     * @param  long $from_vehicle_id 物资减少的车辆ID
     * @param  long $to_vehicle_id   物资增加的车辆ID
     * @param  int  $material_amount 调度数量
     */
    public function update_material_allocation($material_id, $from_vehicle_id, $to_vehicle_id, $material_amount) {
        $sql = '';
        $this->db->trans_start();

        $this->db->where('material_id', $material_id);
        $this->db->where('vehicle_id', $from_vehicle_id);
        $this->db->set('material_amount', 'material_amount - ' . (int)$material_amount, FALSE);
        $this->db->update('vms_material_allocation');

        $this->db->where('material_id', $material_id);
        $this->db->where('vehicle_id', $to_vehicle_id);
        if ( $this->db->get('vms_material_allocation')->num_rows() != 0 ) {
            $this->db->where('material_id', $material_id);
            $this->db->where('vehicle_id', $to_vehicle_id);
            $this->db->set('material_amount', 'material_amount + ' . (int)$material_amount, FALSE);
            $this->db->update('vms_material_allocation');
        } else {
            $this->db->insert('vms_material_allocation', array(
                'material_id'       => $material_id,
                'vehicle_id'        => $to_vehicle_id,
                'material_amount'   => $material_amount
            ));
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}