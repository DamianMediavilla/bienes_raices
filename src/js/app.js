document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
    //Eliminar texto de confirmación de CRUD en admin/index.php
    setInterval(function(){
    const mensajeConfirm = document.querySelector('.alerta.exito');
            const padre = mensajeConfirm.parentElement;
            padre.removeChild(mensajeConfirm);
        }, 3500);
});

function darkMode(){
    const preferenciaDarkMode=window.matchMedia('(prefers-color-scheme: dark)');
    const botonDarkMode =document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    })
    if (preferenciaDarkMode){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }
    preferenciaDarkMode.addEventListener('change', function(){
        if (preferenciaDarkMode){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }

    })
}


function eventListeners(){
    const mobileMenu=document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}
function navegacionResponsive(){
    const navegacion=document.querySelector('.navegacion')
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }
    //  navegacion.classList.toggle('mostrar');

}

 