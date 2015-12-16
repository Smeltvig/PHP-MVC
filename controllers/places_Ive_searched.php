<?php
class places_Ive_searched extends Controller{
	protected $model;
	function __construct(){
		parent::__construct();
		require_once 'models/places_Ive_searched_model.php';
		$this->model = new places_Ive_searched_model();
		
	}
	public function GetAllCompanies($arg = false){ 
		$model = $this->model;
		$arrayobject = $model->GetAllCompanies();
		$ObjectDTO = new Convert();
		$companies = $ObjectDTO->toObject($arrayobject);
		$this->View->msg = $companies;
		$this->View->render('places_Ive_searched/index');
	}
	public function GetCompanyStatus($id = false){
		$model = $this->model;
		$arrayobject = $model->GetCompanyStatus($id);
		$ObjectDTO = new Convert();
		$companies = $ObjectDTO->toObject($arrayobject);
		$this->View->msg = $companies;
		$this->View->render('places_Ive_searched/index');
	}
	
	public function AddCompany($arg = false){ 
		$model = $this->model;
		$arrayobject = $model->AddCompany($arg);
		$ObjectDTO = new Convert();
		$companies = $ObjectDTO->toObject($arrayobject);
		$this->View->msg = $companies;
		$this->View->render('places_Ive_searched/index');
	}
	
	public function AddCompanyStatus($arg= false){
		$model = $this->model;
		$arrayobject = $model->AddCompanyStatus($arg);
		$ObjectDTO = new Convert();
		$companies = $ObjectDTO->toObject($arrayobject);
		$this->View->msg = $companies;
		$this->View->render('places_Ive_searched/index');
	}
	public function DeleteAllCompanyStatus(){
		$model = $this->model;
		$model->DeleteAllCompanyStatus($arg);
	}
	public function DeleteAllCompanies(){
		$model = $this->model;
		$model->DeleteAllCompanies($arg);
	}
	public function DeleteCompany($id = false){
		$model = $this->model;
		$model->DeleteCompany($arg);
	}
}
?>
