let addgift = document.getElementById('addGifts')
let formAddGifts = document.getElementById('formAddGifts')

function Show(){

    document.getElementById('id').value = ""
    document.getElementById('name').value = ""
    document.getElementById('quant_albuns').value = ""
    document.getElementById('imagemMostrar').style.display = "none"


    addgift.style.display = 'flex'
}

function ShowEditar(){

    document.getElementById('imagemMostrar').style.display = ""


    addgift.style.display = 'flex'
}

addgift.addEventListener('click', function(e) {
	addgift.style.display = 'none'
})

formAddGifts.addEventListener('click', (e) => {
    e.stopPropagation()
  })
