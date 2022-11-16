$(document).ready(function () {
    vratiSveGlumce();
    dodajNovogGlumca();
    obrisiGlumca();
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

function obrisiGlumca() {

    $(document).on('click', '#btn_delete', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'delete.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                alert(data);
                vratiSveGlumce();
            }
        })
    })
}
