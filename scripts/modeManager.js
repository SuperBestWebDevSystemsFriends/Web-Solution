function toggleMode(){
    if(state=="light"){
        state="dark";
        button.innerText = "Light Mode";
        r.style.setProperty('--clr-light', "#404040");
        r.style.setProperty('--clr-grey', '#666666');
        r.style.setProperty('--clr-dark', 'white');
        r.style.setProperty('--clr-accent-dark', '#b3d7f5');
        r.style.setProperty('--clr-accent-light', '#004b87');
    }
    else if(state=="dark"){
        state="light";
        button.innerText = "Dark Mode";
        r.style.setProperty('--clr-light', "#ffffff");
        r.style.setProperty('--clr-grey', '#eeeeee');
        r.style.setProperty('--clr-dark', '#000000');
        r.style.setProperty('--clr-accent-dark', '#004b87');
        r.style.setProperty('--clr-accent-light', '#b3d7f5');
    }
}
state = "light";
const r = document.querySelector(':root');
const button = document.getElementById('modeToggle');
button.innerText = "Dark Mode";