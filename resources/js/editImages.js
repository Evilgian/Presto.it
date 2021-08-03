let rmvBtns = document.querySelectorAll('.removeImg');
if (rmvBtns){
    rmvBtns.forEach(btn=>{
        btn.addEventListener('click', function(){
          btn.parentElement.parentElement.classList.add('d-none');  
        })
    })
}