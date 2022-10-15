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
gsap.from('.service-web',
    {
        // y: 0,
        // x:-windowWidth/8,
        autoAlpha: 0,
        delay: 0.0,
        duration: 1.0,
        ease: 'power4.0in',
        scrollTrigger: {
            trigger: '.service-web',
            start: 'top center'
        }
    });
gsap.from('.service-marketing',
    {
        // y: 0,
        // x:-windowWidth/8,
        autoAlpha: 0,
        delay: 0.0,
        duration: 1.0,
        ease: 'power4.0in',
        scrollTrigger: {
            trigger: '.service-marketing',
            start: 'top center'
        }
    });
gsap.from('.strength',
    {
        autoAlpha: 0,
        delay: 0.0,
        duration: 1.0,
        ease: 'power4.0in',
        scrollTrigger: {
            trigger: '.service',
            start: 'top center'
        }
    });