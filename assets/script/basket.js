const basketCount = document.getElementsByClassName('panierCount')
const btn = document.getElementsByClassName('btnAcces')
btn.addEventListener('click', test)

function test(event){
    event.preventDefault()
    let form = document.querySelector('#form')
    const headers = {
        'Accept': 'application/json'
    }
    const apiCall = fetch('controller_fetch/fetch_basket.php', {
        method: 'POST',
        headers: headers,
        body: new FormData(form),
    })
        .then(response => response.json()) //transfo en json
        .then(response => {
            console.log(response); //gestion response
        })
        .catch(error => console.error('fetch error: '));
}