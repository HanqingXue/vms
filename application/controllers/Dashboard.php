<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * The controller that handles management requests.
 * 
 * @author Haozhe Xie <zjhzxhz@gmail.com>
 */
class Dashboard extends CI_Controller {
    /**
     * The contructor of the class.
     */
    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Vehicle_model');
        $this->load->model('Option_model');
        $this->load->model('Material_model');
        $this->load->model('Device_model');
    }

    /**
     * The default method for the controller.
     * It will render to dashboard page.
     */
    public function index() {
        $vehicles           = $this->Vehicle_model->get_vehicles();
        $number_of_vehicles = $vehicles == NULL ? 0 : count($vehicles);
        $options            = $this->get_options();

        $this->load->view('dashboard/index.php', array(
            'number_of_vehicles'    => $number_of_vehicles,
            'vehicles'              => $vehicles,
            'options'               => $options,
        ));
    }

    private function get_options() {
        $options_array = $this->Option_model->get_options();
        $options_map   = array();

        foreach ( $options_array as $option ) {
            $option_key     = $option['option_key'];
            $options_map[$option_key]  = array(
                'option_key'    => $option_key,
                'option_name'   => $option['option_name'],
                'option_value'  => $option['option_value'],
            );
        }
        return $options_map;
    }

    /**
     * Get the information of a vehicle.
     */
    public function get_vehicle() {
        $vehicle_id  = $this->input->get('vehicle_id');
        $vehicle     = $this->Vehicle_model->get_vehicle($vehicle_id);

        echo json_encode(array(
            'vehicle'   => $vehicle,
        ));
    }

    public function get_device() {
        $device_id = $this->input->get('device_id');
        $device   = $this->Device_model->get_device($device_id);

        echo json_encode(array(
            'device'  => $device
            ));
    }

    /**
     * The page used for vehicle management.
     */
    public function vehicles() {
        $vehicles           = $this->Vehicle_model->get_vehicles();
        $number_of_vehicles = $vehicles == NULL ? 0 : count($vehicles);

        $this->load->view('dashboard/vehicles.php', array(
            'number_of_vehicles'    => $number_of_vehicles,
            'vehicles'              => $vehicles,
        ));
    }

    /**
     * Get track of vehicle.
     * @return the track of vehicle
     */
    public function get_track_of_vehicle() {
        $vehicle_id     = $this->input->get('vehicle_id');
        $start_time     = $this->input->get('start_time');
        $end_time       = $this->input->get('end_time');

        $vehicle        = $this->Vehicle_model->get_vehicle($vehicle_id);
        $vehicle_name   = $vehicle['vehicle_name'];

        $file_name      = './application/cache/' . $vehicle_name . '.json';
        if ( file_exists($file_name) ) {
            $track      = file_get_contents($file_name);
            echo $track;
        }
    }

    /**
     * The page used for material dispatch.
     */
    public function materials() {
        $vehicles               = $this->Vehicle_model->get_vehicles();
        $materials              = $this->Material_model->get_materials();
        $number_of_materials    = $materials == NULL ? 0 : count($materials);

        $this->load->view('dashboard/materials.php', array(
            'vehicles'              => $vehicles,
            'number_of_materials'   => $number_of_materials,
            'materials'             => $materials,
        ));
    }

    /**
     * Get material allocation for a material.
     */
    public function get_material_allocation() {
        $material_id            = $this->input->get('material_id');
        $material_allocation    = $this->Material_model->get_material_allocation($material_id);

        echo json_encode($material_allocation);
    }

    /**
     * Dispatch materials.
     */
    public function do_dispatch_action() {
        $material_id        = $this->input->post('material_id');
        $from_vehicle_id    = $this->input->post('from_vehicle');
        $to_vehicle_id      = $this->input->post('to_vehicle');
        $dispatch_amount    = $this->input->post('dispatch_amount');

        $is_successful      = $this->Material_model->update_material_allocation(
                                $material_id, $from_vehicle_id, $to_vehicle_id, $dispatch_amount);
        echo json_encode(array(
            'is_successful' => $is_successful,
        ));
    }


   /**
    * @return [type]
    */
    public function do_add_vehicle_action() {
        $vehicle_name          = $this->input->post('vehicle_name');
        $vehicle_passengers    = $this->input->post('vehicle_passengers');
        $vehicle_drive_mode_id = $this->input->post('vehicle_drive_mode_id');
        $vehicle_category_id   = $this->input->post('vehicle_category_id');
        $vehicle_displacement  = $this->input->post('vehicle_displacement');

      $this->Vehicle_model->add_new_vehicle($vehicle_name, $vehicle_passengers, $vehicle_drive_mode_id, 
            $vehicle_category_id, $vehicle_displacement);
    }

    /***
    *   Add device
    */
    public function do_add_device_action() {
        $device_name             = $this->input->post('device_name');
        $device_number           = $this->input->post('device_number');
        $device_phone_num        = $this->input->post('device_phone_num');
        $device_phone_category   = $this->input->post('device_phone_category');
        $device_message_category = $this->input->post('device_message_category');
        $device_install_time     = $this->input->post('device_install_time');

        $this->Device_model->add_new_device($device_name, $device_number, $device_phone_num, 
            $device_phone_category, $device_message_category, $device_install_time);
    }

    public function do_update_device_action() {
        $device_name             = $this->input->post('device_name');
        $device_number           = $this->input->post('device_number');
        $device_phone_num        = $this->input->post('device_phone_num');
        $device_phone_category   = $this->input->post('device_phone_category');
        $device_message_category = $this->input->post('device_message_category');
        $device_install_time     = $this->input->post('device_install_time');

        $this->Device_model->update_device($device_name, $device_number, $device_phone_num, 
            $device_phone_category, $device_message_category, $device_install_time);
    }

    /***
    * Update the info of vehicle
    */
    public function do_update_vehicle_action() {
        $vehicle_name          = $this->input->post('vehicle_name');
        $vehicle_passengers    = $this->input->post('vehicle_passengers');
        $vehicle_drive_mode_id = $this->input->post('vehicle_drive_mode_id');
        $vehicle_category_id   = $this->input->post('vehicle_category_id');
        $vehicle_displacement  = $this->input->post('vehicle_displacement');

        $this->Vehicle_model->update_vehicle($vehicle_name, $vehicle_passengers, $vehicle_drive_mode_id, 
            $vehicle_category_id, $vehicle_displacement);
    }

    /**
    * The page used for system settings.
    */
    public function settings() {
        $this->load->view('dashboard/settings.php', array(
        ));
    }

    public function manage() {
        $this->load->view('dashboard/manage.php', array(
        ));
    }

    public function devices() {
        $this->load->view('dashboard/devices.php', array(
        ));
    }

    public function all_devices() {
        $devices           = $this->Device_model->get_devices();
        $number_of_devices = $devices == NULL ? 0 : count($devices);

        $this->load->view('dashboard/all-devices.php',array(
            'number_of_devices'    => $number_of_devices,
            'devices'              => $devices,
        ));
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
