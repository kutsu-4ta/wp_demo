window.addEventListener('load', function(){
    deSVG('.svg', true);
});

gsap.registerPlugin(ScrollTrigger);

function noscroll(e){
    e.preventDefault();
}

// ローディング時
window.addEventListener('DOMContentLoaded', function() {
    console.log('ready');
    if(location.search == 'undefined' || location.search.length == 0)
    {
        document.addEventListener('touchmove', noscroll, {passive: false});
        document.addEventListener('wheel', noscroll, {passive: false});
        gsap.to('.loading-container',
            {
                autoAlpha: 0,
                delay: 2.0,
                duration: 0.2,
                ease: 'power4.0in',
            });
        setTimeout(function(){
            document.removeEventListener('touchmove', noscroll);
            document.removeEventListener('wheel', noscroll);
        },2000);
    }
    console.log('loaded');
})


$('#off').on('click', function(){
    document.addEventListener('touchmove', noscroll, {passive: false});
    document.addEventListener('wheel', noscroll, {passive: false});
});

$('#on').on('click', function(){
    document.removeEventListener('touchmove', noscroll);
    document.removeEventListener('wheel', noscroll);
});


// SVGアニメーション
$(function () {
    $(".service-web-title2").on("inview", function () {
        // $('.service-web-flow').attr("class", "active");
        console.log('loaded');
        // svgタグにaddClassが効かないためattrで代用
        $('.service-web-flow').attr("class", "active");
    });
});

$(function () {
    $(".service-marketing-title2").on("inview", function () {
        $('.service-marketing-value').attr("class", "active");
    });
});

// フェードイン
gsap.from('.service-web-flow-text',
    {
        autoAlpha: 0,
        delay: 0.0,
        duration: 2.0,
        ease: 'power5.0in',
        scrollTrigger: {
            trigger: '.service-web-title2',
            start: 'top center'
        }
    });

// home
// const windowWidth = window.innerWidth;
// let contentWidth = document.getElementById('content');
// console.log(contentWidth);

// gsap.set(".home-top", {opacity:1, y:10}); //初期状態をセット

// ScrollTrigger.batch(".home-top", {
//     onEnter: batch => gsap.to(batch, {opacity: 0, y:0}),
//     start: "bottom 70%",
//     once: true,
//     toggleActions: 'reverse'
// });



const back_anime = gsap.timeline({
    toggleActions: 'reverse',
    scrollTrigger: {
        trigger: ".home-top-spacer",
        start: "top top",
        end: "bottom top",
        scrub: 1.5,
    }
});
back_anime.fromTo(".home-top",
    {
        autoAlpha: 1,
        y:0,
    }, {
        autoAlpha: 0,
        y:20,
    });
back_anime.fromTo(".back-container",
    {
        // autoAlpha: 1,
        x:0,
        // y:0
    }, {
        // autoAlpha: 0,
        x:-window.innerWidth/2,
        // y:-window.innerHeight
    });

// const back_anime2 = gsap.timeline({
//     toggleActions: 'reverse',
//     scrollTrigger: {
//         trigger: ".service-container",
//         start: "top bottom",
//         end: "bottom bottom",
//         scrub: 1.5,
//     }
// });
// back_anime2.fromTo(".video-container",
//     {
//         // autoAlpha: 1,
//         scale: 1,
//     }, {
//         // autoAlpha: 0,
//         // x:-window.innerWidth/2,
//         // y:-window.innerHeight
//         scale: 4,
//     });

gsap.from('.service-web',
    {
        y: 20,
        autoAlpha: 0,
        delay: 0.0,
        duration: 2.0,
        ease: 'power4.0in',
        scrollTrigger: {
            trigger: '.service-web',
            start: 'top center'
        }
    });
gsap.from('.service-marketing',
    {
        y: 20,
        autoAlpha: 0,
        delay: 0.0,
        duration: 2.0,
        ease: 'power4.0in',
        scrollTrigger: {
            trigger: '.service-marketing',
            start: 'top center'
        }
    });

const strength_anime = gsap.timeline({
    toggleActions: 'none',
    scrollTrigger: {
        trigger: ".strength",
        start: "top center",
        end: "bottom bottom",
        // scrub: 1.5,
    }
});
strength_anime.fromTo(".strength01",
    {
        autoAlpha: 0,
        y:20,
    }, {
        autoAlpha: 1,
        y:0,
    });
strength_anime.fromTo(".strength02",
    {
        autoAlpha: 0,
        y:20,
    }, {
        autoAlpha: 1,
        y:0,
    });
strength_anime.fromTo(".strength03",
    {
        autoAlpha: 0,
        y:20,
    }, {
        autoAlpha: 1,
        y:0,
    });

// スマホ版アニメーション
if($(window).width() <= 480){
console.log('mobile loaded')
const back_anime_mobile = gsap.timeline({
    toggleActions: 'reverse',
    scrollTrigger: {
        trigger: ".slogan-mobile",
        start: "top bottom",
        end: "bottom bottom",
        scrub: 1.5,
    }
});
back_anime_mobile.fromTo(".home-top-mobile",
    {
        autoAlpha: 1,
        y:0,
    }, {
        autoAlpha: 0,
        y:20,
    });
back_anime_mobile.fromTo(".back-container",
    {
        x:0,
    }, {
        x:-window.innerWidth/2,
    });
}
