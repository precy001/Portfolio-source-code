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

    sendBtn.innerHTML = '<div class="loader"></div>'
})