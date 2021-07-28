let loader = document.querySelector('#img');
loader.addEventListener('change', function (event) {
    let reader = new FileReader();
    reader.onload = function(){
        let canvas = document.getElementById('canvas');
        canvas.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});