function funcionAlerta(){
    if (window.confirm("¿Seguro que quieres salir?")) { 
        open("./../index.html", target="_self");
    }    
}
