// Mostrar o input warning na página minha conta

const warning = () => {    
    
    let warning_styled_input_container=document.getElementById("warning_styled_input_container");

    if (warning_styled_input_container.style.display=="none" || warning_styled_input_container.style.display=="" ) {
        warning_styled_input_container.style.display="block";
    }

    else {
        warning_styled_input_container.style.display="none";
    }
};


const warning_close = () => {  

    let index_warning=document.getElementById("index_warning");

    index_warning.style.display="none";
};