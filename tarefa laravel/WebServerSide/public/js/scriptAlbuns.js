let addgift = document.getElementById('addGifts')
let formAddGifts = document.getElementById('formAddGifts')

function Show(){
    document.getElementById('id').value = ""
    document.getElementById('name').value = ""
    document.getElementById('id_banda').value = ""
    document.getElementById('date').value = ""
    document.getElementById('mostrarImagem').style.display = "none"

    addgift.style.display = 'flex'
}


function albunsShow($id){

    let campoID = document.getElementById('id')
    let campoNomeAlbum = document.getElementById('name')
    let campoBanda = document.getElementById('id_banda')
    let campoData = document.getElementById('date')
    let campoImagem = document.getElementById('mostrarImagem')
    document.getElementById('mostrarImagem').style.display = ""

    dados.forEach(element => {

        if (element['id'] == $id){

            campoID.value = element['id']
            campoNomeAlbum.value = element['name']
            campoBanda.value = element['id_banda']
            campoData.value = element['date']
            campoImagem.src = "http://127.0.0.1:8000/storage/" + element['photo']

        }


    });


    addgift.style.display = 'flex'
}

addgift.addEventListener('click', function(e) {
	addgift.style.display = 'none'
})

formAddGifts.addEventListener('click', (e) => {
    e.stopPropagation()
  })
