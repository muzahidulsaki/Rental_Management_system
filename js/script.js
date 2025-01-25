// Add smooth scrolling for nav links
document.querySelectorAll('.nav-links a').forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    const targetId = e.target.getAttribute('href').substring(1);
    const targetElement = document.getElementById(targetId);
    targetElement.scrollIntoView({ behavior: 'smooth' });
  });
});

// Add slow text appearance on scroll
const sections = document.querySelectorAll('.section');

function onScroll() {
  const scrollPosition = window.innerHeight + window.pageYOffset;
  sections.forEach(section => {
    if (scrollPosition > section.offsetTop + section.offsetHeight / 4) {
      section.classList.add('visible');
    }
  });
}

window.addEventListener('scroll', onScroll);

document.querySelector('#contact-form').addEventListener('submit', (e) => {
  e.preventDefault();
  e.target.elements.name.value = '';
  e.target.elements.email.value = '';
  e.target.elements.message.value = '';
});

