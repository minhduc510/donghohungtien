<table>
    <tr>
        @foreach ($headings as $heading)
            <th>{{ $heading }}</th>
        @endforeach
    </tr>
    @foreach ($contacts as $index => $contact)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $contact[0] }}</td>
            <td>{{ $contact[1] }}</td>
            <td>{{ $contact[2] }}</td>
            <td>{{ $contact[3] }}</td>
            <td>{{ $contact[4] }}</td>
            <td>{{ $contact[5] }}</td>
            <td>{{ $contact[6] }}</td>
            <td>{{ $contact[7] }}</td>
            <td>{{ $contact[8] }}</td>
            <td>{{ $contact[9] }}</td>
        </tr>
    @endforeach
</table>
