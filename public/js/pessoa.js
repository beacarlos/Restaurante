$(document).ready(function () {
    console.clear();
    $(".pessoas").addClass("active");
    $(".item-cadastro").addClass("menu-open");
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//Eventos de preview de imagens.
$("#uploadFile").change(function () {
    const file = $(this)[0].files[0]
    const fileReader = new FileReader()
    
    if((file.type == "image/jpeg" || file.type == "image/png") || (file.type == "image/jpg")){
        fileReader.onloadend = function () {
            $(".imagePreview").attr('src', fileReader.result)
        }
        fileReader.readAsDataURL(file);
    }
    else{
        console.log("não é imagem");
    }
});

$("form").submit(function (e) { 
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('tela', 'cadastro');
    $.ajax({
        type: "post",
        url: "/pessoa/cadastrar",
        data: formData,
        contentType: false,
        cache: false,
        async: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('form')[0].reset();
            $('.imagePreview').attr('src', "/img/user.png");
            Swal.fire({
                type: 'success',
                title: 'Sucesso!',
                text: response,
                timer: 1500
            });
        },
        statusCode: { 
            500: function (response) {
                console.log("hdjh");
            }
        }       
    });
});