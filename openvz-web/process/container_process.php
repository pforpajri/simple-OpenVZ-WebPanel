<?php

class Container{

	public function sh_exec($command){
		$s = "sudo ";
		$full_command = "{$s} {$command}";

		return shell_exec($full_command);
	}

	public function vzlist(){
		$list = $this->sh_exec("vzlist -a");

		return $list;
	}

	public function create($ctid,$template){
		$pattern = ["/.tar/","/.gz/"];
		$template_name = preg_replace($pattern,'',$template);
		chdir('/vz/template/cache/');
		$command = $this->sh_exec("vzctl create {$ctid} --ostemplate {$template_name}");
		
		return $command;
	}

	public function delete($ctid){
		$command = $this->sh_exec("vzctl delete {$ctid}");
		
		return $command;
	}

}

$ct = new Container();

?>