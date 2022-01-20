function convertToSlug(str) {
    return str.toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
