import Swal from 'sweetalert2';

const { default: axios } = require('axios');

require('./bootstrap');
const contactForm=document.querySelector('.contact-form');

contactForm?.addEventListener('submit',(e)=>{
    e.preventDefault();
    Array.from(contactForm.elements).forEach(elem=>{
        if(elem.classList.contains('is-invalid'))
        {
        elem.classList.remove('is-invalid');
        elem.nextElementSibling.remove();
    }
    })
    const dataForm=new FormData(contactForm);
    axios.post('get-form', dataForm)
    .then(response=>{
        Swal.fire({
            title: 'Good!',
            text: 'Do you want to continue',
            icon: 'success',
            confirmButtonText: 'Cool'
          });


        //if(!contactForm.previousElementSibling.classList.contains('alert')){
        //contactForm.insertAdjacentHTML('beforebegin', '<div class="alert alert-success">Thanks</div>');
        //}
        contactForm.reset();
    })
    .catch(error=>{
    const errors=error.response.data.errors;
    for (const key in errors) {
        document.querySelector(`[name=${key}]`).classList.add('is-invalid');
        document.querySelector(`[name=${key}]`).insertAdjacentHTML('afterend',`<div class="invalid-feedback">${errors[key][0]}</div>`);
    }
    });
});

const addToCartForm=document.querySelector('.add-to-cart');
addToCartForm?.addEventListener('submit',(e)=>{
    e.preventDefault();
   
    let formData=new FormData(addToCartForm);
    axios.post('/cart/add',formData)
    .then(response=>{
        console.log(response);
    });
});