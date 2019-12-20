<?php
include 'system/Controller.php';
class home extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data = array(
			'title'=> 'obaak'
			);
		$this->load->model('model1');
  		$m1 = new model1();
  		$result = $m1->getData();

  		$data['data'] = $result;
  		//$result = mysqli_fetch_assoc($result);
		$this->load->view('index',$data);
  }

  public function submit(){
    if(!isset($_POST)){
    	$data = array(
  			'title'=> 'obaak'
  			);
    	$name = Validation::name($_POST['name'],'required');
    	$email = Validation::email($_POST['email'],'required');
    	$phone = Validation::phone($_POST['phone'],'required');
    	$status = TRUE;
    	$data['form']['name'] = $name['data'];
    	$data['form']['email'] = $email['data'];
    	$data['form']['phone'] = $phone['data'];
    	if(strlen($name['error'])>0){
    		$data['form']['nameErr'] = $name['error'];
    		$status = FALSE;
    	}
    	if(strlen($email['error'])>0){
    		$data['form']['emailErr'] = $email['error'];
    		$status = FALSE;
    	}
    	if(strlen($phone['error'])>0){
    		$data['form']['phoneErr'] = $phone['error'];
    		$status = FALSE;
    	}
    	$this->load->model('model1');
    	$m = new model1();
    	if($status){
    		$noDuplicate = $m->isUnique($name['data'],$email['data'], $phone['data']);
    		if($noDuplicate){
  	  		$result = $m->submitData($name['data'],$email['data'], $phone['data']);
  	  		if($result){
  	  			$data['form']['message'] = 'Data Submitted Successfully';
            $data['form']['name'] = '';
            $data['form']['email'] = '';
            $data['form']['phone'] = '';
  	  		}
    		}
    		else{
    			$data['form']['message'] = 'Duplicate Data Found!!! Try Again...';
    		}
    	}
    	$result = $m->getData();
  	$data['data'] = $result;
  	$this->load->view('index',$data);
    }
    else{
    $this->index();
  }
  }
}