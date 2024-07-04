const user_icon = document.getElementById("user_icon");
const content_subuser = document.getElementById("content_subuser");

user_icon.addEventListener('click', () => {
    console.log("Hello")
    if (content_subuser.classList.contains('cont_subuserOff')) {
        content_subuser.classList.remove('cont_subuserOff');
        content_subuser.classList.add('content_subuserOn');
    } else {
        content_subuser.classList.remove('content_subuserOn');
        content_subuser.classList.add('cont_subuserOff');
    }
});

document.addEventListener('click', (event) => {
    if (!user_icon.contains(event.target) && !content_subuser.contains(event.target)) {
        content_subuser.classList.remove('content_subuserOn');
        content_subuser.classList.add('cont_subuserOff');
    }
});