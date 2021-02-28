<?php
trait DebugA{
	function DbgStr(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugActive=TRUE;
			$this->Debughold=[];
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}	
	function DbgClrMmr(){
		if ($this->ot_can('owner','debug')) {
			$this->Debughold=[];
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}	
	function DbgStp(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugActive=FALSE;
			$this->Debughold=[];
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgMdeBsc(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugMode='basic';
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgMdeAdv(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugMode='advance';
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgForUsr(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugFor='user';
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgForSys(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugFor='system';
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgToScr(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugTo='screen';
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgToMmr(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugTo='memory';
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgToDsk(){
		if ($this->ot_can('owner','debug')) {
			$this->DebugTo='disk';
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}	
	function DbgErrOn(){
		if ($this->ot_can('owner','debug')) {
			$this->SaveError=TRUE;
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}	
	function DbgErrOff(){
		if ($this->ot_can('owner','debug')) {
			$this->SaveError=FALSE;
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgShw(){
		if ($this->ot_can('owner','debug')) {
			$retval = $this->ot_getlist('debug/','log*');
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $retval );		
		return $retval;
	}
	function DbgShwLog($name){
		if ($this->ot_can('owner','debug')) {
			$retval = $this->ot_readif($name,'debug');
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $retval );		
		return $retval;
	}
	function DbgDltLog($name){
		if ($this->ot_can('owner','debug')) {
			$this->ot_deleteinside($name,'debug');
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	function DbgClrLog(){
		if ($this->ot_can('owner','debug')) {
			$tmp=$this->DbgShw();
			foreach ($tmp as $clave => $valor) {
				$this->ot_deleteinside($valor,'debug');
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );		
		return $this->retval;
	}
	
}
