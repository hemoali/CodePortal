@if(count($data[Constants::CONTESTS_CONTESTS_KEY]))
    <table class="table table-bordered table-hover" id="contests_table">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center contest-table-name-th">Name</th>
            <th class="text-center">Time</th>
            <th class="text-center">Duration</th>
            @if(!isset($isGroup))
                <th class="text-center">Owner</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($data[Constants::CONTESTS_CONTESTS_KEY] as $contest)
            <tr>
                <td>{{ $contest->id }}</td>
                <td>
                    <a href="{{ url('contest/' . $contest->id) }}">
                        {{ $contest->name }}
                    </a>
                </td>
                <td>{{ date('D M d, H:i', strtotime($contest->time))}}</td>
                <td>{{ \App\Utilities\Utilities::convertMinsToHoursMins($contest->duration) }} hrs</td>
                @if(!isset($isGroup))
                    <td>
                        <a href="{{ url('profile/' . $contest->owner->username)}}">
                            {{ $contest->owner->username }}
                        </a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--Pagination--}}
    @if(!isset($isGroup))
        {{ $data[Constants::CONTESTS_CONTESTS_KEY]->render() }}
    @else
        {{ $data[Constants::CONTESTS_CONTESTS_KEY]->fragment('contests')->links() }}
    @endif
@else
    <p class="margin-30px">No contests!</p>
@endif