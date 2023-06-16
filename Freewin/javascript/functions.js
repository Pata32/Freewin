function getCheckedCount() {
    var checked = $('input[type="checkbox"]:checked');
    if (checked.length >= 3) {
        document.getElementById('check-tag').disabled = false;
    } else {
        document.getElementById('check-tag').disabled = true;
    }
}

