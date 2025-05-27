;(function($) {



    "use strict";

    document.addEventListener("DOMContentLoaded", function () {
        gsap.registerPlugin(ScrollTrigger);
    
        const textElement = document.querySelector(".fade-text");
        const textArray = textElement.textContent.split(""); 
        textElement.innerHTML = textArray.map(letter => `<span>${letter}</span>`).join("");
    
        let spans = document.querySelectorAll(".fade-text span");
    
        let tl = gsap.timeline({
            scrollTrigger: {
                trigger: ".fade-text",
                start: "top 80%",  
                end: "top 20%",    
                scrub: 1,          
            }
        });
    
        spans.forEach((span, i) => {
            tl.to(span, {
                color: "#222222", 
                duration: 0.3,    
            }, i * 0.02); 
        });
    
    });


})(jQuery);
