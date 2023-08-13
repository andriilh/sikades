const inPassword = $("[name='password']");
const form = $('#form');

const data = { id: localStorage.getItem('id_login'), username: localStorage.getItem('username'), password: '' }


$("#form").on('submit', function (e) {
    e.preventDefault();
    data.password = inPassword.val();

    $.ajax({
        type: 'POST',
        data: data,
        url: `${base_url}/CLogin/changepassword`,
        beforeSend: () => {
            inPassword.prop('disabled', true)
        },
        success: () => {
            localStorage.removeItem('username')
            localStorage.removeItem('id_login')
            window.location = `${base_url}/CUtama/link_login`
        },
        error: (e) => {
            inPassword.prop('disabled', false);
            inPassword.focus();
        }
    })
});