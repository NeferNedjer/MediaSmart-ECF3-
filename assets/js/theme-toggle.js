document.addEventListener('DOMContentLoaded', function() {
    const themeToggleSwitch = document.getElementById('darkB');
    const currentTheme = localStorage.getItem('theme') || 'light';
  
    document.documentElement.setAttribute('data-theme', currentTheme);
  
    
    themeToggleSwitch.addEventListener('click', function() {
        
        const currentTheme = document.documentElement.getAttribute('data-theme');
        
        
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        
    });
});