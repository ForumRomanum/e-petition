const jq = (selector, parent = document) => {
  const isElement = o => {
    return (
      typeof HTMLElement === "object" ? o instanceof HTMLElement : //DOM2
        o && typeof o === "object" && o !== null && o.nodeType === 1 && typeof o.nodeName === "string"
    );
  };

  const _asIterable = el => {
    if (el instanceof NodeList) {
      return [...el];
    } else {
      return [el];
    }
  };

  return {
    el: isElement(selector) ? _asIterable(selector) : parent.querySelectorAll(selector),
    first() {
      return jq([...this.el][0]);
    },
    last() {
      const elements = [...this.el];
      return jq(elements[elements.length - 1]);
    },
    nth(index) {
      const elements = [...this.el];
      return jq(elements[index]);
    },
    height() {
      return [...this.el][0].clientHeight;
    },
    width() {
      return [...this.el][0].clientWidth;
    },
    css(property, value) {
      if (value === undefined) {
        return [...this.el][0].style[property];
      }
      [...this.el].forEach(el => el.style[property] = value);
    },
    attr(name, value) {
      if (value === undefined) {
        return [...this.el][0].getAttribute(name);
      }
      [...this.el].forEach(el => el.setAttribute(name, value));
    },
    offset() {
      return [...this.el][0].getBoundingClientRect();
    },
    addClass(className) {
      [...this.el].forEach(el => el.classList.add(className));
    },
    removeClass(className) {
      [...this.el].forEach(el => el.classList.remove(className));
    },
    toggleClass(className) {
      [...this.el].forEach(el => {
        const classList = el.classList;
        if (!classList.contains(className)) {
          el.classList.add(className);
        } else {
          el.classList.remove(className);
        }
      });
    },
    on(type, listener) {
      [...this.el].forEach(el => el.addEventListener(type, listener));
    },
    off(type, listener) {
      [...this.el].forEach(el => el.removeEventListener(type, listener));
    },
    forEach(callback) {
      [...this.el].forEach(el => callback(jq(el)));
    },
    select(selector) {
      return jq(selector, [...this.el][0]);
    },
    html(value) {
      if (value === undefined) {
        return [...this.el][0].innerHTML;
      }
      [...this.el].forEach(el => el.innerHTML = value);
    },
    text(value) {
      if (value === undefined) {
        return [...this.el][0].innerText;
      }
      [...this.el].forEach(el => el.innerText = value);
    },
    value(value) {
      if (value === undefined) {
        return [...this.el][0].value;
      }
      [...this.el].forEach(el => el.value = value);
    },
    map(callback) {
      return [...this.el].map(el => callback(jq(el)));
    }
  };
};
