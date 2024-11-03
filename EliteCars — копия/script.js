document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('nav ul li a');

    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });


    const carItems = document.querySelectorAll('.car-item');

    function handleScrollAnimation() {
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;
        carItems.forEach(car => {
            const carTop = car.getBoundingClientRect().top + scrollY;
            if (scrollY + windowHeight > carTop + 100) {
                car.classList.add('visible');
            }
        });
    }

    window.addEventListener('scroll', handleScrollAnimation);
    handleScrollAnimation();

    const btnUp = {
        el: document.querySelector('.btn-up'),
        show() {
            this.el.classList.remove('btn-up_hide');
        },
        hide() {
            this.el.classList.add('btn-up_hide');
        },
        addEventListener() {
            window.addEventListener('scroll', () => {
                const scrollY = window.scrollY || document.documentElement.scrollTop;
                scrollY > 400 ? this.show() : this.hide();
            });
            document.querySelector('.btn-up').onclick = () => {
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            };
        }
    };

    btnUp.addEventListener();
});

const header = document.querySelector('header');

window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        header.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    } else {
        header.style.backgroundColor = 'transparent';
    }
});
document.addEventListener("DOMContentLoaded", function() {
    const loginLink = document.querySelector(".login");
    const popup = document.querySelector(".popup");

    loginLink.addEventListener("click", function(event) {
        event.preventDefault();
        popup.style.display = popup.style.display === "none" || popup.style.display === "" ? "block" : "none";
    });

    // Закрытие popup при клике за его пределами
    document.addEventListener("click", function(event) {
        if (!loginLink.contains(event.target) && !popup.contains(event.target)) {
            popup.style.display = "none";
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const burgerMenu = document.querySelector(".hide-menu");
    const menu = document.querySelector(".menu");

    burgerMenu.addEventListener("click", function () {
        burgerMenu.classList.toggle("active");
        menu.classList.toggle("active");
    });
});
