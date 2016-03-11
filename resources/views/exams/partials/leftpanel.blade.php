<div class="leftpanel">
    <ul class="nav nav-pills nav-stacked">
        <li id="editNav"><a href="/exams/{{ $id }}/edit">考试属性</a></li>
        <li id="combinateNav"><a href="/exams/{{ $exam->id }}/combinate">组卷</a></li>
        <li id="teacherNav"><a href="/exams/{{ $exam->id }}/teacher">关联教师</a></li>
        <li id="previewNav"><a href="/exams/{{ $id }}/preview">预览</a></li>
        <li id="studentNav"><a href="/exams/{{ $id }}/student">考试分配</a></li>
        <li id="markNav"><a href="/exams/{{ $id }}/mark">阅卷</a></li>
        <li id="deleteNav"><a href="/exams/{{ $id }}/delete">考试删除</a></li>
    </ul>
</div>

