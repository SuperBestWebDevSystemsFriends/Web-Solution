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
    if(state.size<=1.5){
        state.size+=0.5;
        r.style.setProperty('--fs-h1', (state.size+3.7)+"rem");
        r.style.setProperty('--fs-h2', (state.size+1.5)+"rem");
        r.style.setProperty('--fs-h3', (state.size+1.25)+"rem");
        r.style.setProperty('--fs-p', (state.size+1)+"rem");
        localStorage.setItem('state', JSON.stringify(state));
    }
    if(state.size>=1.5){
        fontIncreaseButton.classList.add = "disabled";
    }
    else{
        fontIncreaseButton.classList.remove = "disabled";
    }
}

function fontDecrease(){
    if(state.size>=0.5){
        state.size-=0.5;
        r.style.setProperty('--fs-h1', (state.size+3.7)+"rem");
        r.style.setProperty('--fs-h2', (state.size+1.5)+"rem");
        r.style.setProperty('--fs-h3', (state.size+1.25)+"rem");
        r.style.setProperty('--fs-p', (state.size+1)+"rem");
        localStorage.setItem('state', JSON.stringify(state));
    }
    if(state.size>=0.5){
        fontIncreaseButton.classList.add = "disabled";
    }
    else{
        fontIncreaseButton.classList.remove = "disabled";
    }
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
    if(state.size>=1.5){
        fontIncreaseButton.classList.add = "disabled";
    }
    else{
        fontIncreaseButton.classList.remove = "disabled";
    }
    if(state.size>=0.5){
        fontIncreaseButton.classList.add = "disabled";
    }
    else{
        fontIncreaseButton.classList.remove = "disabled";
    }
}

state = {
    mode: "light",
    size: 1
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
init();
setTimeout(function(){
    b.style.setProperty('transition', '0.25s ease-in');
}, 100);