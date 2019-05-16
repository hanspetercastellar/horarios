		function habilitar(obj)
		{
			if(obj.checked)
			{
				// habilitamos
				document.getElementById("contactoempre").disabled=false;
				document.getElementById("nombre1").disabled=true;
				document.getElementById("nombre2").disabled=true;
				document.getElementById("apellido1").disabled=true;
				document.getElementById("apellido2").disabled=true;
			}else{
				// deshabilitamos
			}
		}

		function habilitar1(obj)
		{
			if(obj.checked)
			{
				// habilitamos
				document.getElementById("contactoempre").disabled=true;
				document.getElementById("nombre1").disabled=false;
				document.getElementById("nombre2").disabled=false;
				document.getElementById("apellido1").disabled=false;
				document.getElementById("apellido2").disabled=false;
			}else{
				// deshabilitamos
			}
		}