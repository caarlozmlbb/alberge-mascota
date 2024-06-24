<head>
    <link rel="stylesheet" href="{{ asset('css/adoptar.css') }}">
</head>

<div class="all">
    <body>
    <div class="container">
    
        <div class="box">
            <div class="header">
                <header><img src="images/logo.png" alt=""></header>
                <p>Confirmación de Adopción</p>
            </div>
            
            
    
            <div class="input-box">
                <form action="{{ route('solicitudes.store') }}" method="POST">
                    
                    <label for="">Nombre de la Mascota que desea adoptar:</label>
                    
                    <input type="text" name="mascota_nombre" >
                    <!-- <i class="bx bxs-dog"></i> -->
            </div>
            
            {{-- <img src="peg.jpg" alt="Descripción de la imagen" width="300"> --}}
    
            <div class="input-box">
                <input type="submit" class="input-submit" value="Enviar Solicitud">
                </form>
            </div>
    
        </div>
        <div class="wrapper"></div>
    </div>
    </body>
    </div>