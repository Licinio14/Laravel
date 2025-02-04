let addgift = document.getElementById('addGifts')
let formAddGifts = document.getElementById('formAddGifts')

function Show(){
    addgift.style.display = 'flex'
}

addgift.addEventListener('click', function(e) {
	addgift.style.display = 'none'
})

formAddGifts.addEventListener('click', (e) => {
    e.stopPropagation()
  })


