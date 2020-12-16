// Funcion para desconectarse
function funcionAlerta(){

    if (window.confirm("¿Seguro que quieres salir?")) { 
        open("./../comprovaciones-formularios/logout.php", target="_self");
    }    

}
