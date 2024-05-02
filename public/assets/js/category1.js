// Add new category scripts ============================

function showCategorySelector() {

    let addAs = document.getElementById('cat_type').value;
    console.log('val === ', addAs);
    let categorySelector = document.getElementById('category_for_sub_category');

    if (addAs === "1") {
        categorySelector.style.display = 'block';
    } else {
        categorySelector.style.display = 'none';
    }
}

//end
var x = 1;

function validateImage(id, event) {
    
    let imagePreview = document.getElementById('img-result-output' + id);

    if (imagePreview != null) {

        imagePreview.remove();
    }

    let validationError = document.getElementById('img-validation-result' + id);
    validationError.innerHTML = '';

    var isValid = (/\.(gif|jpe?g|png)$/i).test(event.target.value);
    if (!isValid) {
        validationError.innerHTML = "Only gif, jpg, jpeg, png image types are allowed."
    } else {
        let image = document.getElementById('image' + id);

        if (image != null) {
            var output = document.createElement('img');
            output.id = 'img-result-output' + id;
            output.style.cssText = 'width:100%';
            output.src = URL.createObjectURL(event.target.files[0]);
            image.after(output);
        }

    }
}

function validateImageSizes(id, event) {
    
   

    let validationError = document.getElementById('img-validation-result' + id);
    validationError.innerHTML = '';

    let images = event.target.files;
    console.log(event.target.files);

    for(var i=0; i< images.length; ++i){
        var file1 = images[i].size;
        if(file1){
          var file_size = images[i].size;
          if(file_size > 11000000){
            validationError.innerHTML = "Maximum allowed image size is 10MB";
            document.getElementById('image-uploader'+id).value = null;
          }
        }
      }

}


function validateImagePreview(id, event) {
    let imagePreview = document.getElementById('image' + id);

    if (imagePreview != null) {

        imagePreview.remove();
    }

    var isValid = (/\.(gif|jpe?g|png)$/i).test(event.target.value);
    if (!isValid) {
        validationError.innerHTML = "Only gif, jpg, jpeg, png image types are allowed."
    } else {
        let image = document.getElementById('image-div' + id);

        if (image != null) {
            var output = document.createElement('img');
            output.id = 'image' + id;
            output.style.cssText = 'width:100%';
            output.src = URL.createObjectURL(event.target.files[0]);
            image.after(output);
        }

    }
}

function validateImageWithNew(galleryId,event){
    
    let imgfile = document.getElementById('img-result-output'+galleryId);

    if(imgfile !== null){

        imgfile.remove();
    }
    validateImage(galleryId, event);
    let imgfile1 = document.getElementById('image'+galleryId);

    if(imgfile1 !== null){

        imgfile1.remove();
    }
    
    let div = document.getElementById('image-div' + id);

    var output = document.createElement('img');
    output.id = 'image' + galleryId;
    output.style.cssText = 'width:100%';
    div.after(output);


}
//end add new category scripts ============================
