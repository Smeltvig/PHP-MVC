<?php
class places_Ive_searched_model extends Model{
	function __construct(){
		parent::__construct();
	}
	public function GetAllCompanies(){
		
		$ObjectDTO = array();

		$Company = R::getAll( 'select * from company' );
		if(count($Company) == 0){
			$ObjectDTO['status']= new Status('Could not find any data');
		}
		else{
			$ObjectDTO['status']= new Status();
		}
		$ObjectDTO['data'] = $Company;
		
		return $ObjectDTO;
	}
	public function GetCompanyStatus($id = false){
		$ObjectDTO = array();
		$Company_status = R::getAll( 'select * from companystatus WHERE `FK_company_id` = '.$id.' ORDER BY `Date` ASC ');
				
		if(count($Company_status) == 0){
			$ObjectDTO['status']= new Status('Could not find any data');
		}
		else{
			$ObjectDTO['status']= new Status();
		}
		$ObjectDTO['data'] = $Company_status;
				
		return $ObjectDTO;
	}
	
	public function AddCompany($arg = false){ 

		
		$ObjectDTO = array();
		
		if(count($arg, COUNT_RECURSIVE) != 5){
			$ObjectDTO['status']= new Status('Could not find any data');
		}
		else{
			$Company = R::dispense('company');
			$Company->name = $arg[2];
			$Company->address = $arg[3];
			$Company->att = $arg[4];
			$Company->contact = $arg[5];
			$Company->discovered = $arg[6];
			$id = R::store($Company);
			
			$ObjectDTO['status']= new Status();
			$Company_status = R::getAll( 'select * from company WHERE `id` = '.$id.' ORDER BY `id` ASC ' );
			$ObjectDTO['data'] = $Company_status;
		}
		return $ObjectDTO;
	}
	
	public function AddCompanyStatus($arg = false){
		$ObjectDTO = array();
		$Company = R::dispense('companystatus');
		$Company->contact_form = 'tele->';
		$Company->status_text = 'Charles Xavier';
		$Company->date = new DateTime();
		$Company->FK_company_id = 24;
		$id = R::store($Company);
		if(count($Company_status) == 0){
			$ObjectDTO['status']= new Status('Could not find any data');
		}
		else{
				$ObjectDTO['status']= new Status();
		}
		$ObjectDTO['data'] = $Company_status;
				
		return $ObjectDTO;
	}
	
	public function DeleteAllCompanies(){
		R::wipe( 'company' );
	}
	public function DeleteAllCompanyStatus(){
		R::wipe( 'companystatus' );
	}
	public function DeleteCompany($id = false){
		$Company = R::load('company', $id);
		R::trash( $Company );
	}
}
?>
