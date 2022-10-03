function toggleMode(){
    if(state=="light"){
        state="dark";
        button.innerText = "Light Mode";
        r.style.setProperty('--clr-light', "dimgrey");
        r.style.setProperty('--clr-grey', 'grey');
        r.style.setProperty('--clr-dark', 'white');
        r.style.setProperty('--clr-accent-dark', '#b3d7f5');
        r.style.setProperty('--clr-accent-light', '#004b87');
    }
    else if(state=="dark"){
        state="light";
        button.innerText = "Dark Mode";
        r.style.setProperty('--clr-light', "#ffffff");
        r.style.setProperty('--clr-grey', '#cccccc');
        r.style.setProperty('--clr-dark', '#000000');
        r.style.setProperty('--clr-accent-dark', '#004b87');
        r.style.setProperty('--clr-accent-light', '#b3d7f5');
    }
}
state = "light";
const r = document.querySelector(':root');
const button = document.getElementById('modeToggle');
button.innerText = "Dark Mode";