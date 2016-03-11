@extends('app')
@section('content')

    <div id="page-container">

        @include('exams.partials.leftpanel')



        <div class="mainpanel">
            <div class="contentpanel">
                <div class="panel-body">
                    {{ $exam->title }}
                </div>
            </div>

            <div class="contentpanel">
                <div class="panel-body">
                    @include('exams._preview_examQuestions')
            </div>
        </div>
    </div>
</div>

@endsection
