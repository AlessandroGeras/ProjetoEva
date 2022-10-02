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
