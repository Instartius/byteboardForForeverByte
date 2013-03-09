<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/9/13
 * El contenedor de la informacion de "acerca de" el blog y el objetivo de la comunidad
 */
?>
<div class="container">
	<div id="logo">
		<a href="<? AboutUs::LinkAcercaDe() ?>">
            <img src="<? AboutUs::HeaderImage() ?>" />
        </a>
	</div>
	<div id="description">
        <p><? AboutUs::EsloganSitio() ?></p>
        <a href="<? AboutUs::LinkAcercaDe() ?>">Conoce más sobre nosotros</a>
	</div>
</div>