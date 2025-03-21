document.addEventListener('DOMContentLoaded', function(){
   const newAdd = document.querySelector('p.discover span');
   const  lastAdd = document.getElementById('last-add');
   const explore = document.getElementById('explore');
   const product = document.getElementById('product');
   const footer = document.querySelector('.footer-content');
   const more = document.getElementById('more');

   console.log(footer)

    more.addEventListener('click', ()=>{
            footer.scrollIntoView({ behavior: 'smooth', block:'end'});
    });

   newAdd.addEventListener('click', ()=>{
        lastAdd.scrollIntoView({ behavior: 'smooth', block:'start'});
   });

   explore.addEventListener('click', ()=>{
        product.scrollIntoView({ behavior: 'smooth', block:'start'});
   });



})
