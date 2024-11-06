const nameBox = document.querySelector('.name-box')
const messageBox = document.querySelector('.message-box')
const mailBox = document.querySelector('.mail-box')


const cursor = document.querySelector('.cursor');
document.addEventListener('mousemove', e =>{
    cursor.setAttribute("style", "top: "+(e.pageY - 10)+"px; left:"+(e.pageX - 10)+"px;")
})

document.addEventListener('click', () =>{
    cursor.classList.add("expand")

    setTimeout(() => {
        cursor.classList.remove("expand")
    }, 500)
})

const sendBtn = document.querySelector('.send-btn')
sendBtn.addEventListener('click', () => {
    if(nameBox.value !== '' && messageBox.value !== '' && mailBox.value !== ''){
        sendBtn.innerHTML = '<div class="loader"></div>'
    }
   
})
