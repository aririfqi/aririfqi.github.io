const cardHeader = document.querySelector('.card-header');
const isi = document.querySelectorAll('.isi');
const panah = document.querySelectorAll('i');

// panah.forEach(item => {
//     item.addEventListener('click', event => {
//         if(konten.style.display == 'block'){
    
//             konten.style.display = 'none';
            
//         }else{
//             konten.style.display = 'block';
            
//         }
//     })
//   })

for (let i = 0; i < panah.length; i++) {
    panah[i].addEventListener('click', event => {
        if(isi[i].style.display == 'block'){
    
            isi[i].style.display = 'none';
            panah[i].style.transform = 'rotate(0deg)'
            
        }else{
            isi[i].style.display = 'block';
            panah[i].style.transform = 'rotate(180deg)'
        }
    })
    
}