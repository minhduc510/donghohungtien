<table>
    <tr>
        @foreach ($headings as $heading)
            <th width='100px'>{{ $heading }}</th>
        @endforeach
    </tr>
    @foreach ($contacts as $index => $contact)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $contact[0] }}</td>
            <td>{{ $contact[1] }}</td>
            <td>{{ $contact[2] }}</td>
            <td>{!! $contact[3] !!}</td>
            <td>{{ $contact[4] }}</td>
        </tr>
    @endforeach
</table>
