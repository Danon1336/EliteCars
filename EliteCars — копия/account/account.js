document.addEventListener("DOMContentLoaded", function() {
    const bolid = document.querySelector('.bolid');
    const avatar = document.querySelector('.data img');
    const popupMenu = document.querySelector('.popup-menu');
    
    // Показать контейнеры после завершения анимации
    bolid.addEventListener('animationend', () => {
        bolid.style.display = 'none';
        document.querySelectorAll(".container").forEach((container, index) => {
            setTimeout(() => {
                container.classList.add("visible");
            }, index * 500);
        });
    });     

    // Показать или скрыть popup-меню при нажатии на аватарку
    avatar.addEventListener("click", () => {
        popupMenu.classList.toggle("visible");
    });

    // Закрытие popup-меню при клике вне
    document.addEventListener("click", (e) => {
        if (!avatar.contains(e.target) && !popupMenu.contains(e.target)) {
            popupMenu.classList.remove("visible");
        }
    });
});
