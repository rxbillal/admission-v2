<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>
    <style>
    </style>
</head>
<body>
    <h1>Student Report</h1>

    <table style="border-collapse: collapse; border-style: solid; width:100%" border="1">
        <thead>
            <tr style="background: green;">
                <th style="color:#fff">ID</th>
                <th style="color:#fff">Application ID</th>
                <th style="color:#fff">Email</th>
                <th style="color:#fff">Phone</th>
                <th style="color:#fff">Full Name</th>
                <th style="color:#fff">Admitted Subject</th>
                <th style="color:#fff">State</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chunk as $user)
                <tr>
                    <td style="height: 18px; font-size:12px;">{{ $user->id }}</td>
                    <td style="height: 18px; font-size:12px">{{ $user->application_id }}</td>
                    <td style="height: 18px; font-size:12px">{{ $user->email }}</td>
                    <td style="height: 18px; font-size:12px">{{ $user->phone }}</td>
                    <td style="height: 18px; font-size:12px">{{ $user->fname }} {{ $user->lname }}</td>
                    <td style="height: 18px; font-size:12px">{{ $user->admitted_subject }}</td>
                    <td style="height: 18px; font-size:12px">{{ @$user->personalInfo->city->city_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
