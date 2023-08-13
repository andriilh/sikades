function search() {
    var txtSearch = '';
    var inputSearch = document.getElementById('searchSyarat');
    var filter = inputSearch.value.toUpperCase();
    var accordion = document.getElementById('accordionExample');
    var wrapper = document.getElementsByClassName('collapse-wrapper');

    for (i = 0; i < wrapper.length; i++) {
        var header = wrapper[i].getElementsByTagName("button")[0];
        txtSearch = header.innerText || header.textContent;
        if (txtSearch.toUpperCase().indexOf(filter) > -1) {
            wrapper[i].style.display = "";
        } else {
            wrapper[i].style.display = "none";
        }
    }
}