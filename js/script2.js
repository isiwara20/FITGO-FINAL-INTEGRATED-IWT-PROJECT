// script2.js

// Function to show the feedback form and hide other sections
function showFeedbackForm() {
    // Get the feedback section and other sections if needed
    const feedbackSection = document.querySelector('.feedback-section');
    const registeredSessionsSection = document.querySelector('.registered-sessions-section'); // Modify as needed
    const profileSection = document.querySelector('.profile-section'); // Modify as needed

    // Hide other sections
    if (registeredSessionsSection) {
        registeredSessionsSection.style.display = 'none';
    }
    if (profileSection) {
        profileSection.style.display = 'none';
    }

    // Show the feedback section
    feedbackSection.style.display = 'block';
}
function showFeedbackForm() {
    // Hide Profile Details and Password sections
    document.getElementById('profileDetails').style.display = 'none';
    document.getElementById('passwordSection').style.display = 'none';
    // Show Feedback section
    document.getElementById('feedbackSection').style.display = 'block';
}

function showProfileDetails() {
    // Show Profile Details and Password sections
    document.getElementById('profileDetails').style.display = 'block';
    document.getElementById('passwordSection').style.display = 'block';
    // Hide Feedback section
    document.getElementById('feedbackSection').style.display = 'none';
}