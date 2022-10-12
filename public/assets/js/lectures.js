// Mostrar formulário de criação de palestras na página palestras

const create_lecture = () => {

    let create_lecture_styled_input_container = document.getElementById(
        "create_lecture_styled_input_container"
    );

    if (create_lecture_styled_input_container.className != "hidden") {
        create_lecture_styled_input_container.className = "hidden"       
    }
    
    else {
        let create_lecture_styled_input_container = document.getElementById("create_lecture_styled_input_container");
        create_lecture_styled_input_container.className = "visible mt-2.5 mb-5";        
    }
};

// Mostrar formulário de edição de palestras
const edit_lecture = (name, info, date) => {
    let edit_lecture = document.getElementById("edit_lecture");

    if (edit_lecture.className == "hidden") {
        edit_lecture.className = "block mb-2";

        let edit_lecture_name = document.getElementById("edit_lecture_name");
        edit_lecture_name.value = name;

        let edit_lecture_info = document.getElementById("edit_lecture_info");
        edit_lecture_info.value = info;

        let edit_lecture_date = document.getElementById("edit_lecture_date");
        edit_lecture_date.value = date;
    } else {
        edit_lecture.className = "hidden";
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
