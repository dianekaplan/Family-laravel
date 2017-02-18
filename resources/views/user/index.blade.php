@extends('default')

@section('content')
    <h3>User Info</h3> <br/>

    <h4>Past month's logins:</h4>
    @if (count($recent_visitors))

        @foreach ($recent_visitors as $user)
            <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                - last login: {{ $user->last_login }}
                (last nudged: {{ $user->last_pestered }})

                <br/>
                @endforeach

                @endif
                <br/>

    <h4>Users by activity level:</h4>
    <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Not logged in to new site</th>
                                <th>Logged in to new site</th>
                                <th>Did stuff on new site</th>
                                <th>Added notes on old site</th>
                                <th>Everyone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Counts</td>
                                <td>{{count($never_seen)}} never, {{count($users_on_old_site_only)}} old site only </td>
                                <td>{{count($logged_in)}} </td>
                                <td>{{count($users_with_activity)}} </td>
                                <td>14</td>
                                <td>{{count($users)}} </td>
                            </tr>

                            <tr>
                                <td>List</td>

                                <td>    Never:        @if (count($never_seen))
                                        @foreach ($never_seen as $user)
                                            <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                                                - last nudged: {{date('m/d/Y', strtotime( $user->last_pestered)) }}
                                        @endforeach
                                    @endif
                                <br/><br/>
                                                Old site only: @if (count($users_on_old_site_only))
                                                @foreach ($users_on_old_site_only as $user)
                                                    <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                                                        - last nudged: {{ $user->last_pestered }}
                                                @endforeach
                                            @endif


                                </td>
                                <td>            @if (count($logged_in))
                                        @foreach ($logged_in as $user)
                                            <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a> (last seen: {{ date('m/d/Y', strtotime($user->last_login)) }})
                                        @endforeach
                                    @endif </td>
                                <td>            @if (count($users_with_activity))
                                        @foreach ($users_with_activity as $user)
                                            <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                                        @endforeach
                                    @endif </td>
                                <td>Susan Kaplan (15)<br/> Myrna Pochel (11)<br/> Deb Bartlett 11)<br/> Diane (6)<br/> Anita (5)<br/> Rob Husband (3)<br/>
                                    Norman (3)<br/> Deborah Kallman (2)<br/>Barry Kloper (2)<br/> David Nitkin (2)<br/> Rosealyn Nolan (2)<br/> Andrea O'Brien (1)<br/>
                                    Paul Bartlett (1)<br/> Tess (1)</td>
                                <td>
                                    @if (count($users))

                                        @foreach ($users as $user)
                                            <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a></li>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


    <h4>Users by branch access:</h4>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Keem users</th>
                            <th>Husband users</th>
                            <th>Kemler users</th>
                            <th>Kaplan users</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Counts</td>
                            <td>{{count($keem_users)}} </td>
                            <td>{{count($husband_users)}} </td>
                            <td>{{count($kemler_users)}} </td>
                            <td>{{count($kaplan_users)}} </td>

                        </tr>

                        <tr>
                            <td>List</td>

                            <td>   @if (count($keem_users))
                                    @foreach ($keem_users as $user)
                                        <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                                            @endforeach
                                            @endif
                            </td>
                            <td>   @if (count($husband_users))
                                    @foreach ($husband_users as $user)
                                        <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                                    @endforeach
                                @endif
                            </td>
                            <td>   @if (count($kemler_users))
                                    @foreach ($kemler_users as $user)
                                        <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                                    @endforeach
                                @endif
                            </td>
                            <td>   @if (count($kaplan_users))
                                    @foreach ($kaplan_users as $user)
                                        <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                                    @endforeach
                                @endif
                            </td>
                            <td>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                                            <h4>Users needing password change:</h4>
                                            (have logged in, but still have original default password) <br/>
                                            <div class="table-responsive">
                                                @if (count($users_needing_password_update))
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>User</th>

                                                            <th>Last time they logged in</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach ($users_needing_password_update as $user)
                                                            <tr>
                                                                <td><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a></td>
                                                                <td> {{ $user->last_login}}</td>
                                                            </tr>
                                                            @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                @else
                                                    Everyone has updated their password
                                                @endif


                                            </div>
                                            <br/>


    <h4>Next pester candidates:</h4>
                (have logged in before but no logins or emails in the past 3 months) <br/>
                <div class="table-responsive">
                    @if (count($confirmed_users_not_recently_bugged))
                        <table class="table">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Last time I emailed</th>
                                <th>Last time they logged in</th>
                            </tr>
                            </thead>
                            <tbody>

                                        @foreach ($confirmed_users_not_recently_bugged as $user)
                                            <tr>
                                                <td><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a></td>
                                                <td>{{ $user->last_pestered}}</td>
                                                <td> {{ $user->last_login}}</td>
                                            </tr>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                        @else
                        You're all caught up
                    @endif


                </div>
<br/>


@stop