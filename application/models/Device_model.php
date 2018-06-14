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
    /**
     * 列出所有设备的信息
     * @return Ａrray 包含所有设备信息的数组
     */
    public function get_devices() {
        $sql = 'SELECT * FROM vms_devices NATURAL JOIN vms_device_phone NATURAL JOIN vms_message_send';

        $result_set = $this->db->query($sql);
        return $result_set->result_array();
    }

    /**
     * 列出某个id的设备的所有的信息
     * @param  Long $vehicle_id 设备的唯一标识符
     * @return 包含车辆基本信息的数组
     */
    public function get_device($device_id) {
        $sql = 'SELECT * FROM vms_devices WHERE device_id = ? ';

        $result_set = $this->db->query($sql, array($device_id));
        return $result_set->row_array();
    }

    /**
     * @param varchar  $device_name　　　　　　       设备名称的标记，每一个记录由　‘设备’＋设备编号　组成　
     * @param varchar  device_number 　　　　       设备的编号
     * @param varchar  $device_phone_num        和设备关联的手机电话号码
     * @param int      $device_phone_category   设备关联运营商编号                    
     * @param int     　$device_message_category 信息发送方式的编号
     * @param date     $device_install_time     设备安装时间
     */
    public function add_new_device($device_name, $device_number, $device_phone_num, $device_phone_category, $device_message_category, $device_install_time) {
    	 $this->db->insert('vms_devices', array(
            'device_name'               => $device_name,          
            'device_number'             => $device_number, 
            'device_phone_num'          => $device_phone_num, 
            'device_phone_category_id'  => $device_phone_category,
            'device_message_category'   => $device_message_category,
            'device_install_time'       => $device_install_time
        ));

    }
    
    /**
     * @param varchar  $device_name　　　　　　       设备名称的标记，每一个记录由　‘设备’＋设备编号　组成　
     * @param varchar  device_number 　　　　       设备的编号
     * @param varchar  $device_phone_num        和设备关联的手机电话号码
     * @param int      $device_phone_category   设备关联运营商编号                    
     * @param int     　$device_message_category 信息发送方式的编号
     * @param date     $device_install_time     设备安装时间
     */
    public function update_device($device_name, $device_number, $device_phone_num, $device_phone_category, $device_message_category, $device_install_time) {
        $data = array(
            'device_number'             => $device_number, 
            'device_phone_num'          => $device_phone_num, 
            'device_phone_category_id'  => $device_phone_category,
            'device_message_category'   => $device_message_category,
            'device_install_time'       => $device_install_time
        );
        $this->db->where('device_name =', $device_name);
        $this->db->update('vms_devices', $data);
    }
}
