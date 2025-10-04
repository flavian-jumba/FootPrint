// This file helps with client-side routing on Vercel
window.addEventListener('DOMContentLoaded', (event) => {
  // Check if page loaded with a 404 status
  if (document.title.includes('404') || document.title.includes('Error')) {
    // Redirect to the homepage
    window.location.href = '/';
  }
});