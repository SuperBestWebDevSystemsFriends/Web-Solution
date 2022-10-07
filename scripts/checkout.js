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
    document.getElementById("progressBar3").className = "progressBar complete";
    document.getElementById("progressBar4").className = "progressBar active"
}

init();