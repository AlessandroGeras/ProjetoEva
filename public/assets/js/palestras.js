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


// Repassar os dados da palestra clicada para autocompletar o formulário editar palestra e definir as rotas para editar e excluir a palestra
const palestra_events = (id,nome,info,date) => {        

    let apagar_palestra_form = document.getElementById("apagar_palestra_form");
    apagar_palestra_form.method = "post";
    apagar_palestra_form.action = "/palestras/destroy/"+id;

    let form_editar_palestras_action = document.getElementById("form_editar_palestras_action");
    form_editar_palestras_action.action = "/palestras/edit/"+id; 

    let form_editar_palestras_nome = document.getElementById("form_editar_palestras_nome");
    form_editar_palestras_nome.value = nome;    

    let form_editar_palestras_info = document.getElementById("form_editar_palestras_info");
    form_editar_palestras_info.value = info;

    let form_editar_palestras_date = document.getElementById("form_editar_palestras_date");
    form_editar_palestras_date.value = date;
};


// Mostrar formulário de edição de cursos na página courses
const editar_palestra = () => {

    let form_editar_palestra_container=document.getElementById("form_editar_palestra_container");

    if (form_editar_palestra_container.style.display=="none" ||form_editar_palestra_container.style.display=="" ) {
        form_editar_palestra_container.style.display="block";
    }

    else {
        form_editar_palestra_container.style.display="none";
    }    
};


/* Função desabilitada
const excluir_curso = (id,name) => {

    if (confirm('Deseja realmente apagar "'+name+'"?') == true) {
        loading("Excluindo curso");
        window.location.href = "/courses/destroy/"+id;
      }
}
*/