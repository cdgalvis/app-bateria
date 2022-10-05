function ValidarInformacionUsuario() {
    let username    = document.getElementById('usernameregis').value
    let password    = document.getElementById('passwregis').value
    let nombres     = document.getElementById('nombres').value
    let apellidos   = document.getElementById('apellidos').value
    let confir      = document.getElementById('confirpassword').value
    let email       = document.getElementById('email').value
    let roles       = document.getElementById('roles').value
    let active      = document.getElementById('active').value
    let tipo_documento      = document.getElementById('tipo_documento').value
    

    let mensajes=''
    
    if(password!=confir) mensajes +='<li>Las contraseñas no son iguales</li>'
    if(username=='')    mensajes +='<li>Debes agregar un usuario</li>'
    if(password=='')    mensajes +='<li>Debes agregar una contraseña</li>'
    if(nombres=='')     mensajes +='<li>Debes agregar tus nombres</li>'
    if(apellidos=='')   mensajes +='<li>Debes agregar tus apellidos</li>'
    if(confir=='')      mensajes +='<li>Debes confirmar la contraseña</li>'
    if(identificacion=='')      mensajes +='<li>Debes agregar una identificacion</li>'
    if(email=='')      mensajes +='<li>Debes agregar un correo electronico</li>'
    if(roles=='')      mensajes +='<li>Debes Seleccionar un rol</li>'
    if(active=='')     mensajes +='<li>Debes Seleccionar un estado</li>'
    if(tipo_documento=='')     mensajes +='<li>Debes Seleccionar un tipo de documento</li>'
    
    if(mensajes!=''){
        document.getElementById('mensaje').innerHTML = `<div class='alert alert-danger' role='alert'> ${mensajes} </div>`
    }else{
        document.forregistro.submit()
    }
    
}

function ValidarInformacionRol() {

    let rol_nombre    = document.getElementById('rol_nombre').value
    let mensajes=''
    
    if(rol_nombre=='')     mensajes +='<li>Debes escribir un nombre al rol</li>'
    
    if(mensajes!=''){
        document.getElementById('mensaje').innerHTML = `<div class='alert alert-danger' role='alert'> ${mensajes} </div>`
    }else{
        document.forrole.submit()
    }
    
}

function ValidarInformacionEmpresa() {
    let documento           = document.getElementById('documento').value
    let nombre              = document.getElementById('nombre').value
    let direccion           = document.getElementById('direccion').value
    let telefono            = document.getElementById('telefono').value
    let nombre_contacto     = document.getElementById('nombre_contacto').value
    let registro_evaluacion = document.getElementById('registro_evaluacion').value
    let active              = document.getElementById('active').value
    //let name                = document.getElementById('name').value
    

    let mensajes=''
    
    if(documento=='')           mensajes +='<li>Debes agregar un documento</li>'
    if(nombre=='')              mensajes +='<li>Debes agregar un nombre</li>'
    if(direccion=='')           mensajes +='<li>Debes agregar una dirección </li>'
    if(telefono=='')            mensajes +='<li>Debes agregar un telefono</li>'
    if(nombre_contacto=='')     mensajes +='<li>Debes agregar un nombre de contacto</li>'
    if(registro_evaluacion=='') mensajes +='<li>Debes agregar un registro de la evaluación</li>'
    if(active=='')              mensajes +='<li>Debes Seleccionar un estado</li>'
    //if(name=='')                mensajes +='<li>Debes Seleccionar un listado de usuarios</li>'
    
    if(mensajes!=''){
        document.getElementById('mensaje').innerHTML = `<div class='alert alert-danger' role='alert'> ${mensajes} </div>`
    }else{
        document.forempresas.submit()
    }
    
}

function ValidarInformacionEvaluacion() {
    let companies_id    = document.getElementById('companies_id').value
    let evaluacion_id   = document.getElementById('evaluacion_id').value
    let cities_id       = document.getElementById('cities_id').value
    let codigo_sesion   = document.getElementById('codigo_sesion').value
    let respuesta       = document.getElementById('respuesta').value
    let formatoA        = document.getElementById('formatoA').value
    let formatoB        = document.getElementById('formatoB').value
    let burnout         = document.getElementById('burnout').value
    let users_id        = document.getElementById('users_id').value

    let mensajes=''
    
    if(companies_id=='')    mensajes +='<li>Debes seleccionar una empresa</li>'
    if(users_id=='')        mensajes +='<li>Debes seleccionar un usuario</li>'
    if(cities_id=='')       mensajes +='<li>Debes seleccionar una ciudad</li>'
    if(codigo_sesion=='')   mensajes +='<li>Debes agregar un codigo de sesion </li>'
    if(respuesta=='') { 
        mensajes +='<li>Debes agregar una respuesta</li>'
    }else if(respuesta=='0'){
        if(formatoA=='')        mensajes +='<li>Debes agregar un nombre de contacto</li>'
        if(formatoB=='')        mensajes +='<li>Debes agregar un registro de la evaluación</li>'
        if(burnout=='')         mensajes +='<li>Debes Seleccionar un estado</li>'
    }

    
    if(mensajes!=''){
        document.getElementById('mensaje').innerHTML = `<div class='alert alert-danger' role='alert'> ${mensajes} </div>`
    }else{
        document.forevaluacion.submit()
    }
    
}

function LimpiarInformacionRol() {
    document.getElementById('rol_nombre').value = ""
    document.getElementById('rol_id').value= ""    
}

function LimpiarInformacionUsuario() {
    document.getElementById('usernameregis').value = ""
    document.getElementById('passwregis').value = ""
    document.getElementById('nombres').value = ""
    document.getElementById('apellidos').value = ""
    document.getElementById('confirpassword').value = ""
    document.getElementById('email').value = ""
    document.getElementById('roles').value = ""
    document.getElementById('active').value = ""
    document.getElementById('id_usuario').value = ""
    document.getElementById('identificacion').value = ""
    document.getElementById('tipo_documento').value = ""
}

function LimpiarInformacionEmpresa() {
    document.getElementById('documento').value = ""
    document.getElementById('empresa_id').value = ""
    document.getElementById('nombre').value = ""
    document.getElementById('direccion').value = ""
    document.getElementById('telefono').value = ""
    document.getElementById('nombre_contacto').value = ""
    document.getElementById('registro_evaluacion').value = ""
    document.getElementById('active').value = ""
    document.getElementById('name').value = ""
}

function LimpiarInformacionEvaluaciones() {
    document.getElementById('companies_id').value = ""
    document.getElementById('evaluacion_id').value = ""
    document.getElementById('cities_id').value = ""
    document.getElementById('codigo_sesion').value = ""
    document.getElementById('respuesta').value = ""
    document.getElementById('formatoA').value = ""
    document.getElementById('formatoB').value = ""
    document.getElementById('burnout').value = ""
    document.getElementById('users_id').value = ""

    let div = document.getElementById('limpiar');
    div.style.display = 'none';

    let div2 = document.getElementById('limpiar2');
    div2.style.display = 'none';

    window.location.href = '../evaluacion/evaluaciones.php'
}

function ValidarDatos() {

    let tipo_documento          = document.getElementsByName('tipo_documento')[0].value
    let identificacion          = document.getElementsByName('identificacion')[0].value
    let nombre_completo         = document.getElementsByName('nombre_completo')[0].value
    let sexoradio               = $('input[name="sexoradio"]:checked').val()
    let anio_nacimiento         = document.getElementsByName('anio_nacimiento')[0].value
    let estado_civil            = document.getElementsByName('estado_civil')[0].value
    let nivel_estudio           = document.getElementsByName('nivel_estudio')[0].value
    let ocupacion_profesion     = document.getElementsByName('ocupacion_profesion')[0].value
    let residenciaciudad        = document.getElementsByName('residenciaciudad')[0].value
    let residenciadepartamento  = document.getElementsByName('residenciadepartamento')[0].value
    let estrato                 = document.getElementsByName('estrato')[0].value
    let viviendaradio           = $('input[name="viviendaradio"]:checked').val()
    let dependencia_economica   = document.getElementsByName('dependencia_economica')[0].value
    let trabajociudad           = document.getElementsByName('trabajociudad')[0].value
    let trabajodepartamento     = document.getElementsByName('trabajodepartamento')[0].value
    let anios_trabajo           = document.getElementsByName('anios_trabajo')[0].value
    let aniosradio              = $('input[name="aniosradio"]:checked').val()
    let cargo_ocupa             = document.getElementsByName('cargo_ocupa')[0].value
    let tipo_cargo              = document.getElementsByName('tipo_cargo')[0].value
    let anios_cargo             = document.getElementsByName('anios_cargo')[0].value
    let anioscradio             = $('input[name="anioscradio"]:checked').val()
    let nombre_area             = document.getElementsByName('nombre_area')[0].value
    let tipo_contrato           = document.getElementsByName('tipo_contrato')[0].value
    let horas_diarias           = document.getElementsByName('horas_diarias')[0].value
    let salarioradio            = $('input[name="salarioradio"]:checked').val()

    let mensajes='<header class="text-center"><b> FICHA DE DATOS GENERALES </b></header><br><ul class="text-left">'

    if(tipo_documento       =='') mensajes +='<li>Debes seleccionar un tipo de documento</li>'
    if(identificacion       =='') mensajes +='<li>Debes agregar un numero de identificacion</li>'
    if(nombre_completo      =='') mensajes +='<li>Debes agregar su nombre completo</li>'
    if(typeof(sexoradio)    === "undefined")  mensajes +='<li>Debes seleccionar un sexo</li>'
    if(anio_nacimiento      =='') mensajes +='<li>Debes agregar tu año de nacimiento</li>'
    if(estado_civil         =='') mensajes +='<li>Debes seleccionar un estado civil</li>'
    if(nivel_estudio        =='') mensajes +='<li>Debes seleccionar un nivel de estudio</li>'
    if(ocupacion_profesion  =='') mensajes +='<li>Debes agregar una ocupación o profesión</li>'
    if(residenciaciudad     =='') mensajes +='<li>Debes agregar un lugar de residencia actual</li>'
    if(residenciadepartamento =='') mensajes +='<li>Debes agregar un departamento residencia</li>'
    if(estrato              =='') mensajes +='<li>Debes seleccionar un estrato</li>'
    if(typeof(viviendaradio)=== "undefined")  mensajes +='<li>Debes seleccionar un tipo de vivienda</li>'
    if(dependencia_economica=='') mensajes +='<li>Debes agregar el numero de personas que dependandan de usted</li>'
    if(trabajociudad        =='') mensajes +='<li>Debes agregar la ciudad de trabajo</li>'
    if(trabajodepartamento  =='') mensajes +='<li>Debes agregar el departamento de trabajo</li>'
    if(anios_trabajo        =='' && typeof(aniosradio)=== "undefined") mensajes +='<li>Debes agregar los años que lleva trabajando en esta empresa</li>'
    if(cargo_ocupa          =='') mensajes +='<li>Debes agregar el nombre del cargo que ocupa</li>'
    if(tipo_cargo           =='') mensajes +='<li>Debes seleccionar el tipo de cargo</li>'
    if(anios_cargo          =='' && typeof(anioscradio)=== "undefined") mensajes +='<li>Debes agregar los años que lleva desempeñando el cargo actual</li>'
    if(nombre_area          =='') mensajes +='<li>Debes agregar el nombre del departamento o area donde trabaja</li>'
    if(tipo_contrato        =='') mensajes +='<li>Debes seleccionar el tipo de contrato</li>'
    if(horas_diarias        =='') mensajes +='<li>Debes agregar cuantas horas diarias de trabajo están establecidas por la empresa</li>'
    if(typeof(salarioradio)=== "undefined")  mensajes +='<li>Debes seleccionar el tipo de salario que recibe</li>'
    mensajes +='</ul>'

    mensajes +='<header class="text-center"><b> FACTORES DE RIESGO PSICOSOCIAL INTRALABORAL </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= 123; i++) {
        let valor = `input[name="bloque${i}radio"]:checked`
        let pre_intra = $(valor).val()
        
        if(typeof(pre_intra)=== "undefined") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    mensajes +='<header class="text-center"><b> EVALUACIÓN DEL ESTRÉS </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= 31; i++) {
        let valor = `input[name="estbloque${i}radio"]:checked`
        let pre_intra = $(valor).val()
        
        if(typeof(pre_intra)=== "undefined") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    mensajes +='<header class="text-center"><b> FACTORES PSICOSOCIALES EXTRALABORALES </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= 31; i++) {
        let valor = `input[name="est2bloque${i}radio"]:checked`
        let pre_intra = $(valor).val()
        
        if(typeof(pre_intra)=== "undefined") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    let datos = `<header class="text-center"><b> FICHA DE DATOS GENERALES </b></header><br><ul class="text-left"></ul><header class="text-center"><b> FACTORES DE RIESGO PSICOSOCIAL INTRALABORAL </b></header><br><ul class="text-left"></ul><header class="text-center"><b> EVALUACIÓN DEL ESTRÉS </b></header><br><ul class="text-left"></ul><header class="text-center"><b> FACTORES PSICOSOCIALES EXTRALABORALES </b></header><br><ul class="text-left"></ul>`

    let igual

    if(mensajes.trim() == datos.trim()) {
        igual = 0
    }else{
        igual = 1
    }

    console.log(igual)

    if(igual == 1){
        Swal.fire({
            title: '<strong>Te faltan los siguientes datos: </strong>',
            icon: 'error',
            html:
              '<div class="alert alert-danger" role="alert">' + mensajes + '</div>',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false
          })
        
    }else{
        document.fordatos.submit()
    }

}


function showContent() {
    element     = document.getElementById("content");
    check       = document.getElementById("respuesta").value;
    if (check == '0') {
        element.style.display='block';
    }else {
        element.style.display='none';
    }
}


function EnviarDatosFormatoA() {
    let conteo_intralaboral = document.getElementById("conteo_intralaboral").value;
    let conteo_estres       = document.getElementById("conteo_estres").value;
    let conteo_extralaboral = document.getElementById("conteo_extralaboral").value;

    let mensajes ='<header class="text-center"><b> FACTORES DE RIESGO PSICOSOCIAL INTRALABORAL </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= conteo_intralaboral; i++) {
        let intralaboral   = document.getElementsByName('intralaboral'+i)[0].value

        if(intralaboral == "") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    mensajes +='<header class="text-center"><b> EVALUACIÓN DEL ESTRÉS </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= conteo_estres; i++) {
        let estres   = document.getElementsByName('estres'+i)[0].value

        if(estres == "") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    mensajes +='<header class="text-center"><b> FACTORES PSICOSOCIALES EXTRALABORALES </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= conteo_extralaboral; i++) {
        let extralaboral   = document.getElementsByName('extralaboral'+i)[0].value

        if(extralaboral == "") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    let datos = `<header class="text-center"><b> FACTORES DE RIESGO PSICOSOCIAL INTRALABORAL </b></header><br><ul class="text-left"></ul><header class="text-center"><b> EVALUACIÓN DEL ESTRÉS </b></header><br><ul class="text-left"></ul><header class="text-center"><b> FACTORES PSICOSOCIALES EXTRALABORALES </b></header><br><ul class="text-left"></ul>`


    if(mensajes.trim() == datos.trim()) {
        igual = 0
    }else{
        igual = 1
    }

    if(igual == 1){
        Swal.fire({
            title: '<strong>Te faltan los siguientes datos: </strong>',
            icon: 'error',
            html:
              '<div class="alert alert-danger" role="alert">' + mensajes + '</div>',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false
          })
        
    }else{
        document.formatoA.submit()
    }

}

function EnviarDatosFormatoB() {
    let conteo_intralaboral = document.getElementById("conteo_intralaboral").value;
    let conteo_extralaboral = document.getElementById("conteo_extralaboral").value;

    let mensajes ='<header class="text-center"><b> FACTORES DE RIESGO PSICOSOCIAL INTRALABORAL </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= conteo_intralaboral; i++) {
        let intralaboral   = document.getElementsByName('intralaboral'+i)[0].value

        if(intralaboral == "") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    mensajes +='<header class="text-center"><b> FACTORES PSICOSOCIALES EXTRALABORALES </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= conteo_extralaboral; i++) {
        let extralaboral   = document.getElementsByName('extralaboral'+i)[0].value

        if(extralaboral == "") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    let datos = `<header class="text-center"><b> FACTORES DE RIESGO PSICOSOCIAL INTRALABORAL </b></header><br><ul class="text-left"></ul><header class="text-center"><b> FACTORES PSICOSOCIALES EXTRALABORALES </b></header><br><ul class="text-left"></ul>`


    if(mensajes.trim() == datos.trim()) {
        igual = 0
    }else{
        igual = 1
    }

    if(igual == 1){
        Swal.fire({
            title: '<strong>Te faltan los siguientes datos: </strong>',
            icon: 'error',
            html:
              '<div class="alert alert-danger" role="alert">' + mensajes + '</div>',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false
          })
        
    }else{
        document.formatoB.submit()
    }

}


function EnviarDatosBurnout() {
    let conteo_burnout = document.getElementById("conteo_burnout").value;

    let mensajes ='<header class="text-center"><b> BURNOUT </b></header><br>'
    mensajes +='<ul class="text-left">'
    for (let i = 1; i <= conteo_burnout; i++) {
        let burnout   = document.getElementsByName('burnout'+i)[0].value

        if(burnout == "") mensajes +=`<li>Debe seleccionar la pregunta ${i} </li>`
    }
    mensajes +='</ul>'

    let datos = `<header class="text-center"><b> BURNOUT </b></header><br><ul class="text-left"></ul>`

    if(mensajes.trim() == datos.trim()) {
        igual = 0
    }else{
        igual = 1
    }

    /*if(igual == 1){
        Swal.fire({
            title: '<strong>Te faltan los siguientes datos: </strong>',
            icon: 'error',
            html:
              '<div class="alert alert-danger" role="alert">' + mensajes + '</div>',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false
          })
        
    }else{*/
        document.Burnout.submit()
    //}

}






function EnviarDatosGenerales() {
    let tipo_documento          = document.getElementsByName('tipo_documento')[0].value
    let identificacion          = document.getElementsByName('identificacion')[0].value
    let nombre_completo         = document.getElementsByName('nombre_completo')[0].value
    let sexoradio               = $('input[name="sexoradio"]:checked').val()
    let anio_nacimiento         = document.getElementsByName('anio_nacimiento')[0].value
    let estado_civil            = document.getElementsByName('estado_civil')[0].value
    let nivel_estudio           = document.getElementsByName('nivel_estudio')[0].value
    let ocupacion_profesion     = document.getElementsByName('ocupacion_profesion')[0].value
    let residenciaciudad        = document.getElementsByName('residenciaciudad')[0].value
    let residenciadepartamento  = document.getElementsByName('residenciadepartamento')[0].value
    let estrato                 = document.getElementsByName('estrato')[0].value
    let viviendaradio           = $('input[name="viviendaradio"]:checked').val()
    let dependencia_economica   = document.getElementsByName('dependencia_economica')[0].value
    let trabajociudad           = document.getElementsByName('trabajociudad')[0].value
    let trabajodepartamento     = document.getElementsByName('trabajodepartamento')[0].value
    let anios_trabajo           = document.getElementsByName('anios_trabajo')[0].value
    let aniosradio              = $('input[name="aniosradio"]:checked').val()
    let cargo_ocupa             = document.getElementsByName('cargo_ocupa')[0].value
    let tipo_cargo              = document.getElementsByName('tipo_cargo')[0].value
    let anios_cargo             = document.getElementsByName('anios_cargo')[0].value
    let anioscradio             = $('input[name="anioscradio"]:checked').val()
    let nombre_area             = document.getElementsByName('nombre_area')[0].value
    let tipo_contrato           = document.getElementsByName('tipo_contrato')[0].value
    let horas_diarias           = document.getElementsByName('horas_diarias')[0].value
    let salarioradio            = $('input[name="salarioradio"]:checked').val()

    let mensajes='<header class="text-center"><b> FICHA DE DATOS GENERALES </b></header><br><ul class="text-left">'

    if(tipo_documento       =='') mensajes +='<li>Debes seleccionar un tipo de documento</li>'
    if(identificacion       =='') mensajes +='<li>Debes agregar un numero de identificacion</li>'
    if(nombre_completo      =='') mensajes +='<li>Debes agregar su nombre completo</li>'
    if(typeof(sexoradio)    === "undefined")  mensajes +='<li>Debes seleccionar un sexo</li>'
    if(anio_nacimiento      =='') mensajes +='<li>Debes agregar tu año de nacimiento</li>'
    if(estado_civil         =='') mensajes +='<li>Debes seleccionar un estado civil</li>'
    if(nivel_estudio        =='') mensajes +='<li>Debes seleccionar un nivel de estudio</li>'
    if(ocupacion_profesion  =='') mensajes +='<li>Debes agregar una ocupación o profesión</li>'
    if(residenciaciudad     =='') mensajes +='<li>Debes agregar un lugar de residencia actual</li>'
    if(residenciadepartamento =='') mensajes +='<li>Debes agregar un departamento residencia</li>'
    if(estrato              =='') mensajes +='<li>Debes seleccionar un estrato</li>'
    if(typeof(viviendaradio)=== "undefined")  mensajes +='<li>Debes seleccionar un tipo de vivienda</li>'
    if(dependencia_economica=='') mensajes +='<li>Debes agregar el numero de personas que dependandan de usted</li>'
    if(trabajociudad        =='') mensajes +='<li>Debes agregar la ciudad de trabajo</li>'
    if(trabajodepartamento  =='') mensajes +='<li>Debes agregar el departamento de trabajo</li>'
    if(anios_trabajo        =='' && typeof(aniosradio)=== "undefined") mensajes +='<li>Debes agregar los años que lleva trabajando en esta empresa</li>'
    if(cargo_ocupa          =='') mensajes +='<li>Debes agregar el nombre del cargo que ocupa</li>'
    if(tipo_cargo           =='') mensajes +='<li>Debes seleccionar el tipo de cargo</li>'
    if(anios_cargo          =='' && typeof(anioscradio)=== "undefined") mensajes +='<li>Debes agregar los años que lleva desempeñando el cargo actual</li>'
    if(nombre_area          =='') mensajes +='<li>Debes agregar el nombre del departamento o area donde trabaja</li>'
    if(tipo_contrato        =='') mensajes +='<li>Debes seleccionar el tipo de contrato</li>'
    if(horas_diarias        =='') mensajes +='<li>Debes agregar cuantas horas diarias de trabajo están establecidas por la empresa</li>'
    if(typeof(salarioradio)=== "undefined")  mensajes +='<li>Debes seleccionar el tipo de salario que recibe</li>'
    mensajes +='</ul>'

    let datos = `<header class="text-center"><b> FICHA DE DATOS GENERALES </b></header><br><ul class="text-left"></ul>`

    if(mensajes.trim() == datos.trim()) {
        igual = 0
    }else{
        igual = 1
    }

    if(igual == 1){
        Swal.fire({
            title: '<strong>Te faltan los siguientes datos: </strong>',
            icon: 'error',
            html:
              '<div class="alert alert-danger" role="alert">' + mensajes + '</div>',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false
          })
        
    }else{
        document.datosgenerales.submit()
    }

}