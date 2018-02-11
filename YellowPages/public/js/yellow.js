//to select multiple choices with category select

$('#category_select option').mousedown(function(e) {
    e.preventDefault();
    var originalScrollTop = $(this).parent().scrollTop();
    console.log(originalScrollTop);
    $(this).prop('selected', $(this).prop('selected') ? false : true);
    var self = this;
    $(this).parent().focus();
    setTimeout(function() {
        $(self).parent().scrollTop(originalScrollTop);
    }, 0);

    return false;
});

//to display area that related with selected city in add company page
$(document).ready(function() {
    $('#city_select').on('change', function () {
        var cityId = $(this).val();

        $.ajax({
            type: 'POST',
            url: '/../index/selectAjax',
            data: {
                id:cityId
            },
            success: function (response) {
                var arr=JSON.parse(response);
                $('#area_select').html('');
                for (var key in arr ) {
                    $('#area_select').append("<option value='" + arr[key].Area_Id + "'>"+arr[key].Area_Name+"</option>");
                }
            }
        });

    });
});