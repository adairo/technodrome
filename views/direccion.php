<link rel='stylesheet' href='style/css/global.css'>
<link rel='stylesheet' href='style/css/signup.css'>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TECHNODROME STORE-Agregar Direccion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container" style="margin:auto;">
        <br>
        <div class="row">
            <div class="col" style="border-style: solid; border-radius: 4px ;">
                
                <h3>Direccion 1:</h3>
                <label for="">C Zaragoza 35</label><br>
                <label for="">Col Los Sapos </label>
                <label for="">78543</label><br>
                <label for="">Puebla, </label>
                <label for="">Puebla</label>
            </div>
            <div class="col"></div>
            <div class="col" style="border-style: solid; border-radius: 4px ;">
               
                <h3>Direccion 2:</h3>
                <label for="">C Zaragoza 35</label><br>
                <label for="">Col Los Sapos </label>
                <label for="">78543</label><br>
                <label for="">Puebla, </label>
                <label for="">Puebla</label>
            </div>
        </div>
    </div>  
    
    
    <div class="container" style="margin:auto;">
        
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form method="post" action="ventana.html" >
                    <br>
                    <h1 style="font-family : Arial Narrow; font-weight: bold; text-align: center;" > Agregar Una Nueva Direccion </h1>
                    <div class="mb-3">
                        <label for="nuevadir"class="form-label"><b>Nombre completo (Nombre y apellidos):</b></label>
                        <input type="text" placeholder="Nombre Completo" class="form-control" id="nuevadir" name="nuevadir">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Nombre de la Calle:</b></label>
                        <input type="text" placeholder="Nombre de Calle y numero de casa " class="form-control" name="nuevacalle">
                    </div>
                
                    <div class="mb-3">
                        <label class="form-label"><b>Nombre de Colonia:</b></label>
                        <input type="text" placeholder="Nombre de Colonia" class="form-control" name="nuevacolonia">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Codigo Postal:</b></label>
                        <input type="text" placeholder="Por ejemplo: 72481" class="form-control" name="nuevacodigopostal">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Municipio:</b></label>
                        <input type="text" placeholder="Por ejemplo: Puebla" class="form-control" name="nuevamunicipio">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Estado:</b></label>
                        <select class="form-select" name="nuevaestadooption" id="estadooption" >
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Ciudad de México">Ciudad de México</option>
                            <option value="Estado de México">Estado de México</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                            <option value="Colima">Colima</option>
                            <option value="Durango">Durango</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select><br><br>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" style="background-color: #3bb2b8; border-radius: 4px; width:100%; background: linear-gradient(
                            45deg,
                            rgba(192, 260, 240, 1),
                            rgba(235, 190, 149, 1)
                            );" name="nuevadir_boton" value="Agregar Direccion y pagar">
                    </div>
                    
                </form>
                
            </div>
            <div class="col"></div>
        </div>
    </div>
       
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>