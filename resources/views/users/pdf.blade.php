<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
    <style type="text/css">
        @page {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            margin: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            margin: 0;
            font-size: 13px
        }

        table {
            width: 90%;
            margin: 0 auto;
        }

        .title {
            font-weight: bold;
            font-size: 16px;
            letter-spacing: 2px;
            color: #212529;
        }

        .text-right {
            text-align: right;
        }

        th,
        td {
            padding: 15px;
        }

        th:first-child,
        td:first-child {
            border-left: 1px solid #ddd !important;
        }

        th:first-child,
        td:last-child {
            border-right: 1px solid #ddd !important;
        }
    </style>
</head>

<body>
    <table class="mt-4">
        <tbody>
            <tr>
                <td class="border-top text-center pb-2">
                    <div class="title">User List</div>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
            <tr>
                <td>No</td>
                <td>Image</td>
                <td>Name</td>
                <td>Email</td>
                <td>Mobile</td>
                <td>State</td>
                <td>City</td>
                <td>Gender</td>
                <td>Role</td>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u =>$user)
            <tr>
                <td> {{$u+1}}</td>
                <td>
                    <img class="rounded-circle" style="width: 30px;height:30px;" src="{{ asset('uploads/users/'.$user->image) }}">
                </td>
                <td>
                    <div>{{ucfirst($user->first_name) ." " .ucfirst($user->last_name)}}</div>
                    <p></p>
                </td>
                <td>{{ucfirst($user->email)}}</td>
                <td>{{$user->mobile}}</td>
                <td>{{!empty($user->city_id) ? $user->getCity->getState['name'] : ''}}</td>
                <td>{{!empty($user->city_id) ? $user->getCity['name'] : ''}}</td>
                <td>{{$user->gender_name}}</td>
                <td>
                    @foreach ($user->roles as $role)
                    {{ $role->name }}
                    @if (!$loop->last)
                    ,
                    @endif
                    @endforeach
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Record Not Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>