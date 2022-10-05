function init(){
    document.getElementById("placeOrder").addEventListener("click", hidePayment);
    document.getElementsByClassName("confirmation").style.display = "inline";
}

function hidePayment(){
    document.getElementsByClassName("payment").style.display = "none";
    showConfirmation();
}

function showPayment(){
    document.getElementsByClassName("payment").style.display = "inline";
}

function hideConfirmation(){
    document.getElementsByClassName("confirmation").style.display = "none";
    showPayment();
}

function showConfirmation(){
    document.getElementsByClassName("confirmation").style.display = "inline";
}

init();