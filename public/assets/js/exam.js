var getExamNavPath = location.pathname.split("/");
getExamNavPathName = getExamNavPath[3];
var examNavbarDict = ['edit','combinate' ,'teacher','preview','student', 'mark','delete'];

$(document).ready(function () {
    if (examNavbarDict.indexOf(getExamNavPathName) >= 0) {
        $("#" + getExamNavPathName + "Nav").addClass("active");
    }
})


$("#checkUsersButton").change(function () {
    if ($(this).is(":checked")) {
        $("input.checkUsers:checkbox:not(:checked)").prop('checked', true);
    } else {
        $("input.checkUsers:checkbox:checked").prop('checked', false);
    }
});

$("#unCheckUsersButton").change(function () {
    if ($(this).is(":checked")) {
        $("input.unCheckUsers:checkbox:not(:checked)").prop('checked', true);
    } else {
        $("input.unCheckUsers:checkbox:checked").prop('checked', false);
    }
});


