<?php namespace App\Controllers;

use App\Models\DocumentModel;

class Documents extends BaseController
{
	public function index()
    {
        $data = [];
		$data['pageTitle'] = 'Documents';
		$data['addBtn'] = True;
		$data['addUrl'] = "/documents/add";

		$model = new DocumentModel();
		$data['data'] = $model->findAll();	

		echo view('templates/header');
		echo view('templates/pageTitle', $data);
		echo view('DocumentMaster/list',$data);
		echo view('templates/footer');
	}
	
	public function add($id = 0){

		helper(['form']);
		$model = new DocumentModel();
		$data = [];
		$data['pageTitle'] = 'Documents';
		$data['addBtn'] = False;
		$data['backUrl'] = "/documents";
		$data['statusList'] = ['Draft', 'Approved', 'Obsolete'];
		$data['categoryList'] = ['Requirement', 'Design', 'Impact Analysis', 'Test', 'Standards', 'Other'];

		if($id == 0){
			$data['action'] = "add";
			$data['formTitle'] = "Add Document";
		}else{
			$data['action'] = "add/".$id;
			$data['formTitle'] = "Update";

			$data['document'] = $model->where('id',$id)->first();			
		}


		if ($this->request->getMethod() == 'post') {
			
			$rules = [
				'name' => 'required|min_length[3]|max_length[50]',
				'category' => 'required',
				'version' => 'required',
				'description' => 'max_length[100]',
				'ref' => 'max_length[100]',
				'location' => 'max_length[50]',
				'status' => 'required',				
			];	

			$newData = [
				'name' => $this->request->getVar('name'),
				'category' => $this->request->getVar('category'),
				'version' => $this->request->getVar('version'),
				'description' => trim($this->request->getVar('description')),
				'ref' => $this->request->getVar('ref'),
				'location' => $this->request->getVar('location'),
				'status' => $this->request->getVar('status'),
			];

			$data['document'] = $newData;

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				if($id > 0){
					$newData['id'] = $id;
					$message = 'Document successfully updated.';
				}else{
					$message = 'Document successfully added.';
				}
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Document successfully added.');
				
			}
		}
		
		echo view('templates/header');
		echo view('templates/pageTitle', $data);
		echo view('DocumentMaster/form', $data);
		echo view('templates/footer');
	}

	
	public function delete($id){
		$model = new DocumentModel();
		$model->delete($id);
		$response = array('success' => "True");
		echo json_encode( $response );
	}

}