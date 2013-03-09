<?php
	// Author: Sergio Daniel Lozano
	// Registra el nuevo tipo de post Ficha Tecnica
	function RegistrarFichaTecnica()
	{
		require_once(TEMPLATEPATH . '/fichatecnica_creation-functions.php');
	}

	// Author: Sergio Daniel Lozano
	// Registra todos los tipos de post o funciones relacionas con post descritas en el script
	function InstartiusAgregarFuncionesPost()
	{
		RegistrarFichaTecnica();
	}
?>