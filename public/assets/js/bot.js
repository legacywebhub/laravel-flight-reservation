// Bot scripts

document.getElementById('chat-icon').addEventListener('click', function() {
    document.getElementById('chat-box').style.display = 'flex';
});

document.getElementById('close-chat').addEventListener('click', function() {
    console.log("close chat");
    document.getElementById('chat-box').style.display = 'none';
});

document.getElementById('expand-chat').addEventListener('click', function() {
    console.log("expand chat");
    let chatBox = document.getElementById('chat-box');
    chatBox.classList.toggle('full-screen');
});

document.forms['bot-form'].addEventListener('submit', function(e) {
    e.preventDefault();
    
    let question = document.forms['bot-form']['question'].value,
        csrfToken = document.forms['bot-form']['_token'].value,
        chatFormBtn = document.forms['bot-form'].querySelector('.btn'),
        btnText = document.forms['bot-form'].querySelector('.btn-text');

    if (question.trim() !== '') {
        pasteQuestion();
    }

    // loading btn animation
    btnText.innerHTML = `<img width="30px" src="/assets/img/typing.svg" />`;
    chatFormBtn.disabled = true;

    fetch(`/bot`, {  // "http://127.0.0.1:8000/bot"
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            'question': question,
            '_token': csrfToken
        })
    })
    .then((response)=>{
        return response.json()
    })
    .then((data)=>{
        // console.log(data);
        pasteResponse(data['response']);
        btnText.innerHTML = `<i class="fa fa-paper-plane"></i>`;
        chatFormBtn.disabled = false;
    })
    .catch((err)=>{
        console.log(err);
        btnText.innerHTML = `<i class="fa fa-paper-plane"></i>`;
        chatFormBtn.disabled = false;
    })
})

function pasteQuestion() {
    // Variables
    let chatBody = document.querySelector('.chat-body'),
    chatInput = document.forms['bot-form']['question'],
    userMessage = document.createElement('div');

    // console.log(chatInput.value);

    // Append user message
    userMessage.classList.add('chat-message');
    userMessage.classList.add('user');
    userMessage.textContent = chatInput.value;
    chatBody.appendChild(userMessage);

    // Scroll to the bottom
    chatBody.scrollTop = chatBody.scrollHeight;

    // Clear the input field
    chatInput.value = '';
}

function pasteResponse(response) {
    // Variables
    let chatBody = document.querySelector('.chat-body'),
    botMessage =document.createElement('div');

    // Appending bot message
    botMessage.className = 'chat-message bot';
    botMessage.textContent = response;
    chatBody.appendChild(botMessage);

    // Scroll to the bottom
    chatBody.scrollTop = chatBody.scrollHeight;
}