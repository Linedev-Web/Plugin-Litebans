$(document).ready(function () {

    $(document).ready(function () {
        $('#search').keyup(function () {
            event.preventDefault()
            let searchList = $('#search-list')
            let input = $(this).val()
            let element = {}
            element['search'] = input
            if (input.length >= 3) {
                $.post("/litebans/litebans/getSearchPseudo", element, function (data) {
                    $('.litebans--form-search').find('.ajax-msg').removeClass('error').empty()
                    if (data.statut) {
                        searchList.find('ul').empty();
                        if (data.list) {
                            for (let i = 0; i <= data.list.length; i++) {
                                if (data.list[i] !== undefined) {
                                    searchList.find('ul').append('<li><a href="#" class="search-pseudo" data-pseudo=' + data.list[i].name + '><i class="fa fa-search"></i>' + data.list[i].name + '</a></li>')
                                }
                            }
                        }
                        if (data.slug) {
                            document.location.href = data.slug;
                        }
                        $('.search-pseudo').on('click', function () {
                            event.preventDefault()
                            let search = $(this).data('pseudo')
                            $('#search').val(search)
                            $('#search').attr('value', search)
                            document.location.href = '/sanctions/profile?search=' + search;
                        })
                    } else if (!data.statut && data.list) {
                        searchList.find('ul').empty();
                        $('.litebans--form-search').find('.ajax-msg').addClass('error').empty().html('<b>Erreur : </b>'+data.msg);
                    } else if (!data.statut) {
                        $('.litebans--form-search').find('.ajax-msg').addClass('error').empty().html('<b>Erreur : </b>'+data.msg);
                    } else {
                        $('.litebans--form-search').find('.ajax-msg').addClass('error').empty().html('<b>Erreur : </b>'+data.msg);
                    }
                });
            } else {
                $('.litebans--form-search').find('.ajax-msg').addClass('error').empty().html('<b>Erreur :</b> Minimum 3 caractère');
                searchList.find('ul').empty();
            }
        })
    })
})