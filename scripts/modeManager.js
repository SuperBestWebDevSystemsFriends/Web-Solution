function toggleMode(){
    if(state.mode=="light"){
        state.mode="dark";
        if(state.oversize){
            modeButton.innerHTML = "<i class=\"fa-solid fa-lightbulb\"></i>";
        } else{
            modeButton.innerHTML = "<i class=\"fa-solid fa-lightbulb\"></i> Light Mode";
        }
        r.style.setProperty('--clr-light', "#404040");
        r.style.setProperty('--clr-grey', '#666666');
        r.style.setProperty('--clr-dark', 'white');
        r.style.setProperty('--clr-accent-dark', accentLight);
        r.style.setProperty('--clr-accent-light', accentDark);
        localStorage.setItem('state', JSON.stringify(state));
    }
    else if(state.mode=="dark"){
        state.mode="light";
        if(state.oversize){
            modeButton.innerHTML = "<i class=\"fa-solid fa-moon\"></i>";
        } else{
            modeButton.innerHTML = "<i class=\"fa-solid fa-moon\"></i> Dark Mode";
        }
        r.style.setProperty('--clr-light', "#ffffff");
        r.style.setProperty('--clr-grey', '#eeeeee');
        r.style.setProperty('--clr-dark', '#000000');
        r.style.setProperty('--clr-accent-dark', accentDark);
        r.style.setProperty('--clr-accent-light', accentLight);
        localStorage.setItem('state', JSON.stringify(state));
    }
}

function fontIncrease(){
    if(state.size<=1.0){
        state.size+=0.5;
        r.style.setProperty('--fs-h1', (state.size+3.7)+"rem");
        r.style.setProperty('--fs-h2', (state.size+1.5)+"rem");
        r.style.setProperty('--fs-h3', (state.size+1.25)+"rem");
        r.style.setProperty('--fs-p', (state.size+1)+"rem");
    }
    if(state.size>=1.5){
        fontIncreaseButton.classList.toggle("disabled");
        fontIncreaseButton.disabled = true;
        iLocked = true;
        state.oversize = true;
        oversizeAdjust();
    }
    else if(dLocked){
        fontDecreaseButton.classList.toggle("disabled");
        fontDecreaseButton.disabled = false;
        dLocked = false;
    }
    localStorage.setItem('state', JSON.stringify(state));
}

function fontDecrease(){
    if(state.size>=0){
        state.size-=0.5;
        r.style.setProperty('--fs-h1', (state.size+3.7)+"rem");
        r.style.setProperty('--fs-h2', (state.size+1.5)+"rem");
        r.style.setProperty('--fs-h3', (state.size+1.25)+"rem");
        r.style.setProperty('--fs-p', (state.size+1)+"rem");
    }
    if(state.size<=-0.5){
        fontDecreaseButton.classList.toggle("disabled");
        fontDecreaseButton.disabled = true;
        dLocked = true;
    }
    else if(iLocked){
        fontIncreaseButton.classList.toggle("disabled");
        fontIncreaseButton.disabled = false;
        iLocked = false;
        state.oversize = false;
        oversizeAdjust();
    }
    localStorage.setItem('state', JSON.stringify(state));
}

function toggleHelp(){
    help.classList.toggle("active");
    state.help = !state.help 
    localStorage.setItem('state', JSON.stringify(state));
}

function oversizeAdjust(){
    if(state.oversize){
        if(state.mode=="dark"){
            modeButton.innerHTML = "<i class=\"fa-solid fa-lightbulb\"></i>";
        } else{
            modeButton.innerHTML = "<i class=\"fa-solid fa-moon\"></i>";
        }
        helpButton.innerHTML = "<i class=\"fa-solid fa-circle-question\"></i>";
        fontDecreaseButton.innerHTML = "<i class=\"fa-solid fa-minus\"></i> <i class=\"fa-solid fa-text-height\"></i>";
        fontIncreaseButton.innerHTML = "<i class=\"fa-solid fa-plus\"></i> <i class=\"fa-solid fa-text-height\"></i>";
    }
    else{
        if(state.mode=="dark"){
            modeButton.innerHTML = "<i class=\"fa-solid fa-lightbulb\"></i> Light Mode";
        } else{
            modeButton.innerHTML = "<i class=\"fa-solid fa-moon\"></i> Dark Mode";
        }
        helpButton.innerHTML = "<i class=\"fa-solid fa-circle-question\"></i> Help";
        fontDecreaseButton.innerHTML = "<i class=\"fa-solid fa-minus\"></i> <i class=\"fa-solid fa-text-height\"></i> Font Size";
        fontIncreaseButton.innerHTML = "<i class=\"fa-solid fa-plus\"></i> <i class=\"fa-solid fa-text-height\"></i> Font Size";
    }
}

function init(){
    if(state.mode=="light"){
        if(state.oversize){
            modeButton.innerHTML = "<i class=\"fa-solid fa-moon\"></i>";
        } else{
            modeButton.innerHTML = "<i class=\"fa-solid fa-moon\"></i> Dark Mode";
        }
        r.style.setProperty('--clr-light', "#ffffff");
        r.style.setProperty('--clr-grey', '#eeeeee');
        r.style.setProperty('--clr-dark', '#000000');
        r.style.setProperty('--clr-accent-dark', accentDark);
        r.style.setProperty('--clr-accent-light', accentLight);
    }
    else if(state.mode=="dark"){
        if(state.oversize){
            modeButton.innerHTML = "<i class=\"fa-solid fa-lightbulb\"></i>";
        } else{
            modeButton.innerHTML = "<i class=\"fa-solid fa-lightbulb\"></i> Light Mode";
        }
        r.style.setProperty('--clr-light', "#404040");
        r.style.setProperty('--clr-grey', '#666666');
        r.style.setProperty('--clr-dark', 'white');
        r.style.setProperty('--clr-accent-dark', accentLight);
        r.style.setProperty('--clr-accent-light', accentDark);
    }
    r.style.setProperty('--fs-h1', (state.size+3.7)+"rem");
    r.style.setProperty('--fs-h2', (state.size+1.5)+"rem");
    r.style.setProperty('--fs-h3', (state.size+1.25)+"rem");
    r.style.setProperty('--fs-p', (state.size+1)+"rem");
    if(state.oversize){
        helpButton.innerHTML = "<i class=\"fa-solid fa-circle-question\"></i>";
        fontDecreaseButton.innerHTML = "<i class=\"fa-solid fa-minus\"></i> <i class=\"fa-solid fa-text-height\"></i>";
        fontIncreaseButton.innerHTML = "<i class=\"fa-solid fa-plus\"></i> <i class=\"fa-solid fa-text-height\"></i>";
    }
    if(state.size<=-0.5){
        fontDecreaseButton.classList.toggle("disabled");
        fontDecreaseButton.disabled = true;
        dLocked = true;
    }
    else if(state.size>=1.5){
        fontIncreaseButton.classList.toggle("disabled");
        fontIncreaseButton.disabled = true;
        iLocked = true;
    }
    if(state.help){
        help.classList.toggle("active");
    }
}

accentDark="#0e5f1a";
accentLight="#9ddf9f";

state = {
    mode: "light",
    size: 0,
    help: false,
    oversize: false
};
console.log(localStorage.getItem('state'));
if(localStorage.getItem('state')!=null){
    state = JSON.parse(localStorage.getItem('state'));
}
const r = document.querySelector(':root');
var b = document.getElementsByTagName("body")[0]; 
const modeButton = document.getElementById('modeToggle');
const fontIncreaseButton = document.getElementById('fontIncrease');
const fontDecreaseButton = document.getElementById('fontDecrease');
const helpButton = document.getElementById('helpToggle');
const help = document.getElementById('help');
var dLocked = false;
var iLocked = false;
init();
setTimeout(function(){
    b.style.setProperty('transition', '0.25s ease-in');
}, 100);