
function modificar_estado_tarea(codigo_usu, codigo_tar){
	//funcionalidad proveniente de jquery para simplificar el trabajo de enviar la peticion
  $.ajax({
    url: 'modificar_tarea.php',
    type: 'POST',//tipo de peticion(post para enviar dato tambien)
    data: {codigo_usu: codigo_usu, codigo_tar: codigo_tar},//dato que vamos a enviar al servidor

    //que hacer con la respuesta
    success: function(respuesta){
    	
    	if(respuesta == 0){
    		console.log('Actualizacion fallida');
        	return 0;
    	}else if (respuesta == 1){
    		console.log('Actualizacion exitosa');
        var res = cargar_tareas(codigo_usu);
       	return 1;
    	}
      
    }
    })

}
function ingresar_tarea(codigo_usu){
  var objetoHtml;
  objetoHtml = document.getElementById("ing_tarea");
  var nomTarea = objetoHtml.value;
  $.ajax({
      url: 'ing_Tarea.php',
      type: 'POST',//tipo de peticion(post para enviar dato tambien)
      data: {codigo_usu: codigo_usu, nomTarea:nomTarea},//dato que vamos a enviar al servidor

      success: function(respuesta){
        let datos = JSON.parse(respuesta);
        let contenedor = document.getElementById('contenido');  
        contenedor.innerHTML = generar_html(datos, codigo_usu);        
        var tareas = document.querySelectorAll(".tarea"); 

        tareas.forEach((tarea) => {
            tarea.addEventListener('click', () => {                
                var id = $(tarea).attr("id");
                var res = modificar_estado_tarea(codigo_usu, id);
                tarea.classList.toggle('active');                
            });
        }); 
        objetoHtml.value = "";
      } 
  })



} 


function cargar_tareas(codigo_usu){
	//funcionalidad proveniente de jquery para simplificar el trabajo de enviar la peticion

      $.ajax({
      url: 'gest_tareas.php',
      type: 'POST',//tipo de peticion(post para enviar dato tambien)
      data: {codigo_usu: codigo_usu},//dato que vamos a enviar al servidor

      //que hacer con la respuesta
      success: function(respuesta){ 
        let datos = JSON.parse(respuesta);
        let contenedor = document.getElementById('contenido');  
        contenedor.innerHTML = generar_html(datos, codigo_usu);        
        var tareas = document.querySelectorAll(".tarea"); 

        tareas.forEach((tarea) => {
            tarea.addEventListener('click', () => {                
                var id = $(tarea).attr("id");
                console.log('Actualizacion....', id);
                var res = modificar_estado_tarea(codigo_usu, id);
                tarea.classList.toggle('active');                
            });
        }); 
      }
    })
}

function generar_html(datos, id_estu){
  nuevo_html = '';

  nuevo_html += `<h1 class= "titulo">Tareas de `+id_estu+` </h1>
    <div class="tareas">`
   
    datos.forEach(tar => {

      var clase = 'tarea';
      var estado ='';
      if(tar.terminada){
        clase += ' active';
        estado = 'checked';
      }

      var id = tar.id;
      //nuevo_html += `<div <label><input type="checkbox" id = "${id}" class="${clase}" ${estado}> ${tar.name} </label></div>`;
      nuevo_html += `<div id = "${id}" class="${clase}"> ${tar.name+"      "}`;
      nuevo_html += `<label><input type="checkbox"  ${estado}> ${'  '} </label></div>`;
      //nuevo_html += `<div id = "${id}" class="${clase}">${tar.name} </div>`;
    
    }); 

    nuevo_html += `</div>`     
  
  return nuevo_html;
}


