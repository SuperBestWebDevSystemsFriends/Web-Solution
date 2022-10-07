function init(){
    document.getElementById("placeOrder").addEventListener("click", hidePayment);
}

function hidePayment(){
    // document.getElementsByClassName("payment").forEach(hide(e));
    document.getElementById("payment").style.display = "none";
    showConfirmation();
}

function showPayment(){
    document.getElementById("payment").style.display = "inline";
}

function hideConfirmation(){
    document.getElementById("confirmation").style.display = "none";
    showPayment();
}

function showConfirmation(){
    document.getElementById("confirmation").style.display = "inline";
    document.getElementById("progressBar3").classList.add('progressBar complete');
    document.getElementById("progressBar3").classList.remove('progressBar active');
    document.getElementById("progressBar4").classList.add('progressBar active');
    document.getElementById("progressBar4").classList.remove('progressBar');
}

init();