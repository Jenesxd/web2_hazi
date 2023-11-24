<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Objektumorientált JavaScript példa</title>
</head>
<body>

<div id="itemList"></div>
<button id="addItem">Elem hozzáadása</button>

<script>
    class ElemKezelo {
        constructor(kontener) {
            this.kontener = kontener;
            this.elemek = [];
        }

        elemHozzaadasa(elem) {
            this.elemek.push(elem);
            this.kijelzesFrissitese();
        }

        kijelzesFrissitese() {
            this.kontener.innerHTML = ''; 
            this.elemek.forEach((elem, index) => {
                const listaElem = document.createElement('div');
                listaElem.textContent = `Elem ${index + 1}: ${elem}`;
                this.kontener.appendChild(listaElem);
            });
        }
    }

    const kezelo = new ElemKezelo(document.getElementById('itemList'));

    document.getElementById('addItem').addEventListener('click', () => {
        const ujElem = prompt('Adja meg az új elemet:');
        if (ujElem) {
            kezelo.elemHozzaadasa(ujElem);
        }
    });
</script>

</body>
</html>
