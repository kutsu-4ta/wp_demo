function hello(){
    console.log('hello');
}

window.addEventListener('load', function(){
    console.log('deSVG loaded');
    deSVG('.svg', true);
});

gsap.registerPlugin(ScrollTrigger);

// ローディング時のアニメーション
// window.addEventListener("load", function () {
//     gsap.to(".box", {rotation: 27, x: 100, duration: 1});
// });

console.log($(".service-web-title2"));


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
    toggleActions: 'reverse', //デフォルトの指定
    scrollTrigger: {
        trigger: ".home-top-spacer", //アニメーションが始まるトリガーとなる要素
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
// back_anime.fromTo(".circle",
//     {
//         // autoAlpha: 1,
//         x: 0,
//         y: 0,
//     }, {
//         // autoAlpha: 0,
//         x:window.innerWidth / 7,
//         y:100,
//     });
// back_anime.fromTo(".back1",
//     {
//         // autoAlpha: 1,
//         x:0,
//         y:0,
//     }, {
//         // autoAlpha: 0,
//         x: - (window.innerWidth),
//         y: -window.innerHeight / 2
//     });
// back_anime.fromTo(".back2",
//     {
//         autoAlpha: 0,
//         x: - (window.innerWidth),
//     }, {
//         autoAlpha: 1,
//         x:0,
//     });


// const back_anime2 = gsap.timeline({
//     toggleActions: 'reverse', //デフォルトの指定
//     scrollTrigger: {
//         trigger: ".service-web", //アニメーションが始まるトリガーとなる要素
//         start: "top top",
//         end: "bottom top",
//         scrub: 1.5,
//     }
// });
// back_anime2.fromTo(".circle",
//     {
//         x:window.innerWidth / 7,
//         y:100,
//     }, {
//         x:- window.innerWidth / 5,
//         y: window.innerWidth / 10,
//     });
// back_anime2.fromTo(".back1",
//     {
//         x: - (window.innerWidth),
//         y: -window.innerHeight / 2
//     }, {
//         x: (window.innerWidth / 2),
//         y: -window.innerHeight / 2
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
gsap.from('.strength',
    {
        y: 10,
        autoAlpha: 0,
        autoAlpha: 0,
        delay: 0.0,
        duration: 2.0,
        ease: 'power4.0in',
        scrollTrigger: {
            trigger: '.service',
            start: 'top center'
        }
    });