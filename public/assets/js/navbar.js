//Animações para abertura e fechamento do menu mobile

const menu_click = (clicked_id) => {

    if (clicked_id == "menu_open") {
        let navbar_menu = document.getElementById("navbar_menu");
        navbar_menu.className = "mobile_open w-full h-full block bg-blue-500 float-left lg:float-right lg:w-3/4 lg:bg-transparent xl:w-3/5";

        let menu_open = document.getElementById("menu_open");
        menu_open.className = "menu_close hidden dark:text-gray-300";

        let menu_close = document.getElementById("menu_close");
        menu_close.className = "menu_open dark:text-gray-300";
        
        let index_logo = document.getElementById("index_logo");
            if (index_logo) {
            index_logo.className = "inline-block mt-0 w-full h-36 bg-black lg:mt-0 sm:h-48 dark:bg-gray-700";
            } 
        
        let cursos_title = document.getElementById("palestras_title");
            if (cursos_title) {
                cursos_title.className = "margin";
            } 
    }
    
    else {

        let navbar_menu = document.getElementById("navbar_menu");
        navbar_menu.className = "mobile_close w-full h-full block bg-blue-500 float-left lg:float-right lg:w-3/4 lg:bg-transparent xl:w-3/5";

        let menu_open = document.getElementById("menu_open");
        menu_open.className = "menu_open dark:text-gray-300";

        let menu_close = document.getElementById("menu_close");
        menu_close.className = "menu_close hidden dark:text-gray-300";
        
        let index_logo = document.getElementById("index_logo");
            if (index_logo) {
                index_logo.className = "inline-block -mt-24 w-full h-36 bg-black lg:mt-0 sm:h-48 dark:bg-gray-700";
            }

        let cursos_title = document.getElementById("palestras_title");
            if (cursos_title) {
                cursos_title.className = "no_margin";
         }
    }
};