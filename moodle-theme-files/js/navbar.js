/**
* Navbar
*/
/* Main menu */
(function() {
    "use strict";
    /**
    * Easy selector helper function
    */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
        return [...document.querySelectorAll(el)]
        } else {
        return document.querySelector(el)
        }
    }
    /**
    * Easy event listener function
    */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
    * Easy on scroll event listener 
    */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
    * Toggle .navbar-scrolled class to #navheader when page is scrolled
    */
    let selectNav = select('#navheader')
    if (selectNav) {
    const headerScrolled = () => {
        if (window.scrollY > 100) {
            selectNav.classList.remove('d-none')
            selectNav.classList.add('navbar-scrolled')
        } else if (window.scrollY > 30) {
            selectNav.classList.add('d-none')
        } else {
            selectNav.classList.remove('d-none')
            selectNav.classList.remove('navbar-scrolled')
        }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
    }
    /**
     * Theme info.
     */
    const idvar = document.getElementById("theme-info");
    if (idvar) {
        document.getElementById("theme-info").innerHTML = "Moodle Theme Zuum - Writer Themes Almond";
    }
})();
