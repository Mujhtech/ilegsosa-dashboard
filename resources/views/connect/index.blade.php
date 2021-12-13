@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sets</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Set</th>
                                    <th>Members</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($sets->count() > 0)
                                    @php
                                        $sn = 0;
                                    @endphp
                                    @foreach ($sets as $item)
                                        @php
                                            $sn++;
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ $sn }}
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            </td>
                                            <td>

                                                @if ($item->members->count() > 0)
                                                    @foreach ($item->members as $member)
                                                        <img alt="image" src="{{ $member->user->profile_photo_url }}"
                                                            class="rounded-circle" width="35"
                                                            title="{{ $member->user->full_name }}">
                                                    @endforeach
                                                @else
                                                    No member found
                                                @endif

                                            </td>
                                            <td>
                                                <form action="{{ route('user.connect.request') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="set_id" value="{{ $item->id }}" />
                                                    <button type="submit" class="btn btn-secondary">Request Access</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center">No data found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
