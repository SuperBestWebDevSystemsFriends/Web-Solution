function toggleMode(){
    if(state.mode=="light"){
        state.mode="dark";
        modeButton.innerText = "Light Mode";
        r.style.setProperty('--clr-light', "#404040");
        r.style.setProperty('--clr-grey', '#666666');
        r.style.setProperty('--clr-dark', 'white');
        r.style.setProperty('--clr-accent-dark', '#b3d7f5');
        r.style.setProperty('--clr-accent-light', '#004b87');
        localStorage.setItem('state', JSON.stringify(state));
    }
    else if(state.mode=="dark"){
        state.mode="light";
        modeButton.innerText = "Dark Mode";
        r.style.setProperty('--clr-light', "#ffffff");
        r.style.setProperty('--clr-grey', '#eeeeee');
        r.style.setProperty('--clr-dark', '#000000');
        r.style.setProperty('--clr-accent-dark', '#004b87');
        r.style.setProperty('--clr-accent-light', '#b3d7f5');
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
        localStorage.setItem('state', JSON.stringify(state));
    }
    if(state.size>=1.5){
        fontIncreaseButton.classList.toggle("disabled");
        fontIncreaseButton.disabled = true;
        iLocked = true;
    }
    else if(dLocked){
        fontDecreaseButton.classList.toggle("disabled");
        fontDecreaseButton.disabled = false;
        dLocked = false;
    }
    console.log(state.size);
}

function fontDecrease(){
    if(state.size>=0){
        state.size-=0.5;
        r.style.setProperty('--fs-h1', (state.size+3.7)+"rem");
        r.style.setProperty('--fs-h2', (state.size+1.5)+"rem");
        r.style.setProperty('--fs-h3', (state.size+1.25)+"rem");
        r.style.setProperty('--fs-p', (state.size+1)+"rem");
        localStorage.setItem('state', JSON.stringify(state));
    }
    console.log(fontDecreaseButton.className);
    if(state.size<=-0.5){
        fontDecreaseButton.classList.toggle("disabled");
        fontDecreaseButton.disabled = true;
        dLocked = true;
    }
    else if(iLocked){
        fontIncreaseButton.classList.toggle("disabled");
        fontIncreaseButton.disabled = false;
        iLocked = false;
    }
    console.log(state.size);
    console.log(fontDecreaseButton.className);
}

function init(){
    if(state.mode=="light"){
        modeButton.innerText = "Dark Mode";
        r.style.setProperty('--clr-light', "#ffffff");
        r.style.setProperty('--clr-grey', '#eeeeee');
        r.style.setProperty('--clr-dark', '#000000');
        r.style.setProperty('--clr-accent-dark', '#004b87');
        r.style.setProperty('--clr-accent-light', '#b3d7f5');
    }
    else if(state.mode=="dark"){
        modeButton.innerText = "Light Mode";
        r.style.setProperty('--clr-light', "#404040");
        r.style.setProperty('--clr-grey', '#666666');
        r.style.setProperty('--clr-dark', 'white');
        r.style.setProperty('--clr-accent-dark', '#b3d7f5');
        r.style.setProperty('--clr-accent-light', '#004b87');
    }
    r.style.setProperty('--fs-h1', (state.size+3.7)+"rem");
    r.style.setProperty('--fs-h2', (state.size+1.5)+"rem");
    r.style.setProperty('--fs-h3', (state.size+1.25)+"rem");
    r.style.setProperty('--fs-p', (state.size+1)+"rem");
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
}

state = {
    mode: "light",
    size: 0
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
var dLocked = false;
var iLocked = false;
init();
setTimeout(function(){
    b.style.setProperty('transition', '0.25s ease-in');
}, 100);