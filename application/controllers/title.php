<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/REST_Controller.php');
class Title extends REST_Controller
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->model('title_model');
	}

	public function index_get()
	{
		if(!$this->get('id'))  
		{
			$this->response(NULL, 400);
		}

		$title = $this->title_model->get( $this->get('id') );

		if($title)
		{
			$this->response($title, 200); // 200 being the HTTP response code
		}

		else
		{
			$this->response(NULL, 404);
		}
	}

	public function index_post()
	{
		$result = $this->title_model->update($this->post('id'), array(
				'title' => $this->post('title')
			));

		if($result === FALSE)
		{
			$this->response(array('status' => 'failed'));
		}

		else
		{
			$this->response(array('status' => 'success'));
		}
	}
}

/* End of file title.php */
/* Location: ./application/controllers/title.php */