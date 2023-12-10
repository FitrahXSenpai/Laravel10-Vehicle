window.addEventListener('scroll', function(){
    var scroll = document.querySelector('#toTopBtn');
    scroll.classList.toggle("active" , window.scrollY > 350)
})

function scrolltoTop(){
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
}