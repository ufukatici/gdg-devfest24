  <script>
    window.onload = function () {
        const preloader = document.getElementById('preloader');
        preloader.style.display = 'none';

        const content = document.getElementById('content');
        content.style.display = 'block';
    };

    window.addEventListener("scroll", function () {
        const button = document.getElementById("back-to-top");
        if (window.pageYOffset > 150) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
    });

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    function startCountdown(endDate) {
        const countdownElement = document.getElementById("timer");
        const calculateTimeLeft = () => {
            const endDateTime = new Date(endDate).getTime();
            const now = new Date().getTime();
            const timeRemaining = endDateTime - now;

            if (timeRemaining > 0) {
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor(
                    (timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                const minutes = Math.floor(
                    (timeRemaining % (1000 * 60 * 60)) / (1000 * 60)
                );
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `
                    <div id="days">${days} <span>Gün</span></div>
                    <div id="hours">${hours} <span>Saat</span></div>
                    <div id="minutes">${minutes} <span>Dakika</span></div>
                    <div id="seconds">${seconds} <span>Saniye</span></div>
                `;
            }
        };

        calculateTimeLeft();
        setInterval(calculateTimeLeft, 1000);
    }
    
    document.addEventListener("DOMContentLoaded", function () {
        const currentPath = window.location.pathname;
        const navbar = document.getElementById("navbar");
        const form = document.querySelector('#contactForm');
        const draw = document.querySelector('#drawForm');

        if (form) {
            try {
                const targetDate = '2024-12-07T11:00:00+03:00';
                enableFormOnDate(targetDate);
            } catch (error) {
                console.error("Form etkinleştirme sırasında bir hata oluştu:", error);
            }
        }
        
        if (draw) {
            try {
                const targetDate2 = '2024-12-07T15:30:00+03:00';
                enableFormOnDate2(targetDate2);
            } catch (error) {
                console.error("Form etkinleştirme sırasında bir hata oluştu:", error);
            }
        }

        if (navbar) {
            document.addEventListener("scroll", function () {
                if (window.scrollY > 170) {
                    navbar.classList.add("is-sticky");
                } else {
                    navbar.classList.remove("is-sticky");
                }
            });
        }
        
        if (currentPath === "/" || currentPath === "/anasayfa"){
            startCountdown('December 7, 2024 11:00:00 UTC+3');
        }
    });


    function cekilisYap() {
        let sonucElement = document.getElementById('sonuc');
        sonucElement.innerText = "Çekiliş yapılacak...";
        fetch('./lib/api/draw.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    sonucElement.innerText = data.name;
                } else {
                    sonucElement.innerText = "Çekiliş başarısız: " + (data.error || "Bilinmeyen hata.");
                }
            })
            .catch(error => {
                sonucElement.innerText = "Bir hata oluştu.";
            });
    }
    
    
    function enableFormOnDate(targetDate) {
    const now = new Date();
    const target = new Date(targetDate);


    const formElements = document.querySelectorAll('#contactForm input, #contactForm button');

    if (now >= target) {
        formElements.forEach(element => {
            element.removeAttribute('disabled');
        });
    } else {
        const timeUntilEnable = target - now;
        setTimeout(() => {
            formElements.forEach(element => {
                element.removeAttribute('disabled');
            });
        }, timeUntilEnable);
    }
}

    function enableFormOnDate2(targetDate2) {
    const now = new Date();
    const target = new Date(targetDate2);


    const formElements = document.querySelectorAll('#drawForm input, #drawForm button');

    if (now >= target) {
        formElements.forEach(element => {
            element.removeAttribute('disabled');
        });
    } else {
        const timeUntilEnable = target - now;
        setTimeout(() => {
            formElements.forEach(element => {
                element.removeAttribute('disabled');
            });
        }, timeUntilEnable);
    }
}
</script>
<script src=" https://kit.fontawesome.com/3e93e7b91a.js " crossOrigin="anonymous"></script>