//Animações para abertura e fechamento do menu mobile

const menu_click = (clicked_id) => {

    if (clicked_id == "menu_open") {
        let navbar_menu = document.getElementById("navbar_menu");
        navbar_menu.className = "mobile_open";

        let menu_open = document.getElementById("menu_open");
        menu_open.className = "menu_close";

        let menu_close = document.getElementById("menu_close");
        menu_close.className = "menu_open";
        
        let index_logo = document.getElementById("index_logo");
            if (index_logo) {
            index_logo.className = "margin";
            } 
        
        let cursos_title = document.getElementById("palestras_title");
            if (cursos_title) {
                cursos_title.className = "margin";
            } 
    }
    
    else {

        let navbar_menu = document.getElementById("navbar_menu");
        navbar_menu.className = "mobile_close";

        let menu_open = document.getElementById("menu_open");
        menu_open.className = "menu_open";

        let menu_close = document.getElementById("menu_close");
        menu_close.className = "menu_close";
        
        let index_logo = document.getElementById("index_logo");
            if (index_logo) {
                index_logo.className = "no_margin";
            }

        let cursos_title = document.getElementById("palestras_title");
            if (cursos_title) {
                cursos_title.className = "no_margin";
         }
    }
};
