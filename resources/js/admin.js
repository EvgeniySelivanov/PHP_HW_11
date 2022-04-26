require('./bootstrap');
const importantPostBtns=document.querySelectorAll('.important-post');
importantPostBtns.forEach(btn=>{
    btn.addEventListener('click',(e)=>{
        e.preventDefault();
        let id=btn.closest('tr').dataset.id;
        /* console.log(id); */
        axios.get('/admin/posts/change-important/'+id)
        .then(response=>{
            btn.textContent=response.data==0? 'нет':'да';
            console.log(response)
        })
        .catch(error=>{
            console.log(error)
        })
    })
})