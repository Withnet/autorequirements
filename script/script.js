$(document).ready(function () {
    $('input[name="company_name"]').suggestions({
        token: '2fc3857798d21bf40ce0b91b45b44143af0ee0ac',
        type: 'PARTY',
        count: 5,
        mobileWidth: 360,
        onSelect: function (suggestion) {
            $('input[name="hidden"]').val(suggestion.data.inn);
            document.getElementById('form_to_crm').submit();
        }
    });
});