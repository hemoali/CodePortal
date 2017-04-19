<div class="panel panel-default problems-filters-panel">
    <div class="panel-body">
        {{--Judges checkboxes--}}
        <div>
            Online Judges:
            @foreach ($judges as $judge)
                <div class="checkbox">
                    <label>
                        <input class="judgeState" type="checkbox"
                               {{ in_array($judge->id, $judges->toArray()) ? 'checked' : '' }}
                               value="{{ $judge->id }}"
                               id="judge-checkbox-{{ $judge->id }}"
                               onchange="app.syncDataWithSession(app.judgesSessionKey, '{{ $judge->id }}', true)">
                        {{ $judge->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <hr>
        {{--Tags AutoComplete--}}
        <div id="custom-search-input">
            <div class="input-group autocomplete-input-group">
                <input id="tags-auto" type="text" class="form-control tags-auto search-box"
                       placeholder="Tag name..."
                       onkeypress="return event.keyCode != 13;"
                       data-tags-path="{{url('tags_auto_complete')}}"
                       autocomplete="off">
            </div>
        </div>
        <div id="tags-list" class="autocomplete-list">

        </div>
        {{--Apply filters & Clear buttons--}}
        <p>
            <input class="btn btn-default" value="Apply Filters"
                   onclick="app.applyFilters('{{Request::url()}}/tags_judges_filters_sync', '{{csrf_token()}}', '{{ Request::url() }}')"/>

            <span onclick="app.clearProblemsFilters('{{Request::url()}}/tags_judges_filters_detach', '{{csrf_token()}}', '{{ Request::url() }}')"
                  class="btn btn-link text-dark pull-right"
                  id="clear-table-sorting-link">Clear</span>
        </p>
    </div>
</div>
