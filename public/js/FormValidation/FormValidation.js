function FormValidation(k) {
    function l() {
        for (var d = !0, g = 0; g < h.length; ++g)
            for (var a = h[g], b = 0; b < a.validation.length; ++b) {
                var f = q(a.validation[b], a);
                if ("good" === f) n(a.status_id, "Correcto", "success"), a.field.className = "", a.valid = !0;
                else {
                    n(a.status_id, f, "error");
                    a.field.className = "error";
                    d = !1;
                    a.valid = !1;
                    break
                }
            }
        r.disabled = !d
    }

    function q(d, g) {
        var a = d.split(":"),
            b = g.field.value.trim();
        switch (a[0]) {
            case "len":
                var f = parseInt(a[1].split("-")[0]),
                    c = parseInt(a[1].split("-")[1]);
                if (b.length < f) return "Debe ser mayor que " +
                    (f - 1) + " caracteres";
                if (b.length > c) return "Debe ser menor que " + (c + 1) + " caracteres";
                break;
            case "regex":
                if (!t[a[1]].test(b)) {
                    if ("email" == a[1]) {
                        if (0 == b.length) break;
                        return "No es una dirección de correo válida"
                    }
                    return "Contiene caracteres inválidos"
                }
                break;
            case "match":
                if (b != k.querySelector("[name='" + a[1] + "']").value) return "No son iguales";
                break;
            case "req":
                if (0 === b.length) return "Necesario";
                break;
            case "select-req":
                if (0 === g.field.selectedIndex) return "Necesario";
                break;
            case "checkbox":
                for (var f = parseInt(a[2].split("-")[0]),
                        c = parseInt(a[2].split("-")[1]), b = k.querySelectorAll("[name='" + a[1] + "']"), e = a = 0; e < b.length; ++e) b[e].checked && ++a;
                if (0 === a && 0 < f) return "Necesario";
                if (a < f) return "Select at least seleccione al menos" + f;
                if (a > c) return "Seleccione " + c + " como máximo";
                break;
            case "radio":
                b = k.querySelectorAll("[name='" + a[1] + "']");
                for (e = a = 0; e < b.length; ++e) b[e].checked && ++a;
                if (1 != a) return "Necesario";
                break;
            case "or":
                for (e = 0; e < h.length; ++e) h[e].field.name === a[1] && (f = h[e]);
                e = f.field.value.trim().length;
                if (0 == b.length && 0 == e || !f.valid && 0 != e) return "Ya sea este o " +
                    a[2] + " deben ser llenados"
        }
        return "good"
    }

    function n(d, c, a) {
        d = document.querySelector(d);
        d.innerHTML = "success" === a ? '<i class="fa fa-check"></i> ' + c : '<i class="fa fa-times"></i> ' + c;
        d.className = d.className.replace(" status-success", "");
        d.className = d.className.replace(" status-error", "");
        d.className += " status-" + a;
        d.style.visibility = "visible"
    }
    for (var t = {
                letters: /^[a-zA-Z]*$/,
                name: /^[a-zA-Z0-9 ñíóúáé:.\-']*$/i,
                username: /^[a-zA-Z0-9_\.!?-]*$/,
                numbers: /^[0-9]*$/,
                phone: /^[0-9 \-+]*$/,
                date: /^\d{4}-\d{2}-\d{2}$/,
                email: /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/
            },
            r = k.querySelector('[type="submit"]'), p = k.querySelectorAll("[data-validation]"), h = [], m = 0; m < p.length; ++m) {
        var c = p[m],
            u = {
                field: c,
                status_id: "#" + c.name + "-status",
                validation: c.attributes["data-validation"].value.split(" "),
                valid: !1
            };
        "checkbox" != c.type && "radio" != c.type && (c.oninput = l);
        c.onchange = l;
        h.push(u)
    }
    window.onload = function() {
        l()
    }
};