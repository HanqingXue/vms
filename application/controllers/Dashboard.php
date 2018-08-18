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
        $this->load->model('Device_model');
    }

    /**
     * The default method for the controller.
     * It will render to dashboard page.
     */
    public function index() {
        $this->load->view('dashboard/indexcopy.php');

    }

    /**
     * Get the information of a vehicle.
     */

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
    public function notes() {
        $this->load->view('dashboard/notes.php');

    }


    public function tickets() {

        $this->load->view('dashboard/tickets.php');

    }

    public function hotels() {
        $this->load->view('dashboard/hotels.php');
    }
   
    public function travels() {
        $this->load->view('dashboard/travels.php');
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


    public function get_hotel() {
        $addr = $this->input->get('addr');
        $hotelName = $this->input->get('hotelName');
        $checkdate = $this->input->get('checkdate');

        $rooms = $this->Device_model->get_hotel($addr, $hotelName, $checkdate);

        $this->load->view('dashboard/result.php', array(
            'name' => $rooms['hotel_name'],
            'price' => $rooms['hotel_price'],
            'addr' => $rooms['hotel_addr'],
            'id' => $rooms['hotel_id'],
            'type' => $rooms['hotel_type'],
            'wifi' => $rooms['hotel_wifi']
        ));

    }

    public function get_rooms() {
        $hotelid = $this->input->get('hotelid');
        $rooms = $this->Device_model->get_rooms();

        echo gettype($rooms);
        echo count($rooms);
        echo json_encode($rooms);

        foreach ($rooms as $room) {
            # code...
            echo "\n";
        }
    }

    public function details() {
        $htid = $this->input->get('htid');
        $hotel_detail = $this->Device_model->get_room_details($htid);
        $room_list = $this->Device_model->get_rooms($htid);

        $this->load->view('dashboard/hoteldetail.php', array(
            'details' => $hotel_detail[0],
            'roomlist' =>  $room_list,
        ));
    }

    public function attract() {
    	$keyword = $this->input->get('keyword');
    	$attr = $this->Device_model->get_attractions($keyword);

    	if(count($attr) > 0) {
    		$this->load->view('dashboard/attract.php', array(
    			'keyword' => $keyword,
    			'attrs' => $attr,
        	));
        } else {
        	$this->load->view('dashboard/empty.php', array(
    			'keyword' => $keyword,
        	));
        }
    }

    public function bookticket() {
        $id = $this->input->get('id');
        $attr = $this->Device_model->get_attractions_byid($id);
        $tickets = $this->Device_model->get_ticket_by_attraction_id($id);
        
        echo json_encode($tickets);
        $this->load->view('dashboard/ticketbook.php', array(
            'attrs' => $attr[0],
            'tickets'=> $tickets,
        ));
    }

    public function youji() {
        $keyword = $this->input->get('keyword');
        $travels = $this->Device_model->get_travels($keyword);

        $this->load->view('dashboard/go.php', array(
            'travels' => $travels,
            'keyword' => $keyword,
        ));
    }

    public function xiangqing() {
        $id = $this->input->get('id');
        $travels = $this->Device_model->get_travel_content($id);
        $logs = $this->Device_model->get_logs($id);
        
        $this->load->view('dashboard/traveldetail.php', array(
            'travels' => $travels,
            'logs' => $logs,
            'keyword' => $id
        ));
    }

    public function goodsdetail() {
        $id = $this->input->get('id');
        $goods = $this->Device_model->get_goods_byid($id);

        $this->load->view('dashboard/goodsdetail.php', array(
            'goods' => $goods[0],
        ));
    }

    public function goods() {
        $goods = $this->Device_model->get_init_goods();
        $this->load->view('dashboard/good.php', array(
            'goods' => $goods
        ));
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
