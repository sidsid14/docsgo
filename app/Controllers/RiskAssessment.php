<?php namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\TeamModel;
use App\Models\RiskAssessmentModel;
use App\Models\StatusOptionsModel;
use CodeIgniter\I18n\Time;
class RiskAssessment extends BaseController
{
	public function index()
    {
		$data = [];

		$data['pageTitle'] = 'Risk Assessment';
		$data['addBtn'] = true;
		$data['addUrl'] = "/risk-assessment/add";
		$data['backUrl'] = '/risk-assessment';

		$status = $this->request->getVar('status');
		$data['isSyncEnabled'] = false;
		if($status == 'sync'){
			$status = '';
			$project_id = $this->request->getVar('project_id');
			$res = $this->syncRecords($project_id);
			$data['isSyncEnabled'] = true;
		}
		$model = new RiskAssessmentModel();
		$data["data"] = $model->getRisks($status);

		$data['projects'] = $this->getProjects();
		$projectModel = new ProjectModel();
		$activeProject = $projectModel->where("status","Active")->first();	
		$selectedProject = $activeProject['project-id'];
		$data['selectedProject'] = $selectedProject;

		echo view('templates/header');
		echo view('templates/pageTitle', $data);
		echo view('RiskAssessment/list',$data);
		echo view('templates/footer');
	}

	function syncRecords($id){
		$model = new RiskAssessmentModel();
		$sonarRecords = $model->getSonarRecords();
		$issuesCount = count($sonarRecords);
		$vulnerabilitiesList = $model->getVulnerabilitiesList();
		foreach( $sonarRecords as $record){
			$alreadyExit = false;
			foreach( $vulnerabilitiesList as $vul ){
				$filename = substr($record->component, stripos($record->component, ":") + 1, -1);
				$textRange = $record->textRange;
				$arr2 = json_decode($vul['description']);
				if( $record->message == $vul['risk'] && $filename == $arr2->filename && $textRange == $arr2->textRange ){
					$alreadyExit = true;
				}		
			}
			if( ! $alreadyExit ){
				$description['filename'] = substr($record->component, stripos($record->component, ":") + 1, -1);
				$description['textRange'] = $record->textRange;

				$newData = [
					'project_id' => $id,
					'risk_type' => $record->type,
					'risk' => $record->message,
					'component' => substr($record->component, 0 , stripos($record->component, ":")),
					'description' => json_encode($description),
					'status' => 'Open'
				];
				$model->save($newData);
			}
		}
		return;
	}

	 function add(){
		$id = $this->request->getVar('id');
		//handling the backUrl view, Which is selected previously 
		$backUrl = '/risk-assessment';
		if(isset($_SERVER['HTTP_REFERER'])){
			$urlStr = $_SERVER['HTTP_REFERER'];
			if (strpos($urlStr, 'status')) {
				$urlAr = explode("=", $urlStr);
				$backUrl = '/risk-assessment?status='.$urlAr[count($urlAr)-1];
			}
		}
		helper(['form']);
		$model = new RiskAssessmentModel();
		$data = [];
		$data['pageTitle'] = 'Risk Assessment';
		$data['addBtn'] = False;
		$data['backUrl'] = $backUrl;
		$dataList = [];
		$data['riskCategory'] = ['Open-Issue', 'Vulnerability', 'SOUP'];
		$data['riskStatus'] = ['Open', 'Close'];
		$data['projects'] = $this->getProjects();

		$rules = [
			'project'=> 'required',
			'risk_type'=> 'required',
			'risk' => 'required|min_length[3]|max_length[64]',
		];	
		$initialJsonObj = '{"risk-assessment":{"classification":"","fmea":[{"id":"1","category":"Severity","options":[{"title":"Very High","description":"Hazardous Catastrophic Involves noncompliance with regulatory safety operation requirement of the medical device. Failure mode of the device exposes the patient to greater harm.","value":"5"},{"title":"High","description":"Loss of monitoring function or patient experiences very high discomfort due to failure, or user extremely dissatisfied, non-critical injury to patient.","value":"4"},{"title":"Moderate","description":"Recoverable loss of monitoring function, or failure mode noticeable causing inconvenience, user dissatisfied.","value":"3"},{"title":"Low","description":"Negligible loss of monitoring function, reduced level of system performance, user somewhat dissatisfied.","value":"2"},{"title":"Very Low","description":"No recognizable effect.","value":"1"}],"value":""},{"id":"2","category":"Occurrence","options":[{"title":"Very High","description":"Failures are certain to occur Failures occur at least 3 times in 10 events.","value":"5"},{"title":"High","description":"Frequent occurrence Failures occur once in 10 events.","value":"4"},{"title":"Moderate","description":"Failures occasionally occur Failures occur once in 100 events.","value":"3"},{"title":"Low","description":"Failures are unlikely Failures occur once in 1,000 events.","value":"2"},{"title":"Rare","description":"Failures are extremely rare Failures occur once in 10,000 events","value":"1"}],"value":""},{"id":"3","category":"Detectability","options":[{"title":"Almost Certain","description":"Defect is obvious and will be detected, thereby preventing the failure effect. Defect criteria are measurable, have a requirement and 100% testing is performed using non-visual criteria.","value":"5"},{"title":"High","description":"Defect is relatively apparent and will most likely be detected, thereby preventing the failure effect. Defect criteria are measurable, have a requirement but not 100% tested or is 100% tested using visual criteria.","value":"4"},{"title":"Moderate","description":"Defect may not be detected in time to prevent the failure effect. Defect criteria have subtle interpretations and may not always be detected in-process or prior to use.","value":"3"},{"title":"Low","description":"High likelihood that the defect will not be detected in time to prevent the failure effect. Defect criteria are vague, not measurable/visible in the final assembly and are subject to wide interpretation.","value":"2"},{"title":"Impossible","description":"Very high likelihood that the defect will not be detected in time to prevent the failure effect.","value":"1"}],"value":""},{"id":"4","category":"RPN","value":""}],"cvss":[{"Exploitability Matrix":[{"id":"1","metrics":"exploitability","category":"Attack Vector","options":[{"title":"Network","description":"A vulnerability exploitable with Network access means the vulnerable component is bound to the network stack and the attacker`s path is through OSI layer 3 (the network layer). Such a vulnerability is often termed `remotely exploitable` and can be thought of as an attack being exploitable one or more network hops away (e.g. across layer 3 boundaries from routers).","value":5},{"title":"Adjacent Network","description":"A vulnerability exploitable with Adjacent Network access means the vulnerable component is bound to the network stack, however the attack is limited to the same shared physical (e.g. Bluetooth, IEEE 802.11), or logical (e.g. local IP subnet) network, and cannot be performed across an OSI layer 3 boundary (e.g. a router).","value":4},{"title":"Local","description":"A vulnerability exploitable with Local access means that the vulnerable component is not bound to the network stack, and the attacker`s path is via read/write/execute capabilities. In some cases, the attacker may be logged in locally in order to exploit the vulnerability, or may rely on User Interaction to execute a malicious file.","value":3},{"title":"Physical","description":"A vulnerability exploitable with Physical access requires the attacker to physically touch or manipulate the vulnerable component, such as attaching an peripheral device to a system.","value":2}],"value":""},{"id":"2","metrics":"exploitability","category":"Attack Complexity","description":" ","options":[{"title":"High","description":"A successful attack depends on conditions beyond the attacker`s control. That is, a successful attack cannot be accomplished at will, but requires the attacker to invest in some measurable amount of effort in preparation or execution against the vulnerable component before a successful attack can be expected.","value":2},{"title":"Low","description":"Specialized access conditions or extenuating circumstances do not exist. An attacker can expect repeatable success against the vulnerable component.","value":1}],"value":""},{"id":"3","metrics":"exploitability","category":"Privileges Required","description":" ","options":[{"title":"None","description":"The attacker is unauthorized prior to attack, and therefore does not require any access to settings or files to carry out an attack.","value":3},{"title":"High","description":"The attacker is authorized with (i.e. requires) privileges that provide significant (e.g. administrative) control over the vulnerable component that could affect component-wide settings and files.","value":2},{"title":"Low","description":"The attacker is authorized with (i.e. requires) privileges that provide basic user capabilities that could normally affect only settings and files owned by a user. Alternatively, an attacker with Low privileges may have the ability to cause an impact only to non-sensitive resources.","value":1}],"value":""},{"id":"4","metrics":"exploitability","category":"User Interaction","description":" ","options":[{"title":"None","description":"The vulnerable system can be exploited without interaction from any user.","value":2},{"title":"Required","description":"Successful exploitation of this vulnerability requires a user to take some action before the vulnerability can be exploited, such as convincing a user to click a link in an email.","value":1}],"value":""},{"id":"5","metrics":"exploitability","category":"Scope","description":"some desc","options":[{"title":"Unchanged","description":"An exploited vulnerability can only affect resources managed by the same authority. In this case the vulnerable component and the impacted component are the same.","value":3},{"title":"Changed","description":"An exploited vulnerability can affect resources beyond the authorization privileges intended by the vulnerable component. In this case the vulnerable component and the impacted component are different.","value":2}],"value":""}],"Impact Matrix":[{"id":"1","metrics":"impact","category":"Confidentiality Impact","options":[{"title":"None","description":"There is no loss of confidentiality within the impacted component.","value":3},{"title":"High","description":"There is total loss of confidentiality, resulting in all resources within the impacted component being divulged to the attacker. Alternatively, access to only some restricted information is obtained, but the disclosed information presents a direct, serious impact.","value":2},{"title":"Low","description":"There is some loss of confidentiality. Access to some restricted information is obtained, but the attacker does not have control over what information is obtained, or the amount or kind of loss is constrained. The information disclosure does not cause a direct, serious loss to the impacted component.","value":1}],"value":""},{"id":"2","metrics":"impact","category":"Integrity Impact","options":[{"title":"None","description":"There is no loss of integrity within the impacted component.","value":3},{"title":"High","description":"There is a total loss of integrity, or a complete loss of protection. For example, the attacker is able to modify any/all files protected by the impacted component. Alternatively, only some files can be modified, but malicious modification would present a direct, serious consequence to the impacted component.","value":2},{"title":"Low","description":"Modification of data is possible, but the attacker does not have control over the consequence of a modification, or the amount of modification is constrained. The data modification does not have a direct, serious impact on the impacted component.","value":1}],"value":""},{"id":"3","metrics":"impact","category":"Availability Impact","options":[{"title":"None","description":"There is no impact to availability within the impacted component.","value":3},{"title":"High","description":"There is total loss of availability, resulting in the attacker being able to fully deny access to resources in the impacted component; this loss is either sustained (while the attacker continues to deliver the attack) or persistent (the condition persists even after the attack has completed). Alternatively, the attacker has the ability to deny some availability, but the loss of availability presents a direct, serious consequence to the impacted component (e.g., the attacker cannot disrupt existing connections, but can prevent new connections; the attacker can repeatedly exploit a vulnerability that, in each instance of a successful attack, leaks a only small amount of memory, but after repeated exploitation causes a service to become completely unavailable).","value":2},{"title":"Low","description":"There is reduced performance or interruptions in resource availability. Even if repeated exploitation of the vulnerability is possible, the attacker does not have the ability to completely deny service to legitimate users. The resources in the impacted component are either partially available all of the time, or fully available only some of the time, but overall there is no direct, serious consequence to the impacted component.","value":1}],"value":""}],"Score":[{"id":"9","category":"base_score","value":"","options":[]}]}]}}';
		if($id == ""){
			$data['action'] = "add";
			$data['formTitle'] = "Add Risk Assessment";
			$data['member']['status'] = 'Open';
			$data['jsonObj'] = json_decode($initialJsonObj, true);
		}else{
			$data['action'] = "add?id=".$id;
			$data['member'] = $model->where('id',$id)->first();
			$data['formTitle'] = 'Update Risk Assessment';
			$data['jsonObj'] = json_decode($data['member']['assessment'], true);
			if($data['jsonObj'] == ''){
				$data['jsonObj'] = json_decode($initialJsonObj, true);
			}
		}

		$data['fmeaList'] = $data['jsonObj']['risk-assessment']['fmea'];
		$data['cvssList'] = $data['jsonObj']['risk-assessment']['cvss'][0];
		if ($this->request->getMethod() == 'post') {
			$newData = [
				'project_id' => $this->request->getVar('project'),
				'risk_type' => $this->request->getVar('risk_type'),
				'risk' => $this->request->getVar('risk'),
				'description' => $this->request->getVar('description'),
				'mitigation' => $this->request->getVar('mitigation'),
				'status' => $this->request->getVar('status')
			];
			$riskType = $this->request->getVar('risk_type');
			$postDataMatrix = array(
				'Severity'=>'','Occurrence' =>'','Detectability' => '','RPN' => '',
				'Attack Vector' => '','Attack Complexity' => '','Privileges Required' => '','User Interaction' =>'', 'Scope' => '',
				'Confidentiality Impact' => '', 'Integrity Impact' => '','Availability Impact' => '','base_score' => ''
			);
			if($riskType == 'Open-Issue' || $riskType == 'SOUP'){
				$postDataMatrix['Severity'] = ($this->request->getVar('Severity-status-type')) ? explode('/', $this->request->getVar('Severity-status-type'))[1] : '';			
				$postDataMatrix['Occurrence'] = ($this->request->getVar('Occurrence-status-type')) ? explode('/', $this->request->getVar('Occurrence-status-type'))[1] : '';	
				$postDataMatrix['Detectability'] = ($this->request->getVar('Detectability-status-type')) ? explode('/', $this->request->getVar('Detectability-status-type'))[1] : '';
				$postDataMatrix['RPN'] = $this->request->getVar('rpn');
				$newData['rpn'] = $this->request->getVar('rpn');
			}
			if($riskType == 'Vulnerability'){
				$postDataMatrix['Attack Vector'] = ($this->request->getVar('AttackVector-status-type')) ? explode('/', $this->request->getVar('AttackVector-status-type'))[1] : '';
				$postDataMatrix['Attack Complexity'] = ($this->request->getVar('AttackComplexity-status-type')) ? explode('/', $this->request->getVar('AttackComplexity-status-type'))[1] : '';
				$postDataMatrix['Privileges Required'] = ($this->request->getVar('PrivilegesRequired-status-type')) ? explode('/', $this->request->getVar('PrivilegesRequired-status-type'))[1] : '';
				$postDataMatrix['User Interaction'] = ($this->request->getVar('UserInteraction-status-type')) ? explode('/', $this->request->getVar('UserInteraction-status-type'))[1] : '';
				$postDataMatrix['Scope'] = ($this->request->getVar('Scope-status-type')) ? explode('/', $this->request->getVar('Scope-status-type'))[1] : '';
				$postDataMatrix['Confidentiality Impact'] = ($this->request->getVar('ConfidentialityImpact-status-type')) ? explode('/', $this->request->getVar('ConfidentialityImpact-status-type'))[1] : '';
				$postDataMatrix['Integrity Impact'] = ($this->request->getVar('IntegrityImpact-status-type')) ? explode('/', $this->request->getVar('IntegrityImpact-status-type'))[1] : '';
				$postDataMatrix['Availability Impact'] = ($this->request->getVar('AvailabilityImpact-status-type')) ? explode('/', $this->request->getVar('AvailabilityImpact-status-type'))[1] : '';
				$postDataMatrix['base_score'] = 'basic value 10';
			
			}
			foreach($data['jsonObj']['risk-assessment']['fmea'] as $key=>$value){
				$data['jsonObj']['risk-assessment']['fmea'][$key]['value'] = $postDataMatrix[$value['category']];
			}
			foreach($data['jsonObj']['risk-assessment']['cvss'] as $key=>$value){
				foreach($value as $key1=>$value1){
					foreach($value1 as $key2=>$value2){
						$data['jsonObj']['risk-assessment']['cvss'][$key][$key1][$key2]['value'] = $postDataMatrix[$value2['category']];
					}
				}
			}
			$newData['assessment'] = json_encode($data['jsonObj']);

			$data['member'] = $newData;
			$data['fmeaList'] = $data['jsonObj']['risk-assessment']['fmea'];
			$data['cvssList'] = $data['jsonObj']['risk-assessment']['cvss'][0];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				if($id > 0){
					$list = [];
					$currentTime = gmdate("Y-m-d H:i:s");
					$newData['id'] = $id;
					$newData['update_date'] = $currentTime;
					$message = 'Risk Assessment successfully updated.';
				}else{
					$message = 'Risk Assessment successfully added.';
				}
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', $message);
			}
		}

		echo view('templates/header');
		echo view('templates/pageTitle', $data);
		echo view('RiskAssessment/form', $data);
		echo view('templates/footer');
	}
	
	private function getProjects(){
        $projectModel = new ProjectModel();
        $data = $projectModel->findAll();	
		$projects = [];
		foreach($data as $project){
			$projects[$project['project-id']] = $project['name'];
		}
		return $projects;
	}

	public function delete(){
		if (session()->get('is-admin')){
			$id = $this->request->getVar('id');
			$model = new RiskAssessmentModel();
			$model->delete($id);
			$response = array('success' => "True");
			echo json_encode( $response );
		}
		else{
			$response = array('success' => "False");
			echo json_encode( $response );
		}
	}


}