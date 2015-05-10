<?php
	namespace MolecularCore\Interfaces;
	Interface MoleculeInterface{
		function register(\MolecularCore\Core &$app);
		function run();
	}