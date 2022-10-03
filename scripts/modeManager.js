function toggleMode(){
    if(state.mode=="light"){
        state.mode="dark";
        button.innerText = "Light Mode";
        r.style.setProperty('--clr-light', "#404040");
        r.style.setProperty('--clr-grey', '#666666');
        r.style.setProperty('--clr-dark', 'white');
        r.style.setProperty('--clr-accent-dark', '#b3d7f5');
        r.style.setProperty('--clr-accent-light', '#004b87');
        localStorage.setItem('state', JSON.stringify(state));
    }
    else if(state.mode=="dark"){
        state.mode="light";
        button.innerText = "Dark Mode";
        r.style.setProperty('--clr-light', "#ffffff");
        r.style.setProperty('--clr-grey', '#eeeeee');
        r.style.setProperty('--clr-dark', '#000000');
        r.style.setProperty('--clr-accent-dark', '#004b87');
        r.style.setProperty('--clr-accent-light', '#b3d7f5');
        localStorage.setItem('state', JSON.stringify(state));
    }
}

function init(){
    if(state.mode=="light"){
        button.innerText = "Dark Mode";
        r.style.setProperty('--clr-light', "#ffffff");
        r.style.setProperty('--clr-grey', '#eeeeee');
        r.style.setProperty('--clr-dark', '#000000');
        r.style.setProperty('--clr-accent-dark', '#004b87');
        r.style.setProperty('--clr-accent-light', '#b3d7f5');
    }
    else if(state.mode=="dark"){
        button.innerText = "Light Mode";
        r.style.setProperty('--clr-light', "#404040");
        r.style.setProperty('--clr-grey', '#666666');
        r.style.setProperty('--clr-dark', 'white');
        r.style.setProperty('--clr-accent-dark', '#b3d7f5');
        r.style.setProperty('--clr-accent-light', '#004b87');
    }
}

state = {
    mode: "light",
    size: 14.0
};
console.log(localStorage.getItem('state'));
if(localStorage.getItem('state')!=null){
    state = JSON.parse(localStorage.getItem('state'));
}
const r = document.querySelector(':root');
var b = document.getElementsByTagName("body")[0]; 
const button = document.getElementById('modeToggle');
init();
setTimeout(function(){
    b.style.setProperty('transition', '0.25s ease-in');
}, 1000);