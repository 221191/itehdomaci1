$(document).ready(function () {
    vratiSveGlumce();
    dodajNovogGlumca();
})

function vratiSveGlumce() {

    $.ajax(
        {
            url: 'getall.php',
            method: 'get',
            success: function (data) {
                $('#table').html(data);
            }
        }

    )
}

function dodajNovogGlumca() {

    $(document).on('click', '#btn_add', function () {

        let ime = $('#ime').val();
        let prezime = $('#prezime').val();
        let predstava = $('#predstava').val();

        if (ime == '' || prezime == '' ||  predstava == '') {
            alert('Neophodno je da popunite polja!');
            return;
        }

        $.ajax({
            url: 'add.php',
            method: 'post',
            data: { ime: ime, prezime: prezime, predstava: predstava },

            success: function (data) {
                alert(data);
                vratiSveGlumce();
                $('#ime').val('');
                $('#prezime').val('');
                $('#predstava').val(1);
            }
        })
    })

}

