$(function() {

    if($("#drophere").length > 0) {

        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let csrfToken1 = document.querySelector('input[name="_token"]');
        console.log(csrfToken1.value);
        let secret = $('input[name="secret"]').attr('value');

        let myDropzone = new Dropzone('#drophere', {
           url: '/announcement/images/upload',
           
           params: {
               _token: csrfToken,
               secret: secret
           }
        });

    }
})