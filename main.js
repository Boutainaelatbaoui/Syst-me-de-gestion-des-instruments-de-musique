function addProduct(){
    document.getElementById('product-save-btn').style.display   = "block";
    document.getElementById('product-update-btn').style.display = "none";
    document.getElementById('product-delete-btn').style.display = "none";

    document.getElementById('form-product').reset();
}

function editTask(id){
    document.getElementById('product-save-btn').style.display   = "none";
    document.getElementById('product-update-btn').style.display = "block";
    document.getElementById('product-delete-btn').style.display = "block";

    document.getElementById("product-id").value = id;

    document.getElementById('product-title').value = document.getElementById(id).getAttribute("title");
    document.getElementById('product-category').value = document.getElementById(id).getAttribute("category");
    document.getElementById('product-quantity').value = document.getElementById(id).getAttribute("quantity");
    document.getElementById('product-price').value = document.getElementById(id).getAttribute("price");
    document.getElementById('product-description').value = document.getElementById(id).getAttribute("description");
}