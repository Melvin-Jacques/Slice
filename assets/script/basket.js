document.addEventListener('DOMContentLoaded', function () {
    const btns = document.getElementsByClassName('btnAcces');

    Array.from(btns).forEach(btn => {
        btn.addEventListener('click', function (event) {
            event.preventDefault();

            const nom = btn.getAttribute('data-nom');
            const prix = btn.getAttribute('data-prix');

            const dataObject = {
                nom: nom,
                prix: prix
            };

            const jsonData = JSON.stringify(dataObject);

            const headers = {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            };

            fetch('controller_fetch/add_to_cart.php', {
                method: 'POST',
                headers: headers,
                body: jsonData,
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Erreur HTTP: ${response.status}`);
                }
                return response.json();
            })
            .then(response => {
                updateCartUI(response);
            })
            .catch(error => console.error('Erreur lors de la requête Fetch: ', error));
        });
    });
});

function updateCartUI(response) {
    console.log(response);
}