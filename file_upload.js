function uploadImage() {
    var image = getElementById("fileUpload");

    image.addEventListener('change', function() { //on value change
        if(image.value != "" && image.value != null && image.value != undefined) {
            document.getElementById("imageForm").submit();

            displayImage(image.value);
        }
    })
}

function displayImage(imageName) {

}