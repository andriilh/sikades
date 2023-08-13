const inUsername = $("[name='username']");
const form = $('#form');

const data = { id: '', username: '', password: '' }


$("#form").on('submit', function (e) {
    e.preventDefault();
    data.username = inUsername.val();

    $.ajax({
        type: 'POST',
        data: data,
        url: `${base_url}/CLogin/changepassword`,
        beforeSend: () => {
            $('#username-error').addClass('d-none');
            inUsername.prop('disabled', true)
        },
        success: (res) => {
            localStorage.setItem('username', res.username);
            localStorage.setItem('id_login', res.id_login);
            window.location = `${base_url}/CUtama/link_lupa_kata_sandi2`
        },
        error: (e) => {
            inUsername.prop('disabled', false);
            inUsername.focus();
            $('#username-error').removeClass('d-none');
            $('#username-error').text(e.statusText);
        }
    })
});