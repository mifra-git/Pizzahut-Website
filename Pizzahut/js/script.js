// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e){
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Add-to-Cart Animation
document.querySelectorAll('.menu-card button').forEach(btn=>{
    btn.addEventListener('click', e=>{
        e.preventDefault();
        btn.innerText = "Added!";
        btn.style.backgroundColor = "#c81d25";
        btn.style.color = "#fff";
        setTimeout(()=>{
            btn.innerText = "Add to Cart";
            btn.style.backgroundColor = "#ffdd59";
            btn.style.color = "#c81d25";
        },1000);
    });
});

// Optional: Fade in effect for menu items
window.addEventListener('scroll', ()=>{
    document.querySelectorAll('.menu-card').forEach(card=>{
        const rect = card.getBoundingClientRect();
        if(rect.top < window.innerHeight - 100){
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        } else{
            card.style.opacity = 0;
            card.style.transform = 'translateY(50px)';
        }
    });
});
