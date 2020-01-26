
$(document).ready(function() {
    $(".cardapio").addClass("active");
});
function erroDelCat() {
    alert("Hello! I am an alert box!");
};
$("#uploadFile").change(function() {
    const file = $(this)[0].files[0]
    console.log(file.type);
    const fileReader = new FileReader()
    if ((file.type == "image/jpeg" || file.type == "image/png") || (file.type == "image/jpg")) {
        fileReader.onloadend = function() {
            $(".imagePreview").attr('src', fileReader.result)
        }
        fileReader.readAsDataURL(file);
    } else {
        console.log("não é imagem");
    }
});

$("form#novo_prato").submit(function (e) { 
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: "post",
        url: "/cardapio/novoprato",
        data: formData,
        contentType: false,
        cache: false,
        async: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('form#novo_prato')[0].reset();
            $('.imagePreview').attr('src', "/img/user.png");
            $('#myModal').modal('hide');
            Swal.fire({
                type: 'success',
                title: 'Sucesso!',
                text: response,
                timer: 1500
            });
            location.reload();
        },
        statusCode: { 
            500: function (response) {
                console.log("hdjh");
            }
        }       
    });
});
