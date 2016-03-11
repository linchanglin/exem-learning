function changeRadio(){
    document.getElementById('radioDiv').style.display="";
    document.getElementById('multipleDiv').style.display="none";
    document.getElementById('falseDiv').style.display="none";
}

function changeMultiple(){
    document.getElementById('radioDiv').style.display="none";
    document.getElementById('multipleDiv').style.display="";
    document.getElementById('falseDiv').style.display="none";
}

function changeFalse(){
    document.getElementById('radioDiv').style.display="none";
    document.getElementById('multipleDiv').style.display="none";
    document.getElementById('falseDiv').style.display="";
}

function changeSimple(){
    document.getElementById('radioDiv').style.display="none";
    document.getElementById('multipleDiv').style.display="none";
    document.getElementById('falseDiv').style.display="none";
}

function setNum(){
    radioNum = parseInt($('#radioNum').attr('value'));
    multipleNum = parseInt($('#multipleNum').attr('value'));
}

function changeNum(){
    var strHtml = '<input type="hidden" id="radioNum" name="radioNum" value="'+radioNum+'"><input type="hidden" id="multipleNum" name="multipleNum" value="'+multipleNum+'">'
    document.getElementById('listNum').innerHTML = strHtml;
}

function addRadio(){
    setNum();

    if(radioNum < 10)
    {
        radioNum = radioNum + 1;
       var strHtml = '<div class="form-group" id="radioDiv'+radioNum+'"> <p class="h5" style="margin-left: 0px;">选项'+radioNum+'</p> <label> <input type="radio" name="ifTrue" value="'+radioNum+'"> 正确 </label> <div> <input type="text" class="form-control" name="title'+radioNum+'" value="选项'+radioNum+'" placeholder="选项'+radioNum+'"> <div class="text-right"><input type="button" class="btn btn-danger" onclick="delRadio('+radioNum+')" value="删除"></div> </div>  <hr> </div>';
        $('#radioPlace').append(strHtml);

        changeNum();
    }
    else{
        alert('已经达到上限');
    }

}

function delRadio(id)
{
    setNum();
    if(radioNum == id)
    {
        document.getElementById('radioPlace').removeChild(document.getElementById('radioDiv'+id));
        radioNum = radioNum-1
        changeNum();
    }
    else
    {
        alert('请从最后一项开始删除');
    }
}

function addMultiple(){
    setNum();

    if(multipleNum < 10)
    {
        multipleNum = multipleNum + 1;
        var strHtml = '<div class="form-group" id="multipleDiv'+multipleNum+'"> <p class="h5" style="margin-left: 0px;">选项'+multipleNum+'</p> <label> <input type="checkbox" name="mulIfTrue'+multipleNum+'" value="1"> 正确 </label> <div> <input type="text" class="form-control" name="mulTitle'+multipleNum+'" value="选项'+multipleNum+'" placeholder="选项'+multipleNum+'"> <div class="text-right"><input type="button" class="btn btn-danger" onclick="delMultiple('+multipleNum+')" value="删除"></div> </div>  <hr> </div>';
        $('#multiplePlace').append(strHtml);

        changeNum();
    }
    else{
        alert('已经达到上限');
    }

}

function delMultiple(id)
{
    setNum();
    if(multipleNum == id)
    {
        document.getElementById('multiplePlace').removeChild(document.getElementById('multipleDiv'+id));
        multipleNum = multipleNum-1
        changeNum();
    }
    else
    {
        alert('请从最后一项开始删除');
    }
}