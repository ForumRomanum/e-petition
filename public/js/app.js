function toggleClass(element, className) {
  const classList = element.classList;
  if (!classList.contains(className)) {
    addClass(element, className);
  } else {
    removeClass(element, className);
  }
}

function removeClass(element, className) {
  element.classList.remove(className);
}

function addClass(element, className) {
  element.classList.add(className);
}

function element(...args) {
  return document.querySelector(...args);
}

function elements(...args) {
  return document.querySelectorAll(...args);
}
