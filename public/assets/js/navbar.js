//Animações para abertura e fechamento do menu mobile

const menu_click = (clicked_id) => {
    if (clicked_id == "menu_open") {
        let navbar_menu = document.getElementById("navbar_menu");
        navbar_menu.className =
            "mobile_open w-full h-full block bg-blue-500 float-left lg:float-right lg:w-[750px] lg:bg-transparent";

        let menu_open = document.getElementById("menu_open");
        menu_open.className = "menu_close hidden dark:text-gray-300";

        let menu_close = document.getElementById("menu_close");
        menu_close.className = "menu_open dark:text-gray-300";

        let index_logo = document.getElementById("index_logo");
        if (index_logo) {
            index_logo.className =
                "inline-block w-full h-40 mt-0 bg-zinc-900 sm:h-52 lg:mt-0 dark:bg-sky-900";
        }

        let cursos_title = document.getElementById("palestras_title");
        if (cursos_title) {
            cursos_title.className = "margin";
        }
    } else {
        let navbar_menu = document.getElementById("navbar_menu");
        navbar_menu.className =
            "mobile_close w-full h-full block bg-blue-500 float-left lg:float-right lg:w-[750px] lg:bg-transparent";

        let menu_open = document.getElementById("menu_open");
        menu_open.className = "menu_open dark:text-gray-300";

        let menu_close = document.getElementById("menu_close");
        menu_close.className = "menu_close hidden dark:text-gray-300";

        let index_logo = document.getElementById("index_logo");
        if (index_logo) {
            index_logo.className =
                "inline-block w-full -mt-24 h-40 bg-zinc-900 sm:h-52 lg:mt-0 dark:bg-sky-900";
        }

        let cursos_title = document.getElementById("palestras_title");
        if (cursos_title) {
            cursos_title.className = "no_margin";
        }
    }
};

const darkmode = () => {
    var elementArray = document.getElementsByTagName("html");
    for (var i = 0; i < elementArray.length; i++) {
        if (elementArray[i].className == "dark") {
            elementArray[i].className = "";
        } else {
            elementArray[i].className = "dark";
        }
    }
};
