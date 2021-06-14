function validationForm() {
    let value = document.getElementById('email-user').value;
    if (!value) {
        document.getElementById('btn-add-user').disabled = true
        document.getElementById('error-email').innerHTML = 'Email khong duoc de trong'
    } else  {
        document.getElementById('btn-add-user').disabled = false
        document.getElementById('error-email').innerHTML = ''

    }
}
validationForm();