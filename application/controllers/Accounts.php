<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * The controller that handles account settings.
 * 
 * @author Haozhe Xie <zjhzxhz@gmail.com>
 */
class Accounts extends CI_Controller {
	/**
     * The contructor of the class.
     */
    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
    }

	/**
	 * The default method for the controller.
	 * It will render to login page.
	 */
	public function index() {
		$this->load->view('accounts/accounts.php');
	}

	public function order() {
		$this->load->view('accounts/order.php');
	}

	public function login() {
		$this->load->view('accounts/login.php');
	}

	public function reg() {
		$this->load->view('accounts/reg.php');
	}
}

/* End of file accounts.php */
/* Location: ./application/controllers/accounts.php */
