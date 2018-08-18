    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_model extends CI_Model {
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
    public function get_vehicles() {
        $sql = 'SELECT * FROM vms_vehicles NATURAL JOIN vms_vehicle_drive_modes NATURAL JOIN vms_vehicle_catrgories';

        $result_set = $this->db->query($sql);
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

    public function add_new_vehicle($vehicle_name, $vehicle_passengers, $vehicle_drive_mode_id, $vehicle_category_id, $vehicle_displacement) {
        $this->db->insert('vms_vehicles', array(
            'vehicle_name'              => $vehicle_name,
            'vehicle_passengers'        => $vehicle_passengers,
            'vehicle_drive_mode_id'     => $vehicle_drive_mode_id,
            'vehicle_category_id'       => $vehicle_category_id,
            'vehicle_displacement'      => $vehicle_displacement
        ));
    }

    public function update_vehicle($vehicle_name, $vehicle_passengers, $vehicle_drive_mode_id, $vehicle_category_id, $vehicle_displacement) {
        $data = array(
            'vehicle_passengers'        => $vehicle_passengers,
            'vehicle_drive_mode_id'     => $vehicle_drive_mode_id,
            'vehicle_category_id'       => $vehicle_category_id,
            'vehicle_displacement'      => $vehicle_displacement
            );
        $this->db->where('vehicle_name =', $vehicle_name);
        $this->db->update('vms_vehicles', $data); 
    }

    public function add_new_device($device_name, $device_number, $device_phone_num, $device_phone_category, $device_messeage_category) {
         $data = array(
            'vms_device_name' => $device_name,          
            'vms_device_number' =>  $device_number, 
            'vms_device_phone_num' => $device_phone_num, 
            'vms_device_phone_category' => $device_phone_category,
            'vms_device_message_category' => $device_messeage_category);
         $this->db->insert('vms_devices', $data);
    }
}