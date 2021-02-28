<?php
trait OTDebug{

	function InstallDebug($name = 'debug')
	{
		if ($this->not_exist($name)) {
			$this->ot_create($name);
		}
		$temp=$this->ot_addin($name,$name,'features.json');
		$this->ot_addin($name,'owner','features.json','usr/admin');
		$this->ot_addin($name,array('Name'=>'Debug Feature','limit'=>0,'OnUse'=>0),'container.json');
		$this->ot_array(array('nick'=>'Debug','name'=>'Debug Feature'), 'admin.json', TRUE,$name);
		$this->ot_addin('admin','owner','users.json',$name);			
	}
}

?>