function addProduct(){
    document.getElementById('product-save-btn').style.display   = "block";
    document.getElementById('product-update-btn').style.display = "none";
    document.getElementById('product-delete-btn').style.display = "none";

    document.getElementById('product-task').reset();
}

function editTask(){
    document.getElementById('product-save-btn').style.display   = "none";
    document.getElementById('product-update-btn').style.display = "block";
    document.getElementById('product-delete-btn').style.display = "block";
}