import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

if (localStorage.theme === 'dark') {
  document.documentElement.classList.add('dark');
} else if (localStorage.theme === 'light') {
  document.documentElement.classList.remove('dark');
}



document.getElementById('toggleTheme')?.addEventListener('click', () => {
  document.documentElement.classList.toggle('dark');

  if (document.documentElement.classList.contains('dark')) {
    localStorage.theme = 'dark';
  } else {
    localStorage.theme = 'light';

  }
});
document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('toggleTheme');
  if (!btn) return;

  
  if (localStorage.theme === 'dark') {
    document.documentElement.classList.add('dark');
  } else if (localStorage.theme === 'light') {
    document.documentElement.classList.remove('dark');
  } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.documentElement.classList.add('dark');
  }

 
  btn.addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
  });
});
