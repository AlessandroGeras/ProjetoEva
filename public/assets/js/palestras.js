// Mostrar formulário de criação de palestras na página palestras

const criar_palestra = (clicked_id) => {
    
    if (clicked_id == "criar_palestra_botao") {
        let criar_palestra = document.getElementById("criar_palestra");
        criar_palestra.className = "hidden";

        let form_criar_palestras = document.getElementById("form_criar_palestras");
        form_criar_palestras.className = "form_criar_palestras_margin visible";        
        let form_pesquisar_palestras = document.getElementById("form_pesquisar_palestras");
        form_pesquisar_palestras.className = "hidden"; 
    }

    else {
        let criar_palestra = document.getElementById("criar_palestra");
        criar_palestra.className = "visible";

        let form_criar_palestras = document.getElementById("form_criar_palestras");
        form_criar_palestras.className = "hidden";

        let form_pesquisar_palestras = document.getElementById("form_pesquisar_palestras");
        form_pesquisar_palestras.className = "hidden"; 
    }
};


// Mostrar formulário de pesquisa de palestras na página palestras
const pesquisar_palestra = (clicked_id) => {
    
    if (clicked_id == "pesquisar_palestra_botao") {
        let criar_palestra = document.getElementById("criar_palestra");
        criar_palestra.className = "hidden";

        let form_criar_palestras = document.getElementById("form_criar_palestras");
        form_criar_palestras.className = "hidden";

        let form_pesquisar_palestras = document.getElementById("form_pesquisar_palestras");
        form_pesquisar_palestras.className = "visible"; 
    }

     else {
         let criar_palestra = document.getElementById("criar_palestra");
        criar_palestra.className = "visible";

        let form_criar_palestras = document.getElementById("form_criar_palestras");
        form_criar_palestras.className = "hidden";

        let form_pesquisar_palestras = document.getElementById("form_pesquisar_palestras");
        form_pesquisar_palestras.className = "hidden"; 
    }
};