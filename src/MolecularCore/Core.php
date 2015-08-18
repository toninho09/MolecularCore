<?php
	namespace MolecularCore;
	class Core {
		private $molecules =[];
		public $request;
		public $respone;

		public function __construct(){
			$this->request = new Request();
			$this->response = new Response();
		}
		
		public function addMolecule($molecule){
			foreach($molecule as $k => $v){
				$this->registerMolecule($k,$v);
			}
		}
		
		private function registerMolecule($alias,$molecule){
			class_alias($molecule,$alias);
			$atom = new $alias();
			$name = $atom->register($this);
			if(empty($name)){
				$this->molecules[$alias] = ['alias'=>$alias,'molecule'=>$atom];			
			}else{
				$this->molecules[$name] = ['alias'=>$alias,'molecule'=>$atom];			
			}
		}

		public function getMolecule($name){
			if (isset($molecule[$name])){
				return $molecule[$name]['molecule'];
			}
			throw new Exception("Molecule Not Found", 1);
		}
		
		public function run(){
			foreach($this->molecules as $molecule ){
				$molecule['molecule']->run();
			}
			echo $this->response->getResponseContent();
		}
	}