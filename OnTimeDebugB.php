<?php
trait DebugB{
	private $DebugActive=FALSE;
	private $DebugMode='basic';
	private $DebugFor='system';
	private $DebugTo='disk';
	private $SaveError=FALSE;
	public  $Debughold=array();
	function ot_show($trac, $level=1){
		if ($level==1){
			echo '<br>';
		}
		if(is_array($trac)){
			foreach ($trac as $clave=> $valor){
				if (is_array($valor)){
					echo str_repeat ('-', 10*($level-1) ).($level).".- $clave :" ."<br>";
					$this->ot_show($valor,($level+1));
				} else{
					echo str_repeat ('_', 10*($level-1) ).($level-1)."D.- {$clave}=>{$valor}"."<br>";
				}
			}
		} else {
				echo "Empty"."<br>";			
		}
	}	
	function ot_error($retval=''){
		if ($this->err=="0") {
			echo $retval.'<br>';
		} else{
			if (array_key_exists($this->err, $this->errtext)) {
				echo ($this->err.'.-'.$this->errtext[$this->err]).'<br>';
			} else{
				echo ($this->err.'.-Error not defined').'<br>';
			}
		}
	}
	function ot_func($in,$from,$parameters){
		if ($this->DebugActive){
			if($this->DebugMode=='advance'){
				$code = uniqid($this->actses , true );				
				$val =  array('kind'=>'func','in'=>$in,'from'=>$from,'param'=>$parameters);
				if ($this->DebugTo=='screen'){
						echo '<br>'.$code.'<br>';
						$this->ot_show($val);		
				}
				if ($this->DebugTo=='memory'){
					$this->Debughold[$code]=$val;
				}
				if ($this->DebugTo=='disk'){
					$ext = date("Ymd");
					if ($this->DebugFor=='user'){
						$this->dbg_addin($code,$val,'log_'.$this->id.'.'.$ext,'debug');
					} else{
						$this->dbg_addin($code,$val,'log_system.'.$ext,'debug');	
					}
				}
			}
		}
		$this->err='0';
		$this->retval=FALSE;
	}	
	function ot_funct($in,$from,$parameters){
		if ($this->DebugActive){
			if($this->DebugMode=='advance'){
				$code = uniqid($this->actses , true );				
				$val =  array('kind'=>'funct','in'=>$in,'from'=>$from,'param'=>$parameters);
				if ($this->DebugTo=='screen'){
					echo '<br>'.$code.'<br>';
					$this->ot_show($val);		
				}
				if ($this->DebugTo=='memory'){
					$this->Debughold[$code]=$val;
				}
				if ($this->DebugTo=='disk'){
					$ext = date("Ymd");
					if ($this->DebugFor=='user'){
						$this->dbg_addin($code,$val,'log_'.$this->id.'.'.$ext,'debug');
					} else{
						$this->dbg_addin($code,$val,'log_system.'.$ext,'debug');	
					}
				}
			}
		}
		$this->err='0';
		$this->retval=TRUE;
	}
	function ot_log($in,$from,$parameters,$ret){		
		if (($this->err!="0") and ($this->SaveError)) {
			$val =  array('kind'=>'Error','Code'=>$this->err,'Code'=>$this->id,'in'=>$in,'from'=>$from,'param'=>$parameters, "return"=>$ret);
			$code = uniqid($this->actses , true );			
			$ext = date("Ymd");
				if ($this->DebugFor=='user'){
					$this->dbg_addin($code,$val,'log_error'.$this->id.'.'.$ext,'debug');
				} else{
					$this->dbg_addin($code,$val,'log_error.'.$ext,'debug');	
				}
		}
		
		if ($this->DebugActive){
			$code = uniqid($this->actses , true );				
			$val =  array('kind'=>'Out','in'=>$in,'from'=>$from,'param'=>$parameters, "return"=>$ret);
			if ($this->DebugTo=='screen'){
				echo '<br>'.$code.'<br>';
				$this->ot_show($val);		
			}
			if ($this->DebugTo=='memory'){
				$this->Debughold[$code]=$val;
			}
			if ($this->DebugTo=='disk'){
				$ext = date("Ymd");
				if ($this->DebugFor=='user'){
					$this->dbg_addin($code,$val,'log_'.$this->id.'.'.$ext,'debug');
				} else{
					$this->dbg_addin($code,$val,'log_system.'.$ext,'debug');	
				}
			}
		}
		return(TRUE);
	}
	protected function dbg_addin($key, $value, $file, $inside="no"){
		$data = $this->dbg_readif($file, $inside);
		if (array_key_exists($key,$data)) {
			$this->err='C0010M007';
		} else {
			$data[$key]=$value;
			$this->dbg_write($file,$data,$inside);
			$this->retval=TRUE;
		}
		return $data;
	}	
	protected function dbg_readif($file, $inside='no'){
		if ($inside=='no') {
			$file=$this->container.'/'.$file;
		} else {
			$file=$this->container.'/'.$inside. '/'.$file;
		}
		$aread=[];
		if (file_exists($file)) {
			$stream=fopen($file,"r");
			if ($stream) {
				$vread='';
				while (!feof($stream)) {
					$vread.=fgets($stream);
				}
				$aread=json_decode($vread,true);
				fclose($stream);
			} else {
				$this->err='C0010M001';
			}
		}
		return $aread;
	}	
	protected function dbg_write($file, $data, $inside="no"){
		if ($inside=='no') {
			$file=$this->container.'/'.$file;
		} else {
			$file=$this->container.'/'.$inside. '/'.$file;
		}
		$this->err='0';
		$stream=fopen($file, "w");
		if ($stream) {
			$save=fwrite($stream,json_encode($data,JSON_UNESCAPED_SLASHES));
			if ($save) {
				$this->retval=FALSE;
				fclose($stream);
			} else {
				$this->err='C0010M003';
			}
		} else {
			$this->err='C0010M002';
			$this->errtext['C0010M002']='Failing create content';
		}
		return $this->err;
	}	
}
