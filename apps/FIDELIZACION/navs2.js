const sidenavOption = document.querySelectorAll('.sidenav-option');
const planSectionForm = document.getElementById('planSectionForm');
const postSectioner = document.getElementById('postSectioner');
const sectionPuntos = document.getElementById('sectionPuntos');

function setActive(event) {
  sidenavOption.forEach((option) => option.classList.remove('active'));
  event.target.classList.add('active');
}

function showPlanSection() {
  planSectionForm.removeAttribute('hidden');
  postSectioner.setAttribute('hidden', true);
  sectionPuntos.setAttribute('hidden', true);
}

function showPostSection() {
  planSectionForm.setAttribute('hidden', true);
  postSectioner.removeAttribute('hidden');
  sectionPuntos.setAttribute('hidden', true);
}

function showSectionPuntos() {
  planSectionForm.setAttribute('hidden', true);
  postSectioner.setAttribute('hidden', true);
  sectionPuntos.removeAttribute('hidden');
}

sidenavOption.forEach((option) => {
  option.addEventListener('click', () => {
    setActive(event);
    const optionIndex = option.getAttribute('data-option');
    if (optionIndex === '1') {
      showPlanSection();
    } else if (optionIndex === '2') {
      showPostSection();
    } else if (optionIndex === '3') {
      showSectionPuntos();
    }
  });
});
