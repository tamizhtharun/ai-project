var form = document.getElementById("myForm"),
    imgInput = document.querySelector(".img"),
    file = document.getElementById("imgInput"),
    userName = document.getElementById("name"),
    sDate = document.getElementById("sDate"),
    submitBtn = document.querySelector(".submit"),
    userInfo = document.getElementById("data"),
    modal = document.getElementById("userForm"),
    modalTitle = document.querySelector("#userForm .modal-title"),
    newUserBtn = document.querySelector(".newUser")
    
const productNotAdded = document.getElementById('productNotAdded');

// let getData = localStorage.getItem('userProfile') ? JSON.parse(localStorage.getItem('userProfile')) : []
let isEdit = false, editId
showInfo()

newUserBtn.addEventListener('click', ()=> {
    submitBtn.innerText = 'Submit',
    modalTitle.innerText = "Add Attribute"
    isEdit = false
    imgInput.src = "../../images/add_image.png"
    form.reset()
})


file.onchange = function(){
    if(file.files[0].size < 1000000){  // 1MB = 1000000
        var fileReader = new FileReader();

        fileReader.onload = function(e){
            imgUrl = e.target.result
            imgInput.src = imgUrl
        }

        fileReader.readAsDataURL(file.files[0])
    }
    else{
        alert("This file is too large!")
    }
}


function showInfo(){

    document.querySelectorAll('.Details').forEach(info => info.remove())
    userInfo.innerHTML = ''
    productNotAdded.style.display = 'none';
    if (getData.length === 0) {
        productNotAdded.style.display = 'block';
        return;
    }

    getData.forEach((element, index) => {
        let createElement = `
            <tr class="Details">
                <td class="index-details">${index+1}</td>
                <td><img class="img-details" src="${element.picture}" alt="" width="50" height="50"></td>
                <td class="name-details">${element.Name}</td>

                <td class="sdate-details">${element.startDate}</td>


                <td class="btn-details">
                <div class="align-btn">
                    <button class="btn btn-primary" onclick="editInfo(${index}, '${element.picture}', '${element.Name}','${element.startDate}')" data-bs-toggle="modal" data-bs-target="#userForm"><i class="bi bi-pencil-square"></i></button>

                    <button class="btn btn-danger" onclick="deleteInfo(${index})"><i class="bi bi-trash"></i></button>
                </div>               
                </td>
                </tr>`
        

                userInfo.innerHTML += createElement
          
    })
}
showInfo()

function editInfo(index, pic, name, Sdate){
    isEdit = true
    editId = index
    imgInput.src = pic
    userName.value = name
    sDate.value = Sdate
    submitBtn.innerText = "Update"
    modalTitle.innerText = "Update The Form"
}


function deleteInfo(index){
    if(confirm("Are you sure want to delete?")){
        getData.splice(index, 1)
        localStorage.setItem("userProfile", JSON.stringify(getData))
        showInfo()
    }
}


form.addEventListener('submit', (e)=> {
    e.preventDefault()

    const information = {
        picture: imgInput.src == undefined ? "download.png" : imgInput.src,
        Name: userName.value,
        startDate: sDate.value
    }

    if(!isEdit){
        getData.push(information)
    }
    else{
        isEdit = false
        getData[editId] = information
    }

    localStorage.setItem('userProfile', JSON.stringify(getData))

    submitBtn.innerText = "Submit"
    modalTitle.innerHTML = "Add Attribute"

    showInfo()

    form.reset()

    imgInput.src = "download.png"  

    // modal.style.display = "none"
    // document.querySelector(".modal-backdrop").remove()
})