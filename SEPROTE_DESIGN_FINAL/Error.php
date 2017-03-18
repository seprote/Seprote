<?php
function errorMes($errorText="an error has occured !"){
	echo ("<div class='ui-widget'>\n");
	echo ("	<div class='ui-state-error ui-corner-all' style='padding: 0 .7em;'>\n");
	echo ("		<p>\n");
	echo ("			<span class='ui-icon ui-icon-alert' style='margin-right: .3em;'></span>\n");
	echo ("			<strong>ERREUR: </strong> ".$errorText."\n");
	echo ("		</p>\n");
	echo ("	</div>\n");
	echo ("</div>\n");
}
?>