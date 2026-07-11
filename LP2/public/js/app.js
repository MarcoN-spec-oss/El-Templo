/* =========================================================
   EL TEMPLO GYM - Script general (admin + portal del socio)
========================================================= */
document.addEventListener("DOMContentLoaded", function () {


    document.querySelectorAll(".toggle-password").forEach(function (btn) {
        btn.addEventListener("click", function () {
            var targetId = btn.getAttribute("data-target");
            var input = document.getElementById(targetId);
            if (!input) return;
            if (input.type === "password") {
                input.type = "text";
                btn.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                input.type = "password";
                btn.innerHTML = '<i class="bi bi-eye"></i>';
            }
        });
    });

    document.querySelectorAll(".alert").forEach(function (alerta) {
        setTimeout(function () {
            alerta.style.transition = "opacity .4s ease";
            alerta.style.opacity = "0";
            setTimeout(function () { alerta.remove(); }, 400);
        }, 4000);
    });


    var params = new URLSearchParams(window.location.search);
    var paginaActual = params.get("page") || "dashboard";
    document.querySelectorAll(".sidebar a[href*='page=']").forEach(function (link) {
        var linkUrl = new URLSearchParams(link.getAttribute("href").split("?")[1]);
        if (linkUrl.get("page") === paginaActual) {
            link.classList.add("active");
        }
    });

    var toggleBtn = document.querySelector(".sidebar-toggle-btn");
    var sidebar = document.querySelector(".sidebar");

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("open");
        });
        document.addEventListener("click", function (e) {
            if (window.innerWidth <= 768 &&
                sidebar.classList.contains("open") &&
                !sidebar.contains(e.target) &&
                e.target !== toggleBtn) {
                sidebar.classList.remove("open");
            }
        });
    }

    document.querySelectorAll("[data-confirm]").forEach(function (el) {
        el.addEventListener("click", function (e) {
            var mensaje = el.getAttribute("data-confirm") || "¿Está seguro?";
            if (!confirm(mensaje)) {
                e.preventDefault();
            }
        });
    });

    var tabButtons = document.querySelectorAll(".portal-tabs button");
    if (tabButtons.length) {
        tabButtons.forEach(function (tab) {
            tab.addEventListener("click", function () {
                var target = tab.getAttribute("data-tab");
                document.querySelectorAll(".portal-tabs button").forEach(function (t) {
                    t.classList.remove("active");
                });
                document.querySelectorAll(".portal-panel").forEach(function (p) {
                    p.classList.remove("active");
                });
                tab.classList.add("active");
                var panel = document.getElementById(target);
                if (panel) panel.classList.add("active");
            });
        });
    }

    var loginForm = document.querySelector("form.needs-validation");
    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            var camposVacios = false;
            loginForm.querySelectorAll("[required]").forEach(function (campo) {
                if (!campo.value.trim()) {
                    campo.classList.add("is-invalid");
                    camposVacios = true;
                } else {
                    campo.classList.remove("is-invalid");
                }
            });
            if (camposVacios) {
                e.preventDefault();
            }
        });
    }

});
