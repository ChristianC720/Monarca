
    function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
}
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
}
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
}

if (screen.width >= 1000) {
    function getBooks() {

        const XHR = new XMLHttpRequest();
        XHR.open('POST', 'returnBooks.php', true);
        XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //XHR.send('value=' + 1);
        XHR.send();
        XHR.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let serverResponse = JSON.parse(this.responseText);
                for (let row of serverResponse) {
                    document.getElementById('catalogo').innerHTML +=
                        `
                            <article class="book">
                             <img src="${row.picture}" alt="">
                             <span class="titleBook">${row.title}</span>
                             <span>${row.author}</span>
                             <span>$<b>${row.price}</b> + Envío(precio de envío se da a conocer antes de enviar)</span>
                             <span>¡Pidelo y paga cuando recibas!</span>
                             <a href="https://web.whatsapp.com/send?phone=9985232119&text=Hola, me gustaría recibir informes sobre el libro «${row.title}»">Ordenar vía WhatsApp</a>
                             </article>
                             
                             `
                }
            }

        }
    }

} else {
    function getBooks() {

        const XHR = new XMLHttpRequest();
        XHR.open('POST', 'administrator/returnBooks.php', true);
        XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //XHR.send('value=' + 1);
        XHR.send();
        XHR.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let serverResponse = JSON.parse(this.responseText);
                for (let row of serverResponse) {
                    document.getElementById('catalogo').innerHTML +=
                        `
                            <article class="book">
                             <img src="${row.picture}" alt="">
                             <span class="titleBook">${row.title}</span>
                             <span>${row.author}</span>
                             <span>$<b>${row.price}</b> + Envío(precio de envío se da a conocer antes de enviar)</span>
                             <span>¡Pidelo y paga cuando recibas!</span>
                             <a href="https://api.whatsapp.com/send?phone=9985232119&text=Hola, me gustaría recibir informes sobre el libro «${row.title}»">Ordenar vía WhatsApp</a>
                             </article>
                             
                             `
                }
            }

        }
    }

}
