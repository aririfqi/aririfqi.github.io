const komentar = document.querySelector('i');
const type = document.querySelector('textarea');

komentar.addEventListener('click', function(){
    if(type.style.width == '100%'){
        
        type.style.width = '0';
        // type.style.display = 'none';
    }else{
        type.style.width = '100%';
        // type.style.display = 'block';
    }
})