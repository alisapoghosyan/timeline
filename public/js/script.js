const btn  = document.querySelector('.addBtn')
const modalDiv = document.querySelector('.modalDiv')
const faTimes = document.querySelector('.fa-times')
const editBtn = document.querySelector('table')
const editModal = document.querySelector('.editModal')
const close = document.querySelector('.editClose')
const form = document.querySelector('.creatingForm')

const lastnameInput = document.querySelector('#lastname')
const nameInput = document.querySelector('#firstname')
const starttime = document.querySelector('#starttime')
const endtime = document.querySelector('#endtime')
const _token = document.head.querySelector("[name~=csrf-token][content]").content;
const img = document.querySelector('input[type="file"]')

const updateLastname = document.querySelector('#updateLastname')
const updateFirstname = document.querySelector('#updateFirstname')
const updateStartTime = document.querySelector('#updateStartTime')
const updateEndTime = document.querySelector('#updateEndTime')
const updateImg = document.querySelector('#updateImg')

let Id = ''
const editForm = document.querySelector('.editSubmit')
const deleteItem = document.querySelector('.deleteItem')
const attend = document.querySelector('.attend')
const list = document.querySelector('.list')
const users_list = document.querySelector('.users_list')
const attendances = document.querySelector('.attendances')
const deleted = document.querySelector('.deleted')
const removed = document.querySelector('.removed')
const actives = document.querySelectorAll('.btn-active')
const select = document.querySelector('.select')
const tbody =   document.querySelector('tbody')
const searchInput = document.querySelector('.search')
const searchForm = document.querySelector('.searchForm')


actives?.forEach(elem =>{
    elem.addEventListener('click',(e)=>{
        const activedItem =
            {
                'id':e.target.dataset.code,
                "_token": _token,
            }

        fetch('/activeUser', {
            method: "post",
            body:JSON.stringify(activedItem),
            headers: {
                "Content-Type": "application/json",
            },
        })
        location.reload()
    })
})

select?.addEventListener('change',(e)=>{
    const data = {
        sortingData:e.target.value.trim(),
        "_token": _token,
    }
    fetch('/sortUser', {
        method: "post",
        body: JSON.stringify(data),
        headers: {
            "Content-Type": "application/json",
         },
    }).then(response => response.json())
    .then(data => {
        tbody .innerHTML = ''
        for(let i of data){
            let tr = document.createElement('tr')
            let img = document.createElement('td')
            let id = document.createElement('td')
            let name = document.createElement('td')
            let lastName = document.createElement('td')
            let startTime = document.createElement('td')
            let endTime = document.createElement('td')

            id.innerHTML = `<span class="fs-20 pr-16">${i.id}</span>`
            name.innerHTML = `<span class="fs-20 pr-16">${i.firstname}</span>`
            lastName.innerHTML= `<span class="fs-20 pr-16">${i.lastname}</span>`
            img.innerHTML = `<img style="width: 50px;aspect-ratio: 1" src=/storage/user_images/${i.img}></img>`;
            if(i['attendaces'].length){
                for (let j of i['attendaces']){
                    if(j['enterTime']){
                        startTime.innerHTML=  `<strong>${j['enterTime'].slice(11,20)}</strong>`
                    } else {
                        startTime.innerHTML= `<strong >Empty</strong>`
                    }
                    if(j['outTime']){
                        endTime.innerHTML=  `<strong >${j['outTime'].slice(11,20)}</strong>`
                    } else {
                        endTime.innerHTML= `<strong >Empty</strong>`
                    }
                }
            }else {
                startTime.innerHTML= `<strong>Empty</strong>`
                endTime.innerHTML= `<strong >Empty</strong>`
            }

            tr.append(id,img,name,lastName,startTime,endTime)
            tbody.appendChild(tr)

        }
    })
})

btn?.addEventListener("click", ()=>{
        modalDiv.style.display = "flex"
        document.body.style.overflow = "hidden"

     form.addEventListener('submit', (e) => {
        e.preventDefault()
             const data =
             {
                 'firstname': nameInput.value,
                 'lastname': lastnameInput.value,
                 'starttime': starttime.value,
                 'endtime': endtime.value,
                 'img':img.files[0].name,
                 "_token": _token,
             }
              fetch('/create', {
                 method: "post",
                 body: JSON.stringify(data),
                 headers: {
                     "Content-Type": "application/json",
                 },
             })
            modalDiv.style.display = "none"
            document.body.style.overflow = "scroll"
            nameInput.value=''
            lastnameInput.value=''
            starttime.value='9'
            endtime.value='18'

            location.reload()
     })
})

faTimes?.addEventListener("click",()=>{
    modalDiv.style.display = "none"
    document.body.style.overflow = "scroll"

})

editBtn?.addEventListener('click',(e)=>{
       if(e.target == e.currentTarget) return
        if (e.target.classList.contains('btn-info')){
            editModal.style.display = 'flex'
            document.body.style.overflow = "hidden"

            if(e.target.dataset.endtime.slice(6).includes('0')){
                updateEndTime.value = e.target.dataset.endtime.slice(7)
            }
            else {
                updateEndTime.value = e.target.dataset.endtime.slice(6)
            }
            if(e.target.dataset.starttime.slice(6).includes('0')){
                updateStartTime.value = e.target.dataset.starttime.slice(7)
            }
            else {
                updateStartTime.value = e.target.dataset.starttime.slice(6)
            }
            updateFirstname.value = e.target.dataset.name
            updateLastname.value = e.target.dataset.lastname
            updateImg.filename = e.target.dataset.img
            Id = e.target.dataset.id
            editForm.addEventListener('click',()=>{
                updatedData = {
                    'id' : Id,
                    'firstname': updateFirstname.value,
                    'lastname': updateLastname.value,
                    'starttime': updateStartTime.value,
                    'endtime': updateEndTime.value,
                    'img':updateImg.files[0] ? updateImg.files[0].name: updateImg.filename ,
                    "_token": _token,
                    'is_admin': 'true',
                }
                fetch('/updateUser', {
                    method: "post",
                    body: JSON.stringify(updatedData),
                    headers: {
                        "Content-Type": "application/json",
                    },
                })
                editModal.style.display = 'none'
                document.body.style.overflow = "scroll"

                location.reload()
            })
        }
        if(e.target.classList.contains('btn-del')){
            const deleteItem =
            {
                'id':e.target.dataset.code,
                "_token": _token,
            }
            fetch('/deleteUser', {
                method: "post",
                body:JSON.stringify(deleteItem),
                headers: {
                    "Content-Type": "application/json",
                },
            })
            location.reload()
        }
})


close?.addEventListener('click',()=>{
    editModal.style.display = 'none'
    document.body.style.overflow = "scroll"
})

searchForm?.addEventListener('submit',(e)=>{
    e.preventDefault()

    if(searchInput.value != '') {
        const searchingData = {
            data: searchInput.value,
            "_token": _token,
        }

        fetch('/users_list/search', {
            method: "post",
            body: JSON.stringify(searchingData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(res => res.json())
            .then(data => {
                tbody ? tbody.innerHTML = '' : null
                for (let i of data) {
                    let tr = document.createElement('tr')
                    let img = document.createElement('td')
                    let id = document.createElement('td')
                    let name = document.createElement('td')
                    let lastName = document.createElement('td')
                    let startTime = document.createElement('td')
                    let endTime = document.createElement('td')
                    let actions = document.createElement('td')


                    id.innerHTML = `<span class="fs-20 pr-16">${i.id}</span>`
                    name.innerHTML = `<span class="fs-20 pr-16">${i.firstname}</span>`
                    lastName.innerHTML = `<span class="fs-20 pr-16">${i.lastname}</span>`
                    img.innerHTML = `<img style="width: 50px;aspect-ratio: 1" src=/storage/user_images/${i.img}></img>`;
                    startTime.innerHTML = `<strong>${i['startTime'].slice(6)}:00</strong>`
                    endTime.innerHTML = `<strong >${i['endTime'].slice(6)}:00</strong>`

                        if (i['deleted_at']) {
                            actions.innerHTML =
                              `<a class="btn btn-xs fs-10 btn-bold btn-warning btn-active"
                                       data-code = '${i['id']}'
                                       id="activeItem"
                              >Active</a>`
                        }
                        else{
                            actions.innerHTML =
                                `<a class="btn btn-xs fs-10 btn-bold btn-info"
                            data-name='${i['firstname']} '
                            data-lastname = '${i['lastname']}'
                            data-id = '${i['id']}'
                            data-img = '${i['img']}'
                            data-startTime = '${i['startTime']}'
                            data-endTime = '${i['endTime']}'
                         >
                             Edit
                         </a>
                         <a class="btn btn-xs fs-10 btn-bold btn-warning btn-del"
                            data-code = '${i['id']}'
                            id="deleteItem"
                         >Deactive</a>`
                        }
                    tr.append(id, img, name, lastName, startTime, endTime, actions)
                    tbody.appendChild(tr)

                }
            })
    }
})

searchInput?.addEventListener('input',()=>{
    if(searchInput.value == '') {
        fetch('/users_list/canceled')
        .then(res => res.json())
        .then(data =>{
            tbody ? tbody.innerHTML = '' : null
            for (let i of data) {
                let tr = document.createElement('tr')
                let img = document.createElement('td')
                let id = document.createElement('td')
                let name = document.createElement('td')
                let lastName = document.createElement('td')
                let startTime = document.createElement('td')
                let endTime = document.createElement('td')
                let actions = document.createElement('td')


                id.innerHTML = `<span class="fs-20 pr-16">${i.id}</span>`
                name.innerHTML = `<span class="fs-20 pr-16">${i.firstname}</span>`
                lastName.innerHTML = `<span class="fs-20 pr-16">${i.lastname}</span>`
                img.innerHTML = `<img style="width: 50px;aspect-ratio: 1" src=/storage/user_images/${i.img}></img>`;
                startTime.innerHTML = `<strong>${i['startTime'].slice(6)}:00</strong>`
                endTime.innerHTML = `<strong >${i['endTime'].slice(6)}:00</strong>`


                actions.innerHTML =
                    `<a class="btn btn-xs fs-10 btn-bold btn-info"
                            data-name='${i['firstname']} '
                            data-lastname = '${i['lastname']}'
                            data-id = '${i['id']}'
                            data-img = '${i['img']}'
                            data-startTime = '${i['startTime']}'
                            data-endTime = '${i['endTime']}'
                         >
                             Edit
                         </a>
                         <a class="btn btn-xs fs-10 btn-bold btn-warning btn-del"
                            data-code = '${i['id']}'
                            id="deleteItem"
                         >Deactive</a>`
                tr.append(id, img, name, lastName, startTime, endTime, actions)
                tbody.appendChild(tr)
            }

        })
    }
})
