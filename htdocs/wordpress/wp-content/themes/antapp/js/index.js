function hello(){
    console.log('hello');
}

gsap.registerPlugin(ScrollTrigger);

// ローディング時のアニメーション
// window.addEventListener("load", function () {
//     gsap.to(".box", {rotation: 27, x: 100, duration: 1});
// });

// ホームのコンテンツのスライドイン
const windowWidth = window.innerWidth;
gsap.from('.service',
    {
        y: 0,
        x:windowWidth/3,
        autoAlpha: 0,
        delay: 0.0,
        duration: 0.5,
        ease: 'power2.in',
        scrollTrigger: {
            trigger: '.service',
            start: 'top center'
        }
});
gsap.from('.strength',
    {
        y: 0,
        x:-windowWidth/3,
        autoAlpha: 0,
        delay: 0.0,
        duration: 0.5,
        ease: 'power2.in',
        scrollTrigger: {
            trigger: '.strength',
            start: 'top center'
        }
    });
gsap.from('.portfolio',
    {
        y: 0,
        x:windowWidth/3,
        autoAlpha: 0,
        delay: 0.0,
        duration: 0.5,
        ease: 'power2.in',
        scrollTrigger: {
            trigger: '.portfolio',
            start: 'top center'
        }
    });
gsap.from('.contact',
    {
        y: 0,
        x:-windowWidth/3,
        autoAlpha: 0,
        delay: 0.0,
        duration: 0.5,
        ease: 'power2.in',
        scrollTrigger: {
            trigger: '.contact',
            start: 'top center'
        }
    });

// aboutusのコンテンツのフェードイン
gsap.from('.about-antapp',
    {
        y: 0,
        autoAlpha: 0,
        delay: 0.0,
        duration: 0.5,
        ease: 'power2.in',
        scrollTrigger: {
            trigger: '.about-antapp',
            start: 'top center'
        }
    });

gsap.from('.about-member',
    {
        y: 0,
        autoAlpha: 0,
        delay: 0.0,
        duration: 0.5,
        ease: 'power2.in',
        scrollTrigger: {
            trigger: '.about-member',
            start: 'top center'
        }
    });

gsap.from('.about-philosophy',
    {
        y: 0,
        autoAlpha: 0,
        delay: 0.0,
        duration: 0.5,
        ease: 'power2.in',
        scrollTrigger: {
            trigger: '.about-philosophy',
            start: 'top center'
        }
    });

gsap.from('.about-strength',
    {
        y: 0,
        autoAlpha: 0,
        delay: 0.0,
        duration: 0.5,
        ease: 'power2.in',
        scrollTrigger: {
            trigger: '.about-strength',
            start: 'top center'
        }
    });