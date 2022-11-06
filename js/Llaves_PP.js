var d,
    e,
    key_private,
    key_public,
    lista_primos,
    mensaje,
    mensaje_cifrado,
    mensaje_descifrado,
    n,
    p,
    q,
    ø;

function verifica_primo(n) {
    var c, x;
    c = 0;
    x = 2;

    if (n >= 2) {
        while (x <= n / 2) {
            if (n % x === 0) {
                c = c + 1;
                x = x + 1;
            } else {
                x = x + 1;
            }
        }

        if (c === 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function genera_primos(n) {
    var x;
    const lp = [];
    x = 2;

    while (n !== 0) {
        if (verifica_primo(x) === true) {
            lp.push(x);
            x = x + 1;
            n = n - 1;
        } else {
            x = x + 1;
        }
    }

    console.log(lp);
    return lp;
}

// generamos 5 primos
lista_primos = genera_primos(50);

function pyq() {
    var lpq;
    p = 3;
    q = 11;

    lpq = [p, q];
    console.log(lpq);
    return lpq;
}
pyq();

function calculae(ø) {
    const le = [];
    e = 2;

    while (e > 1 && e < ø) {
        if (mcd(e, ø) === 1) {
            le.push(e);
            e = e + 1;
        } else {
            e = e + 1;
        }
    }

    console.log("\nVALORES PARA (e)=" + le.toString());
    e = 7;
    return e;
}
function mcd(e, ø) {
    var m;
    m = ø % e;

    while (m !== 0) {
        ø = e;
        e = m;
        m = ø % e;
    }

    return e;
}
function congruente(e, ø) {
    var k, m;
    k = 1;
    m = (1 + k * ø) % e;

    while (m !== 0) {
        k = k + 1;
        m = (1 + k * ø) % e;
    }

    d = Number.parseInt((1 + k * ø) / e);
    return d;
}

n = p * q;
ø = (p - 1) * (q - 1);
// console.log(ø);
e = calculae(ø);
d = congruente(e, ø);

console.log("n [", n, "]", "e [", e, "]");
console.log("n [", n, "]", "d [", d, "]");
// console.log(e);
// console.log(d);
key_public = [n, e];
key_private = [n, d];
