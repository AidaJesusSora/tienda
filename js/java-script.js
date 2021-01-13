// Funcion para desconectarse
function funcionAlerta(){

    if (window.confirm("¿Seguro que quieres salir?")) { 
        open("/tienda/comprovaciones-formularios/logout.php", target="_self");
    }    

}
