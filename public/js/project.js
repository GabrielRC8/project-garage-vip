$(document).ready(function(){        
    
	$("input.mask_credit").mask('9999-9999-9999-9999');
    $("input.mask_code_credit").mask('999?9');
    $("input.mask_birth").mask('99/99/9999');
    $("input.mask_phone").mask('99-99999999?9');
    $("input.mask_cpf").mask('999.999.999-99');
    $("input.mask_cep").mask('99999-999');

    fileInput();
	
});

var fileInput = function() {
    
    $(".file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-success",
        fileType: "any"
    });
};