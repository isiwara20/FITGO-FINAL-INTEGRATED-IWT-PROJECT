    function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    const threshold = 150; // Adjust threshold as needed
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) - threshold &&
        rect.bottom >= 0
    );
}

    
        // Function to handle scroll events
        function handleScroll() {
            const elements = document.querySelectorAll('.fly-in');
            elements.forEach(element => {
                if (isInViewport(element)) {
                    element.classList.add('show');
                }
            });
        }
    
        // Listen for scroll events
        window.addEventListener('scroll', handleScroll);
    
        // Trigger the animation on page load in case the elements are already in view
        document.addEventListener('DOMContentLoaded', handleScroll);


        function calbmi() {
            var wei = parseFloat(document.getElementById('weight').value);
            var hei = parseFloat(document.getElementById('height').value);
        
            if (!isNaN(wei) && !isNaN(hei) && hei > 0) {
                var res = ((wei / (hei * hei)) * 703).toFixed(2);
        
                if (res < 18.5) {
                    document.getElementById('bmi-result').innerHTML = "Your BMI is: " + res + "<br>" + "You are underweight";
                } else if (res >= 18.5 && res <= 24.9) {
                    document.getElementById('bmi-result').innerHTML = "Your BMI is: " + res + "<br>" + "You are Normal";
                } else if (res >= 25.0 && res <= 29.9) {
                    document.getElementById('bmi-result').innerHTML = "Your BMI is: " + res + "<br>" + "You are Overweight";
                } else if (res >= 30.0) {
                    document.getElementById('bmi-result').innerHTML = "Your BMI is: " + res + "<br>" + "You have Obesity";
                }
            } else {
                document.getElementById('bmi-result').innerHTML = "Please enter valid height and weight.";
            }
        }
        

        document.addEventListener("DOMContentLoaded", function() {
            const profileBtn = document.querySelector('.profile-btn');
            const profileMenu = document.querySelector('.profile-menu');
        
            profileBtn.addEventListener('click', function() {
                profileMenu.classList.toggle('visible');
            });
        
            // Close the menu if clicked outside
            document.addEventListener('click', function(event) {
                if (!profileBtn.contains(event.target) && !profileMenu.contains(event.target)) {
                    profileMenu.classList.remove('visible');
                }
            });
        });
        

        
        
