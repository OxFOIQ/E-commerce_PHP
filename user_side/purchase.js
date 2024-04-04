const wishlist=document.querySelector('.saveall');

wishlist.addEventListener('click',function(){
    wishlist.innerHTML=`<a type="button"">
              SAVE
              <i class=" my-2 fas fa-heart"></i>
            </a>`;          
            })