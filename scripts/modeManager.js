function init()
{
    document.getElementById("lightDarkToggle").addEventListener("click", toggleMode);
}

function toggleMode(event){
    console.log("toggleMode");
    if(state="light"){
        state="dark";
        document.body.style.backgroundColor = "black";
        document.body.style.color = "white";
    }
    if(state="dark"){
        state="light";
        document.body.style.backgroundColor = "white";
        document.body.style.color = "black";
    }
}

state = "light";
init();