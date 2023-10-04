function NameValidation(element) {
    let InputText = element.value;
    element.value = InputText.replace(/[^A-za-z0-9[$&+,:;=?@#|'<>.^*(){}%"!~-_" ]/, "");
    if (element.value == InputText) {
        element.value = InputText;
    } else {
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Number and Special Character are Not Allowed...!',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }
}
function NumberValidation(element) {
    let InputText = element.value;
    element.value = InputText.replace(/[^0-9-+]/, "");
    if (element.value == InputText) {
        element.value = InputText;
    } else {
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Alphabets and Special Characters are Not Allowed...!',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }
}
function AlphaNumericValidation(element) {
    let InputText = element.value;
    element.value = InputText.replace(/[^A-za-z0-9[$&+,:;=?@#|'<>.^*(){}%"!~-_" ]/, "");
    if (element.value == InputText) {
        element.value = InputText;
    } else {
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Some Special Character Not Allowed...!',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }
}
function EmailValidation(element) {
    let InputText = element.value;
    element.value = InputText.replace(/[^A-za-z0-9@.]/, "");
    if (element.value == InputText) {
        element.value = InputText;
    } else {
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Special Character Not Allowed...!',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }
}
function FileValidation(element) {
    var file = document.getElementById("file").value;
    var ext = file.split(".").pop().toLowerCase();
    if (ext != "csv") {
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Please select an file with a file extension of either csv...!',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
        $("#image").val("");
        return false;
    }
    return true;
}
function ImageValidation(element) {
    var file = document.getElementById("image").value;
    var ext = file.split(".").pop().toLowerCase();
    if (ext != "jpeg" && ext != "jpg" && ext != "png") {
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Please select an image file with a file extension of either jpeg, png, or jpg...!',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
        $("#image").val("");
        return false;
    }
    return true;
}