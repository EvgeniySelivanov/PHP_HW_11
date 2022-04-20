require('./bootstrap');
const importantPostBtns=document.querySelectorAll('.important-post');
importantPostBtns.forEach(btn=>{
    btn.addEventListener('click',(e)=>{
        e.preventDefault();
        let id=btn.closest('tr').dataset.id;
        /* console.log(id); */
        
 
    })
})