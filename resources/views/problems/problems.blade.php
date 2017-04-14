<div class="panel panel-default problems-panel">
    <div class="panel-heading problems-panel-heading">Problems</div>
    <div class="panel-body problems-panel-body">
        @if($problems->count())
            @include('problems.table')
        @else
            <p class="no-problems-msg">
                No problems!
                @if(count(Request::get(Constants::URL_QUERY_JUDGES_KEY)) || count(Request::get(Constants::URL_QUERY_TAGS_KEY)) || strlen(Request::get(Constants::URL_QUERY_SEARCH_KEY)))
                    <br/>
                    please change the applied filters
                @endif
            </p>
        @endif
    </div>
</div>